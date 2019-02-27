<?php include $_SERVER['DOCUMENT_ROOT']."/hr_program/evalys/application/views/template/head.php"; ?>
<!DOCTYPE html>
<html>
<title>Evaluation Form</title>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>
    
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Evaluation Form</h3>
            </div>
            <form class="form-horizontal" id="form_tampil_data" method="POST">
              <div class="box-body">

                <div class="form-group">
                  <label class="col-sm-3">NIK</label>

                  <div class="col-sm-9">
                    <select class="form-control select2" id="nik" name="nik" style="width: 100%;">
                      <option selected="selected" value=""> NIK </option>
                        <?php 
                          foreach ($user->result() as $user2) {
                            echo '<option value="'.$user2->id.'">'.$user2->nik.' &nbsp;&nbsp; '.$user2->name.'</option>';
                          }
                        ?>
                    </select>
                  </div>
                </div>

                <div class="form-group hide1">
                  <label class="col-sm-3">Name</label>

                  <div class="col-sm-9">
                    <input type="text" id="nama" name="nama" class="form-control" id="inputPassword3" disabled="true">
                  </div>
                </div>

                <div class="form-group hide1">
                  <label class="col-sm-3">Departement</label>

                  <div class="col-sm-9">
                    <input type="text" id="dept" name="dept" class="form-control" id="inputPassword3" disabled="true">
                  </div>
                </div>

                <div class="form-group hide1">
                  <label class="col-sm-3">Assessor</label>

                  <div class="col-sm-9">
                    <select class="form-control select2" id="asse" name="asse" style="width: 100%;">
                      <option selected="selected" value=""> Assessor </option>
                        <?php
                              foreach ($user->result() as $asse) {
                            echo '<option value="'.$asse->name.'">'.$asse->nik.' &nbsp;&nbsp; '.$asse->name.'</option>';
                            }
                        ?>
                    </select>
                  </div>
                </div>

                <div class="form-group hide1">
                  <label class="col-sm-3">Acknowledged by</label>

                  <div class="col-sm-9">
                    <select class="form-control select2" id="acknowledge" name="acknowledge" style="width: 100%;">
                      <option selected="selected" value=""> Acknowledged by </option>
                        <?php 
                          foreach ($user->result() as $user3) {
                            echo '<option value="'.$user3->name.'">'.$user3->nik.' &nbsp;&nbsp; '.$user3->name.'</option>';
                          }
                        ?>
                    </select>
                  </div>
                </div>

                <div class="form-group hide1">
                  <label class="col-sm-3 ">OJT Date</label>
                  <div class="col-sm-9">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="datepicker" autocomplete="off">
                    </div>
                  </div>
                </div>

                <div class="form-group hide1">
                  <label class="col-sm-3">Evaluation Date</label>
                  <div class="col-sm-9">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="datepicker1" autocomplete="off">
                    </div>
                  </div>
                </div>

                <div class="form-group hide1">
                  <label class="col-sm-3">Unit of Competency</label>

                  <div class="col-sm-9">
                    <select class="form-control select2"  id="ojt" name="ojt"style="width: 100%;">
                      <option selected="selected" value="">Unit of Competency</option>
                        <?php 
                          foreach ($ojt->result() as $ojt) {
                            echo '<option value="'.$ojt->id.'">'.$ojt->name.'</option>';
                        }
                      ?>                    
                    </select>
                  </div>
                </div>

              </div>
            </form>
          </div>       
        </div>

        <div id ="reload_data">
                    
        </div>
      </div>
    </section>

    <!-- /.content-wrapper -->
  </div>



<?php include $_SERVER['DOCUMENT_ROOT']."/hr_program/evalys/application/views/template/footer.php"; ?>
<!-- page script -->


<script> 
    var id_user ;
    var ojt_id ;
    var asse ;
    var ack ;
    var ojt_date ;
    var eval_date ;

    // $('#cie_tabel').hide();
    $('.hide1').hide();
    $('#datepicker').datepicker({
      dateFormat: 'dd-mm-yyyy',
      autoclose: true
      });
    $('#datepicker1').datepicker({
      dateFormat: 'dd-mm-yyyy',
      autoclose: true
      });
  $(document).ready(function(){
    

    $(".select2").select2();
    $(".select2").prop('tabIndex', 0);

    // Setup - add a text input to each footer cell
    $('#example1 thead th').each( function(){
        var title = $(this).text();
        if(title!="Actions" && title!="NO"){
          $(this).prepend( '<input type="text" style="min-width: 110px; max-width: 110px;" placeholder="Search" /> <br>');

        }
    });
 
    var save_method = "add";
    // DataTable
    var table = $('#example1').DataTable({
      'ordering'    : false
    });
 
    // Apply the search
    table.columns().every(function(){
        var that = this;
        $('input',this.header()).on('keyup change',function(){
          if(that.search() !== this.value ) {
              that.search( this.value ).draw();
          }
        });
    });

    $('#example1_filter').hide();
  });


  $('#nik').on("change", function(){
    
    // alert(id_user);
    $('.hide1').show();
    // $('[name="nama"]').val(data.name+" ").trigger('change');
    // $('[name="dept"]').val(data.dept).trigger('change');

      if($('[name="nik"]').val()!="") {
        var _url = "<?= site_url('/eval/nik/') ?>" + $('[name="nik"]').val();

        $.ajax({
        url: _url,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            $('[name="nama"]').val(data.name+" ").trigger('change').focus();
            $('[name="dept"]').val(data.dept).trigger('change');

          },
        error: function (jqXHR, textStatus, errorThrown){
          alert('Error on: '+ jqXHR.responseText);
        }
        });
      }else {
        $('[name="nama"]').val("").trigger('change').focus();
        $('[name="dept"]').val("").trigger('change');
        $('.hide1').hide();
        $('#reload_data').hide1();
      }
    });

  $('#ojt').on("change", function(){
    ojt_id = $('select[name=ojt]').val();

    // alert(id);
    var _url = "<?= site_url('/eval/view')?>";

    if($('[name="nik"]').val()!="") {
        $.ajax({
        url: _url,
        type: "POST",
        data: {"ojt_id":ojt_id},
          success: function(a){
            $('#reload_data').html(a);
          }
        });
    }
    else{
    } 
      
  });

  // $('#nik').on("change", function(){
  //   pre_save();
  // });

  //  $('#asse').on("change", function(){
  //   pre_save();
  // });

  //  $('#acknowledge').on("change", function(){
  //   pre_save();
  // });

  // function pre_save(){
   
  //   if($('select[name=nik]').val()!="" && $('select[name=asse]').val()!="" && $('select[name=acknowledge]').val()!="" && $('#datepicker').val()!="" && $('#datepicker1').val()!=""){
  //       $('#ojt').removeAttr('disabled');
  //   }
  // }

  
</script>
</body>
</html>
