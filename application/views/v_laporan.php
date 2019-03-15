<!DOCTYPE html>
<html style="width:794px; height:1122px">
  <head>
  <title>laporan</title>
  </head>
  <style type="text/css">
    .center {
              display: block;
              margin-left: auto;
              margin-right: auto;
              width: 2cm;
              height: 3cm;
            }
      body {
              background: rgb(204,204,204); 
          }
          page {
            background: white;
            display: block;
            /*margin: 0 auto;*/
            /*margin-bottom: 0.5cm;*/
            box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
          }
          page[size="A4"] {  
            width: 21cm;
            height: 29.7cm; 
            padding-left: 3cm;
            padding-right: 3cm;
            padding-top: 0.5cm;
            padding-bottom: 0.5cm;
          }

          div.chapter, div.appendix {
              page-break-after: always;
          }
  </style>
  <page size="A4" >
  <body>
      

    <h2>PT Citra Tubindo Tbk,</h2>
              
    <?php 
      $test = $view->result();
      foreach ($test as $ts ) {
    ?>
    <center>
      <h2>EVALUATION LEVEL 4</h2>
    </center>
    <table>
      <div style="font-size: 20px;">
        <tr>
          <td width="200" >Name</td>
          <td>:</td>
          <td style="padding: 5px;" ><b>Nama</b></td>
        </tr>

        <tr>
          <td width="200">NIK</td>
          <td>:</td>
          <td style="padding: 5px;" ><?= $ts->user_id ?></td>
        </tr>

        <tr>
          <td width="200">Dept</td>
          <td>:</td>
          <td style="padding: 5px;" >Nama Dept</td>
        </tr>

        <tr>
          <td width="200">Competency</td>
          <td>:</td>
          <td style="padding: 5px;" ><b><?= $ts->ojt_name ?></b></td>
        </tr>

        <tr>
          <td width="200">OJT Date</td>
          <td>:</td>
          <td style="padding: 5px;" ><?=date('d M Y', strtotime( $ts->ojt_date)) ?></td>
        </tr>

        <tr>
          <td width="200">Evaluation Date</td>
          <td>:</td>
          <td style="padding: 5px;" ><?=date('d M Y', strtotime( $ts->eval_date)) ?></td>
        </tr>
      </div>
    </table>
     
    <?php  break; } ?>

    <br>
    <br>   
      <table style="border:1px solid black; width: 100%; border-collapse: collapse;" border="1">
        <thead>
          <tr>
            <th style="padding:3px; width: 3%; text-align: center;">NO</th>
            <th style="padding:3px; width: 67%;">Competency Units</th>
            <th style="padding:3px; width: 10%;">Status</th>
            <th style="padding:3px; width: 20;">Remark</th>
          </tr>
        </thead>
      <tbody>
              <?php
                $no = 1;  
                foreach ($test as $view){
                  if ( $view->value == 1){
                        $nilai = "PASSED";
                      }elseif ($view->value == 0) {
                        $nilai = "FAILED";
                      }
                      
              ?>
        <tr>
          <td style="padding:3px; text-align: center;"><?= $no ?></td>
          <td style="padding:3px; padding-left: 5px;"><?= $view->crie ?></td>
          <td style="padding:3px; text-align: center;"><b> <?= $nilai ?></b> </td>
          <td style="padding:3px; padding-left: 5px;"><?= $view->remark ?></td>
        </tr>
              <?php
               $no ++;  
             } 
              ?>
      </tbody>
      </table>

      <h3><b>Result</b></h3>
        <div style="border: 0.5px solid #c6c6ce ; padding: 5px;">
          <!-- <?= $view->hasil ?> -->
          hasil
        </div>
    <br>
               
      <!-- /*<table style="border:1px solid black; width: 100%; border-collapse: collapse;" border="1">*/ -->
      <table style="border:0.5px solid #c6c6ce; width: 100%; border-collapse: collapse;" border="0.5">
        <!-- <tr>
          <th style="font-size: 18px; text-align: left;">Assessor :</th>
          <th style="font-size: 18px; text-align: left;">Acknowledge By :</th>
        </tr> -->

        <tr>
          <td>
            <h3 style="text-align: left; padding-left: 5px;"> Assessee :</h3>

            <img class="center" class="center" src="<?php echo base_url().'avatar5.png' ?>" >
            <h4 style="text-align: center;">Nama Asesi</h4>
          </td>
          <td>
            <h3 style="text-align: left; padding-left: 5px;"> Assessor  :</h3>
            <img class="center" src="<?php echo base_url().'avatar5.png' ?>">
            <h4 style="text-align: center;">test</h4>
            <!-- <?= $view->assessor ?> -->
            <!-- <?= $view->acknowledge ?> -->
          </td>
          <td>
            <h3 style="text-align: left; padding-left: 5px;"> Acknowledge By  :</h3>
            <img class="center" src="<?php echo base_url().'avatar5.png' ?>">
            <h4 style="text-align: center;">test</h4>
          </td>

        </tr>
      </table>

  </body>
  </page>
</html>