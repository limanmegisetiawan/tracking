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
	<div class="row">
              <div class="col-sm-4 col-md-4">
                <h3 class="card-title">
                  <div class="form-group row">
                    <label for="geo_description" class="col-sm-5 col-form-label">Choose Address </label>
                    <div class="form-group col-sm-7">
                      <input id="pac-input" class="form-control" type="text" placeholder="Enter Address">
                    </div>
                  </div>

              
            </h3>
              </div>
              <!-- /.col -->
              <div class="form-group col-sm-4 col-md-3">
               <button class="btn btn-block btn-outline-danger btn-sm" id="delete-button">Delete Selected Geofence</button>
              </div>
              <!-- /.col -->
              <div class="form-group col-sm-4 col-md-3">
                <button class="btn btn-block btn-outline-success btn-sm" id="showgeofencemodel">Save Geofence</button>
              </div>
                 </div>

</div>


   
   
<div id="map" style="width: 1000px; height: 500px;"></div>
<script>

	const map = L.map('map').setView([-6.931268, 107.615322], 13);

	const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 19,
		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
	}).addTo(map);

	const marker = L.marker([-6.931268, 107.615322]).addTo(map)
		.bindPopup('<b>UNLA</b><br />Universitas langlangbuana.').openPopup();

	
	const popup = L.popup()
		.setLatLng([-6.931268, 107.615322])
		.setContent('I am a standalone popup.')
		.openOn(map);

	function onMapClick(e) {
		popup
			.setLatLng(e.latlng)
			.setContent(`You clicked the map at ${e.latlng.toString()}`)
			.openOn(map);
	}

	map.on('click', onMapClick);

</script>


  <div class="modal fade show" id="modal-geofence" aria-modal="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Save Selected Geofence</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div> 
            <div class="modal-body"> 
              <form id="geofencesave" method="post" action="<?php echo base_url(); ?>geofence/geofence_save">
              <div class="card-body">
                  <div class="form-group row">
                    <label for="geo_name" class="col-sm-4 col-form-label">Name</label>
                    <div class="form-group col-sm-8">
                      <input type="text" class="form-control" name="geo_name" id="geo_name" required="true" placeholder="Geofence Name">
                    </div>
                  </div>
                 <div class="form-group row">
                    <label for="geo_description" class="col-sm-4 col-form-label">Description</label>
                    <div class="form-group col-sm-8">
                      <input type="text" class="form-control" name="geo_description" id="geo_description" required="true" placeholder="Geofence Description">
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="Cateogry" class="col-sm-4 col-form-label">Vehicle</label>
                    <div class="form-group col-sm-8">
                      <div class="form-group" >
                        <select class="select2 select2-hidden-accessible" id="geo_vehicles" required="true" name="geo_vehicles[]" multiple="" data-placeholder="Select vehicles" style="width: 100%;"  tabindex="-1" aria-hidden="true">
                          <?php if(!empty($vehicles)) { foreach($vehicles as $vehicle) { ?>
                          <option value="<?= $vehicle['v_id']; ?>"><?= $vehicle['v_name']; ?></option>
                         <?php }} ?>
                        </select>
                      </div>
                    </div>
                </div>
               	<input type="hidden" class="form-control" name="geo_area" id="geo_area">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" id="geofenvaluesave" class="btn btn-primary">Save</button>
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>