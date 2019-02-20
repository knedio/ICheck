<div class="container-fluid">

    <!-- Page Heading -->
  <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
          Schedule
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> Dashboard
            </li>
            <li class="active">
                <i class="fa fa-fw fa-user"></i> Schedule
            </li>
        </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-8 col-md-offset-2">
      <div class="table-responsive">
        <form method="get" action="<?php echo base_url();?>InstructorController/scheduleLists/">
        <table class="table table-striped table-bordered" id="dataTable" cellspacing="0">
          <thead>
             <tr>
              <th>School Year </th>
              <th>Semester </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <select class="form-control" name='sy' required>
                  <?php foreach ($schoolyear as $sy):?>
                  <option value="<?php echo $sy->SY_from.'-'.$sy->SY_to;?>"><?php echo $sy->SY_from.' - '.$sy->SY_to;?></option>
                  <?php endforeach;?>
                </select>
              </td>
              <td>
                <select class="form-control" name='semester' required>
                  <?php foreach ($semester as $sem):?>
                  <option value="<?php echo $sem;?>"><?php echo $sem.' Semester';?></option>
                  <?php endforeach;?>
                </select>
              </td>
            </tr>
          </tbody>
        </table>
        <button style="margin-left: 40%;" type="submit" class="btn btn-primary">Proceed</button>
        </form>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->