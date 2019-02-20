<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
          Time Logs
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> Dashboard
            </li>
            <li class="active">
                <i class="fa fa-fw fa-user"></i> Instructor Lists
            </li>
        </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-8 col-md-offset-3">
      <form method="get" action="<?php echo base_url();?>AdminController/timeLogsSelectInstructor/">
        <div class="form-group form-group-md">
          <label class="col-md-3 control-label">Select Department : </label>
          <div class="col-md-6">
            <select class="form-control" name='department_id' onchange='this.form.submit()' id="department_id" required>
                <option value="">All</option>
                <?php foreach ($deps as $dep):?>
                <option value="<?php echo $dep->department_id ;?>" <?php if($dep->department_id == $depID){echo "selected";} ?>><?php echo $dep->department_name; ?></option>
                <?php endforeach;?>
            </select>
          </div>
        </div>
      </form>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-lg-8 col-md-offset-2">
      <div class="table-responsive">
        <form method="get" action="<?php echo base_url();?>AdminController/timeLogsList/">
        <table class="table table-striped table-bordered" id="dataTable" cellspacing="0">
          <thead>
             <tr>
              <th>Name of Instructor</th>
              <th>Date </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <select class="form-control" name='user_id' required>
                  <?php foreach ($instructor as $ins):?>
                  <option value="<?php echo $ins->user_id ;?>"><?php echo $ins->fname . ' ' . $ins->mname . ' ' . $ins->lname. ' - ' . $ins->user_no;?></option>
                  <?php endforeach;?>
              </select>
              </td>
              <td>
                <input type="date" class="form-control" required name="date">
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
