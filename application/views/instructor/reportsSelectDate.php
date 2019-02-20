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
                  <i class="fa fa-file-text-o"></i> Reports
              </li>
          </ol>
      </div>
    </div>
    <div class="row">
      <div class="centerFontBig"><b>Select date to proceed:</b></div>
      <div class="col-lg-6 col-md-offset-3">
        <div class="table-responsive">
          <form method="get" action="<?php echo base_url();?>InstructorController/reportsList">
          <table class="table table-bordered" id="dataTable" cellspacing="0">
            <thead>
               <tr>
                <th>Date From</th>
                <th>Date To</th>
              </tr>
            </thead>
            <tbody>
              
              <tr>
                <td>
                  <input type="date" class="form-control" required name="date_from">
                </td>
                <td>
                  <input type="date" class="form-control" required name="date_to">
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
