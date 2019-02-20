<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Rooms, Building and Device
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>Dashboard
                </li>
                <li class="active">
                    <i class="lnr lnr-apartment"></i> Rooms, Building and Device
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
      	<?php if($this->session->flashdata('flash') != ''){?>
      	<?php echo $this->session->flashdata('class');?>
	        <center><?php echo $this->session->flashdata('flash');?></center>
	    </div>
	    <?php } ?>  
        <div class="col-lg-12 distance" style="padding-top:20px; padding-bottom: 20px;">
        	<ul id="myTab" class="nav nav-tabs" role="tablist">
			    <li class="active"><a data-toggle="tab" href="#room">Rooms</a></li>
			    <li><a data-toggle="tab" href="#building">Buildings</a></li>
			    <li><a data-toggle="tab" href="#device">Devices</a></li>
			</ul>
        </div>

		<div class="tab-content" >
			<div class="tab-pane active" id="room">
		    	<div class="col-lg-12" style="margin-bottom: 15px;">
		            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addRoom">
							<i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Room
					</button>
		        </div>
		    	<div class="col-lg-12">
			      <div class="table-responsive" style="padding-bottom:5em;">
			          <table id='datatables2' class="table table-striped table-bordered" cellspacing="0" width="100%">
			              	<thead>
			                  	<tr >
			                      	<th>Room ID</th>
			                      	<th>Room Number</th>
			                      	<th>Building No-Name</th>
			                      	<th>RaspberryPi Mac Address</th>
			                      	<th>Pin Number</th>
			                      	<th>Action</th>
			                  	</tr>
			              	</thead>
			              	<tbody>
			                	<?php foreach ($rooms as $room) { ?>
			                	<tr>
			                    	<td><?php echo $room->room_id ?></td>
			                    	<td><?php echo $room->room_no ?></td>
			                    	<td><?php echo $room->bldg_no.' - '.$room->bldg_name ?></td>
				                    <td><?php echo $room->rpi_mac_address; ?></td>
				                    <td><?php echo $room->pin_no; ?></td>
				                    <td>
					                    <a href="#editModalRoom" data-toggle="modal" data-room-id="<?php echo $room->room_id; ?>" data-room-no="<?php echo $room->room_no; ?>" data-bldg-id="<?php echo $room->bldg_id; ?>" data-device-id="<?php echo $room->device_id; ?>" data-pin-no="<?php echo $room->pin_no; ?>" >
					                      <span class="label label-default"><span class="glyphicon glyphicon-edit"></span> Edit</span>
					                    </a>
			                  		</td>
			                	</tr>
			                	<?php } ?>
			              	</tbody>
			          </table>
			      </div>
			    </div>
		    </div>
		    <div class="tab-pane" id="device">
		    	<div class="col-lg-12" style="margin-bottom: 15px;">
		            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDevice">
							<i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Device
					</button>
		        </div>
		    	<div class="col-lg-12">
			      	<div class="table-responsive" style="padding-bottom:5em;">
			          	<table id='datatables' class="table table-striped table-bordered" cellspacing="0" width="100%">
			              	<thead>
			                  	<tr >
			                  		<th>Device ID</th>
			                      	<th>RaspberryPi Mac Address</th>
			                      	<th>Action</th>
			                  	</tr>
			              	</thead>
			              	<tbody>
			                	<?php foreach ($devices as $device) { ?>
			                	<tr>
			                		<td><?php echo $device->device_id ?></td>
			                    	<td><?php echo $device->rpi_mac_address ?></td>
				                    <td>
					                    <a href="#editModalDevice" data-toggle="modal" data-device-id="<?php echo $device->device_id ?>" data-rpi-mac="<?php echo $device->rpi_mac_address ?>"  >
					                      <span class="label label-default"><span class="glyphicon glyphicon-edit"></span> Edit</span>
					                    </a>
			                  		</td>
			                	</tr>
			                	<?php } ?>
			              	</tbody>
			          </table>
			     	</div>
			    </div>
		    </div>
		    
		    <div class="tab-pane" id="building">
		    	<div class="col-lg-12" style="margin-bottom: 15px;">
		            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addBuilding">
							<i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Building
					</button>
		        </div>
		    	<div class="col-lg-12">
		          	<div class="table-responsive" style="padding-bottom:5em;">
		            	<table id='datatables3' class="table table-striped table-bordered" cellspacing="0" width="100%">
			              	<thead>
			                  	<tr >
			                  		<th>Building ID</th>
			                      	<th>Building Number</th>
			                      	<th>Building Name</th>
			                      	<th>Action</th>
			                  	</tr>
			              	</thead>
			              	<tbody>
			                	<?php foreach ($bldgs as $bldg) { ?>
			                	<tr>
			                    	<td><?php echo $bldg->bldg_id ?></td>
			                    	<td><?php echo $bldg->bldg_no ?></td>
				                    <td><?php echo $bldg->bldg_name; ?></td>
				                    <td>
					                    <a href="#editModalBuilding" data-toggle="modal" data-bldg-id="<?php echo $bldg->bldg_id ?>" data-bldg-no="<?php echo $bldg->bldg_no; ?>" data-bldg-name="<?php echo $bldg->bldg_name ?>" >
					                      <span class="label label-default"><span class="glyphicon glyphicon-edit"></span> Edit</span>
					                    </a>
			                  		</td>
			                	</tr>
			                	<?php } ?>
			              	</tbody>
			          </table>
		          	</div>
		        </div>
		    </div>
		</div>

        <br>
        
    
