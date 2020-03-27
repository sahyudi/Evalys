<?php $this->load->view('template/head.php'); ?>
<!DOCTYPE html>
<html>
<title>Evalys</title>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Evaluation Table</h3>
          </div>

          <!-- /.box-header -->
          <div class="box-body table-responsive table-striped">
            <button type="button" class="btn btn-success pull-left" data-toggle_2="tooltip" data-placeman="top" title="View License" data-toggle="modal" id="button_sio" data-target="#modal-info" onclick="reset_form();"><span class="fa fa-certificate ">&nbsp; myLicense </span></button>

            <a href="<?= site_url('Sent-notif') ?>" data-toggle_2="tooltip" data-placeman="top" title="Sent Notification Telegram" class="btn btn-info" style="margin-left: 5px"><span class="fa fa-telegram ">&nbsp; Telegram Notif</span> </a>

            <br><br>

            <form method="POST" id="save_data">
              <table class="table table-bordered" id="table_evaluation">
                <thead>
                  <tr>
                    <th style="text-align: center;">No</th>
                    <th width="75" style="min-width: 85px; max-width: 85px;">Actions</th>
                    <th>Name</th>
                    <th>Unit of Competency</th>
                    <th>Assessor</th>
                    <th>Acknowledge</th>
                    <th>OJT Date</th>
                    <th>Evaluation Date</th>
                    <th>Result</th>
                    <th>Expiry Date</th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                  $no = 0;
                  $data2 = date('Y-m-d');

                  foreach ($end->result() as $end) {
                    $data = date('Y-m-d', strtotime('-3month', strtotime($end->ex_date)));
                    $no++;
                  ?>

                    <tr>

                      <td style="text-align: center;"><?= $no ?></td>
                      <td style="text-align: center;">
                        <?php if ($this->session->role == 'admin') { ?>
                          <i style="cursor: pointer;" class="fa fa-trash-o fa-lg" data-toggle_2="tooltip" data-placeman="top" title="Delete data" onclick="_delete(<?= $end->_id; ?>)"></i>
                        <?php } ?>
                        <i style="cursor: pointer;" data-toggle_2="tooltip" data-placeman="top" title="Print form" class="fa fa-print fa-lg" id="" onclick="_view(<?= $end->_id; ?>)"></i>
                        <i style="cursor: pointer;" data-toggle_2="tooltip" data-placeman="top" title="Certificate" class="fa fa-certificate fa-lg" id="" onclick="_certifikat(<?= $end->_id; ?>)"></i>
                        <i style="cursor: pointer;" class="fa fa-book fa-lg btn-file" id="<?= $end->_id ?>" data-toggle_2="tooltip" data-placeman="top" title="Upload File" data-toggle="modal" data-target="#modal-upload"></i>
                      </td>
                      <?php
                      if ($data <= $data2) {
                      ?>
                        <td style="text-decoration: line-through red; color: red;"><?= $end->user_id ?></td>
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
                    <td><?= $end->user_id ?></td>
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
              echo '<option value="' . $user2->nik . '">' . $user2->nik . ' &nbsp;&nbsp; ' . $user2->name . '</option>';
            }
            ?>
          </select>

          <div id="sio">

          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
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
        <h4 class="modal-title">Criteria List *</h4>
      </div>
      <div class="modal-body">
        <form validate="true" id="upload-form" enctype="multipart/form-data">
          <input type="hidden" name="end_id" id="end_id" value="">
          <input type="file" class="form-control" name="attachment[]" id="attachment[]">
          <br>
          <button type="button" class="btn btn-success" onclick="save_upload();">Upload</button>

          <div id="file-data">

          </div>

        </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('template/footer.php'); ?>


<script>
  var end_id;

  $(document).ready(function() {
    $(".select2").select2();
    $(".select2").prop('tabIndex', 0);

    var table = $('#table_evaluation').DataTable({
      'ordering': false
    });

    $('[data-toggle_2="tooltip"]').tooltip();
  });

  function _delete(id) {
    if (confirm('Are you sure Delete this data ?')) {
      $.ajax({
        url: "<?= site_url() . '/end/delete/' ?>" + id,
        type: "POST",
        dataType: "JSON",
        success: function(data) {
          alert(data.msg);
          location.reload();
        }
      });
    }
  }

  function sent_notif() {

  }

  function _view(id) {
    var _url = "<?= site_url('/end/view/') ?>" + id;
    window.open(_url, "_blank");
  }

  function _certifikat(id) {
    var _url = "<?= site_url('/certifikat/') ?>" + id;
    window.open(_url, "_blank");
  }

  $('#nik').on("change", function() {
    var id_user = $('select[name=nik]').val();

    var _url = "<?= site_url('/sio/view') ?>";

    if ($('[name="nik"]').val() != "") {
      $.ajax({
        url: _url,
        type: "POST",
        data: {
          "id_user": id_user
        },
        success: function(a) {
          $('#sio').html(a);
        }
      });
    } else {
      $('#sio').html('')
    }

  });

  function reset_form() {
    $('#sio').html('');
    $('#nik').val("").trigger("change");
  }

  function save_upload() {
    var attachment = $('#attachment').val();
    var form = $('#upload-form')[0];
    var formData = new FormData(form);
    var _url = "<?= site_url('/upload') ?>";
    formData.append('end_id', end_id);
    if (attachment == '') {
      alert('required field * cannot empty');
    } else {

      $.ajax({
        url: _url,
        type: "POST",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {
          $('#file-data').html(data);
          $('#attachment').val("");
        }
      });
    }
  }

  $('.btn-file').click(function() {
    end_id = $(this).attr('id');
    $('#end_id').val(end_id);


    $.ajax({
      url: "<?= site_url('/view-file/') ?>" + end_id,
      type: "POST",
      // dataType: "JSON",
      success: function(data) {
        $('#file-data').html(data);
      }
    });
  })

  function delete_file(id) {
    if (confirm('Are you sure Delete this data ?')) {
      //ajax delete from database
      $.ajax({
        url: "<?= site_url('/delete/file/') ?>" + id,
        type: "POST",
        data: {
          'end_id': end_id
        },
        success: function(data) {
          $('#file-data').html(data);
        }
      });
    }
  }
</script>
</body>

</html>