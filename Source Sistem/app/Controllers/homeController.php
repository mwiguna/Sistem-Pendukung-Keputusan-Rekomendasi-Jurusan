<?php

class homeController extends Controller {
  
  public function index(){
    return $this->view('addSiswa');
  }

  public function insertSiswa(){
     $siswa = $this->model('Siswa')->insert([
      "nama"    => $_POST['nama'],
      "jurusan" => $_POST['jurusan'],
      "minat"   => $_POST['minat'],
      "ekonomi" => $_POST['ekonomi'],
      "nilai_matematika" => $_POST['matematika'],
      "nilai_fisika"     => $_POST['fisika'],
      "nilai_kimia"      => $_POST['kimia'],
      "nilai_biologi"    => $_POST['biologi'],
      "nilai_tik"        => $_POST['tik'],
      "nilai_bahasa_inggris"   => $_POST['bahasa_inggris'],
      "nilai_bahasa_indonesia" => $_POST['bahasa_indonesia']
    ])->lastId()->execute();
  
    $this->redirect('countSAW/' . $siswa);
  }

  public function daftarSiswa(){
    $siswa = $this->model('Siswa')->select()->orderBy('nama', 'ASC')->execute();
    return $this->view('daftarSiswa', ['siswa' => $siswa]);
  }

  public function editSiswa($id){
    $siswa = $this->model('Siswa')->select()->where('id', $id)->execute();
    return $this->view('editSiswa', ['siswa' => $siswa]);
  }

  public function updateSiswa($id){
    $siswa = $this->model('Siswa')->update([
      "nama"    => $_POST['nama'],
      "jurusan" => $_POST['jurusan'],
      "minat"   => $_POST['minat'],
      "ekonomi" => $_POST['ekonomi'],
      "nilai_matematika" => $_POST['matematika'],
      "nilai_fisika"     => $_POST['fisika'],
      "nilai_kimia"      => $_POST['kimia'],
      "nilai_biologi"    => $_POST['biologi'],
      "nilai_tik"        => $_POST['tik'],
      "nilai_bahasa_inggris"   => $_POST['bahasa_inggris'],
      "nilai_bahasa_indonesia" => $_POST['bahasa_indonesia']
    ])->where('id', $id)->execute();
  
    $this->redirect('daftarSiswa');
  }

  public function deleteSiswa($id){
    $siswa = $this->model('Siswa')->delete()->where('id', $id)->execute();
    $this->redirect('daftarSiswa');
  }

  // --- Prodi

  public function addProdi(){
    return $this->view('addProdi');
  }

  public function insertProdi(){
    
    $prodi = $this->model('Prodi')->insert([
      "nama" => $_POST['nama']
    ])->lastId()->execute();

    $ekonomi = $this->model('Ekonomi')->insert([
      "id_prodi" => $prodi,
      "kurang" => $_POST['kurang'],
      "cukup"  => $_POST['cukup'],
      "mampu"  => $_POST['mampu']
    ])->execute();

    $jurusan = $this->model('Jurusan')->insert([
      "id_prodi"   => $prodi,
      "ipa"        => $_POST['ipa'],
      "ips"        => $_POST['ips'],
      "bahasa"     => $_POST['bahasa'],
      "multimedia" => $_POST['multimedia'],
      "akuntansi"  => $_POST['ips'],
      "pemasaran"  => $_POST['ips'],
      "teknik_sepeda_motor"          => $_POST['teknik_sepeda_motor'],
      "teknik_komputer_dan_jaringan" => $_POST['teknik_komputer_dan_jaringan']
    ])->execute();

    $minat = $this->model('Minat')->insert([
      "id_prodi"  => $prodi,
      "kesehatan" => $_POST['kesehatan'],
      "teknik"    => $_POST['teknik'],
      "komputer"  => $_POST['komputer'],
      "sosial"    => $_POST['sosial'],
      "ekonomi"   => $_POST['ekonomi']
    ])->execute();

    $nilai = $this->model('Nilai')->insert([
      "id_prodi" => $prodi,
      "matematika" => $_POST['matematika'],
      "fisika"     => $_POST['fisika'],
      "kimia"      => $_POST['kimia'],
      "biologi"    => $_POST['biologi'],
      "tik"        => $_POST['tik'],
      "bahasa_inggris"   => $_POST['bahasa_inggris'],
      "bahasa_indonesia" => $_POST['bahasa_indonesia']
    ])->execute();
    
    $this->redirect('daftarProdi');
  }

  public function daftarProdi(){
    $prodi = $this->model('Prodi')->select()->orderBy('nama', 'ASC')->execute();
    return $this->view('daftarProdi', ['prodi' => $prodi]);
  }

  public function editProdi($id){
    $prodi   = $this->model('Prodi')->select()->where('id', $id)->execute();
    $jurusan = (array) $this->model('Jurusan')->select()->where('id_prodi', $id)->execute();
    $minat   = (array) $this->model('Minat')->select()->where('id_prodi', $id)->execute();
    $nilai   = (array) $this->model('Nilai')->select()->where('id_prodi', $id)->execute();
    $ekonomi = (array) $this->model('Ekonomi')->select()->where('id_prodi', $id)->execute();
    return $this->view('editProdi', ['prodi' => $prodi, 'jurusan' => $jurusan, 'minat' => $minat, 'nilai' => $nilai, 'ekonomi' => $ekonomi]);
  }

  public function updateProdi($id){
    $prodi = $this->model('Prodi')->update([
      "nama"    => $_POST['nama'],
    ])->where('id', $id)->execute();

    $jurusan = $this->model('Jurusan')->update([
      "ipa"        => $_POST['ipa'],
      "ips"        => $_POST['ips'],
      "bahasa"     => $_POST['bahasa'],
      "multimedia" => $_POST['multimedia'],
      "akuntansi"  => $_POST['ips'],
      "pemasaran"  => $_POST['ips'],
      "teknik_sepeda_motor"          => $_POST['teknik_sepeda_motor'],
      "teknik_komputer_dan_jaringan" => $_POST['teknik_komputer_dan_jaringan']
    ])->where('id_prodi', $id)->execute();

    $minat = $this->model('Minat')->update([
      "kesehatan" => $_POST['kesehatan'],
      "teknik"    => $_POST['teknik'],
      "komputer"  => $_POST['komputer'],
      "sosial"    => $_POST['sosial'],
      "ekonomi"   => $_POST['ekonomi']
    ])->where('id_prodi', $id)->execute();

    $nilai = $this->model('Nilai')->update([
      "matematika" => $_POST['matematika'],
      "fisika"     => $_POST['fisika'],
      "kimia"      => $_POST['kimia'],
      "biologi"    => $_POST['biologi'],
      "tik"        => $_POST['tik'],
      "bahasa_inggris"   => $_POST['bahasa_inggris'],
      "bahasa_indonesia" => $_POST['bahasa_indonesia']
    ])->where('id_prodi', $id)->execute();

    $ekonomi = $this->model('Ekonomi')->update([
      "kurang" => $_POST['kurang'],
      "cukup"  => $_POST['cukup'],
      "mampu"  => $_POST['mampu']
    ])->where('id_prodi', $id)->execute();

    $this->redirect('daftarProdi');
  }

  public function deleteProdi($id){
    $prodi   = $this->model('Prodi')->delete()->where('id', $id)->execute();
    $this->redirect('daftarProdi');
  }
  
}