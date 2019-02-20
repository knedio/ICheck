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
                  <th>Building & Room</th>
                  <th>Section</th>
                  <th>Schedule Time</th>
                  <th>Day</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($scheds as $sched) {?>
                <tr>
                  <td><?php echo "Bldg. ".$sched->bldg_no." - Rm. ".$sched->room_no ;?></td>
                  <td><?php echo $sched->section ;?></td>
                  <td><?php echo date("g:i a", strtotime($sched->time_from)).' - '.date("g:i a", strtotime($sched->time_to));?></td>
                  <td><?php echo $sched->day; ?></td>
                </tr>
                <?php } ?>
              </tbody>
          </table>
      </div>
    </div>
  </div>

</div>