<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#"><?= $karyawan->nama?></a>
    </li>
</ol>
<div class="table-responsive">
    <form action="<?= base_url(); ?>user/penilaian/<?= $karyawan->nik?>" method="post">
        <table class="table table-striped">
            <thead class="thead bg-dark text-white">
            <th scope="col">No</th>
            <th scope="col">Aspek</th>
            <th scope="col">Indikator</th>
            <th scope="col">Nilai (1-5)</th>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($penilaian as $key) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $no++ ?></th>
                        <td><?php echo $key['nama'] ?></td>
                        <td>
                            <?php echo $key['indikator'] ?>
                        </td>
                        <td>
                            <input type="hidden" name="kriteria<?= $key['idKriteria'] ?>" value="<?= $key['idKriteria'] ?>">
                            <input type="hidden" name="indikator[<?= $key['id'] ?>]" value="<?= $key['indikator'] ?>">
                            <input type="radio" name="nilai[<?= $key['id'] ?>]" value="1">1
                            <input type="radio" name="nilai[<?= $key['id'] ?>]" value="2">2
                            <input type="radio" name="nilai[<?= $key['id'] ?>]" value="3">3
                            <input type="radio" name="nilai[<?= $key['id'] ?>]" value="4">4
                            <input type="radio" name="nilai[<?= $key['id'] ?>]" value="5">5
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <div class="row">
            <div class="col-lg-9"></div>
            <div class="col-lg-3">
                <input style="margin-left:70px" type="submit" value="Kirim" class="btn btn-info">
                <input style="margin-left:0px" type="reset" value="batal" class="btn btn-danger">
            </div>
        </div>

    </form>
</div>