<!DOCTYPE html>
<html>
  <head>
  <title>laporan</title>
  </head>
  <style type="text/css">
      #contoh1 {
        background: url(assets/image/certifikat1.png);
        background-repeat: no-repeat;
        background-size: 100% 100%;
        color: #585858; 

        }

      #ttd {
          background-image:  base_url('ttd.png');
          background-repeat: no-repeat;
          background-size: 100px 100px;
          color: #585858; 
        }

  </style>
  <?php
   $cer = $data->result();
   $name = 'no data';
   $date = 'no date';
   $ojt_name = 'no ojt name';
   
   foreach ($cer as $vie ) {
    $name = $vie->user_id;
    $date = $vie->eval_date;
    $ojt_name = $vie->remark;

  ?>
  <body>
    <div id="contoh1" style="width: 100%; height: 100%;">
        <h1 style="padding-top: 300px; text-align: center; font-size: 60px"><?= $name ?></h1>
        <h1 style="text-align: center; padding-top: 60px; "><?= $ojt_name ?></h1>
        <h3 style="padding-top: 113px; padding-left: 120px;" ><?=  date('d F Y', strtotime( $date)) ?></h3>
        <img src="<?= base_url().'/assets/image/TTD-Pak-Dzuhri-biru.png' ?>" style="width: 100px; height: 100px; padding-left: 900px; padding-top: -50px">
    </div>
  </body>
  <?php 
    break;
  }

  ?>
</html>