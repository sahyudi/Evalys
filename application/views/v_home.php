<?php include $_SERVER['DOCUMENT_ROOT']."/hr_program/evalys/application/views/template/head.php"; ?>
<!DOCTYPE html>
<html>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<title>Home</title>
  <div class="content-wrapper">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">myLicence</h3>
          </div>
          <div class="box-body">
            <div style="text-align: left;">
              <button type="button" class="btn btn-info " data-toggle="modal" id="button_sio" onclick="reset_form();">Reset</button>
            </div><br>


            <form id="form_sio" validate="true">
              <select class="form-control select2" id="nik" name="nik" style="width: 100%;">
                <option selected="selected" value=""> NIK </option>
                  <?php 
                    foreach ($user->result() as $user2) {
                      echo '<option value="'.$user2->id.'">'.$user2->nik.' &nbsp;&nbsp; '.$user2->name.'</option>';
                    }
                  ?>
              </select>
              
              <div id="sio">  
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php include $_SERVER['DOCUMENT_ROOT']."/hr_program/evalys/application/views/template/footer.php"; ?>


<script> 
  $(document).ready(function(){
    $(".select2").select2();
    $(".select2").prop('tabIndex', 0);

    // Setup - add a text input to each footer cell
    $('#table1 thead th').each( function(){
        var title = $(this).text();
        if(title!="Actions" && title!="NO"){
          $(this).prepend( '<input type="text" style="min-width: 110px; max-width: 110px;" placeholder="Search" /> <br>');
        }
    });
 

    var table = $('#table1').DataTable({
      'ordering'    : false
    });
 
    table.columns().every(function(){
        var that = this;
        $('input',this.header()).on('keyup change',function(){
          if(that.search() !== this.value ) {
              that.search( this.value ).draw();
          }
        });
    });
    $('#table1_filter').hide();
  });

  $('#nik').on("change", function(){
    var id_user = $('select[name=nik]').val();

    // alert(id);
    var _url = "<?= site_url('/sio/view') ?>";

    if($('[name="nik"]').val()!="") {
        $.ajax({
        url: _url,
        type: "POST",
        data: {"id_user":id_user},
          success: function(a){
            $('#sio').html(a);
          }
        });
    }
    else{
    } 
      
  });

  function reset_form(){
    $('#sio').html('');
    $('#nik').val("").trigger("change"); 


  }
</script>
</body>
</html>
