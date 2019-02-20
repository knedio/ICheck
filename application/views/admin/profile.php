<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
      <div class="col-lg-12">
          <h1 class="page-header">
            Profile
          </h1>
          <ol class="breadcrumb">
              <li>
                  <i class="fa fa-dashboard"></i> Dashboard
              </li>
              <li class="active">
                  <i class="fa fa-user-o"></i> Profile
              </li>
          </ol>
      </div>
  </div>
    <?php if($this->session->flashdata('error') != ''){?>
     <div class="alert alert-danger" style="text-align: center;">
        <?php echo $this->session->flashdata('error');?>
    </div>
    <?php } ?>  
  <div class="col-lg-12" style="padding-top:20px; padding-bottom: 20px;">
    <ul id="navbar_menu" class="nav nav-tabs" role="tablist">
      <li class="active"><a data-toggle="tab" href="#profile">Profile Info</a></li>
      <li><a data-toggle="tab" href="#password">Change Password</a></li>
    </ul>
  </div>
  <div class="tab-content" >
    <div class="tab-pane active" id="profile">

      <div class="col-lg-8">
        <form method="POST" class="form-horizontal" action="<?php echo base_url();?>AdminController/updateProfile">
          <div class="form-group form-group-sm">
            <label class="col-sm-6 control-label">User Number :</label>
            <div class="col-sm-6">
              <input type="hidden" name='user_no2' value="<?php echo $user['user_no']; ?>">
              <input type="text" class="form-control" name='user_no' value="<?php echo $user['user_no']; ?>">
            </div>
          </div>
          <div class="form-group form-group-sm">
            <label class="col-sm-6 control-label">Tags ID :</label>
            <div class="col-sm-6">
              <input type="hidden" name='tags_id2' value="<?php echo $user['tags_id']; ?>">
              <input type="text" class="form-control" name='tags_id' value="<?php echo $user['tags_id']; ?>">
            </div>
          </div>
          <div class="form-group form-group-sm">
            <label class="col-sm-6 control-label">First Name :</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name='fname' value="<?php echo $user['fname']; ?>">
            </div>
          </div>
          <div class="form-group form-group-sm">
            <label class="col-sm-6 control-label">Middle name :</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name='mname' value="<?php echo $user['mname']; ?>">
            </div>
          </div>
          <div class="form-group form-group-sm">
            <label class="col-sm-6 control-label">Lastname :</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name='lname' value="<?php echo $user['lname']; ?>">
            </div>
          </div>
          <div class="form-group form-group-sm">
            <label class="col-sm-6 control-label">Department : </label>
            <div class="col-sm-6">
                <select class="form-control" name='department_id' required>
                  <?php foreach ($deps as $dep):?>
                    <option value="<?php echo $dep->department_id ;?>" <?php if ($dep->department_id == $user['department_id']){echo "selected";} ?>><?php echo $dep->department_name ;?></option>
                  <?php endforeach;?>
                </select>
            </div>
          </div>
          <div class="form-group form-group-sm">
            <label class="col-sm-6 control-label">Position : </label>
            <div class="col-sm-6">
                <select class="form-control" name='position_id' required>
                  <?php foreach ($positions as $position):?>
                    <option value="<?php echo $position->position_id ;?>" <?php if ($position->position_id == $user['position_id']){echo "selected";} ?>><?php echo $position->position_type ;?></option>
                  <?php endforeach;?>
                </select>
            </div>
          </div>
          <div class="form-group col-md-12">
            <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
            <input type="submit" class="btn btn-primary pull-right" value="Update" >
            <br><br><br>
          </div>
        </form>
      </div>
    </div>
    <div class="tab-pane" id="password">
      <form class="form-horizontal" action="<?php echo base_url();?>AdminController/update_password" method="post">
        <div class="form-group">
          <label class="col-sm-4 control-label">Current Password : </label>
          <div class="col-sm-4">
            <input type="password" class="form-control" name="password" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-4 control-label">New Password : </label>
          <div class="col-sm-4">
            <input type="password" class="form-control" name="new_password" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-4 control-label">Re-type New Password : </label>
          <div class="col-sm-4">
            <input type="password" class="form-control" name="retype_password" required>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-6">
            <button type="submit" class="btn btn-default pull-right">Save Changes</button>
          </div>
        </div>
      </form>
    </div>
  </div>
<!-- /.container-fluid -->