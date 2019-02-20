
<div class="container-fluid">

    <!-- Page Heading -->
  <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
          Requests
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> Dashboard
            </li>
            <li class="active">
                <i class="fa fa-fw fa-user"></i> Requests
            </li>
        </ol>
    </div> 
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div style="padding-bottom: 20px;">
        <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a data-toggle="tab" href="#pending">Pending</a></li>
            <li><a data-toggle="tab" href="#declined">Declined</a></li>
            <li><a data-toggle="tab" href="#approved">Approved</a></li>
        </ul>
      </div>
      <div class="tab-content">
        <div id="pending" class="tab-pane fade in active">
          <div class="col-lg-12">
            <div class="table-responsive" style="padding-bottom:5em;">
                <table id='datatables' class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th></th>
                      <th>User ID No.</th>
                      <th>Date Submitted</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $count=1; foreach($pendings as $pen){?>
                    <tr>
                      <td><?php echo $count;?></td>
                      <td><?php echo $pen->user_no;?></td>
                      <td><?php echo date('F j, Y',strtotime($pen->date_submitted))?></td>
                      <td><a href="#viewrequest" data-toggle="modal" data-reqid="<?php echo $pen->request_id; ?>" data-userid="<?php echo $pen->user_id; ?>" data-name="<?php echo $pen->fname.' '.$pen->mname.' '.$pen->lname; ?>" data-datesubmitted="<?php echo date('F j, Y - g:i a',strtotime($pen->date_submitted)); ?>" data-sched="<?php echo date('g:i a',strtotime($pen->time_from)).' - '.date('g:i a',strtotime($pen->time_to)); ?>" data-date="<?php echo date('F j, Y',strtotime($pen->date)); ?>" data-status="<?php echo $pen->status; ?>" data-note="<?php echo $pen->requestor_note; ?>"><span class="label label-default">View details</span></a>  </td>
                    </tr>
                    <?php $count++; } ?>
                  </tbody>
                </table>
            </div>
          </div>
        </div>
        <div id="declined" class="tab-pane fade">
          <div class="col-lg-12">
            <div class="table-responsive" style="padding-bottom:5em;">
                <table id='datatables2' class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th></th>
                      <th>User ID No.</th>
                      <th>Accepted By</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $count=1; foreach($declined as $dec){?>
                    <tr>
                      <td><?php echo $count;?></td>
                      <td><?php echo $dec->user_no;?></td>
                      <td><?php echo date('F j, Y',strtotime($dec->date_submitted))?></td>
                      <td><a href="#viewreqapproved" data-toggle="modal" data-reqid="<?php echo $dec->request_id; ?>" data-userid="<?php echo $dec->user_id; ?>" data-name="<?php echo $dec->fname.' '.$dec->mname.' '.$dec->lname; ?>" data-datesubmitted="<?php echo date('F j, Y - g:i a',strtotime($dec->date_submitted)); ?>" data-sched="<?php echo date('g:i a',strtotime($dec->time_from)).' - '.date('g:i a',strtotime($dec->time_to)); ?>" data-date="<?php echo date('F j, Y',strtotime($dec->date)); ?>" data-status="<?php echo $dec->status; ?>" data-note="<?php echo $dec->requestor_note; ?>" data-response="<?php echo $dec->request_response; ?>" data-accepted="<?php echo $dec->accepted_by; ?>"><span class="label label-default">View details</span></a>  </td>
                    </tr>
                    <?php $count++; } ?>
                  </tbody>
                </table>
            </div>
          </div>
        </div>
        <div id="approved" class="tab-pane fade">
          <div class="col-lg-12">
            <div class="table-responsive" style="padding-bottom:5em;">
                <table id='datatables3' class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th></th>
                      <th>User ID No.</th>
                      <th>Accepted By</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $count=1; foreach($approved as $app){?>
                    <tr>
                      <td><?php echo $count;?></td>
                      <td><?php echo $app->user_no;?></td>
                      <td><?php echo date('F j, Y',strtotime($app->date_submitted))?></td>
                      <td><a href="#viewreqapproved" data-toggle="modal" data-reqid="<?php echo $app->request_id; ?>" data-userid="<?php echo $app->user_id; ?>" data-name="<?php echo $app->fname.' '.$app->mname.' '.$app->lname; ?>" data-datesubmitted="<?php echo date('F j, Y - g:i a',strtotime($app->date_submitted)); ?>" data-sched="<?php echo date('g:i a',strtotime($app->time_from)).' - '.date('g:i a',strtotime($app->time_to)); ?>" data-date="<?php echo date('F j, Y',strtotime($app->date)); ?>" data-status="<?php echo $app->status; ?>" data-note="<?php echo $app->requestor_note; ?>" data-response="<?php echo $app->request_response; ?>" data-accepted="<?php echo $app->accepted_by; ?>"><span class="label label-default">View details</span></a>  </td>
                    </tr>
                    <?php $count++; } ?>
                  </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->
