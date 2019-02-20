<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <b>Time Log Lists</b>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> Dashboard
                </li>
                <li class="active">
                    <i class="fa fa-hourglass-start"></i> Time Log Lists
                </li>
            </ol>
        </div>
         <?php if (!empty($lists)) { ?>
          <div class="centerFontBig">
            <?php echo '<strong>Name : </strong>'.$lists[0]->fname . ' ' . $lists[0]->mname . ' ' . $lists[0]->lname; ?><br>
            <?php echo '<strong>Date</strong> : '.date('F j, Y - l',strtotime($lists[0]->date)); ?><br>
            <?php echo '<strong>School Year</strong> : '.$lists[0]->SY_from.' - '.$lists[0]->SY_to; ?>
          </div>
          <hr>
        <?php } ?>
        <div class="col-lg-12">
          <div class="table-responsive" style="padding-bottom:5em;">
              <table id='datatables' class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th>Schedule Time</th>
                          <th>Time In</th>
                          <th>Time Out</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($lists as $list) { ?>
                    <tr>
                      <td><?php echo date("g:i a", strtotime($list->time_from)).' - '.date("g:i a", strtotime($list->time_to)); ?></td>
                      <td><?php if (!empty($list->time_in)) {echo date("g:i a", strtotime($list->time_in));} ?></td>
                      <td><?php if (!empty($list->time_out)) { echo date("g:i a", strtotime($list->time_out));} ?></td>
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
<script>
setTimeout(function(){
   window.location.reload(1);
}, 60000);
</script>