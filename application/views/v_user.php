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
                      <input type="radio" name="role" id="1" value="champion" checked>Champion
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="role" id="2" value="admin" >Admin
                    </label>
                  </div>
                </div>

                <div class="text-center col-md-4">
                  <button type="button" id="submit" onclick="save();" class="btn btn-success pull-left" id="daterange-btn">
                    <b>Save</b>
                  </button>

                  <button type="submit" id="submit" onclick="kosong();" class="btn btn-default pull-right" id="daterange-btn">
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
                      <th width="100" style="min-width: 20%; max-width: 20%;">Actions</th>
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
                        <button style="margin-right: 5px;" type="button" class="btn btn-success" onclick="ojt_edit(<?= $temp->id ?>)">
                          <i class="fa fa-pencil fa-sm"></i>&nbsp;
                        </button>
                        <button style="margin-right: 5px;" type="button" class="btn btn-danger" onclick="ojt_delete(<?= $temp->id ?>)">
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

        <!-- <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">User List</h3>
            </div>
           <div class="box-body table-striped table-responsive">
                <table class="table table-bordered table-striped" id="competency_table" name="competency_table">
                  <thead>
                    <tr>
                      <th style="width: 10px">No</th>
                      <th width="100" style="min-width: 20%; max-width: 20%;">Actions</th>
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
                        <button style="margin-right: 5px;" type="button" class="btn btn-success" onclick="ojt_edit(<?= $temp->id ?>)">
                          <i class="fa fa-pencil fa-sm"></i>&nbsp;
                        </button>
                        <button style="margin-right: 5px;" type="button" class="btn btn-danger" onclick="ojt_delete(<?= $temp->id ?>)">
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
        </div> -->
      </div>
    </section>
  </div>

<?php include $_SERVER['DOCUMENT_ROOT']."/hr_program/evalys/application/views/template/footer.php"; ?>
<!-- page script -->

<script type="text/javascript">

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
          location.reload();
        }
      });
    }
  }


</script>
</body>
</html>
