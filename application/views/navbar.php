<body class="sb-nav-fixed">

    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <label class="navbar-brand"><img src="https://icons8.com/icon/tKfmizpkliDm/signage" width=55px height=40px padding=5px> Signage</label>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <!--<input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" /> 
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>-->
                </div>
            </div>
        </form>

        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <div class="dropdown-divider"></div>
                    <button class="dropdown-item" onclick='logout()'><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</button>
                    <script>
                        function logout() {
                            console.log("test");
                            localStorage.clear();
                            window.location.href = "http://localhost/tm_dynamic_pricing_web";
                        }
                    </script>

                </div>
            </li>
        </ul>
    </nav>