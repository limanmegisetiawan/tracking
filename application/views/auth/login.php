<!DOCTYPE html>
<html >
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="author" content="">
        <title><?php 
         $data = sitedata();
         $total_segments = $this->uri->total_segments(); 
         echo ucwords(str_replace('_', ' ', 'Login')).' '?></title>
        <link
            href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'
            rel='stylesheet'
            type='text/css'>
        <link
            rel="stylesheet"
            href="<?= base_url(); ?>assets/frontend/bootstrap.min.css">
        <link
            rel="stylesheet"
            href="<?= base_url(); ?>assets/frontend/font-awesome.min.css">
        <link href="<?= base_url(); ?>assets/frontend/custom.css" rel="stylesheet">
        <script src="<?= base_url(); ?>assets/plugins/jquery/jquery_frnt.js"></script>
        <link
            rel="stylesheet"
            href="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
        <link
            rel="stylesheet"
            href="<?= base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.min.css">
        <link
            rel="stylesheet"
            href="<?= base_url()?>leaflet/leaflet.css"
            integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
            crossorigin=""/>
        <script
            src="<?= base_url()?>leaflet/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
            crossorigin=""></script>
        <link
            rel="stylesheet"
            href="<?= base_url()?>leaflet-routing-machine/dist/leaflet-routing-machine.css"/>
        <script
            src="<?= base_url()?>leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>

    </head>
    <body >
        <input type="hidden" id="base" value="<?php echo base_url(); ?>">

        <!--HEADER-BAR-->
        <div class="tb_header">
            <div class="container">
                <div class="col-md-6" style="padding:0;">
                    <div style="display: flex; align-items: center; padding: 0;">
                        <div style="margin-top: 20px; margin-right: 10px;">
                            <img
                                height="40"
                                width="20"
                                src="<?= base_url().'assets/uploads/OIP3.jpg' ?>"
                                alt="Bus Image">
                        </div>
                        <div style="text-align: center;">
                            <h2>Tracking Bus</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="padding:0;"></div>
                <div class="col-md-4" style="padding:0;"></div>
                <div class="col-md-2" style="padding:0;">
                    <div class="signin_up">
                        <ul>
                            <li>
                                <a href="#myModals" data-toggle="modal" data-target="#myModals">Login</a>
                                <span style="color:#f0a2a3;"></span></li>
                            <!-- <li><a href="#myModal" data-toggle="modal" data-target="#myModal">Sign
                            Up</a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="shadow">
                <hr class="border2"></hr>
            </div>
        </div>

        <!--HEADER-BAR-END-->
        <!-- Modal -->
        <div
            class="modal fade"
            id="myModals"
            role="dialog"
            data-backdrop="static"
            data-keyboard="false">
            <div class="modal-dialog">
                <!-- Modal content-->
                <button type="button" class="close_lft" data-dismiss="modal">&times;</button>
                <form action="<?= base_url().'login/login_action'; ?>" method="post">
                    <div class="login-block">
                        <h1>Login</h1>
                        <input
                            type="text"
                            required=""
                            name="username"
                            placeholder="Username"
                            class="username"
                            id="username"/>
                        <input
                            type="password"
                            required=""
                            class="password"
                            name="password"
                            placeholder="Password"
                            id="password"/>
                        <button type="submit" value="Login" style="position: relative;">Login</button>
                        <br>

                        <div class="login_res" style="text-align:center;"></div>
                        <br>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <button type="button" class="close_lft" data-dismiss="modal">&times;</button>
                <form
                    id="signup"
                    method="post"
                    class="basicvalidation"
                    action="<?php echo base_url();?>frontendbooking/signup">
                    <div class="login-block">
                        <h1>Sign Up</h1>
                        <input
                            class="name"
                            required="required"
                            id="c_name"
                            name="c_name"
                            placeholder="Name">
                        <input
                            class="name"
                            required="required"
                            id="c_mobile"
                            name="c_mobile"
                            placeholder="Mobile">
                        <input
                            class="name"
                            required="required"
                            id="c_email"
                            name="c_email"
                            placeholder="Email(Username)">
                        <input
                            type="password"
                            required="required"
                            class="name"
                            id="c_pwd"
                            name="c_pwd"
                            placeholder="Password">
                        <input
                            class="name"
                            required="required"
                            id="c_address"
                            name="c_address"
                            placeholder="Address">
                        <br>
                        <span class="terms_tb">By signing up, you agree to our
                            <a class="cond_tb" href="#">Terms and Conditions.</a>
                        </span>
                        <br>
                        <br>
                        <button type="submit" value="Sign up" style="position: relative;">Sign UP</button>
                        <br>

                        <div class="signup_res" style="text-align:center;"></div>
                        <br>
                        <div class="account">
                            <a
                                data-dismiss="modal"
                                href="#myModals"
                                data-toggle="modal"
                                data-target="#myModals">Already have an account?</a>
                        </div>
                        <div class="sign_in">
                            <a
                                data-dismiss="modal"
                                href="#myModals"
                                data-toggle="modal"
                                data-target="#myModals">Sign In</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal fade" id="myModalf" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <button type="button" class="close_lft" data-dismiss="modal">&times;</button>
                <form id="forgot" data-parsley-validate="">
                    <div class="login-block">
                        <h1>Forgot Password</h1>
                        <input
                            type="email"
                            name="email"
                            placeholder="Email"
                            class="username"
                            data-parsley-required="true"/>
                        <!-- <span class="terms_tb">By signing up, you agree to our <a class="cond_tb"
                        href="#">Terms and Conditions.</a></span> <br> <br> -->
                        <input
                            type="button"
                            value="RESET"
                            style="position: relative;"
                            onclick="Forgot()">
                        <br>
                        <div class="small_loader" style="text-align:center;display:none"></div>
                        <div class="forgot_res" style="text-align:center;"></div>
                        <br>
                        <div class="account">
                            <a href="#">Already have an account?</a>
                        </div>
                        <div class="sign_in">
                            <a
                                data-dismiss="modal"
                                href="#myModals"
                                data-toggle="modal"
                                data-target="#myModals">Sign In</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--SEARCH-BAR-->
        <div class="container">

            <div class="row" style="min-height:400px;margin-top:120px;">
                <div class="row">
                    <div class="col-md-12">
                        <span id="ermsg"></span>
                        <?php $successMessage = $this->session->flashdata('successmessage');  
           $warningmessage = $this->session->flashdata('warningmessage');                    
            if (isset($successMessage)) { echo '<div id="alertmessage" class="col-md-12">
                <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><span style="margin-left: 40%;">
                         '. $successMessage.'
                        </span></div>
                </div>'; } 
            if (isset($warningmessage)) { echo '<div id="alertmessage" class="col-md-12">
                <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><span style="margin-left: 40%;">
                         '. $warningmessage.'
                        </span></div>
                </div>'; }    
            ?>
                    </div>
                </div>
                <div class="col-md-6">

                    <form id="track" action="<?= base_url() ?>" method="GET">

                        <div class="row">
                            <div class="card-body">
                                <div class="row col-md-12">

                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <select
                                                id="t_vechicle"
                                                required="true"
                                                class="form-control selectized"
                                                name="t_vechicle"
                                                onchange="loadMap()">
                                                <option value="">Pilih Bus</option>
                                                <?php foreach ($vechiclelist as $key => $vechiclelists) { ?>
                                                <option
                                                    value="<?php echo output($vechiclelists['v_id']) ?>"
                                                    data-latlong-start="<?php echo output($vechiclelists['latlong_start']) ?>"
                                                    data-latlong-end="<?php echo output($vechiclelists['latlong_end']) ?>"><?php echo output($vechiclelists['v_name']) ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <!-- <button type="button" class="btn btn-primary"
                                            onclick="loadMap()">Load</button> -->
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="map4" style="width: 750px; height: 400px;"></div>
                                            <!-- Your existing HTML code -->

                                            <script>
                                                const map4 = L
                                                    .map('map4')
                                                    .setView([
                                                        -6.931268, 107.615322
                                                    ], 13);

                                                L
                                                    .tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                                        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> con' +
                                                                'tributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA<' +
                                                                '/a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                                                        maxZoom: 20,
                                                        id: 'mapbox/streets-v11',
                                                        tileSize: 512,
                                                        zoomOffset: -1
                                                    })
                                                    .addTo(map4);

                                                let routingControl; // Variable to store the routing control

                                                function loadMap() {
                                                    // Dapatkan nilai yang dipilih dari dropdown
                                                    const select = document.getElementById('t_vechicle');
                                                    const selectedIndex = select.selectedIndex;

                                                    // Periksa apakah kendaraan sudah dipilih
                                                    if (selectedIndex >= 0) {
                                                        const latlongStart = select
                                                            .options[selectedIndex]
                                                            .getAttribute('data-latlong-start');
                                                        const latlongEnd = select
                                                            .options[selectedIndex]
                                                            .getAttribute('data-latlong-end');

                                                        // Menghapus marker dan polyline yang ada di peta
                                                        map4.eachLayer((layer) => {
                                                            if (layer instanceof L.Marker || layer instanceof L.Polyline) {
                                                                map4.removeLayer(layer);
                                                            }
                                                        });

                                                        // Hapus routing control jika sudah ada
                                                        if (routingControl) {
                                                            map4.removeControl(routingControl);
                                                        }

                                                        // Menambahkan marker pada peta berdasarkan latlong_start dan latlong_end
                                                        const startMarker = L
                                                            .marker(latlongStart.split(','))
                                                            .addTo(map4)
                                                            .bindPopup('Lokasi Awal')
                                                            .openPopup();
                                                        const endMarker = L
                                                            .marker(latlongEnd.split(','))
                                                            .addTo(map4);

                                                        // Menambahkan kontrol routing dengan waypoints dinamis
                                                        routingControl = L
                                                            .Routing
                                                            .control({
                                                                waypoints: [
                                                                    L.latLng(latlongStart.split(',')),
                                                                    L.latLng(latlongEnd.split(','))
                                                                ]
                                                            })
                                                            .addTo(map4);

                                                        // Menyesuaikan tampilan peta agar memuat kedua marker
                                                        map4.fitBounds([startMarker.getLatLng(), endMarker.getLatLng()]);
                                                    } else {
                                                        // Tangani kasus di mana tidak ada kendaraan yang dipilih
                                                        console.error('Tidak ada kendaraan yang dipilih.');
                                                    }
                                                }
                                            </script>

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </form>

                </div>
                <div class="col-md-6">
                    <div class="tb_bus">
                        <img width="400" height="300" src="<?= base_url(); ?>assets/uploads/OIP.jpg">
                    </div>
                </div>
            </div>
        </div>
        <hr class="border2"></hr>
        <script src="<?= base_url(); ?>assets/frontend/bootstrap.min.js"></script>
        <script
            src="<?= base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.min.js"></script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script
            type="text/javascript"
            src="https://maps.google.com/maps/api/js?key=<?php echo output($data['s_googel_api_key']); ?>&sensor=false&v=3.21.5a&libraries=drawing&signed_in=true&libraries=places,drawing"></script>
        <script src="<?= base_url(); ?>assets/fronendbooking.js"></script>
        <script src="<?= base_url(); ?>assets/distance_calculator.js"></script>
    </body>
</html>