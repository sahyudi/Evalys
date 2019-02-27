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
            <form class="form-horizontal" id="form_tampil_data" method="POST">
              <div class="box-body">

                <div class="form-group">
                  <label class="col-sm-3">OJT Position</label>

                  <div class="col-sm-9">
                    <select class="form-control select2" id="nik" name="nik" style="width: 100%;">
                      <option selected="selected" value=""> NIK </option>
                        <?php 
                          foreach ($user->result() as $user) {
                            echo '<option value="'.$user->id.'">'.$user->nik.' &nbsp;&nbsp; '.$user->name.'</option>';
                          }
                        ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3">Nama</label>

                  <div class="col-sm-9">
                    <input type="text" id="nama" name="nama" class="form-control" id="inputPassword3" disabled="true">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3">Departement</label>

                  <div class="col-sm-9">
                    <input type="text" id="dept" name="dept" class="form-control" id="inputPassword3" disabled="true">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3">OJT Position</label>

                  <div class="col-sm-9">
                    <select class="form-control select2" id="ojt" name="ojt"style="width: 100%;">
                      <option selected="selected" value=""> NIK </option>
                      <?php 
                        foreach ($ojt->result() as $ojt) {
                          echo '<option value="'.$ojt->id.'">'.$ojt->name.'</option>';
                        }
                      ?>                    
                    </select>
                  </div>
                </div>

                <button type="button" class="btn btn-success pull-center" id="daterange-btn" onclick="show_menu()">
                  <span>
                    <i class="fa fa-save"></i> &nbsp; <b>Evaluation</b> 
                  </span>
                </button>
              </div>

            </form>
          </div>   
               
        </div>
      </div>
      <!-- /.row -->
    <!-- </section> -->


    </section>
    <!-- /.content-wrapper -->
    </div>



<?php include $_SERVER['DOCUMENT_ROOT']."/hr_program/evalys/application/views/template/footer.php"; ?>
<!-- page script -->


