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
    <script src="http://www.myersdaily.org/joseph/javascript/md5.js"></script>
</head>


<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <form action="user/new_user_registration" method="post">
                    <script>
                        function register(username, password, confirmation_pass) {
                            var username = username;
                            var password = password;
                            var confirmation_pass = confirmation_pass;
                            console.log(username, password, confirmation_pass);

                            if (username == "" || password == "" || confirmation_pass == "") {
                                alert("All fields cannot be empty.");
                            } else if (username.length < 3 && password.length < 8) {
                                alert("Username must be at least 3 characters. \n Password must be at least 8 characters.");
                            } else if (username.length < 3) {
                                alert("Username must be at least 3 characters.");
                            } else if (password.length < 8) {
                                alert("Password must be at least 8 characters.");
                            } else if (confirmation_pass != password) {
                                alert("Confirmation Password  does not match.");
                            } else {
                                $.ajax({
                                    //dataType: "text",//'application/json',
                                    url: 'http://178.128.48.225:60/pricing_decision/register',
                                    type: 'POST',
                                    data: JSON.stringify({
                                        username: username,
                                        password: md5(password)
                                    }),
                                    contentType: 'application/json; charset=utf-8',
                                    success: function(data) {
                                        //jdata = data.json();  
                                        //a = data[0].responseText;
                                        alert("Register Successfully!");
                                        window.location.href = "http://localhost/tm_dynamic_pricing_web/";
                                    },
                                    error: function(errMsg) {
                                        console.log(errMsg);
                                        alert("Username is taken!");
                                        window.location.href = "http://localhost/tm_dynamic_pricing_web/index.php/user/user_registration_show";
                                    }
                                })
                            }

                        }
                    </script>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">Create Account</h3>
                                    </div>
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label class="small mb-1" for="inputUsername">Username</label>
                                            <input class="form-control py-4" name="username" id="inputUsername" type="text" placeholder="Enter username" />
                                            <span class="text-danger"><?php echo form_error('username'); ?></span>

                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputPassword">Password</label>
                                                    <input class="form-control py-4" name="password" id="inputPassword" type="password" placeholder="Enter password" />
                                                    <span class="text-danger"><?php echo form_error('password'); ?></span>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                                                    <input class="form-control py-4" name="confirmation_pass" id="inputConfirmPassword" type="password" placeholder="Confirm password" />
                                                    <span class="text-danger"><?php echo form_error('confirmation_pass'); ?></span>

                                                </div>
                                            </div>
                                        </div>

                                        <button class="btn btn-primary btn-block" type="button" value="Create Account" onclick='register(document.getElementById("inputUsername").value , document.getElementById("inputPassword").value, document.getElementById("inputConfirmPassword").value)'>Create Account</button>
                </form>
        </div>
        <div class="card-footer text-center">
            <div class="small"><a href=<?php echo base_url() ?>>Have an account? Go to login</a></div>
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
    <script src="js/scripts.js"></script>
</body>

</html>