<div class="modal fade" id="viewrequest" tabindex="-1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">View/Update Pending Request!</h4>
      </div>
      <form method="POST" class="form-horizontal" action="<?php echo base_url();?>InstructorController/updateRequest">
      <div class="modal-body ">
        <div class="form-group form-group-sm">
          <label class="col-sm-3 control-label">Full Name : </label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name='name' readonly>
          </div>
        </div>
        <div class="form-group form-group-sm">
          <label class="col-sm-3 control-label">Requestor Note : </label>
          <div class="col-sm-8">
            <textarea class="form-control" id="note" name="requestor_note"></textarea>
          </div>
        </div>
        <div class="form-group form-group-sm">
          <label class="col-sm-3 control-label">Request Submitted : </label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name='date_submitted' readonly>
          </div>
        </div>
        <div class="form-group form-group-sm">
          <label class="col-sm-3 control-label">Schedule Time: </label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name='sched' readonly>
          </div>
        </div>
        <div class="form-group form-group-sm">
          <label class="col-sm-3 control-label">Date Present : </label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name='date' readonly>
          </div>
        </div>
        <div class="form-group form-group-sm">
          <label class="col-sm-3 control-label">Status : </label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name='status' readonly>
          </div>
        </div>
        <div class="form-group form-group-sm text-center">
            <input type="hidden" name='request_id' >
            
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

<div class="modal fade" id="viewreqapproved" tabindex="-1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">View Request!</h4>
      </div>
      <div class="modal-body form-horizontal">
        <div class="form-group form-group-sm">
          <label class="col-sm-3 control-label">Full Name : </label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name='name' readonly>
          </div>
        </div>
        <div class="form-group form-group-sm">
          <label class="col-sm-3 control-label">Requestor Note : </label>
          <div class="col-sm-8">
            <textarea class="form-control" id="note2" readonly></textarea>
          </div>
        </div>
        <div class="form-group form-group-sm">
          <label class="col-sm-3 control-label">Request Submitted : </label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name='date_submitted' readonly>
          </div>
        </div>
        <div class="form-group form-group-sm">
          <label class="col-sm-3 control-label">Schedule Time: </label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name='sched' readonly>
          </div>
        </div>
        <div class="form-group form-group-sm">
          <label class="col-sm-3 control-label">Date Present : </label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name='date' readonly>
          </div>
        </div>
        <div class="form-group form-group-sm">
          <label class="col-sm-3 control-label">Status : </label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name='status' readonly>
          </div>
        </div>
        <hr>
        <div class="form-group form-group-sm">
          <label class="col-sm-3 control-label">Validated by: </label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name='accepted_by' readonly>
          </div>
        </div>
        <div class="form-group form-group-sm">
          <label class="col-sm-3 control-label">Request Response : </label>
          <div class="col-sm-8">
            <textarea class="form-control" id="response" readonly></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>