</div>
		
<!-- Add Modal -->
<div class="modal fade" id="addDevice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  	<div class="modal-dialog" role="document">
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<h4 class="modal-title" id="exampleModalLabel">Add New Device!</h4>
	      	</div>
	      	<form method="POST" class="form-horizontal" action="<?php echo base_url();?>AdminController/addDevice">
	        	<div class="modal-body">
	          		<div class="form-group form-group-sm">
	            		<label class="col-sm-3 control-label">Raspberry Pi Mac Address : </label>
	            		<div class="col-sm-8">
	              			<input type="text" class="form-control" placeholder="ex. ICT" name='rpi_mac_address' required>
	            		</div>
	          		</div>
	        	</div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		          <input type="submit" class="btn btn-primary" value="Submit">
		        </div>
	      	</form>
	    </div>
  	</div>
</div>

<div class="modal fade" id="addRoom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  	<div class="modal-dialog" role="document">
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<h4 class="modal-title" id="exampleModalLabel">Add New Room!</h4>
	      	</div>
	      	<form method="POST" class="form-horizontal" action="<?php echo base_url();?>AdminController/addRoom">
	        	<div class="modal-body">
	          		<div class="form-group form-group-sm">
	            		<label class="col-sm-3 control-label">Room Number : </label>
	            		<div class="col-sm-8">
	              			<input type="text" class="form-control" placeholder="ex. 101" name='room_no' required>
	            		</div>
	          		</div>
	          		<div class="form-group form-group-sm">
			            <label class="col-sm-3 control-label">Building : </label>
			            <div class="col-sm-8">
			                <select class="form-control" name='bldg_id' required>
			                  	<option selected disabled value='' hidden>Choose here</option>
			                  	<?php foreach ($bldgs as $bldg):?>
			                    <option value="<?php echo $bldg->bldg_id ;?>"><?php echo $bldg->bldg_no.' - '.$bldg->bldg_name ?></option>
			                  	<?php endforeach;?>
			                </select>
			            </div>
			        </div>

	          		<div class="form-group form-group-sm">
			            <label class="col-sm-3 control-label">Raspberry PI Mac Address : </label>
			            <div class="col-sm-8">
			                <select class="form-control" name='device_id' required>
			                  	<option selected disabled value='' hidden>Choose here</option>
			                  	<?php foreach ($devices as $device):?>
			                    <option value="<?php echo $device->device_id ;?>"><?php echo $device->rpi_mac_address ;?></option>
			                  	<?php endforeach;?>
			                </select>
			            </div>
			        </div>
			        <div class="form-group form-group-sm">
	            		<label class="col-sm-3 control-label">Pin Number : </label>
	            		<div class="col-sm-8">
	              			<input type="text" class="form-control" placeholder="ex. 1" name='pin_no' required>
	            		</div>
	          		</div>
	        	</div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		          <input type="submit" class="btn btn-primary" value="Submit">
		        </div>
	      	</form>
	    </div>
  	</div>
</div>

