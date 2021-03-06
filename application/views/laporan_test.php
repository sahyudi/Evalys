<!DOCTYPE html>
<html style="width:794px; height:1122px">
  <head>
  <title>laporan</title>
  </head>
  <style>
    .center {
          display: block;
          margin-left: auto;
          margin-right: auto;
          width: 2cm;
          height: 2.5cm;
        }
        .ce {color:green;text-shadow: 0px 1px 3px #555; font-weight:bold;}
        .headtable {color :white ; background : #99CC33; font-size:12px; text-shadow: 0px 1px 3px #e6e7e8; font-weight:bold;}
        .row1 {color : grey; background : #f4faff; font-size:12px}
        .row2 {color : grey; background : #f4fff5; font-size:12px;}
        .row3 {color : grey; font-size:12px; font-weight:bold;}
        .contents {color : black; font-size:18px; }
        
        @page {
            /*update page*/
            /*margin: 1.5cm;*/
            margin-left: 0.75cm;
            margin-right: 0.75cm;
            margin-top: 0.5cm;
            margin-bottom: 0.5cm; 
        }

        body {
            margin-left: 0.25cm;
            margin-right: 0.25cm;
            margin-top: 0.25cm;
            margin-bottom: 0.25cm; 
            text-align: justify;
        }

        #header,
        #footer {
            position: fixed;
            left: 0;
            right: 0;
            color: #aaa;
            font-size: 0.9em;
        }

        #header {
            position: relative; /*only use for header on first page*/
            top: 0;
            /*border-bottom: 0.1pt solid #aaa; use for under line in bottom title*/
        }

        #footer {
            position: relative; /*only use for footer on last page*/
            bottom: 0;
            /*border-top: 0.1pt solid #aaa; use for under line in top title*/
        }

        #header table,
        #footer table {
            width: 100%;
            border-collapse: collapse;
            border: none;
        }

        #header td,
        #footer td {
          padding: 0;
            width: 50%;
        }

        .page-number {
          text-align: center;
        }

        .page-number:before {
          content: 'Page ' counter(page);
        }

        hr {
          page-break-after: always;
          border: 0;
          padding-top: 200px;
        }
  </style>
  <body>
      

    <h2>PT Citra Tubindo Tbk,</h2>
              
    <?php 
      $test = $view->result();
      foreach ($test as $ts ) {
    ?>
    <center>
      <h2 style="text-align: center; padding-top: 0px">EVALUATION LEVEL 4</h2>
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
            <h3 style="text-align: left; padding-left: 5px;"> Assessee :</h3> <br>
            <img class="center" class="center" src="<?php echo base_url().'avatar5.png' ?>" >
            <h4 style="text-align: center;">Nama Asesi</h4>
          </td>
          <td>
            <h3 style="text-align: left; padding-left: 5px;"> Assessor  :</h3> <br>
            <img class="center" src="<?php echo base_url().'avatar5.png' ?>">
            <h4 style="text-align: center;">test</h4>
            <!-- <?= $view->assessor ?> -->
            <!-- <?= $view->acknowledge ?> -->
          </td>
          <td>
            <h3 style="text-align: left; padding-left: 5px;"> Acknowledge By  :</h3> <br>
            <img class="center" src="<?php echo base_url().'avatar5.png' ?>">
            <h4 style="text-align: center;">test</h4>
          </td>

        </tr>
      </table>

  </body>
</html>