<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
              Overall Daily Hour Report 
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
                <select class="form-control" id="selectType" onchange="selectFuncDepList();" >
                  <option selected disabled hidden>Choose here</option>
                  <option value="PDF">PDF Export</option>
                  <option value="CSV" data-al="<?php echo $dep['department_id'].'.'.date('Y-m-d',strtotime($datefrom)).'.'.date('Y-m-d',strtotime($dateto));?>">CSV Export</option>
                </select> 
            </div>
          </div>
        </div>
        <div id="header" class="centerFontBig">
          <?php echo '<strong>Department : </strong>'.$dep['department_name']; ?> <br>
          <?php echo '<strong>Date : </strong>'.$date; ?>
        </div>
        <hr>
        <div class="col-lg-12">
          <div class="table-responsive" style="padding-bottom:5em;">
              <table id='datatables' class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                      <tr >
                          <th></th>
                          <th>Full Name</th>
                          <th>Total Classes Attended</th>
                          <th>Hrs. Required</th>
                          <th>Hrs. Work</th>
                          <th>Date (mm/dd/yyyy)</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php $count = 1; foreach ($lists as $list) { ?>
                    <tr>
                      <td class="po"><?php echo $count; ?></td>
                      <td><?php echo $list['lname'].', '.$list['fname'];?></td>
                      <td><?php echo $list['totalclass']; ?></td>
                      <td><?php echo $list['daily_hrs_required']; ?></td>
                      <td><?php echo $list['hrswork_perday']; ?></td>
                      <td><?php echo date('m/d/Y',strtotime($list['date'])); ?></td>
                      <td><a href="<?php echo base_url()."AdminController/reportsDepListIndividual/".$list['user_id'].'/'.$list['date'];?>" ><span class="label label-default">View More</span></a>  </td>
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
