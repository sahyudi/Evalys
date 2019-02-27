<!DOCTYPE html>
<html>

  <div class="box-body table-striped table-responsive">
    <table class="table table-bordered" id="bank_eval" name="bank_eval">
      <thead>
        <tr>
          <th style="width: 10px">No</th>
          <th width="100" style="min-width: 110px; max-width: 110px;">Action</th>
          <th>Criteria List</th>
          <!-- <th>OJT Position</th> -->
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
            <!-- <button style="margin-right: 5px;" type="button" class="btn btn-success" onclick="bank_edit(<?= $temp->_id ?>)">
              <i class="fa fa-pencil fa-md"></i>&nbsp;
            </button> -->
            <button type="button" class="btn btn-danger" onclick="bank_delete(<?= $temp->_id ?>)">
              <i class="fa fa-trash-o fa-md"></i>&nbsp;
            </button>
          </td>
          <td><?= $temp->quest ?></td>
          <!-- <td><?= $temp->name ?></td> -->
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

    var table = $('#bank_eval').DataTable({
      'ordering'    : false
    });
  });
</script>
</html>