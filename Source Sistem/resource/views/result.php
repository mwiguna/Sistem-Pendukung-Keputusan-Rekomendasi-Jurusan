
<?php 
	require_once('header.php');
	require_once('data.php');
?>
    
    <div class="col-12 psideDouble">
        <table class="col-4 title" border="0">
        	<tr>
        		<td width="20%">Nama</td>
        		<td width="5%">:</td>
        		<td><?= $siswa->nama ?></td>
        	</tr>
        	<tr>
        		<td>Jurusan</td>
        		<td>:</td>
        		<td><?= $dtJurusan[$siswa->jurusan] ?></td>
        	</tr>
        	<tr>
        		<td>Minat</td>
        		<td>:</td>
        		<td><?= $dtMinat[$siswa->minat] ?></td>
        	</tr>
            <tr>
                <td>Ekonomi</td>
                <td>:</td>
                <td><?= $dtEkonomi[$siswa->ekonomi] ?></td>
            </tr>
        </table>

        <div class="col-12 main-title mtop2">Hasil Rekomendasi Program Studi : </div>
        <div class="col-10 title italic">
            &emsp; Berdasarkan pertimbangan dari nilai, jurusan, minat, dan kondisi ekonomi siswa. 
            Maka, siswa yang bernama <span class="bold"><?= $siswa->nama ?></span> direkomendasikan untuk
            memilih program studi <span class="bold"><?= key($datas) ?></span> sebagai program studi yang diambil untuk 
            melanjutkan pendidikan ke perguruan tinggi.
        </div>

        <div class="col-12 tbTitle">Berikut rincian rekomendasi dan alternatif Program Studi siswa bersangkutan :</div>

        <table class="col-12" border="0">
        	<tr class="tbTitle">
        		<td width="10%">No.</td>
        		<td width="50%">Program Studi</td>
        		<td>Point</td>
        	</tr>
            <?php
                $i = 1;
                foreach ($datas as $key => $value):

                $point = round($value[0] * 100, 2);
                if($point > 80 || $i == 1) $color = "cGreen";
                elseif ($point > 70) $color = "cYellow"; 
                else $color = "cRed";
            ?>
        	<tr class="tbSub">
        		<td><?= $i ?></td>
        		<td><?= $key ?></td>
        		<td class="bold <?= $color ?>"><?= $point ?></td>
        	</tr>

        	<?php $i++; endforeach ?>
        </table>
    </div>
</body>
</html>