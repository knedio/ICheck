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
        <?php if (!empty($date)) { ?>
          <div class="centerFontBig">
            <?php echo '<strong>Date</strong> : '.date('F j, Y - l',strtotime($date)); ?>
          </div>
          <hr>
        <?php } ?>
        <div class="col-lg-12">
          <div class="" style="padding-bottom:5em;">
              <table id='datatables' class="display" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th>Schedule Time</th>
                          <th>Time In/Out</th>
                          <th>School Year</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($lists as $list) { ?>
                    <tr>
                      <td><?php echo $list->time_from.' - '.$list->time_to; ?></td>
                      <td><?php echo $list->time_in.' - '.$list->time_out; ?></td>
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
