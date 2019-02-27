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
        <div class="col-md-6">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Personal Form</h3>
            </div>
            <form class="form-horizontal">
              <div class="box-body">
                <!-- <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">NIK</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="NIK">
                  </div>
                </div> -->

                <div class="form-group">
                  <label class="col-sm-3">OJT Position</label>

                  <div class="col-sm-9">
                    <select class="form-control select2" data-placeholder="Select a State">
                      <option>NIK</option>
                      <option>000011</option>
                      <option>000012</option>
                      <option>000013</option>
                      <option>000014</option>
                      <option>000015</option>
                      <option>000016</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3">Nama</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputPassword3" disabled="true">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3">Departement</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputPassword3" disabled="true">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3">OJT Position</label>

                  <div class="col-sm-9">
                    <select class="form-control select2" data-placeholder="Select a State">
                      <option>Final Infevtion</option>
                      <option>Insfection level 1</option>
                      <option>Insfection level 2</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 ">Date OJT</label>
                  <div class="col-sm-9">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="datepicker">
                    </div>
                  </div>
                    <!-- /.input group -->
                </div>

                <div class="form-group">
                  <label class="col-sm-3">Date Evaluation</label>
                  <div class="col-sm-9">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="datepicker1">
                    </div>
                  </div>
                    <!-- /.input group -->
                </div>
              </div>
            </form>
          </div>          
        </div>

        <div class="col-md-6">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url().'avatar5.png' ?>" alt="User profile picture">
              <h3 class="profile-username text-center">Muhamd Sahyudi</h3>
              <p class="text-muted text-center">Software Engineer</p>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Depa</b> <a class="pull-right">1,332</a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="pull-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Friends</b> <a class="pull-right">13,287</a>
                </li>
              </ul>
              <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      <!-- </div> -->
<!--</section>

    <section class="content"> -->
      <!-- <div class="row"> -->
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Evaluation Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-striped table-responsive">
              <table class="table table-bordered table-striped table-responsive">
                <thead>
                  <tr>
                    <th style="width: 10px">NO</th>
                    <th width="100" style="min-width: 110px; max-width: 110px;">Action</th>
                    <th>Name</th>
                    <th>Kode</th>
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
                      <button style="margin-right: 5px;" type="button" class="btn btn-success" onclick="bank_edit(<?= $temp->_id ?>)">
                        <i class="fa fa-pencil fa-md"></i>&nbsp;
                      </button>
                      <button type="button" class="btn btn-danger" onclick="bank_delete(<?= $temp->_id ?>)">
                        <i class="fa fa-trash-o fa-md"></i>&nbsp;
                      </button>
                    </td>
                    <td><?= $temp->name ?></td>
                    <td><?= $temp->kode ?></td>
                  </tr>
                      <?php
                        }
                      ?>
                </tbody>
              </table>

              <button type="button" class="btn btn-success pull-right" id="daterange-btn">
                <span>
                  <i class="fa fa-save"></i> &nbsp; <b>Save Date</b> 
                </span>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    <!-- </section> -->


    </section>
    <!-- /.content-wrapper -->
    </div>



<?php include $_SERVER['DOCUMENT_ROOT']."/hr_program/evalys/application/views/template/footer.php"; ?>
<!-- page script -->


<script>
  $('#datepicker').datepicker({
      autoclose: true
    });
  $('#datepicker1').datepicker({
    autoclose: true
  });

  $(".select2").select2();
  $(".select2").prop('tabIndex', 0);

  $(document).ready(function(){
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
  // console.log('===', $('#goods_form').serialize());
    var _url=  "<?php echo base_url()."goods/add"?>";

    if(save_method=="update"){
      _url=  "<?php echo base_url()."goods/update"?>";
    }

    $.ajax({
      url: _url,
      type: "POST",
      data: $('#goods_form').serialize(),
      dataType: "JSON",
      success: function(data){
        if(data.status==1){
          alert(data.msg);
          $('#modal-default').modal('hide');
          location.reload();
        }
        else {
          alert(data.msg);
          // $('#modal-default').modal('hide');
          // location.reload();
        }
      },
      error: function (jqXHR, textStatus, errorThrown){
        alert('Error on: '+ jqXHR.responseText);
      }

    });
  }

  function goods_delete(items_id){
    if(confirm('Are you sure Delete this data ?')){
      //ajax delete from database
      $.ajax({
        url: "<?php echo base_url().'goods/delete/'?>"+items_id,
        type: "POST",
        dataType: "JSON",
        success: function(data){
          if(data.status==1){
            alert(data.msg);
            location.reload();
          } else {
            alert(data.msg);
          }
      },
      error: function (jqXHR, textStatus, errorThrown){
        alert('Error on: '+ jqXHR.responseText);
      }

      });
    }
  }

  function goods_edit(items_id){
    $('#hide_type').hide();
    save_method = "update";
      $.ajax({
        
        url: "<?php echo base_url().'goods/edit/'?>"+items_id,
        type: "GET",
        dataType: "JSON",
        success: function(data){

          $('#_items_id').val(data.items_id);
          $('#_type').val(data.type_id);
          $('#_serial').val(data.serial_no);
          $('#_label').val(data.label);
          $('#_model').val(data.model);
          $('#_desc').val(data.description_type);
          $('#_status').val(data.status);
          $('#_register_date').val(data.register_date);
          $('#modal-default').modal('show');

          console.log(data);
      },
      error: function (jqXHR, textStatus, errorThrown){
        alert('Error on: '+ jqXHR.responseText);
      }

      });
    // }
  }

  function pre_save(){
    // validasi
    var boleh = true;
    // if($(".select2").val()==""){
    //   boleh = false;
    // }else 
    if($('#_serial').val()==""){
      boleh = false;
    } else if($('#_model').val()==""){
      boleh = false;
    } else if($('#_label').val()==""){
      boleh = false;
    } else if($('#_desc').val()==""){
      boleh = false;
    } else if($('#_register_date').val()==""){
      boleh = false;
    } else if($('#_register_by').val()==""){
      boleh = false;
    } else if($('#_status').val()==""){
      boleh = false;
    }

    if(boleh){
      // if(save_method=="update"){
      //   goods_edit();
      // }
      save();  
    } else {
      alert("All field with (*) mark cannot be empty !");
    }
  }

  function reset_method(){
    save_method = "add";
    // $('#type').reset();
    $('#hide_type').show(); 

    $('#type').val("").trigger("change"); 

     // $(".select2").reset();
    $('#goods_form')[0].reset();
    
    // $('#_type').focus();
    //document.getElementById('#_type').focus();
    var mode_triger = "new";
    var type_id = 0;

    $('#type').on("change", function(){
      if($('[name="type"]').val()!="") {
        var _url = "<?php echo base_url().'goods/type/'; ?>" + $('[name="type"]').val();

        $.ajax({
        url: _url,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            // alert(data.code_type);
            // $('[name="_desc"]').val(data.id).trigger('change');
            $('[name="_desc"]').val(data.description+" ").trigger('change').focus();
            $('[name="_label"]').val(data.code_type).trigger('change');

        },
        error: function (jqXHR, textStatus, errorThrown){
          alert('Error on: '+ jqXHR.responseText);
        }

      });

      } else {
        $('[name="_desc"]').val("").trigger('change').focus();
        $('[name="_label"]').val("").trigger('change');
      }
    });
  }
</script>
</body>
</html>
