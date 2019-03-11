<!DOCTYPE html>
<html>
  <head>
  <title>laporan</title>
  </head>
  <style type="text/css">
 

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
            height: 21cm;
            width: 29.7cm; 
          }

        /* Container holding the image and the text */
          .container {
            position: relative;
            text-align: center;
            color: black;
          }

          /* Bottom left text */
          .bottom-left {
            position: absolute;
            bottom: 8px;
            left: 16px;
          }

          /* Top left text */
          .top-left {
            position: absolute;
            top: 8px;
            left: 16px;
          }

          /* Top right text */
          .top-right {
            position: absolute;
            top: 8px;
            right: 16px;
          }

          /* Bottom right text */
          .bottom-right {
            position: absolute;
            bottom: 8px;
            right: 16px;
          }

          /* Centered text */
          .centered {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
          }
  </style>
  <page size="A4" >
  <body>
    <div class="container">
      <img src="<?= base_url().'assets/image/certifikat1.png' ?>" alt="Snow" style="width: 100%; height: 100%">  
      <div class="bottom-left">Bottom Left</div>
      <div class="top-left">Top Left</div>
      <div class="top-right">Top Right</div>
      <div class="bottom-right">Bottom Right</div>
      <div class="centered">Centered</div>
    <div>
      
    </div>
  </body>
  </page>
</html>