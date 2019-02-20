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
        <hr>
        <div>
          <div class="col-lg-12">
            <div class="table-responsive">
              <form method="get" action="<?php echo base_url();?>AdminController/reportsList">
              <table class="table table-striped table-bordered" id="dataTable" cellspacing="0">
                <thead>
                   <tr>
                    <th>Full Name</th>
                    <th>Date From</th>
                    <th>Date To</th>
                    <th>School Year</th>
                    <th>Semester</th>
                  </tr>
                </thead>
                <tbody>
                  
                  <tr>
                    <td>
                      <select class="form-control" name='user_id' required>
                        <?php foreach ($users as $user):?>
                          <option value="<?php echo $user->user_id ;?>"><?php echo $user->fname . ' ' . $user->mname . ' ' . $user->lname;?></option>
                        <?php endforeach;?>
                      </select>
                    </td>
                    <td>
                      <input type="date" class="form-control" required name="date_from">
                    </td>
                    <td>
                      <input type="date" class="form-control" required name="date_to">
                    </td>
                    <td>
                      <select name='sy' class="form-control" required>
                        <?php foreach ($SY as $sy):?>
                          <option value="<?php echo $sy->SY_from.' - '.$sy->SY_to ;?>"><?php echo $sy->SY_from.' - '.$sy->SY_to ;?></option>
                        <?php endforeach;?>
                      </select>
                    </td>
                    <td>
                      <select class="form-control" name='semester' required>
                        <?php foreach ($semester as $sem):?>
                        <option value="<?php echo $sem ;?>"><?php echo $sem; ?></option>
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
    <!-- /.row -->

</div>
<!-- /.container-fluid -->
