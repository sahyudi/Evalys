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
              <h3 class="box-title">Personal Form</h3>
            </div>
            <form class="form-horizontal" id="bank_form" name="bank_form" method="POST">
              <div class="box-body">
                <input type="hidden" class="form-control" id="id" name="id">
                <div class="form-group">
                  <label class="col-sm-3">OJT Position</label>

                  <div class="col-sm-9" id="update_data">
                <!-- <input type="text" class="form-control" id="id" name="id"> -->
                    <input type="text" class="form-control" id="ojt1" name="ojt1" disabled="true">
                  </div>


                  <div class="col-sm-9" id="insert_data">

                    <select class="form-control select2" id="ojt" name="ojt" style="width: 100%;">
                      <option>OJT Position</option>
                        <?php 
                        foreach ($ojt->result() as $ojt) {
                          echo '<option value="'.$ojt->id.'">'.$ojt->name.'</option>';
                        }
                        ?>
                      
                    </select>
                  </div>
                </div>

                <div class="form-group" type="hidden" >
                  <label class="col-sm-3">Materi</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="quest" name="quest" autocomplete="off">
                  </div>
                </div>

                <button type="submit" id="submit" onclick="kosong();" class="btn btn-default pull-left" id="daterange-btn">
                     <b>cancel</b>
                </button>
                <button type="submit" id="submit" onclick="save();" class="btn btn-success pull-right" id="daterange-btn">
                    <span>
                      <i class="fa fa-save"></i> &nbsp; <b>Save</b>
                    </span>
                </button>
              </div>
            </form>
          </div>          
        </div>

        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Evaluation Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-striped table-responsive">
              <table class="table table-bordered" id="bank_eval" name="bank_eval">
                <thead>
                  <tr>
                    <th style="width: 10px">NO</th>
                    <th width="100" style="min-width: 110px; max-width: 110px;">Action</th>
                    <th>Materi Evaluasi</th>
                    <th>OJT Position</th>
                  </tr>
                </thead>

                <tbody>
                    <?php 
                      $no = 0;
                      foreach ($bank->result() as $temp) {
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
                    <td><?= $temp->quest ?></td>
                    <td><?= $temp->name ?></td>
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
    <!-- /.content-wrapper -->
    </div>



<?php include $_SERVER['DOCUMENT_ROOT']."/hr_program/evalys/application/views/template/footer.php"; ?>
<!-- page script -->


<script>
  var save_method = "add";
  $('#update_data').hide();
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
    $('#bank_eval thead th').each( function(){
        var title = $(this).text();
        if(title!="Action" && title!="NO"){
          $(this).prepend( '<input type="text" style="min-width: 110px; max-width: 110px;" placeholder="Search" /> <br>');

        }
    });
 
    // DataTable
    var table = $('#bank_eval').DataTable({
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

    $('#bank_eval_filter').hide();
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
    if(save_method=="add"){ 
      var _url=  "<?php echo base_url()."bank/add"?>";
    }
    else if(save_method=="update"){
      var _url=  "<?php echo base_url()."bank/update"?>";
    }

    $.ajax({
      url: _url,
      type: "POST",
      data: $('#bank_form').serialize(),
      dataType: "JSON",
      success: function(data){
        if(data.status==1){
          alert(data.msg);
          location.reload();
          kosong();
        }
      },
      error: function (jqXHR, textStatus, errorThrown){
        alert('Error on: '+ jqXHR.responseText);
      }

    });
  }

  function bank_delete(id){
    if(confirm('Are you sure Delete this data ?')){
      //ajax delete from database
      $.ajax({
        url: "<?php echo base_url().'bank/delete/'?>"+id,
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

  function bank_edit(id){
    save_method = "update";
    $('#insert_data').hide();
    $('#update_data').show();

      $.ajax({
        
        url: "<?php echo base_url().'bank/edit/'?>"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data){

          $('#id').val(data._id);
          $('#ojt1').val(data.name);
          $('#quest').val(data.quest);
          console.log(data);
        },
        error: function (jqXHR, textStatus, errorThrown){
        alert('Error on: '+ jqXHR.responseText);
        }

      });
  }

  function kosong(){
    $('#bank_form')[0].reset();
  }
</script>
</body>
</html>
