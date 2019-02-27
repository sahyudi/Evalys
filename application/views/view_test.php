<!DOCTYPE html>
<html>
<title>Evaluation Form</title>
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Evaluation Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive table-striped">
              <form method="POST" id="save_data" >
                <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">No</th>
                    <th>Performance Criteria</th>
                    <th style="width: 100px">Status</th>
                    <th>Remark</th>
                  </tr>
                </thead>
                      
                <tbody>
                      <?php
                        $no = 0;
                        // $arr = 0 ;
                          foreach ($query->result() as $query) {
                        $no ++;
                      ?>
                  <tr>
                    <td><?= $no ?></td>

                    <td>
                    <input type="hidden" id="id_eval[]" name="id_eval[]" value="<?= $query->id ?>">
                    <?= $query->quest ?></td>

                    <td>
                      <select id="nilai[]" name="nilai[]" style="width: 100%;">
                        <option selected="selected" value=""> </option>
                        <option value="1"><b>Passed</b></option>
                        <option value="0"><b>Failed</b></option>
                      </select>

                      <!-- <input type="text" name="nilai[]" maxlength="3" class="form-control"  id="nilai[]" placeholder="note"> -->
                    </td>
                    <td>
                      <input type="text" name="note[]" class="form-control" id="note[]" placeholder="note">                          
                    </td>
                  </tr>

                  <?php
                }
                ?>
                </tbody>
              </table>
              
            </form>
              <button type="button" class="btn btn-success pull-right" id="save" onclick="save();">
                <span>
                  <i class="fa fa-save"></i> &nbsp; <b>Save</b> 
                </span>
              </button>
            </div>
          </div>
        </div>
      </div>
</body>
<script type="text/javascript">

function save(){
  ojt_id = $('select[name=ojt]').val();
  id_user = $('select[name=nik]').val();
  asse = $('select[name=asse]').val();
  ack = $('select[name=acknowledge]').val();
  ojt_date = $('#datepicker').val();
  eval_date = $('#datepicker1').val();


  var _url = "<?= site_url('/eval/save') ?>";
  var form = $('#save_data')[0];
  var formData = new FormData(form);

  formData.append('user_id', id_user);
  formData.append('asse', asse);
  formData.append('ack', ack);
  formData.append('ojt_date', ojt_date);
  formData.append('eval_date', eval_date);
  formData.append('ojt_id', ojt_id);

  $.ajax({
    url: _url,
    type: "POST",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "JSON",
    success: function(data){
        window.location.href = "<?= site_url('/eval/view-data') ?>";
      }
  });
         

}

</script>
</html>
