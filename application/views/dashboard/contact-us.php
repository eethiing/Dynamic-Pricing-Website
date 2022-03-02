<!--http://localhost/website/index.php/dashboard/contact_us-->
<!--<head>
        <!--Contact Us-->
    <!--<meta charset="utf-8" />
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel='stylesheet' type= 'text/css' href="<?php echo base_url(); ?>css/bootstrap/css/bootstrap.min.css">
    <link rel='stylesheet' type= 'text/css' href="<?php echo base_url(); ?>css/font-awesome/css/font-awesome.min.css">
    <script type = 'text/javascript' src = "<?php echo base_url(); ?>js/jquery-1.10.2.min.js"></script>
    <script type = 'text/javascript' src = "<?php echo base_url(); ?>js/bootstrap.min.js"></script>
</head>-->
<div class="container">

<div class="page-header">
    <h1>Contact Us </h1>
</div>

<!-- Contact-Us Form With A Map - START -->


<div class="container">
    <br />
    <div class="row">
        <div class="col-md-6">
            <div id="googlemap" style="width:100%; height:350px;"></div>
        </div>
        <br />
        <div class="col-md-6">
            <form class="my-form">
                <div class="form-group">
                    <label for="form-name">Name</label>
                    <input type="email" class="form-control" id="form-name" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="form-email">Email Address</label>
                    <input type="email" class="form-control" id="form-email" placeholder="Email Address">
                </div>
                <div class="form-group">
                    <label for="form-subject">Telephone</label>
                    <input type="text" class="form-control" id="form-subject" placeholder="Subject">
                </div>
                <div class="form-group">
                    <label for="form-message">Email your Message</label>
                    <textarea class="form-control" id="form-message" placeholder="Message"></textarea>
                </div>
                <button class="btn btn-default" type="submit">Contact Us</button>  <!--echo mailto('me@my-site.com', 'Click Here to Contact Me');       -->      
            </form>
        </div>
    </div>
</div>

<style>
    .my-form {
        color: #305896;
    }
    .my-form .btn-default {
        background-color: #305896;
        color: #fff;
        border-radius: 0;
    }
    .my-form .btn-default:hover {
        background-color: #4498C6;
        color: #fff;
    }
    .my-form .form-control {
        border-radius: 0;
    }
</style>

<script src="https://maps.googleapis.com/maps/api/js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        // Google Maps setup
        var googlemap = new google.maps.Map(
            document.getElementById('googlemap'),
            {
                center: new google.maps.LatLng(3.1162, 101.6659 ),
                zoom: 8,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
        );
    });
</script>

<!-- Contact-Us Form With A Map - END -->

</div>
