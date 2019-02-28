<!DOCTYPE html>
<html>
<title>myLicense</title>
    <section class="content">
      <div class="row" style="color: black;">
        <div class="col-md-12">            
          <div class="box box-primary">
            <div class="box-header with-border">
             <center> <h3 class="box-title">OPERATOR & INSPECTOR LICENSE</h3></center>
            </div>
                <?php 
                  $data = $sio->result();
                ?>
            <div class="box-body box-profile">
                <?php
                  foreach ($data as $view) {
                ?>
              <img class="profile-user-img img-responsive img-circle" src="<?= base_url('avatar5.png') ?>" alt="User profile picture">
              <h3 class="profile-username text-center"><?= $view->name ?></h3>
              <!-- <p class="text-muted text-center">Software Engineer</p> -->
                <?php 
                  }
                ?>
              <div class="box-body table-responsive table-striped">
                
              <form method="POST" id="save_data" >
                <table style="color: black;" class="table table-bordered" id="table1">
                  <thead>
                    <tr>      
                      <th width="5px" class="text-center">NO</th>
                      <th class="text-center">SKILL</th>
                      <th class="text-center">EXIPRE DATE</th>
                    </tr>
                  </thead>    
                  <tbody>
                  <?php
                        $no=0;
                            $data2 = date('Y-m-d');
                          
                          foreach ($data as $sio) {
                            $no++; 
                            $data = date('Y-m-d', strtotime('-3month',strtotime($sio->ex_date)));

                          $no ++;
 
                        if ($data <= $data2) {
                        ?>
                        <tr>
                          <td class="text-center"><?=$no ?></td>
                          <td style="text-decoration: line-through red; color: red;" ><?= $sio->_name ?></td>
                          <td style="text-decoration: line-through red; color: red;" class="text-center"><?= date('d M Y', strtotime($sio->ex_date)) ?></td>
                        </tr>
                  <?php }else { ?>

                    <tr>
                      <td class="text-center"><?=$no ?></td>
                      <td ><?= $sio->_name ?></td>
                      <td class="text-center"><?= date('d M Y', strtotime($sio->ex_date)) ?></td>
                    </tr> 
                    <?php 
                     } }
                    ?>
                  </tbody>
                </table>
              </form>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>



<script> 
  $(document).ready(function(){
    $(".select2").select2();
    $(".select2").prop('tabIndex', 0);

    var table = $('#table1').DataTable({
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
  });
</script>
</body>
</html>
