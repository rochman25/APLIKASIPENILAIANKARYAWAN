<div class="col-lg-12">
    <div class="row">
        <a class="btn btn-success text-white" style="margin-bottom:10px; margin-right:10px" href="<?= base_url(); ?>Karyawan/tambah_karyawan">Tambah Data</a>
        <div class="dropdown show">
            <button class="btn btn-primary dropdown-toggle" style="float: left;" type="button" id="dropdownMenuButtonImport" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="glyphicon glyphicon-import"></i> Import
            </button>
            <div class="dropdown-menu dm" aria-labelledby="dropdownMenuButtonImport">
                <a class="dropdown-item dm btn btn-primary" href="javascript:void(0);" onclick="importEXCEL();"><i class="fa fa-file-excel-o"></i> EXCEL</a>
                <a class="dropdown-item dm btn btn-primary" href="<?= base_url("assets/format/karyawan/format.xlsx"); ?>"><i class="fa fa-download"></i> Download Format</a>
            </div>
        </div>
    </div>
    <div class="row" id="iform">
        <form action="<?= base_url(); ?>Karyawan/importExcel" method="post" enctype="multipart/form-data" id="importForm">
            <input type="file" class="btn btn-sm btn-secondary" id="inputFile" name="file"/>
            <input type="submit" class="btn btn-sm btn-info" name="importSubmit" onclick="" id="btnImport" value="Import">
            <input type="reset" class="btn btn-sm btn-danger" name="importReset" id="btnImportReset" onclick="cancel();" value="Cancel">
        </form>
    </div>
</div>
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
    <!--                    <td><?php //echo $key['password']              ?></td>-->
                    <td>
                        <a href="<?= base_url(); ?>Karyawan/edit/<?php echo $key['nik'] ?>" class="btn btn-info">Edit</a>
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
                        <form action="<?= base_url(); ?>karyawan/hapus/<?php echo $key['nik']  ?>" method="post">
                            <div class="modal-body">
                                <span>Apa anda yakin ingin menghapus data ini?</span>
                            </div>
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
<script type="text/javascript">
    var method;
    function cancel() {
        $('#importForm')[0].reset();
        $('#importForm').slideToggle();

    }
    function importEXCEL() {
        method = 'excel';
        $('#importForm')[0].reset();
        $('.title').text('IMPORT EXCEL');
        $('#btnImport').val('Import');
        $('#btnImport').attr('disabled', false);
        $('#importForm').slideToggle();
        $('#inputFile').attr('accept', 'application/vnd.ms-excel, application/vnd.msexcel, application/excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

    }
    function importP() {
        $('#btnImport').val('Uploading...');
        $('#btnImport').attr('disabled', true);
        var url;
        var filePath = $('#inputFile')[0].value;
        var extn = filePath.substring(filePath.lastIndexOf('.') + 1).toLowerCase();
        if (filePath === "" || filePath === null) {
            swal("Pilih File");
            $('#importForm')[0].reset();
            $('#btnImport').val('Import');
            $('#btnImport').attr('disabled', false);

        } else if (!(extn === "csv" || extn === "xls" || extn === "xlsx")) {
            swal("Pilih File Sesuai Format");
            $('#importForm')[0].reset();
            $('#btnImport').val('Import');
            $('#btnImport').attr('disabled', false);

        } else {
            var formData = new FormData($('#importForm')[0]);
            if (method === 'csv') {
                url = "<?php echo site_url('Pemilih/importFromCSV') ?>";
                $.ajax({
                    url: url,
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    dataType: "JSON",
                    success: function (data)
                    {
                        if (data.status)
                        {
                            swal("Berhasil");
                        } else
                        {
                            swal("Gagal");
                        }

                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert(jqXHR.getAllResponseHeaders() + textStatus + errorThrown);

                    }

                });

            } else {
                url = "<?php echo site_url('Pemilih/importFromExcel') ?>";
                $.ajax({
                    url: url,
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    dataType: "JSON",
                    success: function (data)
                    {
                        if (data.status)
                        {
                            swal("Berhasil");
                        } else
                        {
                            swal("Gagal" + data.error_string);
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error adding / update data' + jqXHR.getAllResponseHeaders() + textStatus + errorThrown);
                    }

                });
            }
            $('#importForm')[0].reset();
            $('#btnImport').val('Import');
            $('#btnImport').attr('disabled', false);
            $('#importForm').slideToggle();
            reload();
        }
    }
</script>