<!DOCTYPE HTML>

<html>
<head>
	<title>Multiple Upload</title>


<link rel="stylesheet" href="<?= base_url().'assets/bower_components/bootstrap/dist/css/bootstrap.min.css' ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dropzone/dropzone.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dropzone/basic.min.css') ?>">



<style type="text/css">

body{
	background-color: #E8E9EC;
}

.dropzone {
	margin-top: 100px;
	border: 2px dashed #0087F7;
}

</style>

</head>
<body>


<div class="dropzone">

  <div class="dz-message">
   <h3> Klik atau Drop gambar disini</h3>
  </div>

</div>


<script src="<?php echo base_url().'assets/bower_components/jquery/dist/jquery.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/dropzone/dropzone.min.js') ?>"></script>
<script type="text/javascript">

Dropzone.autoDiscover = false;

	var foto_upload= new Dropzone(".dropzone",{
	url: "<?php echo site_url('test-upload') ?>",
	maxFilesize: 2,
	method:"post",
	acceptedFiles:"image/*",
	paramName:"userfile",
	dictInvalidFileType:"Type file ini tidak dizinkan",
	addRemoveLinks:true,
	});


//Event ketika Memulai mengupload
foto_upload.on("sending",function(a,b,c){
	a.token=Math.random();
	c.append("token_foto",a.token); //Menmpersiapkan token untuk masing masing foto
});
</script>

</body>
</html>