<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
              Users
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> Dashboard
                </li>
                <li class="active">
                    <i class="fa fa-fw fa-users"></i> Users
                </li>
            </ol>
        </div>
        <div class="row">

         <?php if($this->session->flashdata('flash') != ''){?>
              <?php echo $this->session->flashdata('class');?>
                <center><?php echo $this->session->flashdata('flash');?></center>
            </div>
            <?php } ?> 
        </div>
        <div class="col-lg-12" style="padding-bottom: 15px;">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUser">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> Add New User</button>
              </div>
        <div class="col-lg-12 distance" style="padding-top:20px; padding-bottom: 20px;">
          <ul id="navbar_menu" class="nav nav-tabs" role="tablist">
            <li class="active"><a data-toggle="tab" href="#instructors">Instructors</a></li>
            <li><a data-toggle="tab" href="#admin">Admins</a></li>
          </ul>
        </div>

        <div class="tab-content" >
          <div class="tab-pane active" id="instructors">
            <div class="col-lg-12">
              <div class="table-responsive" style="padding-bottom:5em;">
                  <table id='datatables2' class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                          <tr >
                              <th>User No.</th>
                              <th>Tags ID</th>
                              <th>Full Name</th>
                              <th>Department</th>
                              <th>Position</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($instructors as $user) { ?>
                        <tr>
                            <td><?php echo $user->user_no ?></td>
                            <td><?php echo $user->tags_id; ?></td>
                            <td><?php echo $user->fname . ' ' . $user->mname . ' ' . $user->lname;?></td>
                            <td><?php echo $user->department_name; ?></td>
                            <td><?php echo $user->position_type; ?></td>
                            <td>
                            <a href="#editModalUser" data-toggle="modal"  data-id-user="<?php echo $user->user_id ?>" data-user-no="<?php echo $user->user_no ?>" data-tagsid="<?php echo $user->tags_id ?>" data-dep-id="<?php echo $user->department_id ?>" data-pos-id="<?php echo $user->position_id ?>" data-fname="<?php echo $user->fname ?>" data-mname="<?php echo $user->mname ?>" data-lname="<?php echo $user->lname ?>" >
                              <span class="label label-default">Edit</span>
                            </a> <a href="#" class='reset_password' id='<?php echo $user->user_id; ?>' ><span class="label label-warning">Reset</span></a> 
                                <?php if($user->user_status == 'Active') { ?>
                                  <a href="#" class="deactivate_account" id="<?php echo $user->user_id ?>"><span class="label label-success">Active</span></a>  
                                <?php } else { ?>
                                  <a href="#" class="activate_account" id="<?php echo $user->user_id ?>"><span class="label label-danger">Deactivated</span></a>
                                <?php } ?> 
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                  </table>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="admin">
            <div class="col-lg-12">
              <div class="table-responsive" style="padding-bottom:5em;">
                  <table id='datatables' class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                          <tr >
                              <th>User No.</th>
                              <th>Tags ID</th>
                              <th>Full Name</th>
                              <th>Department</th>
                              <th>Position</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($admins as $user) { ?>
                        <tr>
                            <td><?php echo $user->user_no ?></td>
                            <td><?php echo $user->tags_id; ?></td>
                            <td><?php echo $user->fname . ' ' . $user->mname . ' ' . $user->lname;?></td>
                            <td><?php echo $user->department_name; ?></td>
                            <td><?php echo $user->position_type; ?></td>
                            <td>
                            <a href="#editModalUser" data-toggle="modal"  data-id-user="<?php echo $user->user_id ?>" data-user-no="<?php echo $user->user_no ?>" data-tagsid="<?php echo $user->tags_id ?>" data-dep-id="<?php echo $user->department_id ?>" data-pos-id="<?php echo $user->position_id ?>" data-fname="<?php echo $user->fname ?>" data-mname="<?php echo $user->mname ?>" data-lname="<?php echo $user->lname ?>" >
                              <span class="label label-default">Edit</span>
                            </a> <a href="#" class='reset_password' id='<?php echo $user->user_id; ?>' ><span class="label label-warning">Reset</span></a> 
                                <?php if($user->user_status == 'Active') { ?>
                                  <a href="#" class="deactivate_account" id="<?php echo $user->user_id ?>"><span class="label label-success">Active</span></a>  
                                <?php } else { ?>
                                  <a href="#" class="activate_account" id="<?php echo $user->user_id ?>"><span class="label label-danger">Deactivated</span></a>
                                <?php } ?> 
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

<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Add New User!</h4>
      </div>
      <form method="POST" class="form-horizontal" action="<?php echo base_url();?>AdminController/addUser">
        <div class="modal-body">
          <div class="form-group form-group-sm">
            <label class="col-sm-3 control-label">User No. : </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" placeholder="ex. 2014100117" name='user_no' required>
            </div>
          </div>
          <div class="form-group form-group-sm">
            <label class="col-sm-3 control-label">Tags ID : </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" placeholder="ex. e200001621130200" name='tags_id' required>
            </div>
          </div>
          <div class="form-group form-group-sm">
            <label class="col-sm-3 control-label">Firstname : </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" placeholder="ex. Juan" name='fname' required>
            </div>
          </div>
          <div class="form-group form-group-sm">
            <label class="col-sm-3 control-label">Middle name : </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" placeholder="ex. T." name='mname'>
            </div>
          </div>
          <div class="form-group form-group-sm">
            <label for="inputLastname" class="col-sm-3 control-label">Lastname : </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" placeholder="ex. Tamad" name='lname' required>
            </div>
          </div>
          <div class="form-group form-group-sm">
            <label class="col-sm-3 control-label">Department : </label>
            <div class="col-sm-8">
                <select class="form-control" name='department_id' required>
                  <option selected disabled value='' hidden>Choose here</option>
                  <?php foreach ($deps as $dep):?>
                    <option value="<?php echo $dep->department_id ;?>"><?php echo $dep->department_name ;?></option>
                  <?php endforeach;?>
                </select>
            </div>
          </div>
          <div class="form-group form-group-sm">
            <label class="col-sm-3 control-label">Position : </label>
            <div class="col-sm-8">
                <select class="form-control" name='position_id' required>
                  <option selected disabled value='' hidden>Choose here</option>
                  <?php foreach ($positions as $position):?>
                    <option value="<?php echo $position->position_id ;?>"><?php echo $position->position_type ;?></option>
                  <?php endforeach;?>
                </select>
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

<div class="modal fade" tabindex="-1" id="editModalUser">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title">Update User</h4>
      </div>
      <form method="POST" class="form-horizontal" action="<?php echo base_url();?>AdminController/updateUser">
        <div class="modal-body">
          <div class="form-group form-group-sm">
            <label class="col-sm-3 control-label">User ID : </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" placeholder="ex. ICT" name='user_id' readonly>
            </div>
          </div>
          <div class="form-group form-group-sm">
            <label class="col-sm-3 control-label">User No. : </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" placeholder="ex. ICT" name='user_no' required>
            </div>
          </div>
          <div class="form-group form-group-sm">
            <label class="col-sm-3 control-label">Tags ID : </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" placeholder="ex. ICT" name='tags_id' required>
            </div>
          </div>
          <div class="form-group form-group-sm">
            <label class="col-sm-3 control-label">Firstname : </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" placeholder="ex. Juan" name='fname' required>
            </div>
          </div>
          <div class="form-group form-group-sm">
            <label class="col-sm-3 control-label">Middle name : </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" placeholder="ex. T." name='mname'>
            </div>
          </div>
          <div class="form-group form-group-sm">
            <label for="inputLastname" class="col-sm-3 control-label">Lastname : </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" placeholder="ex. Tamad" name='lname' required>
            </div>
          </div>
          <div class="form-group form-group-sm">
            <label class="col-sm-3 control-label">Department : </label>
            <div class="col-sm-8">
                <select class="form-control" name='department_id' id="depIDSelect" required>
                  <?php foreach ($deps as $dep):?>
                    <option value="<?php echo $dep->department_id ;?>"><?php echo $dep->department_name ;?></option>
                  <?php endforeach;?>
                </select>
            </div>
          </div>
          <div class="form-group form-group-sm">
            <label class="col-sm-3 control-label">Position : </label>
            <div class="col-sm-8">
                <select class="form-control" name='position_id'  id="posIDSelect" required>
                  <option selected disabled value='' hidden>Choose here</option>
                  <?php foreach ($positions as $position):?>
                    <option value="<?php echo $position->position_id ;?>"><?php echo $position->position_type ;?></option>
                  <?php endforeach;?>
                </select>
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
