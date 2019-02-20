<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
              Position & Department
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> Dashboard
                </li>
                <li class="active">
                    <i class="fa fa-fw fa-users"></i> Position & Department
                </li>
            </ol>
        </div>

        <div class="col-lg-12 distance" style="padding-top:20px; padding-bottom: 20px;">
          <ul class="nav nav-tabs" id="myTab"">
            <li class="active"><a data-toggle="tab" href="#position">Position</a></li>
            <li><a data-toggle="tab" href="#department">Department</a></li>
          </ul>
        </div>

        <div class="tab-content" >
    
            <div class="tab-pane active" id="position">
              <div class="col-lg-12" style="padding-bottom: 20px;">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPosition">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Position</button>
              </div>

              <div class="col-lg-12">
                <div class="table-responsive" style="padding-bottom:5em;">
                    <table id='datatables2' class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Position ID</th>
                                <th>Position Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($positions as $pos) { ?>
                          <tr>
                            <td><?php echo $pos->position_id ?></td>
                            <td><?php echo $pos->position_type; ?></td>
                            <td>
                              <a href="#editModalPos" data-toggle="modal" data-pos-id="<?php echo $pos->position_id ;?>" data-pos-type="<?php echo $pos->position_type ?>" >
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
            
            <div class="tab-pane" id="department">
              <div class="col-lg-12" style="padding-bottom: 20px;">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDep">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Department</button>
              </div>
              <br>

              <div class="col-lg-12">
                <div class="" style="padding-bottom:5em;">
                    <table id='datatables3' class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr >
                                <th>Department ID</th>
                                <th>Department Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($deps as $dep) { ?>
                          <tr>
                              <td><?php echo $dep->department_id ?></td>
                              <td><?php echo $dep->department_name; ?></td>
                              <td>
                              <a href="#editModalDep" data-toggle="modal" data-dep-id="<?php echo $dep->department_id ?>" data-dep-name="<?php echo $dep->department_name ?>" >
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

        <!--Add new user modal -->
        
        <br>

        
      </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->

<div class="modal fade" id="addDep" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Add New Departmnet!</h4>
      </div>
      <form method="POST" class="form-horizontal" action="<?php echo base_url();?>AdminController/addDep">
        <div class="modal-body">
          <div class="form-group form-group-sm">
            <label class="col-sm-3 control-label">Department Name : </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" placeholder="ex. ICT" name='department_name' required>
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

<div class="modal fade" tabindex="-1" id="editModalDep">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title">Update Department</h4>
      </div>
      <form method="POST" class="form-horizontal" action="<?php echo base_url();?>AdminController/updateDep">
        <div class="modal-body">
          <div class="form-group form-group-sm">
            <label class="col-sm-3 control-label">Department Name : </label>
            <div class="col-sm-8">
              <input type="hidden" name='department_id' >
              <input type="text" class="form-control" name='department_name' required>
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

<div class="modal fade" id="addPosition" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Add New Position!</h4>
      </div>
      <form method="POST" class="form-horizontal" action="<?php echo base_url();?>AdminController/addPosition">
        <div class="modal-body">
          <div class="form-group form-group-sm">
            <label class="col-sm-3 control-label">Position Type : </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" placeholder="ex. Instructor" name='position_type' required>
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

<div class="modal fade" tabindex="-1" id="editModalPos">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title">Update Position</h4>
      </div>
      <form method="POST" class="form-horizontal" action="<?php echo base_url();?>AdminController/updatePosition">
        <div class="modal-body">
          <div class="form-group form-group-sm">
            <label class="col-sm-3 control-label">Position Type : </label>
            <div class="col-sm-8">
              <input type="hidden" name='position_id' >
              <input type="text" class="form-control" name='position_type' required>
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