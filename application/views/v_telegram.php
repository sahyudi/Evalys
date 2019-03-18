<?php include $_SERVER['DOCUMENT_ROOT']."/hr_program/evalys/application/views/template/head.php"; ?>
<!DOCTYPE html>
<html>
<title>Evalys</title>
  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">ID Telegram Form</h3>
            </div>
            <form class="form-horizontal" id="telegram_form" validate="true" method="POST">
              <div class="box-body"><!-- 
                <input type="hidden" class="form-control" id="id" name="id"> -->
                <div class="form-group">
                  <label class="col-md-1 control">NIK *</label>

                  <div class="col-md-2">
                    <input type="text" class="form-control"  autocomplete="off" id="nik" name="nik" placeholder="nik" maxlength="6" onkeyup="Angkasaja('#nik')">
                  </div>
                </div>

                
                <div class="form-group">
                  <label class="col-md-1 control">ID Telegram *</label>

                  <div class="col-md-2">
                    <input type="text" class="form-control"  autocomplete="off" id="telegram_id" name="telegram_id" placeholder="telegram_id" onkeyup="Angkasaja('telegram_id')">
                  </div>
                </div>


                <div class="text-center col-md-4">
                  <button type="button" onclick="save();" class="btn btn-success" id="daterange-btn">
                    <b>Save</b>
                  </button>

                  <button type="button" onclick="kosong();" class="btn btn-default " id="daterange-btn">
                    <b>cancel</b>
                  </button>
                </div>
              </div>
            </form>
            <hr>
            <hr>

            <h3 style="margin-left: 1%">ID Telegram List</h3>
              <div class="box-body table-striped table-responsive">
                <table class="table table-bordered table-striped" id="telgeram_table" name="competency_table">
                  <thead>
                    <tr>
                      <th style="max-width: 20px; min-width: 20px; text-align: center;" width="20px" >No</th>
                      <th style="max-width: 95px; min-width: 95px; text-align: center;" width="95px">Actions</th>
                      <th style="text-align: center;">NIK</th>
                      <th style="text-align: center;">ID Telegram</th>
                    </tr>
                  </thead>

                  <tbody>
                      <?php 
                        $no = 0;
                        foreach ($user->result() as $temp) {
                        $no ++;
                      ?>
                    <tr>
                      <td style="text-align: center;"><?= $no ?></td>
                      <td style="text-align: center;">
                        <button style="margin-right: 5px;" type="button" id="btn_id" class="btn btn-success btn_id"  value="<?= $temp->id ?>" data-toggle="modal" data-target="#update_telegram_form" >
                          <i class="fa fa-pencil fa-sm"></i>&nbsp;
                        </button>
                        <button style="margin-right: 5px;" type="button" class="btn btn-danger" value="<?= $temp->id ?>" onclick="telegram_delete(<?= $temp->id ?>)">
                          <i class="fa fa-trash-o fa-sm"></i>&nbsp;
                        </button>
                      </td>
                      <td><?= $temp->emp_nik ?></td>
                      <center>
                      <td style="text-align: center;"><?= $temp->telegram_id ?></td>
                      </center>
                    </tr>
                        <?php
                          }
                        ?>
                  </tbody>
                </table>
              </div>
          </div>    
        </div>
      </div>
    </section>
  </div>

  <div class="modal  modal-default fade" id="update_telegram_form">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Update Form</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" id="update_form" validate="true" method="POST">
            <div class="box-body" >
              <input type="hidden" name="user_id" id="user_id" value="">
                <div class="form-group">
                  <label class="col-md-3 control">NIK *</label>

                  <div class="col-md-3">
                    <input type="text" class="form-control" required="true" autocomplete="off" id="update_nik" name="update_nik" placeholder="nik" maxlength="6" onkeyup="Angkasaja('nik')">
                  </div>
                </div>

                
                <div class="form-group">
                  <label class="col-md-3 control">ID Telegram *</label>

                  <div class="col-md-3">
                    <input type="text" class="form-control" required="true" autocomplete="off" id="update_telegram_id" name="update_telegram_id" placeholder="telegram_id" onkeyup="Angkasaja('telegram_id')">
                  </div>
                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success " onclick="save_update();">Save</button>
              <button type="button" class="btn btn-default pull-right" style="margin-right: 5px;" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


<?php include $_SERVER['DOCUMENT_ROOT']."/hr_program/evalys/application/views/template/footer.php"; ?>
<!-- page script -->

<script type="text/javascript">

  var user_id ;

    $(".select2").select2();
    $(".select2").prop('tabIndex', 0);

    var table = $('#telgeram_table').DataTable({
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




  function Angkasaja(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57)){
      return false;
    }
  }

  function save(){
    var nik = $('#nik').val();
    var telegram_id = $('#telegram_id').val();

    var _url=  "<?= site_url('/add-id_telegram')?>";
    
    if (nik == '' || telegram_id == '') {
      alert('Required field (*) cannot empty');
    }else{
      $.ajax({
        url: _url,
        type: "POST",
        data: $('#telegram_form').serialize(),
        dataType: "JSON",
        success: function(data){
          if(data.status==1){
            alert(data.msg);
            location.reload();
          }
        }
      });
    }
  }

  function save_update(){
    var nik = $('#update_nik').val();

    var _url=  "<?= site_url('/update-telegram')?>";
  
    if (nik == '') {
      alert('Required field (*) cannot empty');
    }

      $.ajax({
        url: _url,
        type: "POST",
        data: $('#update_form').serialize(),
        dataType: "JSON",
        success: function(data){
          if(data.status==1){
            alert(data.msg);
            location.reload();
          }
        }
      });
    
  }

  function telegram_delete(id){
    if(confirm('Are you sure delete this data ?')){

      $.ajax({
        url: "<?= site_url('/delete-telegram/')?>"+id,
        type: "POST",
        dataType: "JSON",
        success: function(data){
          if(data.status==1){
            alert(data.msg);
            location.reload();
          } 
        }
      });
    }
  }

  $('.btn_id').click(function(){

    var id_user = $(this).val();

    $.ajax({
        
        url: "<?= site_url('/edit-telegram/')?>"+id_user,
        type: "GET",
        dataType: "JSON",
        success: function(data){

          $('#user_id').val(data.id);
          $('#update_nik').val(data.emp_nik);
          $('#update_telegram_id').val(data.telegram_id);

          // if ( data.role == 'admin') {
          //   $('#update_role2').prop('checked', true);
          // }else {
          //   $('#update_role1').prop('checked', true);
          // }
          
        },
        error: function (jqXHR, textStatus, errorThrown){
          alert('Error on: '+ jqXHR.responseText);
        }

      });

  })


function kosong(){
    $('#telegram_form')[0].reset();
    // $('#telegram_id')[0].val("");
  }

</script>
</body>
</html>
