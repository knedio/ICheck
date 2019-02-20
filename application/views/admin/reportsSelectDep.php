<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
          <h1 class="page-header">
            Reports
          </h1>
          <ol class="breadcrumb">
              <li>
                  <i class="fa fa-dashboard"></i> Dashboard
              </li>
              <li class="active">
                  <i class="fa fa-file-text-o"></i> Report Lists
              </li>
          </ol>
      </div>
    </div>
    <div class="col-lg-12">
      <div style="padding-bottom: 20px;">
        <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a data-toggle="tab" href="#department">Reports by Department </a></li>
            <li><a data-toggle="tab" href="#individual">Individual Reports</a></li>
        </ul>
      </div>
      <div class="tab-content">
        
        <div id="department" class="tab-pane fade in active">
          <div style="padding-bottom: 20px;margin-left: 15%;margin-right: 15%;">
            <ul class="nav nav-tabs" id="myTab">
                <li class="active"><a data-toggle="tab" href="#daily">Daily</a></li>
                <li><a data-toggle="tab" href="#schedule">By schedule</a></li>
            </ul>
          </div>
          <div class="tab-content">
            <div id="daily" class="tab-pane fade in active">
              <div class="col-lg-8 col-md-offset-2">
                <div class="table-responsive">
                  <form method="get" action="<?php echo base_url();?>AdminController/reportsDepList">
                  <table class="table table-striped table-bordered" id="dataTable" cellspacing="0">
                    <thead>
                       <tr>
                        <th>Department</th>
                        <th>Date From</th>
                        <th>Date To</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <select class="form-control" name='department_id' required>
                            <?php foreach ($deps as $dep):?>
                            <option value="<?php echo $dep->department_id ;?>"><?php echo $dep->department_name; ?></option>
                            <?php endforeach;?>
                        </select>
                        </td>
                        <td>
                          <input type="date" class="form-control" required name="date_from">
                        </td>
                        <td>
                          <input type="date" class="form-control" required name="date_to">
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <button style="margin-left: 40%;" type="submit" class="btn btn-primary">Proceed</button>
                  </form>
                </div>
              </div>
            </div>
            <div id="schedule" class="tab-pane fade">
              <div class="col-lg-8 col-md-offset-2">
                <div class="table-responsive">
                  <form method="get" action="<?php echo base_url();?>AdminController/getReportsBySchedule">
                  <table class="table table-striped table-bordered" id="dataTable" cellspacing="0">
                    <thead>
                       <tr>
                        <th>Department</th>
                        <th>Date From</th>
                        <th>Date To</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <select class="form-control" name='department_id' required>
                            <?php foreach ($deps as $dep):?>
                            <option value="<?php echo $dep->department_id ;?>"><?php echo $dep->department_name; ?></option>
                            <?php endforeach;?>
                          </select>
                        </td>
                        <td>
                          <input type="date" class="form-control" required name="date_from">
                        </td>
                        <td>
                          <input type="date" class="form-control" required name="date_to">
                        </td>
                        <td>
                          <select class="form-control" name='status' required>
                            <option value="All">All</option>
                            <option value="Present">Present</option>
                            <option value="Late">Late</option>
                            <option value="Absent">Absent</option>
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
        </div>
        <div id="individual" class="tab-pane fade">
          <div class="row">
            <div class="col-lg-8 col-md-offset-3">
              <form method="get" action="<?php echo base_url();?>AdminController/reportsSelectDep/#individual">
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
          <div class="col-lg-8 col-md-offset-2">
            <div class="table-responsive">
              <form method="get" action="<?php echo base_url();?>AdminController/reportsIndiTab/">
              <table class="table table-striped table-bordered" id="dataTable" cellspacing="0">
                <thead>
                   <tr>
                    <th>Name of Instructor</th>
                    <th>Date From</th>
                    <th>Date To</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <select class="form-control" name='user_id' required>
                        <?php foreach ($instructor as $ins):?>
                        <option value="<?php echo $ins->user_id ;?>"><?php echo $ins->fname . ' ' . $ins->mname . ' ' . $ins->lname;?></option>
                        <?php endforeach;?>
                    </select>
                    </td>
                    <td>
                      <input type="date" class="form-control" required name="date_from">
                    </td>
                    <td>
                      <input type="date" class="form-control" required name="date_to">
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
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->
