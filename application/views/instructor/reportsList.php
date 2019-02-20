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
                    <i class="fa fa-file-text-o"></i> Report Lists
                </li>
            </ol>
        </div> 
        <?php if (!empty($date_from)) { ?>
          <div class="centerFontBig">
            <?php echo '<strong>Date from : </strong> '.date('F j, Y - l',strtotime($date_from)).'<br><strong>Date to : </strong> '.date('F j, Y - l',strtotime($date_to)); ?>
          </div>
          <hr>
        <?php } ?>
        <div class="col-lg-12">
          <div class="table-responsive" style="padding-bottom:5em;">
              <table id='datatables' class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                      <tr >
                          <th></th>
                          <th>User No.</th>
                          <th>Hrs. Work(hr:min:sec)</th>
                          <th>Date</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php $count = 1; foreach ($lists as $list) { ?>
                    <tr>
                      <td><?php echo $count; ?></td>
                      <td><?php echo $list->user_no; ?></td>
                      <td><?php echo $list->hrswork_perday; ?></td>
                      <td><?php echo date('F j, Y - l',strtotime($list->date)); ?></td>
                      <td><a href="<?php echo base_url()."InstructorController/reportsListIndividual/".$list->user_id.'/'.$list->date;?>" ><span class="label label-default">View More</span></a>  </td>
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
