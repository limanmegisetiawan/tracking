<?php $successMessage = $this->session->flashdata('successmessage');  
           $warningmessage = $this->session->flashdata('warningmessage');                    
      if (isset($successMessage)) { 
        echo '<div id="alertmessage" class="col-md-5">
          <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   '. output($successMessage).'
                  </div>
          </div>'; } 
      if (isset($warningmessage)) { echo '<div id="alertmessage" class="col-md-5">
          <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   '. output($warningmessage).'
                  </div>
          </div>'; }    
      ?>

<div class="card-header">
    <div style="display: none" id="color-palette"></div>
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><?php echo (isset($vehicledetails))?'Edit Vehicle':'Tracking Bus' ?>
                </h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url(); ?>/dashboard">Tracking</a>
                    </li>
                    <li class="breadcrumb-item active"><?php echo (isset($vehicledetails))?'Edit vehicle':'Tracking' ?></li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

</div>
<section class="content">
    <div class="container-fluid">
        <form id="track" method="post">

            <div class="card-body">
                <div class="row col-md-12">

                    <div class="col-md-5">
                        <div class="form-group">
                            <select
                                id="t_vechicle"
                                required="true"
                                class="form-control selectized"
                                name="t_vechicle">
                                <option value="">Pilih Bus</option>
                                <?php  foreach ($vechiclelist as $key => $vechiclelists) { ?>
                                <option value="<?php echo output($vechiclelists['v_id']) ?>"><?php echo output($vechiclelists['v_name']).' - '. output($vechiclelists['v_registration_no']); ?></option>
                                <?php  } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Load</button>
                        </div>
                    </div>

                </div>

                <div id="map" style="width: 900px; height: 400px;"></div>
                <script>
                    const map = L
                        .map('map')
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
                        .addTo(map);

                    // Variabel untuk menyimpan marker
                    var markers = [];
                    // Inisialisasi objek routing
                    var control = L
                        .Routing
                        .control({routeWhileDragging: true})
                        .addTo(map);

                    // Variabel untuk menyimpan koordinat klik pertama dan kedua
                    var firstClickLatLng = null;

                    // Inisialisasi objek routing

                    function onMapClick(e) {
                        if (markers.length < 2) {
                            var marker = L
                                .marker(e.latlng)
                                .addTo(map);
                            markers.push(marker);

                            if (markers.length === 1) {
                                // Jika ini klik pertama, simpan koordinatnya dan tambahkan sebagai titik awal
                                // pada routing
                                firstClickLatLng = e.latlng;

                                control.spliceWaypoints(0, 1, e.latlng);
                                marker
                                    .bindPopup("Lokasi awal: " + e.latlng.toString())
                                    .openPopup();
                                document
                                    .getElementById('latlong_start')
                                    .value = firstClickLatLng.lat + ', ' + firstClickLatLng.lng;

                            } else {
                                // Jika ini klik kedua, simpan koordinatnya dan tambahkan sebagai titik akhir
                                // pada routing
                                var secondClickLatLng = e.latlng;

                                control.spliceWaypoints(control.getWaypoints().length - 1, 1, e.latlng);
                                marker
                                    .bindPopup("Lokasi akhir: " + e.latlng.toString())
                                    .openPopup();
                                document
                                    .getElementById('latlong_end')
                                    .value = secondClickLatLng.lat + ', ' + secondClickLatLng.lng;

                            }
                        }
                    }

                    map.on('click', onMapClick);
                </script>
            </div>
        </form>

    </div>
</section>