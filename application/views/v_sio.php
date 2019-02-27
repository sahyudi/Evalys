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
                      <th>NO</th>
                      <th>SKILL</th>
                      <th>EXIPRE DATE</th>
                    </tr>
                  </thead>    
                  <tbody>
                  <?php
                        $no=0;
                          foreach ($data as $sio) {
                             $no++; 
                        ?>
                    <tr>
                      <td><?=$no ?></td>
                      <td><?= $sio->_name ?></td>
                      <td><?= date('d M Y', strtotime($sio->ex_date)) ?></td>
                    </tr> 
                    <?php 
                      }
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
