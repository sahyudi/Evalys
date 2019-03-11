<!DOCTYPE html>
<html>

  <div class="box-body table-striped table-responsive">
    <table class="table table-bordered" id="bank_eval" name="bank_eval">
      <thead>
        <tr>
          <th style="width: 10px">No</th>
          <th width="10px">Action</th>
          <th>Performance Criteria</th>
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