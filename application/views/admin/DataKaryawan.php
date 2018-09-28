<!--<div class="col">-->
<a class="btn btn-success text-white" style="margin-bottom:10px" href="<?= base_url(); ?>admin/tambah_karyawan">Tambah Data</a>
<!--</div>-->
<div class="table-responsive">
    <table class="table table-striped">
        <thead class="thead bg-dark text-white">
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Nik</th>
        <th scope="col">Bagian</th>
        <th scope="col">Username</th>
<!--        <th scope="col">Password</th>-->
        <th scope="col">Action</th>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($karyawan as $key) {
                ?>
                <tr>
                    <th scope="row"><?php echo $no++ ?></th>
                    <td><?php echo $key['nama'] ?></td>
                    <td><?php echo $key['nik'] ?></td>
                    <td><?php echo $key['bagian'] ?></td>
                    <td><?php echo $key['username'] ?></td>
<!--                    <td><?php //echo $key['password']   ?></td>-->
                    <td>
                        <a href="<?= base_url(); ?>PenilaianKaryawan/update/<?php // echo $key['id']   ?>" class="btn btn-info">Edit</a>
                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modal<?php echo $key['nik']; ?>">
                            Hapus
                        </a>
                    </td>
                </tr>
            <div class="modal fade" id="modal<?php echo $key['nik']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-danger" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Hapus</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">x</span>
                            </button>
                        </div>
                        <form action="<?= base_url(); ?>index.php/SampleController/delete/<?php // echo$key['id']    ?>" method="post">
                            <div class="modal-body">
                                <span>Apa anda yakin ingin menghapus data ini?</span>
                            </div>
                            <input type="hidden" name="_token" value="icNnKky3mdoqVaJbrQbD9EW4LRfi6EqHsigzaoss">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-danger">Ya, Hapus!</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>