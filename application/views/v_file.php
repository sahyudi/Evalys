<!DOCTYPE html>
<html>

  <div class="box-body table-striped table-responsive">
    <table class="table table-bordered" id="file_table" name="file_table">
      <thead>
        <tr>
          <th style="width: 10px">No</th>
          <th style="width: 15px">Action</th>
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
            <button type="button" class="btn btn-danger" onclick="delete_file(<?= $temp->id ?>)">
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

  // function delete_file(id){
  //   if(confirm('Are you sure Delete this data ?')){
  //     //ajax delete from database
  //     $.ajax({
  //       url: "<?= site_url('/delete/file/')?>"+id,
  //       type: "POST",
  //       data: {'end_id' : end_id},
  //       success: function(data){
  //         $('#file-data').html(data);
  //       }
  //     });
  //   }
  // }
</script>
</html>