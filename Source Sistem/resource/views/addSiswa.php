
    <?php 
        require_once('header.php');
        require_once('data.php');
    ?>

    <form class="col-12 pside" method="POST" action="insertSiswa">
        <div class="col-12 main-title">Form Data Siswa</div>
        <input type="text" class="col-5 push-3 p05" placeholder="Nama Siswa" name="nama" required>

        <div class="col-5 col-lg-8 col-md-12 m2">
            <div class="col-12 p1">Nilai :</div>
            <div class="col-12 p1 italic">*Kosongkan nilai bila mata pelajaran tidak terkait</div>
            <?php foreach ($dtNilai as $val): ?>
                <input type="number" step="any" required class="col-12" placeholder="<?= $val ?>" name="<?= strtolower($val) ?>">
            <?php endforeach ?>
        </div>

        <div class="col-6 col-lg-8 col-md-12">
            <div class="col-12 p1">Jurusan :</div>
            <select class="col-12" name="jurusan">
                <?php $i = 0; foreach ($dtJurusan as $value): ?>
                    <option value="<?= $i ?>"><?= $value ?></option>
                <?php $i++; endforeach ?>
            </select>

            <div class="col-12 p1">Minat :</div>
            <select class="col-12" name="minat">
                <?php $i = 0; foreach ($dtMinat as $value): ?>
                    <option value="<?= $i ?>"><?= $value ?></option>
                <?php $i++; endforeach ?>
            </select>

            <div class="col-12 p1">Ekonomi :</div>
            <select class="col-12" name="ekonomi">
                <?php $i = 0; foreach ($dtEkonomi as $value): ?>
                    <option value="<?= $i ?>"><?= $value ?></option>
                <?php $i++; endforeach ?>
            </select>
        </div>

        <div class="col-12 mtop1">
            <input class="col-1 btn btn-blue p05" type="submit" value="Kirim">
        </div>
    </form>
</body>
</html>