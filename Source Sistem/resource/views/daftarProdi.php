
    <?php 
    	require_once('header.php'); 
		require_once('data.php');
    ?>
    
    <div class="col-12 pside">
        <div class="col-12 main-title">Daftar Program Studi</div>

        <div class="col-7 col-md-10 col-sm-12 mtop1">
        	<div class="col-12 tbTitle">
	        	<div class="col-1 center">No.</div>
	        	<div class="col-5">Program Studi</div>
	        	<div class="col-5">Aksi</div>
	        </div>
        	<div class="col-12 line"></div>
	       
	        <?php $i = 1; foreach ($prodi as $key): ?>
	        
	        <div class="col-12 tbSub">
	        	<div class="col-1 center"><?= $i ?></div>
	        	<div class="col-5"><?= $key->nama ?></div>
	        	<div class="col-3">
	        		<a href="editProdi/<?= $key->id ?>" class="col-5 btn btn-blue">Edit</a>
	        		<a href="deleteProdi/<?= $key->id ?>" class="col-6 btn btn-red" onclick="return confirm('Yakin?')">Hapus</a>
	        	</div>
        	</div>
        	<div class="col-12 line"></div>

        	<?php $i++; endforeach ?>
        </div>
    </div>
</body>
</html>