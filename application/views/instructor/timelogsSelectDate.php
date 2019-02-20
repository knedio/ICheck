<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
          <h1 class="page-header">
            Time Logs
          </h1>
          <ol class="breadcrumb">
              <li>
                  <i class="fa fa-dashboard"></i> Dashboard
              </li>
              <li class="active">
                  <i class="fa fa-file-text-o"></i> Time Logs
              </li>
          </ol>
      </div>
    </div>
    <div class="row">
      <div class="centerFontBig"><b>Select date to proceed:</b></div>
      <div class="col-lg-4 col-md-offset-4">
        <div class="table-responsive">
          <form method="get" action="<?php echo base_url();?>InstructorController/timeLogsList">
          <table class="table table-bordered" id="dataTable" cellspacing="0">
            <thead>
               <tr>
                <th><center>Date</center></th>
              </tr>
            </thead>
            <tbody>
              
              <tr>
                <td>
                  <input type="date" class="form-control" required name="date">
                </td>
              </tr>
            </tbody>
          </table>
          <button style="margin-left: 40%;" type="submit" class="btn btn-primary">Proceed</button>
          </form>
        </div>
      </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->
