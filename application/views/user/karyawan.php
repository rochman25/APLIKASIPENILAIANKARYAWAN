<form action="#" method="post">
    <div class="form-group">
        <div class="row">
            <div class="col-lg-1">
                <label style="margin-top:5px">Periode</label>
            </div>
            <div class="col-lg-4">
                <select class="form-control" name="periode">
                    <?php
                    foreach ($periode as $pr) {
                        ?>
                        <option><?= $pr['nama'] ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col-lg-3">
                <input type="submit" value="kirim" class="btn btn-info">
            </div>
        </div>
    </div>
</form>
<?php
    
?>
<div class="table-responsive">
    <table class="table table-striped">
        <thead class="thead bg-dark text-white">
        <th scope="col">No</th>
        <th scope="col">Nik</th>
        <th scope="col">Nama</th>
        <th scope="col">Bagian</th>
        <th scope="col">Action</th>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($karyawan as $key) {
                ?>
<!--            <form action="<?= base_url(); ?>user/nilai/" method="post">-->
                <tr>
                    <th scope="row"><?php echo $no++ ?></th>
                    <td><?php echo $key['nik'] ?></td>
                    <td><?php echo $key['nama'] ?></td>
                    <td><?php echo $key['bagian'] ?></td>
                    <td>
                        <a href="<?= base_url(); ?>user/nilai/<?= $key['nik'] ?>" class="btn btn-info">Nilai</a>
                    </td>
                </tr>
<!--            </form>-->
            <?php
        }
        ?>
        </tbody>
    </table>
</div>