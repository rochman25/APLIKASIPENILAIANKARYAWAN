<h3 class="strategy__title">Edit karyawan</h3>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        <div class="card">
            <div class="card-content">
                <!--                <h5 class="card-title text-left">Informasi Karyawan</h5>-->
                <div class="form-card">
                    <form action="<?= base_url(); ?>Karyawan/edit_karyawan/<?php echo $karyawan->nik ?> " method="post">
                        <div class="form-group">
                            <div class="row" style="margin:10px">
                                <div class="col-lg-3">
                                    <label>Nik Karyawan: </label>
                                </div>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" name="nik" required="required" placeholder="Masukkan Nik Karyawan" value="<?php echo $karyawan->nik ?>"><?php //echo form_error('nama')    ?>
                                </div>
                            </div>
                        </div> 
                        <div class="form-group">
                            <div class="row" style="margin:10px">
                                <div class="col-lg-3">
                                    <label>Nama Karyawan: </label>
                                </div>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" name="nama" required="required" placeholder="Masukkan Nama Karyawan" value="<?php echo $karyawan->nama ?>"><?php //echo form_error('nama')    ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row" style="margin:10px">
                                <div class="col-lg-3">
                                    <label>Jabatan/Bagian : </label>
                                </div>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" name="bagian" required="required" placeholder="Masukkan Jabatan/Bagian Karyawan" value="<?php echo $karyawan->bagian ?>"><?php //echo form_error('nama')    ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row" style="margin:10px">
                                <div class="col-lg-3">
                                    <label>Username: </label>
                                </div>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" name="username" required="required" placeholder="Masukkan username karyawan" value="<?php echo $karyawan->username ?>"><?php //echo form_error('nama')    ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row" style="margin:10px">
                                <div class="col-lg-3">
                                    <label>Password: </label>
                                </div>
                                <div class="col-lg-9">
                                    <input class="form-control" type="password" required="required" placeholder="Masukkan password karyawan" name="password" value="<?php echo $karyawan->password?>"><?php //echo form_error('nama')    ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-lg-12">
                            <input class="btn btn-primary" type="submit" value="kirim">
                            <button class="btn btn-danger" type="reset">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>