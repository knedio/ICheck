<div class="container-fluid">

    <!-- Page Heading -->
  <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
          Schedule Lists
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> Dashboard
            </li>
            <li class="active">
                <i class="fa fa-fw fa-user"></i> Schedule Lists
            </li>
        </ol>
    </div>
  </div>
  <div class="row">
   <?php if (!empty($scheds)) { ?>
      <div class="centerFontBig">
        <?php echo '<strong>School Year : </strong>'.$scheds[0]->SY_from.' - '.$scheds[0]->SY_to; ?><br>
        <?php echo '<strong>Semester</strong> : '.$scheds[0]->semester; ?> Semester
      </div>
      <hr>
    <?php } ?>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="table-responsive" style="padding-bottom:5em;">
          <table id='datatables' class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr >
                  <th>Full Name</th>
                  <th>User No.</th>
                  <th>Building & Room</th>
                  <th>Section</th>
                  <th>Schedule Time</th>
                  <th>Day</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($scheds as $sched) {?>
                <tr>
                  <td><?php echo $sched->fname . ' ' . $sched->mname . ' ' . $sched->lname;?></td>
                  <td><?php echo $sched->user_no ;?></td>
                  <td><?php echo "Bldg. ".$sched->bldg_no." - Rm. ".$sched->room_no ;?></td>
                  <td><?php echo $sched->section ;?></td>
                  <td><?php echo date("g:i a", strtotime($sched->time_from)).' - '.date("g:i a", strtotime($sched->time_to));?></td>
                  <td><?php echo $sched->day; ?></td>
                  <td>
                    <a href="#editSched" data-toggle="modal" data-dep="<?php echo $depid;?>" data-name="<?php echo $sched->fname . ' ' . $sched->mname . ' ' . $sched->lname;?>" data-roomid="<?php echo $sched->room_id;?>" data-section="<?php echo $sched->section;?>" data-timefrom="<?php echo $sched->time_from;?>" data-timeto="<?php echo $sched->time_to;?>" data-day="<?php echo $sched->day;?>" data-syfrom="<?php echo $sched->SY_from;?>" data-syto="<?php echo $sched->SY_to;?>" data-semester="<?php echo $sched->semester;?>" data-schedid="<?php echo $sched->sched_id;?>" >
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
<!-- /.container-fluid -->
<div class="modal fade" tabindex="-1" id="editSched">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title">Update Position</h4>
      </div>
      <form method="POST" class="form-horizontal" action="<?php echo base_url();?>AdminController/updateSched">
        <div class="modal-body">
          <div class="form-group form-group-sm">
            <label class="col-sm-3 control-label">Name : </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name='name' readonly>
            </div>
          </div>
          <div class="form-group form-group-sm">
            <label class="col-sm-3 control-label">Building - Room : </label>
            <div class="col-sm-8">
                <select class="form-control" name='room_id' id="roomSelect" >
                  <?php foreach ($rooms as $rm):?>
                    <option value="<?php echo $rm->room_id ;?>"><?php echo $rm->bldg_no.' - '.$rm->room_no ?></option>
                  <?php endforeach;?>
                </select>
            </div>
          </div>
          <div class="form-group form-group-sm">
            <label class="col-sm-3 control-label">Section : </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name='section' >
            </div>
          </div>
          <div class="form-group form-group-sm">
            <label class="col-sm-3 control-label">Time : </label>
            <div class="col-sm-4">
              <input type="time" class="form-control" name='time_from' >
            </div>
            <div class="col-sm-4">
              <input type="time" class="form-control" name='time_to' >
            </div>
          </div>
          <div class="form-group form-group-sm">
            <label class="col-sm-3 control-label">Day : </label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name='day' >
            </div>
          </div>
          <div class="form-group form-group-sm">
            <label class="col-sm-3 control-label">School Year : </label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name='SY_from' >
            </div>
            <div class="col-sm-4">
              <input type="text" class="form-control" name='SY_to' >
            </div>
          </div>
          <div class="form-group form-group-sm">
            <label class="col-sm-3 control-label">Semester : </label>
            <div class="col-sm-8">
                <select class="form-control" name='semester' id="semSelect" >
                  <?php foreach ($semester as $sem):?>
                    <option value="<?php echo $sem ;?>"><?php echo $sem; ?> Semester</option>
                  <?php endforeach;?>
                </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input type="hidden" name='sched_id' >
          <input type="hidden" name='depid' >
          <input type="submit" class="btn btn-primary" value="Update">
        </div>
      </form>
    </div>
  </div>
</div>