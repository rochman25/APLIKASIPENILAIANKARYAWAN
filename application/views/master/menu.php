<!-- Sidebar -->
<ul class="sidebar navbar-nav bg-dark">
    <?php
    if ($this->session->userdata('level') == 'admin') {
        ?>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url(); ?>admin/index">
                <span>Data Karyawan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <span>Nilai Karyawan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <span>Rekap Nilai Karyawan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <span>Laporan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url(); ?>admin/ranking">
                <span>Ranking</span>
            </a>
        </li>
        <?php
    } else {
        ?>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url(); ?>user/index">
    <!--            <i class="fas fa-fw fa-tachometer-alt"></i>-->
                <span>Penilaian Karyawan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" role="button" aria-haspopup="true" aria-expanded="false">
    <!--            <i class="fas fa-fw fa-folder"></i>-->
                <span>Pengaturan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="charts.html">
    <!--            <i class="fas fa-fw fa-chart-area"></i>-->
                <span>Nilai</span></a>
        </li>
        <?php
    }
    ?>
</ul>