
    <?php
        require_once('header.php');
        require_once('data.php');
    ?>
    <form class="col-12 pside" method="POST" action="<?= url('updateSiswa/'.$siswa->id) ?>">
        <div class="col-12 main-title">Edit Data Siswa</div>
        <input type="text" class="col-5 push-3 p05" placeholder="Nama Siswa" name="nama" value="<?= $siswa->nama ?>" required>

        <div class="col-5 col-lg-8 col-md-12 m2">
            <div class="col-12 p1">Nilai :</div>
            <?php $nilai = (array) $siswa; foreach ($dtNilai as $val): ?>
                <div class="col-4 p1"><?= $val ?> :</div>
                <input type="number" step="any" required class="col-8" placeholder="<?= $val ?>" name="<?= strtolower($val) ?>" value="<?= $nilai['nilai_'.str_replace(' ', '_', strtolower($val))] ?>">
            <?php endforeach ?>
        </div>

        <div class="col-6 col-lg-8 col-md-12">
            <div class="col-12 p1">Jurusan :</div>
            <select class="col-12" name="jurusan">
                <?php $i = 0; foreach ($dtJurusan as $value): ?>
                    <option value="<?= $i ?>" <?php if($siswa->jurusan == $i) echo 'selected' ?> ><?= $value ?></option>
                <?php $i++; endforeach ?>
            </select>

            <div class="col-12 p1">Minat :</div>
            <select class="col-12" name="minat">
                <?php $i = 0; foreach ($dtMinat as $value): ?>
                    <option value="<?= $i ?>" <?php if($siswa->minat == $i) echo 'selected' ?> ><?= $value ?></option>
                <?php $i++; endforeach ?>
            </select>

            <div class="col-12 p1">Ekonomi :</div>
            <select class="col-12" name="ekonomi">
                <?php $i = 0; foreach ($dtEkonomi as $value): ?>
                    <option value="<?= $i ?>" <?php if($siswa->ekonomi == $i) echo 'selected' ?> ><?= $value ?></option>
                <?php $i++; endforeach ?>
            </select>
        </div>

        <div class="col-12 mtop1">
            <input class="col-1 btn btn-blue p05" type="submit" value="Edit" onsubmit="return confirm('Yakin?)'">
        </div>
    </form>
</body>
</html>