<div class="table-responsive">
    <table class="table table-striped">
        <thead class="thead bg-dark text-white">
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Nilai Rata-Rata</th>
        </thead>
        <tbody>
            <?php
            $no = 1;
            //foreach ($karyawan as $key) {
                ?>
                <tr>
                    <th scope="row"><?php echo $no++ ?></th>
                    <td><?php// echo $key['nama'] ?></td>
                    <td><?php// echo $key['bagian'] ?></td>
                </tr>
            <?php
        //}
        ?>
        </tbody>
    </table>
</div>