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
              <h3 class="box-title">User Form</h3>
            </div>
            <form class="form-horizontal" id="user_form" validate="true" method="POST">
              <div class="box-body">
                <input type="hidden" class="form-control" id="id" name="id">
                <div class="form-group">
                  <label class="col-md-1 control">NIK *</label>

                  <div class="col-md-2">
                    <input type="text" class="form-control" required="true" autocomplete="off" id="nik" name="nik" placeholder="nik" maxlength="6" onkeyup="Angkasaja('kode')">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-1 control">Role *</label>

                  <div class="col-md-3">
                    <label class="radio-inline">
                      <input type="radio" name="role" id="role1" value="champion" checked>Champion
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="role" id="role2" value="admin" >Admin
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="role" id="role3" value="acknowledge" >Acknowledge
                    </label>
                  </div>
                </div>

                <div class="text-center col-md-4">
                  <button type="button" id="submit" onclick="save();" class="btn btn-success pull-left" id="daterange-btn">
                    <b>Save</b>
                  </button>

                  <button type="button" id="submit" onclick="kosong();" class="btn btn-default pull-right" id="daterange-btn">
                    <b>cancel</b>
                  </button>
                </div>
              </div>
            </form>
            <hr>
            <hr>

            <h3 style="margin-left: 1%">Users List</h3>
              <div class="box-body table-striped table-responsive">
                <table class="table table-bordered table-striped" id="competency_table" name="competency_table">
                  <thead>
                    <tr>
                      <th style="width: 10px">No</th>
                      <th width="9%" style="min-width: 5%; max-width: 5%;">Actions</th>
                      <th>Name User</th>
                      <th style="text-align: center;">Role</th>
                    </tr>
                  </thead>

                  <tbody>
                      <?php 
                        $no = 0;
                        foreach ($user->result() as $temp) {
                        $no ++;
                      ?>
                    <tr>
                      <td><?= $no ?></td>
                      <td>
                        <button style="margin-right: 5px;" type="button" id="btn_id" class="btn btn-success btn_id"  value="<?= $temp->id ?>" data-toggle="modal" data-target="#modal-info" >
                          <i class="fa fa-pencil fa-sm"></i>&nbsp;
                        </button>
                        <button style="margin-right: 5px;" type="button" class="btn btn-danger" value="<?= $temp->id ?>" onclick="user_delete(<?= $temp->id ?>)">
                          <i class="fa fa-trash-o fa-sm"></i>&nbsp;
                        </button>
                      </td>
                      <td><?= $temp->nik ?></td>
                      <center>
                      <td align="center"><?= $temp->role ?></td>
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

  <div class="modal  modal-default fade" id="modal-info">
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
                    <label class="col-md-2">NIK *</label>

                    <div class="col-md-9">
                      <input type="text" class="form-control" id="update_nik" name="update_nik" autocomplete="off" required="true">
                    </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 control">Role *</label>

                  <div class="col-md-9">
                    <label class="radio-inline">
                      <input type="radio" name="role" id="update_role1" value="champion">Champion
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="role" id="update_role2" value="admin" >Admin
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="role" id="update_role3" value="acknowledge" >Acknowledge
                    </label>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success btn-judul" onclick="save_update();">Save</button>
              <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


<?php include $_SERVER['DOCUMENT_ROOT']."/hr_program/evalys/application/views/template/footer.php"; ?>
<!-- page script -->

<script type="text/javascript">
  var id_user ;

    $(".select2").select2();
    $(".select2").prop('tabIndex', 0);

    var table = $('#competency_table').DataTable({
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
    var _url=  "<?= site_url('/add-user')?>";
    
    if (nik == '') {
      alert('Required field (*) cannot empty');
    }else{
      $.ajax({
        url: _url,
        type: "POST",
        data: $('#user_form').serialize(),
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

    var _url=  "<?= site_url('/update-user')?>";
  
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

  function user_delete(id){
    if(confirm('Are you sure delete this data ?')){

      $.ajax({
        url: "<?= site_url('/delete-user/')?>"+id,
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

    id_user = $(this).val();

    $.ajax({
        
        url: "<?= site_url('/edit-user/')?>"+id_user,
        type: "GET",
        dataType: "JSON",
        success: function(data){

          $('#user_id').val(data.id);
          $('#update_nik').val(data.nik);

          if ( data.role == 'admin') {
            $('#update_role2').prop('checked', true);
          }else if (data.role == 'acknowledge') {
            $('#update_role3').prop('checked', true);

          }
          else {
            $('#update_role1').prop('checked', true);
          }
          
        },
        error: function (jqXHR, textStatus, errorThrown){
          alert('Error on: '+ jqXHR.responseText);
        }

      });

  })

  function kosong(){
    $('#user_form')[0].reset();
    // $('#role')[0].reset();
  }


</script>
</body>
</html>
