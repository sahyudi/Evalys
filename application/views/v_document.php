<?php include $_SERVER['DOCUMENT_ROOT']."/hr_program/evalys/application/views/template/head.php"; ?>
<!DOCTYPE html>
<html>
<title>Evaluation Form</title>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> PT Citra Tubindo Tbk,
            <!-- <small class="pull-right">Date: 2/10/2014</small> -->
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <?php 
                $test = $view->result();
       ?>
      <div class="row invoice-info">
            <?php 
              foreach ($test as $test ) {
            ?>
          <center>
            <h2 class="page-header">EVALUATION LEVEL 4
            </h2>
          </center>
        <div class="col-xs-12">
          <div class="form-group">
            <label class="col-sm-2">Name</label>
            <div class="col-sm-10">
             <?= $test->name ?> 
            </div>
          </div>
          <br>
              <?php  break; } ?>
          <div class="form-group">
            <label class="col-sm-2">NIK</label>
            <div class="col-sm-10">
              <?= $test->nik ?>
            </div>
          </div>
          <br>

          <div class="form-group">
            <label class="col-sm-2">DEPT</label>
            <div class="col-sm-10">
              <?= $test->dept ?>  
            </div>
          </div>
          <br>

          <div class="form-group">
            <label class="col-sm-2">Competency</label>
            <div class="col-sm-10">
              <b><?= $test->_name ?></b>
            </div>
          </div>
          <br>

          <div class="form-group">
            <label class="col-sm-2">OJT Date</label>
            <div class="col-sm-10">
              <?=date('d M Y', strtotime( $test->ojt_date)) ?>
            </div>
          </div>
          <br>

          <div class="form-group">
            <label class="col-sm-2">Evaluation Date</label>
            <div class="col-sm-10">
              <?=date('d M Y', strtotime( $test->eval_date)) ?>
            </div>
          </div>
        </div>
      </div>
      <br>
      <br>   

      <div class="row">
        <div class="col-xs-12 table-responsive table-responsive table-striped">
          <table class="table table-striped">
            <thead>
            <tr>
              <th style="width: 10px;">No</th>
              <th>Peformance Criteria</th>
              <th>Status</th>
              <th>Remark</th>
            </tr>
            </thead>
            <tbody>
                    <?php
                      $no = 0;
                      $test = $view->result();
                      $_akhir = 0;  
                      foreach ($test as $view){           
                        $no ++;
                        if ( $view->value == 1){
                              $nilai = "PASSED";

                            }elseif ($view->value == 0) {
                              $nilai = "FAILED";
                            }
                    ?>
              <tr>
                <td><?= $no ?></td>
                <td><?= $view->quest?></td>
                <td><b><?= $nilai ?></b> </td>
                <td><?= $view->remark ?></td>
              </tr>
                    <?php
                      } 
                    ?>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>

      <div class="row">
        <div class="rol-xs-12">
          <h3><b>Result</b></h3>
          <div style="border: 0.5px solid #c6c6ce ; padding: 5px;">
           <?= $view->hasil ?>
          </div>
        </div>

        <div class="col-xs-12">
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th>Assessee :</th>
                <th>Assessor :</th>
                <th>Acknowledged by :</th>
              </tr>

              <tr>
                <td>
                  <img class="profile-user-img img-responsive img-shape" src="<?php echo base_url().'avatar5.png' ?>" alt="User profile picture">
                  <h5 class="profile-username text-center"><?= $view->name ?></h5>
                  <p class="text-muted text-center">Software Engineer</p>
                </td>
                <td>
                  <img class="profile-user-img img-responsive img-shape" src="<?php echo base_url().'avatar5.png' ?>" alt="User profile picture">
                  <h5 class="profile-username text-center"><?= $view->assessor ?></h5>
                  <p class="text-muted text-center">Software Engineer</p>
                </td>
                <td>
                  <img class="profile-user-img img-responsive img-shape" src="<?php echo base_url().'avatar5.png' ?>">
                  <h5 class="profile-username text-center"><?= $view->acknowledge ?></h5>
                  <p class="text-muted text-center">Software Engineer</p>
                </td>

              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
        </div>
      </div>
    </section>
  </div>


<!-- page script -->


<script>

</script>
</body>
</html>
