
    <?php 
        require_once('header.php');
        require_once('data.php');
    ?>
    
    <form class="col-12 pside" method="POST" action="<?= url('updateProdi/'.$prodi->id) ?>">
        <div class="col-12 main-title">Edit Program Studi</div>
        <input type="text" class="col-5 push-3 p05" placeholder="Nama Program Studi" name="nama" value="<?= $prodi->nama ?>" required>
        
        <div class="col-5 col-lg-8 col-md-12 m2">
            <div class="col-12 bold p1">Beban Nilai :</div>
            <?php foreach ($dtNilai as $val): ?>
                <div class="col-4 p1"><?= $val ?></div>
                <input type="number" step="any" required class="col-8" placeholder="<?= $val ?>" name="<?= strtolower($val) ?>" value="<?= $nilai[str_replace(' ', '_', strtolower($val))] ?>">
            <?php endforeach ?>
        </div>

        <div class="col-6 col-lg-8 col-md-12">
            <div class="col-12 bold p1">Beban Jurusan :</div>
            <?php foreach ($dtJurusan as $val): ?>
                <div class="col-5 p1"><?= $val ?></div>
                <input type="number" step="any" required class="col-7" placeholder="<?= $val ?>" name="<?= strtolower($val) ?>" value="<?= $jurusan[str_replace(' ', '_', strtolower($val))] ?>">
            <?php endforeach ?>

            <div class="col-12 bold p1">Beban Minat :</div>
            <?php foreach ($dtMinat as $val): ?>
                <div class="col-5 p1"><?= $val ?></div>
                <input type="number" step="any" required class="col-7" placeholder="<?= $val ?>" name="<?= strtolower($val) ?>" value="<?= $minat[strtolower($val)] ?>">
            <?php endforeach ?>

            <div class="col-12 bold p1">Beban Ekonomi :</div>
            <?php foreach ($dtEkonomi as $val): ?>
                <div class="col-5 p1"><?= $val ?></div>
                <input type="number" step="any" required class="col-7" placeholder="<?= $val ?>" name="<?= strtolower($val) ?>" value="<?= $ekonomi[strtolower($val)] ?>">
            <?php endforeach ?>
        </div>

        <div class="col-12 mtop1">
            <input class="col-1 btn btn-blue p05" type="submit" value="Kirim">
        </div>
    </form>
</body>
</html>