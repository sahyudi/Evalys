<?php include $_SERVER['DOCUMENT_ROOT']."/hr_program/evalys/application/views/template/head.php"; ?>
<!DOCTYPE html>
<html>
<title>Evalys</title>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
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
                  <label class="col-md-2">NIK</label>

                  <div class="col-md-4">
                    <select class="form-control select2" id="nik" name="nik" style="width: 100%;">
                      <option selected="selected" value=""> :: Please select one :: </option>
                        <?php 
                          foreach ($user->result() as $user2) {
                            echo '<option value="'.$user2->nik.'"><span>'.$user2->nik.'</span>';
                          }
                        ?>
                    </select>
                  </div>
                </div>

                <div class="form-group hide1">
                  <label class="col-md-2">Name</label>

                  <div class="col-md-4">
                    <input type="text" id="nama" name="nama" class="form-control" id="inputPassword3" disabled="true">
                  </div>
                </div>

                <div class="form-group hide1">
                  <label class="col-md-2">Departement</label>

                  <div class="col-md-4">
                    <input type="text" id="dept" name="dept" class="form-control" id="inputPassword3" disabled="true">
                  </div>
                </div>

                <div class="form-group hide1">
                  <label class="col-md-2">Assessor</label>

                  <div class="col-md-4">
                    <select class="form-control select2" id="asse" name="asse" style="width: 100%;">
                      <option selected="selected" value=""> :: Please select one :: </option>
                        <?php
                              foreach ($user->result() as $asse) {
                            echo '<option value="'.$asse->nik.'"><span>'.$asse->nik.'</span>';
                            }
                        ?>
                    </select>
                  </div>
                </div>

                <div class="form-group hide1">
                  <label class="col-md-2">Acknowledged by</label>

                  <div class="col-md-4">
                    <select class="form-control select2" id="acknowledge" name="acknowledge" style="width: 100%;">
                      <option selected="selected" value=""> :: Please select one :: </option>
                        <?php 
                          foreach ($user->result() as $user3) {
                            echo '<option value="'.$user3->nik.'"><span>'.$user3->nik.'</span>';
                          }
                        ?>
                    </select>
                  </div>
                </div>

                <div class="form-group hide1">
                  <label class="col-md-2 ">OJT Date</label>
                  <div class="col-md-4">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="datepicker" autocomplete="off">
                    </div>
                  </div>
                </div>

                <div class="form-group hide1">
                  <label class="col-md-2">Evaluation Date</label>
                  <div class="col-md-4">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="datepicker1" autocomplete="off">
                    </div>
                  </div>
                </div>

                <div class="form-group hide1">
                  <label class="col-md-2">Unit of Competency</label>

                  <div class="col-md-4">
                    <select class="form-control select2" id="ojt" name="ojt" style="width: 100%;">
                      <option selected="selected" value="">:: Please select one ::</option>
                        <?php 
                          foreach ($ojt->result() as $ojt) { ?>
                          <option value="<?= $ojt->id ?>"><?= $ojt->name ?></option>
                          <!-- <input type="hidden" id="ojt_id" value="<?= $ojt->name ?>">  --> 
                      <?php  }
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
    var test ;

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
    $('.hide1').show();

      if($('[name="nik"]').val()!="") {
        var _url = "<?= site_url('/eval/nik/') ?>" + $('[name="nik"]').val();

        $.ajax({
        url: _url,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            // $('[name="nama"]').val(data.name+" ").trigger('change').focus();
            // $('[name="dept"]').val(data.dept).trigger('change');

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
      
  });
  
</script>
</body>
</html>
