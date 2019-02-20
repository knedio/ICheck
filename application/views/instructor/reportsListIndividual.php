<div class="container-fluid">

    <!-- Page Heading -->
  <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
          Total Hour Reports Per Schedule
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
  <div class="row">
    <?php if (!empty($lists)) { ?>
      <div class="centerFontBig">
        <?php echo '<strong>Date</strong> : '.date('F j, Y - l',strtotime($lists[0]->date)); ?>
      </div>
      <hr>
    <?php } ?>
  </div>
  <div class="row">

   <?php if($this->session->flashdata('flash') != ''){?>
        <?php echo $this->session->flashdata('class');?>
          <center><?php echo $this->session->flashdata('flash');?></center>
      </div>
      <?php } ?> 
  </div>
    <div class="col-lg-12">
      <div class="table-responsive" style="padding-bottom:5em;">
          <table id='datatables' class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                  <tr>
                    <th></th>
                    <th>Schedule Time</th>
                    <th>Hrs. Required(hr:min:sec)</th>
                    <th>Hrs. Work(hr:min:sec)</th>
                    <th>School Year</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                <?php $count = 1; foreach ($lists as $list) { ?>
                <tr>
                  <td><?php echo $count; ?></td>
                  <td><?php echo $list->time_from.' - '.$list->time_to; ?></td>
                  <td><?php echo $list->hrs_required; ?></td>
                  <td><?php echo $list->hrswork; ?></td>
                  <td><?php echo $list->SY_from.' - '.$list->SY_to; ?></td>
                  <td><?php echo $list->status; ?></td>
                  <?php if ($list->status != 'Present'){ ?>
                  <td><a href="#addRequest" data-toggle="modal"  data-tlid="<?php echo $list->timelogs_id ;?>" data-date="<?php echo $list->date ;?>"><span class="label label-warning">Request</span></a>  </td>
                  <?php }else {echo "<td></td>";} ?>
                </tr>
                <?php $count++;} ?>
              </tbody>
          </table>
      </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->

<div class="modal fade" id="addRequest" tabindex="-1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Submit Request!</h4>
      </div>
      <form method="POST" class="form-horizontal" action="<?php echo base_url();?>InstructorController/addRequest/">
        <div class="modal-body">
          <div class="form-group form-group-sm">
            <label class="col-sm-3 control-label">Request Field : </label>
            <div class="col-sm-8">
              <textarea class="form-control" name='requestor_note' required></textarea>
              <input type="hidden" name="timelogs_id">
              <input type="hidden" name="date">
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
