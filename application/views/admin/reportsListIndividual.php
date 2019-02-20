<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
              Reports Per Schedule
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
        <?php if (!empty($lists)) { ?>
        <div class="form-horizontal">
          <div class="form-group form-group-md">
            <label class="col-md-5 control-label"> Export : </label>
            <div class="col-md-3">
                <select class="form-control" name='status' id="selectBox" onchange="changeFunc();" required>
                  <option selected disabled value='' hidden>Choose here</option>
                  <option value="PDF">PDF Export</option>
                  <option value="All123" data-all="<?php echo $lists[0]->lname.'_'.$lists[0]->user_id.'_'.$lists[0]->date; ?>">CSV Export All Data</option>
                  <option value="Present123" data-all="<?php echo $lists[0]->lname.'_'.$lists[0]->user_id.'_'.$lists[0]->date; ?>">CSV Export Present</option>
                  <option value="Late123" data-all="<?php echo $lists[0]->lname.'_'.$lists[0]->user_id.'_'.$lists[0]->date; ?>">CSV Export Late</option>
                  <option value="Absent123" data-all="<?php echo $lists[0]->lname.'_'.$lists[0]->user_id.'_'.$lists[0]->date; ?>">CSV Export Absent</option>
                </select> 
            </div>
          </div>
        </div>
          <div class="centerFontBig">
            <?php echo '<strong>Name : </strong>'.$lists[0]->fname . ' ' . $lists[0]->mname . ' ' . $lists[0]->lname; ?><br>
            <?php echo '<strong>Date</strong> : '.date('F j, Y - l',strtotime($lists[0]->date)); ?>
            
          </div>
          <hr>
        <?php } ?>
        <div class="col-lg-12">
          <div class="table-responsive" style="padding-bottom:5em;">
              <table id='datatables2' class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                        <th></th>
                        <th>Bldg - Rm</th>
                        <th>Schedule Time</th>
                        <th>Hrs. Required</th>
                        <th>Hrs. Work</th>
                        <th>Status</th>
                        <th>S.Y.</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php $count = 1; foreach ($lists as $list) { ?>
                    <tr class="<?php if($list->status=='Late'){echo 'yellow';}elseif($list->status=='Present'){echo 'lightgreen';}elseif($list->status=='Absent'){echo 'red';} ?>">
                      <td><?php echo $count; ?></td>
                      <td><?php echo $list->bldg_no.' - '.$list->room_no; ?></td>
                      <td><?php echo date("g:i a", strtotime($list->time_from)).' - '.date("g:i a", strtotime($list->time_to)); ?></td>
                      <td><?php echo $list->hrs_required; ?></td>
                      <td><?php echo $list->hrswork; ?></td>
                      <td><?php echo $list->status; ?></td>
                      <td><?php echo $list->SY_from.' - '.$list->SY_to; ?></td>
                    </tr>
                    <?php $count++;} ?>
                  </tbody>
              </table>
          </div>
        </div>
      </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->
