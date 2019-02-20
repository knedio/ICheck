<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
              Reports By Schedule
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> Dashboard
                </li>
                <li class="active">
                    <i class="fa fa-fw fa-user"></i> Report
                </li>
            </ol>
        </div> 
        <div class="form-horizontal">
          <div class="form-group form-group-md">
            <label class="col-md-5 control-label"> Export : </label>
            <div class="col-md-3">
                <select class="form-control" id="selectType" onchange="selectFunc();" >
                  <option selected disabled hidden>Choose here</option>
                  <option value="PDF">PDF Export</option>
                  <option value="CSV" data-al="<?php echo $dep['department_id'].'_'.$dep['department_name'].'_'.$status.'123';?>" 
                    data-date="<?php echo date('Y-m-d',strtotime($datefrom)).'.'.date('Y-m-d',strtotime($dateto));?>">CSV Export</option>
                </select> 
            </div>
          </div>
        </div>
        <div id="header" class="centerFontBig">
          <?php echo '<strong>Department : </strong>'.$dep['department_name']; ?> <br>
          <?php echo '<strong>Date : </strong>'.$datefrom.' - '.$dateto; ?>

        </div>

        <hr>
        <div class="col-lg-12">
          <div class="table-responsive" style="padding-bottom:5em;">
              <table id='datatables2' class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                      <tr >
                          <th></th>
                          <th>Name</th>
                          <th>Scheduled Time</th>
                          <th>Hrs. Work</th>
                          <th>Hrs. Req.</th>
                          <th>Bldg - Rm</th>
                          <th>Date</th>
                          <th>Classes per week</th>
                          <th>Status</th>
                          <th>S.Y</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php $count = 1; foreach ($lists as $list) { $classPerWeek =  $this->AdminModel->getClassPerWeek($list['user_id']); ?>
                      <tr class="<?php if($list['status']=='Late'){echo 'yellow';}elseif($list['status']=='Present'){echo 'lightgreen';}elseif($list['status']=='Absent'){echo 'red';} ?>">
                        <td><?php echo $count; ?></td>
                        <td><?php echo $list['lname'].', '.$list['fname'][0];?></td>
                        <td><?php echo date("g:i a", strtotime($list['time_from'])).' - '.date("g:i a", strtotime($list['time_to']));?></td>
                        <td><?php echo $list['hrswork']; ?></td>
                        <td><?php echo $list['hrs_required']; ?></td>
                        <td><?php echo $list['bldg_no'].'-'.$list['room_no'];?></td>
                        <td><?php echo date('m/d/Y',strtotime($list['date'])); ?></td>
                        <td><?php echo $classPerWeek[0];?></td>
                        <td><?php echo $list['status']; ?></td>
                        <td><?php echo $list['SY_from'].'-'.$list['SY_to'];?></td>
                      </tr>
                    <?php $count++; } ?>
                  </tbody>
              </table>
          </div>
        </div>
      </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->
