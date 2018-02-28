<?php

class countController extends Controller {
  public function countSAW($id){
    
    //Get Data From Database

    $db_prodi   = $this->model('Prodi')->all();
  	$db_jurusan = $this->model('Jurusan')->all();
    $db_minat   = $this->model('Minat')->all();
    $db_ekonomi = $this->model('Ekonomi')->all();
    $db_nilai   = $this->model('Nilai')->all();

    //Convert to Specific Format

    //Prodi
  	foreach($db_prodi as $key => $value){
  		$prodi[] = $value->nama;
  	}

    //Jurusan
    foreach ($db_jurusan as $key => $value) {
      $newJurusan[] = array_values((array) $value); // Convert Object to Array
    }

    foreach($newJurusan as $key => $value){
      array_splice($value, 0, 2); // Remove ID & ID Prodi
      $wJurusan[] = $value;
    }

    //Minat
    foreach ($db_minat as $key => $value) {
      $newMinat[] = array_values((array) $value); 
    }

    foreach($newMinat as $key => $value){
      array_splice($value, 0, 2);
      $wMinat[] = $value;
    }

    //Ekonomi
    foreach ($db_ekonomi as $key => $value) {
      $newEkonomi[] = array_values((array) $value); 
    }

    foreach($newEkonomi as $key => $value){
      array_splice($value, 0, 2);
      $wEkonomi[] = $value;
    }

    //Nilai
    foreach ($db_nilai as $key => $value) {
      $newNilai[] = array_values((array) $value); 
    }

    foreach($newNilai as $key => $value){
      array_splice($value, 0, 2);
      $wNilai[] = $value;
    }

   // $prodi    = ["Kedokteran", "Perawat", "Teknik Elektro", "Sistem Informasi"];
   // $wJurusan = [ [1, 0, 0 ], [0.9, 0, 0.1], [ 0.6, 0.1, 0.3 ], [0.3, 0.3, 0.4] ];
   // $wMinat   = [ [ 0.1, 0.8, 0.1 ], [ 0.2, 0.7, 0.1 ], [0.7, 0, 0.3 ], [0.4, 0, 0.6] ];
   // $wEkonomi = [ [0.1, 0.4, 0.5 ], [0.3, 0.3, 0.4 ], [0.2, 0.4, 0.4], [0.3, 0.3, 0.4] ];
   // $wNilai   = [ [0.15, 0.3, 0.4, 0.15], [ 0.15, 0.3, 0.45, 0.1 ], [ 0.5, 0.2, 0.1, 0.2], [ 0.3, 0.1, 0.1, 0.5 ] ];

   // $jurusan = 2; //IPA [IPA, IPS, Komputer]
   // $minat   = 1; //Kesehatan [Kesehatan, Teknik, komputer]
   // $ekonomi = 2; //Mampu [Kurang, Mampu, Sangat Mampu]

   // //Fisika, Kimia, Biologi, Komputer
   // $nilai = [95, 90, 20, 99];

    // Get Data Siswa

    $siswa   = $this->model('Siswa')->select()->where("id", $id)->execute();
    if(empty($siswa)) die("Data Siswa Tidak Ditemukan");

    $nama    = $siswa->nama;
    $jurusan = $siswa->jurusan;
    $minat   = $siswa->minat;
    $ekonomi = $siswa->ekonomi;

    $arraySiswa = (array) $siswa;
    array_splice($arraySiswa, 0, 5);
    foreach ($arraySiswa as $key => $value) {
       $nilai[] = $value;
     } 

    // ------ Input End --- Processing :

    $wTotal   = [ 0.2, 0.3, 0.4, 0.1 ];

    //Normalisasi Nilai
    foreach ($nilai as $item)
    {
        if(max($nilai)  != 0) $currentVal = $item / max($nilai);
        else $currentVal = 0;
        $nilaiNormal[]   = $currentVal;
    }

    // Hitung Nilai Mata Pelajaran Setiap Prodi
    for($i = 0; $i < count($prodi); $i++){
    	$j = 0;
    	$nilaiSAW = 0;

        //Setiap Nilai
        foreach ($nilaiNormal as $item)
        {
           $nilaiSAW += $item * $wNilai[$i][$j];
           $j++;
        }
        
        // Nilai Mata Pelajaran Total Setiap Prodi
        $nilaiProdi[] = $nilaiSAW;
    }
    
    //Hitung Point Total Setiap Prodi
    for ($i = 0; $i < count($prodi); $i++){
        $jurusanProdi[] = $wJurusan[$i][$jurusan];
        $minatProdi[]   = $wMinat[$i][$minat];
        $ekonomiProdi[] = $wEkonomi[$i][$ekonomi];

        $countSAW = 0;
        $countSAW += $nilaiProdi[$i]   * $wTotal[0];
        $countSAW += $jurusanProdi[$i] * $wTotal[1];
        $countSAW += $minatProdi[$i]   * $wTotal[2];
        $countSAW += $ekonomiProdi[$i] * $wTotal[3];

        $totalProdi[$prodi[$i]][] = $countSAW;
    }

    arsort($totalProdi);
    return $this->view('result', ['datas' => $totalProdi, 'siswa' => $siswa]);
  }
}