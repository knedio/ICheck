<div class="container-fluid">

    <!-- Page Heading -->
  <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
          Schedule
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> Dashboard
            </li>
            <li class="active">
                <i class="fa fa-fw fa-user"></i> Schedule
            </li>
        </ol>
    </div>
  </div>
  <div class="row">
    
    <!--Add new user modal -->
    <div class="col-lg-12">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploadSched">
        <i class="fa fa-plus-circle" aria-hidden="true"></i> Upload Schedule</button>
    </div>
    <?php if($this->session->flashdata('flash') != ''){?>
      <?php echo $this->session->flashdata('class');?>
        <center><?php echo $this->session->flashdata('flash');?></center>
    <?php echo "</div>"; } ?>  
  </div>
  <hr>
  <div class="row">
    <div class="col-lg-8 col-md-offset-2">
      <div class="table-responsive">
        <form method="get" action="<?php echo base_url();?>AdminController/scheduleLists/">
        <table class="table table-striped table-bordered" id="dataTable" cellspacing="0">
          <thead>
             <tr>
              <th>Department</th>
              <th>School Year </th>
              <th>Semester </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <select class="form-control" name='department_id' required>
                  <?php foreach ($deps as $dep):?>
                  <option value="<?php echo $dep->department_id ;?>"><?php echo $dep->department_name;?></option>
                  <?php endforeach;?>
                </select>
              </td>
              <td>
                <select class="form-control" name='sy' required>
                  <?php foreach ($schoolyear as $sy):?>
                  <option value="<?php echo $sy->SY_from.'-'.$sy->SY_to;?>"><?php echo $sy->SY_from.' - '.$sy->SY_to;?></option>
                  <?php endforeach;?>
                </select>
              </td>
              <td>
                <select class="form-control" name='semester' required>
                  <?php foreach ($semester as $sem):?>
                  <option value="<?php echo $sem;?>"><?php echo $sem.' Semester';?></option>
                  <?php endforeach;?>
                </select>
              </td>
            </tr>
          </tbody>
        </table>
        <button style="margin-left: 40%;" type="submit" class="btn btn-primary">Proceed</button>
        </form>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<div class="modal fade" id="uploadSched" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Upload New Schedule!</h4>
      </div>
      <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url();?>AdminController/import">
        <div class="modal-body">
          <div class="form-group form-group-sm">
            <label class="col-sm-3 control-label">Choose your file : </label>
            <div class="col-sm-8">
              <input type="file" class="form-control" name="csv_file" id="csv_file" required accept=".csv" required>
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
