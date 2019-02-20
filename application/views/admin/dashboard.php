<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Dashboard <small>Statistics Overview</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

      <!-- /.row -->

    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-building-o fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $totalDepartment; ?></div>
                            <div>Departments</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url();?>AdminController/other#department">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $totalInstructor; ?></div>
                            <div>Registered Instructor</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url();?>AdminController/user/#instructor">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user-plus fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $totalCurActInstructor; ?></div>
                            <div>Currently Active</div>
                            <div>Instructor Today</div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <span class="pull-left">View Details Below</span>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> List of Active Instructor Today</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive" style="max-height: 220px;">
                        <table class="table table-bordered table-hover table-striped" >
                            <thead>
                                <tr>
                                    <th><center>Instructor's Name</center></th>
                                    <th>Building & Room</th>
                                    <th>Schedule Time</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($activeIns as $list) { ?>
                                <tr>
                                    <td><?php echo $list->fname . ' ' . $list->mname . ' ' . $list->lname;?></td>
                                    <td><?php echo 'Bldg. '.$list->bldg_no.' - Rm. '.$list->room_no; ?></td>
                                    <td><?php echo date("g:i a", strtotime($list->time_from)).' - '.date("g:i a", strtotime($list->time_to)); ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> List of Late Instructor's Today</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive" style="max-height: 220px;">
                        <table class="table table-bordered table-hover table-striped" >
                            <thead>
                                <tr>
                                    <th><center>Instructor's Name</center></th>
                                    <th>Building & Room</th>
                                    <th>Schedule Time</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($lates as $list) { ?>
                                <tr>
                                    <td><?php echo $list->fname . ' ' . $list->mname . ' ' . $list->lname;?></td>
                                    <td><?php echo 'Bldg. '.$list->bldg_no.' - Rm. '.$list->room_no; ?></td>
                                    <td><?php echo date("g:i a", strtotime($list->time_from)).' - '.date("g:i a", strtotime($list->time_to)); ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> List of Absent Instructor's Today</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive" style="max-height: 220px;">
                        <table class="table table-bordered table-hover table-striped" >
                            <thead>
                                <tr>
                                    <th><center>Instructor's Name</center></th>
                                    <th>Building & Room</th>
                                    <th>Schedule Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($absents as $list) { ?>
                                <tr>
                                    <td><?php echo $list->fname . ' ' . $list->mname . ' ' . $list->lname;?></td>
                                    <td><?php echo 'Bldg. '.$list->bldg_no.' - Rm. '.$list->room_no; ?></td>
                                    <td><?php echo date("g:i a", strtotime($list->time_from)).' - '.date("g:i a", strtotime($list->time_to)); ?></td>
                                </tr>
                            <?php } ?>
                            </tbody >
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->