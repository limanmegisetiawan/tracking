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
            <h1 class="m-0 text-dark"><?php echo (isset($vehicledetails))?'Edit Vehicle':'Tambah Geofence' ?>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Data Geofence</a></li>
              <li class="breadcrumb-item active"><?php echo (isset($vehicledetails))?'Edit vehicle':'Tambah Geofence' ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->

</div>
<section class="content">
      <div class="container-fluid">
      <form method="post" class="card" action="<?php echo base_url('Geofence/addgeo'); ?>">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="form-group">
                    <label class="form-label">Nama Koridor<span class="form-required">*</span></label>
                    <input type="text" class="form-control" id="geo_nama" name="geo_nama" placeholder="Nama Koridor">
                </div>
            </div>

            <div class="col-sm-6 col-md-4">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Lokasi awal</label>
                    <input type="text" class="form-control" id="latlong_start" name="geo_latlong_start">
                </div>
            </div>

            <div class="col-sm-6 col-md-4">
                <label for="exampleFormControlInput1">Lokasi akhir</label>
                <div class="form-group">
                    <input type="text" class="form-control" id="latlong_end" name="geo_latlong_end">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>


        <div id="map" style="width: 900px; height: 400px;"></div>
        <script>
    const map = L.map('map').setView([-6.931268, 107.615322], 13);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 20,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
    }).addTo(map);

    // Variabel untuk menyimpan marker
    var markers = [];

    // Variabel untuk menyimpan koordinat klik pertama dan kedua
    var firstClickLatLng = null;

    // Buat fungsi popup saat map diklik
    function onMapClick(e) {
        if (markers.length < 2) {
            // Jika jumlah marker kurang dari 2, tambahkan marker
            var marker = L.marker(e.latlng).addTo(map);
            markers.push(marker);
            if (!firstClickLatLng) {
                // Jika ini klik pertama, simpan koordinatnya
                firstClickLatLng = e.latlng;
                marker.bindPopup("Lokasi awal: " + firstClickLatLng.toString()).openPopup();
                document.getElementById('latlong_start').value = firstClickLatLng.lat + ', ' + firstClickLatLng.lng;
            } else {
                // Jika ini klik kedua, simpan koordinatnya dan reset klik pertama
                var secondClickLatLng = e.latlng;
                marker.bindPopup("Lokasi akhir: " + secondClickLatLng.toString()).openPopup();
                document.getElementById('latlong_end').value = secondClickLatLng.lat + ', ' + secondClickLatLng.lng;
                firstClickLatLng = null;
            }
        }
    }

    map.on('click', onMapClick);
</script>
    </div>
</form>

             </div>
    </section>