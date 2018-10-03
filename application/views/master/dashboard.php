<html>
    <head>
        <title>Dashboard Page</title>
        <?php
        $this->load->view('master/css');
        ?>
    </head>
    <body id="page-top">
        <?php
        $this->load->view('master/header');
        $this->load->view('master/nav');
        $this->load->view('master/js');
        ?>
        <div id="wrapper">
            <?php
            $this->load->view('master/menu');
            ?>
            <div id="content-wrapper">
                <div class="container-fluid">
                    <!-- Breadcrumbs-->
                    <!--                    <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="#">Karyawan</a>
                                            </li>
                                        </ol>-->

                    <!-- /.container-fluid -->
                    <?php
                    $dashboard = base_url() . 'admin/index';
                    $tKar = base_url() . 'Karyawan/tambah_karyawan';
                    $eKar = base_url() . 'Karyawan/edit/' . $this->uri->segment(3);
                    $rkg = base_url() . 'admin/ranking';
                    $pk = base_url() . 'user/index';
                    $nilai = base_url() . 'user/nilai/' . $this->uri->segment(3);
                    $url = current_url();
                    //echo $url;
                    if ($url == $dashboard && $this->session->userdata('level') == 'admin') {
                        $this->load->view('admin/DataKaryawan');
                    } else if ($url == $tKar && $this->session->userdata('level') == 'admin') {
                        $this->load->view('admin/TambahKaryawan');
                    } else if ($url == $eKar && $this->session->userdata('level') == 'admin') {
                        $this->load->view('admin/EditKaryawan');
                    } else if ($url == $rkg && $this->session->userdata('level') == 'admin') {
                        $this->load->view('admin/Ranking');
                    } else if ($url == $pk && $this->session->userdata('level') == 'user') {
                        $this->load->view('user/karyawan');
                    } else if ($url == $nilai && $this->session->userdata('level') == 'user') {
                        $this->load->view('user/penilaian');
                    }
                    ?>
                </div>
                <!-- Sticky Footer -->
                <footer class="sticky-footer" style="position: fixed;">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright © Your Website 2018</span>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- /.content-wrapper -->
        </div>
        <!-- /#wrapper -->
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="<?= base_url() . $this->session->userdata('level'); ?>/logout">Logout</a>
                    </div>
                </div>
            </div>
        </div>

    </body>

</html>