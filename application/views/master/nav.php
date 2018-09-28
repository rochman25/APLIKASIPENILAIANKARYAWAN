<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a class="navbar-brand mr-1" href="index.html"><?= $this->session->userdata('username')?> / <?= $this->session->userdata('level') ?></a>
    <!-- Navbar Search -->
    <!-- Navbar -->
    <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
    </ul>
</nav>