<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Page Title - SB Admin</title>
    <link rel='stylesheet' type='text/css' href="<?php echo base_url(); ?>css/styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
    <script src="http://www.myersdaily.org/joseph/javascript/md5.js"></script>

</head>

<body>

    <form>
        <script>
            function login(username, password) {
                console.log(username, password);
                // localStorage.setItem('token', token);
                if (username == "" || password == "") {
                    alert("All fields must be filled.");
                } else {

                    localStorage.setItem("start_time", Date.now());
                    $.ajax({
                        dataType: "json", //'applicatio.n/json',
                        url: 'http://178.128.48.225:60/pricing_decision/login',
                        type: 'POST',
                        data: JSON.stringify({
                            username: username,
                            password: md5(password)
                        }),
                        contentType: 'application/json; charset=utf-8',
                        success: function(response) {
                            console.log("Login!");
                            console.log(response.data.token);
                            localStorage.setItem("username", response.data.admin_name);
                            localStorage.token = response.data.token;
                            //console.log(localStorage.getItem("start_time"));
                            //localStorage.setItem("time", Date.now());
                            //console.log(localStorage.getItem("time") );
                            //time = localStorage.getItem("time") - localStorage.getItem("start_time");
                            //console.log(time);
                            ////console.log(localStorage.getItsem('token'))

                            window.location.href = "http://localhost/tm_dynamic_pricing_web/index.php/dashboard/index";
                        },
                        error: function(errMsg) {
                            console.log(errMsg);
                            alert("Login Failed!")
                        }
                    })
                }
            }
        </script>

        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">Login</h3>
                                    </div>
                                    <div class="card-body">

                                        <!-- <form method="post" action="/" id="form"> added id -->
                                        <div class="form-group">
                                            <label class="small mb-1" for=inputUsername>Username</label>
                                            <input class="form-control py-4" type="text" id="username" name="username" placeholder="Enter Username" />
                                            <span id='username_error' class="text-danger"><?php echo form_error(); ?></span>
                                            <?php
                                            if (isset($message_display)) {
                                                echo '<div class="text-danger>';
                                                echo $message_display;
                                                echo '</div>';
                                            } ?>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputPassword">Password</label>
                                            <input class="form-control py-4" id="password" name="password" type="password" placeholder="Enter password" />
                                            <span class="text-danger"><?php echo form_error('password'); ?></span>

                                        </div>

                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <!--<input class="btn btn-primary" id= "button1" type="submit" name="submit" value="Login"></input>-->
                                            <button class="btn btn-primary" id="button1" type="button" value="Login" onclick='login(document.getElementById("username").value , document.getElementById("password").value )'> Login</button>
                                            <br>

    </form>

    <div class="card-footer text-center">
        <div class="small">
            <a href="<?php echo base_url() ?>index.php/user/user_registration_show">Dont have an account yet?</a>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </main>
    </div>
    <div id="layoutAuthentication_footer">
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2020</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>