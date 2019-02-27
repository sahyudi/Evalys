
<!DOCTYPE html>
<html>
<head>
    <title>Upload dan resize image</title>
</head>
<body>
<div class="content-wrapper">

<section class="content">
<div class="row">
  <div class="col-md-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">OJT Form</h3>
      </div>
      <form action="<?php echo site_url('/upload')?>" method="POST" validate="true" enctype="multipart/form-data">
        <input type="hidden" name="end_id" value="1">
        <input type="file" name="attachment">
        <!-- <input type="file" name=""> -->
        <button type="submit">Upload</button>
    </form>
    </div>          
  </div>
</div>
</section>
</body>
</html>