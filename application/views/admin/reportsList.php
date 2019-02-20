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
        <div class="col-lg-12">
          <div class="table-responsive" style="padding-bottom:5em;">
              <table id='datatables2' class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th>Full Name</th>
                          <th>Hrs. Work(hr:min:sec)</th>
                          <th>Status</th>
                          <th>Schedule Time</th>
                          <th>Date</th>
                          <th>School Year</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($lists as $list) { ?>
                    <tr>
                      <td><?php echo $list->fname . ' ' . $list->mname . ' ' . $list->lname;?></td>
                      <td><?php echo $list->hrswork; ?></td>
                      <td><?php echo $list->status; ?></td>
                      <td><?php echo date("g:i a", strtotime($list->time_from)).' - '.date("g:i a", strtotime($list->time_to)); ?></td>
                      <td><?php echo date('F j, Y, l',strtotime($list->date)); ?></td>
                      <td><?php echo $list->SY_from.' - '.$list->SY_to; ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
              </table>
          </div>
        </div>
      </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->