<div class="modal fade" id="addBuilding" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  	<div class="modal-dialog" role="document">
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<h4 class="modal-title" id="exampleModalLabel">Add New Building!</h4>
	      	</div>
	      	<form method="POST" class="form-horizontal" action="<?php echo base_url();?>AdminController/addBuilding">
	        	<div class="modal-body">
	          		<div class="form-group form-group-sm">
	            		<label class="col-sm-3 control-label">Building Number : </label>
	            		<div class="col-sm-8">
	              			<input type="text" class="form-control" placeholder="ex. 9" name='bldg_no' required>
	            		</div>
	          		</div>
	          		<div class="form-group form-group-sm">
	            		<label class="col-sm-3 control-label">Building Name : </label>
	            		<div class="col-sm-8">
	              			<input type="text" class="form-control" placeholder="ex. ICT" name='bldg_name' required>
	            		</div>
	          		</div>
	        	</div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		          <input type="submit" class="btn btn-primary" value="Submit">
		        </div>
	      	</form>
	    </div>
  	</div>
</div>
<!-- Add Modal End -->

<!-- update Modal -->

<div class="modal fade" tabindex="-1" id="editModalDevice">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title">Update Device</h4>
      </div>
      <form method="POST" class="form-horizontal" action="<?php echo base_url();?>AdminController/updateDevice">
        <div class="modal-body">
          <div class="form-group form-group-sm">
            <label class="col-sm-3 control-label">RaspberryPi Mac Address : </label>
            <div class="col-sm-8">
              <input type="hidden" name='device_id' >
              <input type="text" class="form-control" name='rpi_mac_address' required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" value="Update">
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" id="editModalRoom">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title">Update Room</h4>
      </div>
      	<form method="POST" class="form-horizontal" action="<?php echo base_url();?>AdminController/updateRoom">
	        <div class="modal-body">
	        	<div class="form-group form-group-sm">
	            	<label class="col-sm-3 control-label">Room ID : </label>
	            	<div class="col-sm-8">
	              		<input type="text" class="form-control" name='room_id' readonly>
	            	</div>
	          	</div>
	          	<div class="form-group form-group-sm">
	            	<label class="col-sm-3 control-label">Room Number : </label>
	            	<div class="col-sm-8">
	              		<input type="text" class="form-control" name='room_no' required>
	              		<input type="hidden" name='room_no2'>
	              		<input type="hidden" name='bldg_id2'>
	            	</div>
	          	</div>
	          	<div class="form-group form-group-sm">
		            <label class="col-sm-3 control-label">Building : </label>
		            <div class="col-sm-8">
		                <select class="form-control" name='bldg_id' id="bldgSelect" required>
		                  <?php foreach ($bldgs as $bldg):?>
		                    <option value="<?php echo $bldg->bldg_id ;?>"><?php echo $bldg->bldg_no.' - '.$bldg->bldg_name ?></option>
		                  <?php endforeach;?>
		                </select>
		            </div>
		        </div>
	          	<div class="form-group form-group-sm">
		            <label class="col-sm-3 control-label">RaspberryPi Mac Address : </label>
		            <div class="col-sm-8">
		                <select class="form-control" name='device_id' id="deviceSelect" required>
		                  <?php foreach ($devices as $device):?>
		                    <option value="<?php echo $device->device_id ;?>"><?php echo $device->rpi_mac_address ;?></option>
		                  <?php endforeach;?>
		                </select>
		            </div>
		         </div>
	          	<div class="form-group form-group-sm">
	            	<label class="col-sm-3 control-label">Pin Number : </label>
	            	<div class="col-sm-8">
	              		<input type="text" class="form-control" name='pin_no' required>
	            	</div>
	          	</div>
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	          <input type="submit" class="btn btn-primary" value="Update">
	        </div>
      	</form>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" id="editModalBuilding">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title">Update Building</h4>
      </div>
      <form method="POST" class="form-horizontal" action="<?php echo base_url();?>AdminController/updateBuilding">
        <div class="modal-body">
        	<div class="form-group form-group-sm">
	            <label class="col-sm-3 control-label">Building ID : </label>
	            <div class="col-sm-8">
	              <input type="text" class="form-control" name='bldg_id' readonly>
	            </div>
          	</div>
          	<div class="form-group form-group-sm">
	            <label class="col-sm-3 control-label">Building Number : </label>
	            <div class="col-sm-8">
	              <input type="text" class="form-control" name='bldg_no' required>
	              <input type="hidden" name='bldg_no2'>
	            </div>
          	</div>
          	<div class="form-group form-group-sm">
	            <label class="col-sm-3 control-label">Building Name : </label>
	            <div class="col-sm-8">
	              <input type="text" class="form-control" name='bldg_name' required>
	            </div>
          	</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-primary" value="Update">
        </div>
      </form>
    </div>
  </div>
</div>

<!-- update Modal end -->