<script>
    $('.table_show').hide();

    

  // tampil_data_barang(); 
    $('#cie_tabel').hide();
    $('#datepicker').datepicker({
        autoclose: true
      });
    $('#datepicker1').datepicker({
      autoclose: true
      });
  $(document).ready(function(){
    

    $(".select2").select2();
    $(".select2").prop('tabIndex', 0);

    // Setup - add a text input to each footer cell
    $('#example1 thead th').each( function(){
        var title = $(this).text();
        if(title!="Actions" && title!="NO"){
          $(this).prepend( '<input type="text" style="min-width: 110px; max-width: 110px;" placeholder="Search" /> <br>');

        }
    });
 
    var save_method = "add";
    // DataTable
    var table = $('#example1').DataTable({
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

    $('#example1_filter').hide();
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
    var _url=  "<?php echo base_url()."goods/add"?>";

    if(save_method=="update"){
      _url=  "<?php echo base_url()."goods/update"?>";
    }

    $.ajax({
      url: _url,
      type: "POST",
      data: $('#goods_form').serialize(),
      dataType: "JSON",
      success: function(data){
        if(data.status==1){
          alert(data.msg);
          $('#modal-default').modal('hide');
          location.reload();
        }
        else {
          alert(data.msg);
          // $('#modal-default').modal('hide');
          // location.reload();
        }
      },
      error: function (jqXHR, textStatus, errorThrown){
        alert('Error on: '+ jqXHR.responseText);
      }

    });
  }

  function goods_delete(items_id){
    if(confirm('Are you sure Delete this data ?')){
      //ajax delete from database
      $.ajax({
        url: "<?php echo base_url().'goods/delete/'?>"+items_id,
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

  function goods_edit(items_id){
    $('#hide_type').hide();
    save_method = "update";
      $.ajax({
        
        url: "<?php echo base_url().'goods/edit/'?>"+items_id,
        type: "GET",
        dataType: "JSON",
        success: function(data){

          $('#_items_id').val(data.items_id);
          $('#_type').val(data.type_id);
          $('#_serial').val(data.serial_no);
          $('#_label').val(data.label);
          $('#_model').val(data.model);
          $('#_desc').val(data.description_type);
          $('#_status').val(data.status);
          $('#_register_date').val(data.register_date);
          $('#modal-default').modal('show');

          console.log(data);
      },
      error: function (jqXHR, textStatus, errorThrown){
        alert('Error on: '+ jqXHR.responseText);
      }

      });
    // }
  }

  function show_menu(){
      var _url = <?php echo base_url()."eval/select"?> ;
      $.ajax({
        url: _url,
        type: "POST",
        data: $('#form_tampil_data').serialize(),
        dataType: "JSON",
        success: function(data){
          alert('a');
          if(data.status==1){
            alert(data.msg);
            $('#modal-default').modal('hide');
            location.reload();
          }
          else {
            alert(data.msg);
            // $('#modal-default').modal('hide');
            // location.reload();
          }
        },
        error: function (jqXHR, textStatus, errorThrown){
          alert('Error on: '+ jqXHR.responseText);
        }

      });
    }

   $('#nik').on("change", function(){
      // $('#cie_tabel').show();

      if($('[name="nik"]').val()!="") {
        var _url = "<?php echo base_url().'eval/nik/'; ?>" + $('[name="nik"]').val();

        $.ajax({
        url: _url,
        type: "GET",
        dataType: "JSON",
        success: function(data){
            // alert(data.code_type);
            // $('[name="_desc"]').val(data.id).trigger('change');
            $('[name="nama"]').val(data.name+" ").trigger('change').focus();
            $('[name="dept"]').val(data.dept).trigger('change');

        },
        error: function (jqXHR, textStatus, errorThrown){
          alert('Error on: '+ jqXHR.responseText);
        }
      });

      }else {
      // $('#cie_tabel').hide();
        $('[name="nama"]').val("").trigger('change').focus();
        $('[name="dept"]').val("").trigger('change');
      }
    });


    $('#ojt').on("change", function(){
      $('#cie_tabel').show();

      if($('[name="ojt"]').val()!="") {
        var _url = "<?php echo base_url().'eval/ojt/'; ?>" + $('[name="ojt"]').val();

        $.ajax({
        url: _url,
        type: "GET",
        dataType: "JSON",
        success: function(data){
          $('#cie_tabel').show();

            // alert(data.code_type);
            // $('[name="_desc"]').val(data.id).trigger('change');
            // $('[name="nama"]').val(data.name+" ").trigger('change').focus();
            // $('[name="dept"]').val(data.dept).trigger('change');

        },
        error: function (jqXHR, textStatus, errorThrown){
          alert('Error on: '+ jqXHR.responseText);
        }
      });

      }else {
      $('#cie_tabel').hide();
        $('[name="nama"]').val("").trigger('change').focus();
        $('[name="dept"]').val("").trigger('change');
      }
    });

  // function tampil_data_barang(){
  //   var _url=  "<?php echo base_url()."goods/add"?>";

  //   $.ajax({
  //       type  : 'ajax',
  //       url   : ,
  //       async : false,
  //       dataType : 'json',
  //       success : function(data){
  //           var html = '';
  //           var i;
  //           for(i=0; i<data.length; i++){
  //               html += '<tr>'+
  //                       '<td>'+data[i].barang_kode+'</td>'+
  //                       '<td>'+data[i].barang_nama+'</td>'+
  //                       '<td>'+data[i].barang_harga+'</td>'+
  //                       '<td style="text-align:right;">'+
  //                           '<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="'+data[i].barang_kode+'">Edit</a>'+' '+
  //                           '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="'+data[i].barang_kode+'">Hapus</a>'+
  //                       '</td>'+
  //                       '</tr>';
  //           }
  //           $('#show_data').html(html);
  //       }
  //   });
  // }
</script>
</body>
</html>
