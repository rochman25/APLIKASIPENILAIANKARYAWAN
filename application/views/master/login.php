<html>
    <head>
        <title>Login Page</title>
        <?php
        $this->load->view('master/css');
        ?>
    </head>
    <body>
        <?php
        $this->load->view('master/header');
        ?>
        <div class="container">
            <div class="card card-login text-black mx-auto mt-5">
                <div class="" style="margin:auto">
                    <h4 style="margin:10px">Login</h4>
                </div>
                <hr>
                <div class="card-body">
                    <form method="post" action="<?= base_url().$login; ?>/login">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-3">
                                    <label style="margin-top:5px">Username</label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="username" required="required" autofocus="autofocus">
                                </div>
                            </div>

                            <!--              <div class="form-label-group">-->
                            <!--              </div>-->
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-3">
                                    <label style="margin-top:5px">Password</label>
                                </div>
                                <div class="col">
                                    <input type="password" class="form-control" name="password" required="required" autofocus="autofocus">
                                </div>
                            </div>

                            <!--              <div class="form-label-group">-->
                            <!--              </div>-->
                        </div>
                        <button type="submit" class="btn btn-primary btn-block" href="">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <?php
    $this->load->view('master/js');
    ?>
</html>