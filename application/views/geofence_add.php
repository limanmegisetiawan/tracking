
<div class="card-header">
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
        <form id="track" action="<?= base_url() ?>" method="GET">

            <div class="row">
                <div class="card-body">
                    <div class="row col-md-12">

                        <div class="col-md-5">
                            <div class="form-group">
                                <select
                                    id="t_vechicle"
                                    required="true"
                                    class="form-control"
                                    name="t_vechicle"
                                    onchange="loadMap()">
                                    <option value="">Pilih Bus</option>
                                    <?php foreach ($vehicles as $key => $vechiclelists) { ?>
                                    <option
                                        value="<?php echo output($vechiclelists['v_id']) ?>"
                                        data-latlong-start="<?php echo output($vechiclelists['latlong_start']) ?>"
                                        data-latlong-end="<?php echo output($vechiclelists['latlong_end']) ?>"><?php echo output($vechiclelists['v_name'])?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div id="map2" style="width: 900px; height: 400px;"></div>
                    <script>
                        const map2 = L
                            .map('map2')
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
                            .addTo(map2);

                            
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
                                map2.eachLayer((layer) => {
                                    if (layer instanceof L.Marker || layer instanceof L.Polyline) {
                                        map2.removeLayer(layer);
                                    }
                                });

                                // Hapus routing control jika sudah ada
                                if (routingControl) {
                                    map2.removeControl(routingControl);
                                }

                                // Menambahkan marker pada peta berdasarkan latlong_start dan latlong_end
                                const startMarker = L
                                    .marker(latlongStart.split(','))
                                    .addTo(map2)
                                    .bindPopup('Lokasi Awal')
                                    .openPopup();
                                const endMarker = L
                                    .marker(latlongEnd.split(','))
                                    .addTo(map2);

                                // Menambahkan kontrol routing dengan waypoints dinamis
                                routingControl = L
                                    .Routing
                                    .control({
                                        waypoints: [
                                            L.latLng(latlongStart.split(',')),
                                            L.latLng(latlongEnd.split(','))
                                        ]
                                    })
                                    .addTo(map2);

                                // Menyesuaikan tampilan peta agar memuat kedua marker
                                map2.fitBounds([startMarker.getLatLng(), endMarker.getLatLng()]);
                            } else {
                                // Tangani kasus di mana tidak ada kendaraan yang dipilih
                                console.error('Tidak ada kendaraan yang dipilih.');
                            }
                        }
                    </script>
                </div>
            </div>

        </form>

    </div>
</section>