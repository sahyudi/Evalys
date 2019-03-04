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
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Evaluation Table</h3>
            </div>

            <!-- /.box-header -->
            <div class="box-body table-responsive table-striped">
              <button type="button" class="btn btn-info pull-right" data-toggle="modal" id="button_sio" data-target="#modal-info" onclick="reset_form();">myLisence</button>

              <br><br>
              <form method="POST" id="save_data" >
                <table class="table table-bordered" id="table_evaluation">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th width="75" style="min-width: 75px; max-width: 75px;">Actions</th>
                      <th>Name</th>
                      <th>Unit of Competency</th>
                      <th>Assessor</th>
                      <th>Acknowladge</th>
                      <th>OJT Date</th>
                      <th>Evaluation Date</th>
                      <th>Result</th>
                      <th>Expired Date</th>
                    </tr>
                  </thead>
                        
                  <tbody>
                      <?php
                          $no = 0;
                              $data2 = date('Y-m-d');

                            foreach ($end->result() as $end) {
                              $data = date('Y-m-d', strtotime('-3month',strtotime($end->ex_date)));

                          $no ++;
 
                        if ($data <= $data2) {
                      ?>
                        <tr>
                          <td><?= $no ?></td>
                          <td>
                              <i class="fa fa-trash-o fa-lg" onclick="_delete(<?= $end->_id; ?>)"></i>&nbsp;
                              <i class="fa fa-print fa-lg" id="" onclick="_view(<?= $end->_id; ?>)"></i>
                              <i class="fa fa-book fa-lg btn-file" id="<?= $end->_id ?>" data-toggle="modal" data-target="#modal-upload"></i>
                          </td>
                          <td style="text-decoration: line-through red; color: red;"><?= $end->name ?></td>
                          <td style="text-decoration: line-through red; color: red;"><?= $end->ojt_name ?></td>
                          <td style="text-decoration: line-through red; color: red;"><?= $end->assessor ?></td>
                          <td style="text-decoration: line-through red; color: red;"><?= $end->acknowledge ?></td>
                          <td style="text-decoration: line-through red; color: red;"><?= date('d M Y', strtotime($end->ojt_date)) ?></td>
                          <td style="text-decoration: line-through red; color: red;"><?= date('d M Y', strtotime($end->eval_date)) ?></td>
                          <td style="text-decoration: line-through red; color: red;"><?= $end->status ?></td>
                          <td style="text-decoration: line-through red; color: red;"><?= date('d M Y', strtotime($end->ex_date)) ?></td>
                        </tr>


                      <?php 
                        } else { ?>
                        <tr>
                          <td><?= $no ?></td>
                          <td>
                            <i class="fa fa-trash-o fa-lg" onclick="_delete(<?= $end->_id; ?>)"></i>&nbsp;
                            <i class="fa fa-print fa-lg" id="" onclick="_view(<?= $end->_id; ?>)"></i>
                            <i class="fa fa-book fa-lg btn-file" id="<?= $end->_id ?>" data-toggle="modal" data-target="#modal-upload"></i>
                          </td>
                          <td><?= $end->name ?></td>
                          <td><?= $end->ojt_name ?></td>
                          <td><?= $end->assessor ?></td>
                          <td><?= $end->acknowledge ?></td>
                          <td><?= date('d M Y', strtotime($end->ojt_date)) ?></td>
                          <td><?= date('d M Y', strtotime($end->eval_date)) ?></td>
                          <td><?= $end->status ?></td>
                          <td><?= date('d M Y', strtotime($end->ex_date)) ?></td>
                        </tr>
                        <?php
                        } 
                          }
                        ?> 
                  </tbody>
                </table>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <div class="modal modal-info fade" id="modal-info">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">myLicense</h4>
        </div>
        <div class="modal-body">
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
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
          <!-- <button type="button" class="btn btn-outline">Save changes</button> -->
        </div>
      </div>
    </div>
    <!-- /.modal-dialog -->
  </div>

  <div class="modal  modal-default fade" id="modal-upload">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Criteria List</h4>
        </div>
          <div class="modal-body">
            <form validate="true" id="upload-form" enctype="multipart/form-data">
              <input type="hidden" name="end_id" id="end_id" value="">
              <input type="file" name="attachment" id="attachment">
              <!-- <input type="file" name=""> -->
              <br>
              <button type="button" onclick="save_upload();">Upload</button>
              
              <div id="file-data">
                
              </div>

            </form>
          </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>


<?php include $_SERVER['DOCUMENT_ROOT']."/hr_program/evalys/application/views/template/footer.php"; ?>
<!-- page script -->


<script> 
  var end_id;

  $(document).ready(function(){
    $(".select2").select2();
    $(".select2").prop('tabIndex', 0);

    var table = $('#table_evaluation').DataTable({
      'ordering'    : false
    });
  });
  
  function _delete(id){
    if(confirm('Are you sure Delete this data ?')){
      $.ajax({
        url: "<?= site_url().'/end/delete/'?>"+id,
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

  function _view(id){
    var _url = "<?= site_url('/end/view/')?>"+id;
    window.open(_url, "_blank");
  }

  $('#nik').on("change", function(){
    var id_user = $('select[name=nik]').val();

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

  function save_upload(){

    var form = $('#upload-form')[0];
    var formData = new FormData(form);
    var _url=  "<?= site_url('/upload')?>";
    formData.append('end_id', end_id);

    $.ajax({
      url: _url,
      type: "POST",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function(data){
       $('#file-data').html(data);
       $('#attachment').val(""); 
      }
    });
  }

  $('.btn-file').click(function(){
    end_id = $(this).attr('id');
    $('#end_id').val(end_id);


    $.ajax({
        url: "<?= site_url('/view-file/')?>"+end_id,
        type: "POST",
        // dataType: "JSON",
        success: function(data){
            $('#file-data').html(data);
        } 
      });
  })

  function delete_file(id){
    if(confirm('Are you sure Delete this data ?')){
      //ajax delete from database
      $.ajax({
        url: "<?= site_url('/delete/file/')?>"+id,
        type: "POST",
        data: {'end_id' : end_id},
        success: function(data){
          $('#file-data').html(data);
        }
      });
    }
  }
</script>
</body>
</html>
