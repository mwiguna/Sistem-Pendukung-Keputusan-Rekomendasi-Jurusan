
    <?php 
    	require_once('header.php'); 
		require_once('data.php');
    ?>
    
    <div class="col-12 pside">
        <div class="col-12 main-title">Daftar Siswa</div>

        <div class="col-12 mtop1">
        	<div class="col-12 tbTitle">
	        	<div class="col-1 center">No.</div>
	        	<div class="col-3">Nama Siswa</div>
	        	<div class="col-2">Jurusan</div>
	        	<div class="col-3">Minat</div>
	        	<div class="col-3">Aksi</div>
	        </div>
        	<div class="col-12 line"></div>
	       
	        <?php $i = 1; foreach ($siswa as $key): ?>
	        
	        <div class="col-12 tbSub">
	        	<div class="col-1 center"><?= $i ?></div>
	        	<div class="col-3"><?= $key->nama ?></div>
	        	<div class="col-2"><?= $dtJurusan[$key->jurusan] ?></div>
	        	<div class="col-3"><?= $dtMinat[$key->minat] ?></div>
	        	<div class="col-3">
	        		<a href="countSAW/<?= $key->id ?>" class="col-3 btn btn-blue">Lihat</a>
	        		<a href="editSiswa/<?= $key->id ?>" class="col-4 btn btn-green">Edit</a>
	        		<a href="deleteSiswa/<?= $key->id ?>" class="col-4 btn btn-red" onclick="return confirm('Yakin?')">Hapus</a>
	        	</div>
        	</div>
        	<div class="col-12 line"></div>

        	<?php $i++; endforeach ?>
        </div>
    </div>
</body>
</html>