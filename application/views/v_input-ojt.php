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
              <h3 class="box-title">Competency Form</h3>
            </div>
            <form class="form-horizontal" id="ojt_form" validate="true" method="POST">
              <div class="box-body">
                    <input type="hidden" class="form-control" id="id" name="id">
                <div class="form-group">
                  <label class="col-md-2 control-label">Code *</label>

                  <div class="col-md-4">
                    <input type="text" class="form-control" required="true" autocomplete="off" id="kode" name="kode" placeholder="kode" maxlength="6" onkeyup="myUpper('kode')">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 control-label">Name *</label>

                  <div class="col-md-5">
                    <input type="text" class="form-control" required="true" autocomplete="off" id="name" name="name" placeholder="Name" onkeyup="myUpper('name')">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 control-label">Validity Period *</label>

                  <div class="col-md-2">
                    <select class="form-control select2" id="due_date" name="due_date">
                      <option selected="selected" value=""> Select </option>
                      <option value="1"> 1 </option>
                      <option value="2"> 2 </option>
                      <option value="3"> 3 </option>
                      <option value="4"> 4 </option>
                      <option value="5"> 5 </option>
                      <option value="6"> 6 </option>
                    </select>
                  </div>
                  <label class="col-sm-1 control-label">Year</label>
                </div>
                
                <div class="row">
                  <div class="col-xs-6">
                    <!-- <div class="text-center"> -->
                  <button type="submit" style="margin-right: 10%" id="submit" onclick="save();" class="btn btn-success pull-left" id="daterange-btn">
                      <b>Save</b>
                  </button>

                  <button type="submit" id="submit" onclick="kosong();" class="btn btn-default center pull-right" id="daterange-btn">
                       <b>cancel</b>
                  </button>
                  </div>
                </div>
              </div>
            </form>
          </div>          
        </div>

        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Competency List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-striped table-responsive">
              <table class="table table-bordered table-striped" id="competency_table" name="competency_table">
                <thead>
                  <tr>
                    <th style="width: 10px">No</th>
                    <th width="100" style="min-width: 170px; max-width: 170px;">Actions</th>
                    <th>Units of Competency</th>
                    <th style="text-align: center;">Code</th>
                    <th style="text-align: center;">Validity Period</th>
                  </tr>
                </thead>

                <tbody>
                    <?php 
                      $no = 0;
                      foreach ($ojt->result() as $temp) {
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
                      <button style="margin-right: 5px;" type="button" data-toggle="modal" data-target="#modal-info" label="<?= $temp->name ?>" class="btn btn-primary btn-judul" id="<?= $temp->id ?>">
                        <!-- <input type="hidden" name="id_input" id="<?= $temp->id ?>" value="<?= $temp->id ?>"> -->
                        <i class="fa fa-book fa-sm"></i>&nbsp;
                      </button>
                    </td>
                    <td><?= $temp->name ?></td>
                    <center>
                    <td align="center"><?= $temp->kode ?></td>
                    <td align="center"><?= $temp->due_date ?> Tahun</td>
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
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Criteria List</h4>
        </div>
         <div class="modal-body" style="padding-top: 0px; margin-top: -15px">
          <form class="form-horizontal" id="bank_form" validate="true">
            <div class="box-body" >
              <div class="form-group">
                <h3 id="heading" style="font-weight: bold;"></h3>
              </div>

              <input type="hidden" name="ojt_id" id="ojt_id" value="">
              <div class="form-group">
                  <label class="col-md-2">Materi *</label>

                  <div class="col-md-9">
                    <input type="text" class="form-control" id="quest" name="quest" autocomplete="off">
                  </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" onclick="save2();">Save</button>
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal" onclick="kosong2()">Close</button>
            </div>
          </form>

          <div id="load_bank">
          
          </div>
        

        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>

<?php include $_SERVER['DOCUMENT_ROOT']."/hr_program/evalys/application/views/template/footer.php"; ?>
<!-- page script -->

<script type="text/javascript">
    var ojt_id;

    var save_method = "add";

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



  function myUpper(element_id) {
    var x = document.getElementById(element_id);
    x.value = x.value.toUpperCase();
  }

  function Angkasaja(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57)){
      return false;
    }
  }

  function save(){
    var kode = $('#kode').val();
    var name = $('#name').val();
    var due_date = $('select[name=due_date]').val();

    if (kode == '' || name == '' || due_date == '') {
      alert('required field * cannot empty');
    }else {

      if(save_method=="add"){
        var _url=  "<?= site_url('/ojt/add')?>";
      }
      else if(save_method=="update"){
        var _url=  "<?= site_url('/ojt/update')?>";
      }

      $.ajax({
        url: _url,
        type: "POST",
        data: $('#ojt_form').serialize(),
        dataType: "JSON",
        success: function(data){
          if(data.status==1){
            alert(data.msg);
            kosong();
           $('#table_ojt').reload();
          }
        },
        error: function (jqXHR, textStatus, errorThrown){
          alert('Error on: '+ jqXHR.responseText);
        }

      });
    }
  }


  function save2(){
    var quest = $('#quest').val();

    if (quest == '') {
      alert('Required field (*) cannot empty');
    }else { 

      if(save_method=="add"){ 
        var _url=  "<?= site_url('/ojt/bank')?>";
      }
      else if(save_method=="update"){
        var _url=  "<?= site_url('/bank/update')?>";
      }

      $.ajax({
        url: _url,
        type: "POST",
        data: $('#bank_form').serialize(),
        // dataType: "JSON",
        success: function(data){
         $('#load_bank').html(data);
         $('#quest').val(""); 
        }
      });
    }
  }

  function bank_delete(id){
    if(confirm('Are you sure Delete this data ?')){
      //ajax delete from database
      $.ajax({
        url: "<?= site_url('/bank/delete/')?>"+id,
        type: "POST",
        data: {'ojt_id' : ojt_id},
        success: function(data){
          $('#load_bank').html(data);
        }
      });
    }
  }

  function ojt_delete(id){
    if(confirm('Are you sure Delete this data ?')){
      //ajax delete from database
      $.ajax({
        url: "<?= site_url('/ojt/delete/')?>"+id,
        type: "POST",
        dataType: "JSON",
        success: function(data){
          if(data.status==1){
            alert(data.msg);
            location.reload();
          } 
        },
        error: function (jqXHR, textStatus, errorThrown){
          alert('Error on: '+ jqXHR.responseText);
        }
      });
    }
  }

  function ojt_edit(id){
    save_method = "update";
      $.ajax({
        
        url: "<?= site_url('/ojt/edit/')?>"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data){

          $('#id').val(data.id);
          $('#kode').val(data.kode);
          $('#name').val(data.name);
          $('#due_date').val(data.due_date).trigger('change');
           // $('#mySelect2').val(data.id).trigger('change');

          console.log(data);
        },
        error: function (jqXHR, textStatus, errorThrown){
          alert('Error on: '+ jqXHR.responseText);
        }

      });
  }
///////// baru update keserver
  function kosong(){
    $('#ojt_form')[0].reset();
    $('[name="due_date"]').val("").trigger('change');
  }

  function kosong2(){
    $('#bank_form')[0].reset();
  }
///////


  $('.btn-judul').click(function(){
    ojt_id = $(this).attr('id');
    var label = $(this).attr('label');

    $('#heading').html(label);
    // alert(label);
    $('#ojt_id').val(ojt_id);


    // alert(ojt_id);
    $.ajax({
        url: "<?= site_url('/ojt/view-bank/')?>"+ojt_id,
        type: "POST",
        // dataType: "JSON",
        success: function(data){
            $('#load_bank').html(data);
        } 
      });
  })
</script>
</body>
</html>
