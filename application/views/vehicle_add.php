<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><?php echo (isset($vehicledetails))?'Edit Vehicle':'Tambah Kendaraan' ?>
                </h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url(); ?>/dashboard">Data Bus</a>
                    </li>
                    <li class="breadcrumb-item active"><?php echo (isset($vehicledetails))?'Edit vehicle':'Tambah Kendaraan' ?></li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form
            method="post"
            id="vehicle_add"
            class="card"
            action="<?php echo base_url();?>vehicle/<?php echo (isset($vehicledetails))?'updatevehicle':'insertvehicle'; ?>">
            <div class="card-body">

                <div class="row">
                    <input
                        type="hidden"
                        name="v_id"
                        id="v_id"
                        value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_id']:'' ?>">

                    <div class="col-sm-6 col-md-4">
                        <label class="form-label">No Registrasi</label>
                        <div class="form-group">
                            <input
                                type="text"
                                name="v_registration_no"
                                id="v_registration_no"
                                class="form-control"
                                placeholder="No Registrasi"
                                value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_registration_no']:'' ?>">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <label class="form-label">Nama Bus</label>
                        <div class="form-group">
                            <input
                                type="text"
                                name="v_name"
                                id="v_name"
                                class="form-control"
                                placeholder="Nama Bus"
                                value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_name']:'' ?>">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Model</label>
                            <input
                                type="text"
                                name="v_model"
                                value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_model']:'' ?>"
                                class="form-control"
                                placeholder="Model">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">No Chassis</label>
                            <input
                                type="text"
                                name="v_chassis_no"
                                value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_chassis_no']:'' ?>"
                                class="form-control"
                                placeholder="Chassis No">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">No Mesin</label>
                            <input
                                type="text"
                                name="v_engine_no"
                                value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_engine_no']:'' ?>"
                                class="form-control"
                                placeholder="No Mesin">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Produksi</label>
                            <input
                                type="text"
                                name="v_manufactured_by"
                                value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_manufactured_by']:'' ?>"
                                class="form-control"
                                placeholder="Produksi Oleh">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">Tipe Bus</label>
                            <select id="v_type" name="v_type" class="form-control " required="">
                                <option value="">Select Vehicle Type</option>
                                <option
                                    <?php echo (isset($vehicledetails) && $vehicledetails[0]['v_type']=='Mini Bus') ? 'selected':'' ?>
                                    value="Mini Bus">Mini Bus</option>
                                <option
                                    <?php echo (isset($vehicledetails) && $vehicledetails[0]['v_type']=='BUS') ? 'selected':'' ?>
                                    value="BUS">BUS</option>
                            </select>

                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label for="v_color" class="form-label">Warna Bus<small>
                                    (To show in Map)</small>
                            </label>
                            <input
                                id="add-device-color"
                                name="v_color"
                                class="jscolor {valueElement:'add-device-color', styleElement:'add-device-color', hash:true, mode:'HSV'} form-control"
                                value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_color']:'#F399EB' ?>"
                                required="required">
                        </div>
                    </div>
                    <?php if(isset($vehicledetails[0]['v_is_active'])) { ?>
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label for="v_is_active" class="form-label">Status Kendaraan</label>
                            <select id="v_is_active" name="v_is_active" class="form-control " required="">
                                <option value="">Select Status Kendaraan</option>
                                <option
                                    <?php echo (isset($vehicledetails) && $vehicledetails[0]['v_is_active']==1) ? 'selected':'' ?>
                                    value="1">Active</option>
                                <option
                                    <?php echo (isset($vehicledetails) && $vehicledetails[0]['v_is_active']==0) ? 'selected':'' ?>
                                    value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <?php } ?>

                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label for="v_group" class="form-label">Group Bus</label>
                            <select id="v_group" name="v_group" class="form-control " required="">
                                <option value="">Select Group Bus</option>
                                <?php if(!empty($v_group)) { foreach($v_group as $v_groupdata) { ?>
                                <option
                                    <?= (isset($vehicledetails[0]['v_group']) && $vehicledetails[0]['v_group'] == $v_groupdata['gr_id'])?'selected':''?>
                                    value="<?= $v_groupdata['gr_id'] ?>"><?= $v_groupdata['gr_name'] ?></option>
                                <?php } } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <label for="exampleFormControlInput1">Lokasi awal</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="latlong_start" name="latlong_start">
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <label for="exampleFormControlInput1">Lokasi akhir</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="latlong_end" name="latlong_end">
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

                                    // Pindahkan marker pertama ke posisi terbaru
                                    markers[0].setLatLng(e.latlng);
                                }
                            }
                        }

                        map.on('click', onMapClick);
                    </script>

                </div>
                <hr>
                <div class="form-label">
                    <b>GPS API Details(Feed GPS Data)</b>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">API URL</label>
                            <input
                                type="text"
                                name="v_api_url"
                                class="form-control"
                                placeholder="API URL"
                                value="<?php echo base_url();?>api"
                                readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">API Username</label>
                            <input
                                type="text"
                                id="v_api_username"
                                value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_api_username']:'' ?>"
                                name="v_api_username"
                                class="form-control"
                                placeholder="API Username"
                                readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group">
                            <label class="form-label">API Password</label>
                            <input
                                type="text"
                                name="v_api_password"
                                class="form-control"
                                placeholder="API Password"
                                value="<?php echo (isset($vehicledetails)) ? $vehicledetails[0]['v_api_password']:random_string('nozero', 6) ?>"
                                readonly="readonly">
                        </div>
                    </div>
                </div>
            </div>
            <input
                type="hidden"
                id="v_created_by"
                name="v_created_by"
                value="<?php echo output($this->session->userdata['session_data']['u_id']); ?>">
            <input
                type="hidden"
                id="v_created_date"
                name="v_created_date"
                value="<?php echo date('Y-m-d h:i:s'); ?>">
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">
                    <?php echo (isset($vehicledetails))?'Update Vehicle':'Tambah Kendaraan' ?></button>
            </div>
        </form>
    </div>
</section>
<!-- /.content -->