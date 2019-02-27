<!DOCTYPE html>
<html>

  <div class="box-body table-striped table-responsive">
    <table class="table table-bordered" id="file_table" name="file_table">
      <thead>
        <tr>
          <th style="width: 10px">No</th>
          <th>Action</th>
          <th>File Name</th>
        </tr>
      </thead>

      <tbody>
          <?php 
            $no = 0;
            foreach ($file->result() as $temp) {
            $no ++;
          ?>
        <tr>
          <td><?= $no ?></td>
          <td>
            <button type="button" class="btn btn-danger" onclick="bank_delete(<?= $temp->id ?>)">
              <i class="fa fa-trash-o fa-md"></i>&nbsp;
            </button>
          </td>
          <td><a href=" <?= site_url('/download-file/'.$temp->name_file) ?>"><?=$temp->name_file ?></a> </td>
        </tr>
            <?php
              }
            ?>
      </tbody>
    </table>
  </div>
<script type="text/javascript">
  $(document).ready(function(){
    $(".select2").select2();
    $(".select2").prop('tabIndex', 0);

    var table = $('#file_table').DataTable({
      'ordering'    : false
    });
  });
</script>
</html>