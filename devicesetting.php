<?php
if(isset($_REQUEST['d_id']))
{
    $d_id = $_REQUEST['d_id'];
    include 'conn.php';
    $sql = "SELECT * FROM `device` WHERE d_id = \"$d_id\";";
    $result = $conn->query($sql);
    $row = NULL;
    if ($result->num_rows > 0) 
    {
        $row = $result->fetch_assoc();

    
    }

    $dhcpStatus = 0;
    if($row['DHCP'] == 1)
    $dhcpStatus = 1;
    else
    $dhcpStatus = 0;


}


?>



<?php include 'pagetop.php'?>

  <!-- Main Sidebar Container -->
<?php include 'MainSideBar.php';?>
  <!-- Content Wrapper. Contains page content -->



  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Device Setting</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
		    <div class="row justify-content-center">  

        <div class="col-md-6 ">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Device Setting</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Device Name</label>
                    <input type="text" name="d_name" class="form-control" id="d_name" placeholder="" value = "<?php echo($row['d_name']);?>">
                  </div>

                  
                <div class="row">  
                
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Device ID 
                <?php echo($row['d_active']);?></label>
                            <input type="text" name="d_id" class="form-control" id="d_id" placeholder="" readonly value = "<?php echo($row['d_id']);?>">
                        </div>
                    </div>
                  
                    <div class="col-md-2">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" name="isavtive" id="isavtive" class="custom-control-input align-middle" <?php if ($row['d_active'] == '1') echo("checked");?>>
                           
                            <label class="custom-control-label align-middle" for="isavtive">Enable/Disable</label>
                        </div>
                  </div>
                </div>  <!-- row div end -->
                
                <div class="row">  
                    <div class="col-md-4">
                        <label for="customRange2">Display Brightness</label>
                    </div>
                    <div class="col-md-8">
                        <input type="range" name="brightness" id="brightness" min="0" max="100" class="custom-range custom-range-danger" id="customRange2" value = "<?php echo($row['brightness']);?>">
                    </div>
                </div> <!-- row div end -->

                
                <div class="row">  
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Server IP :</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-laptop"></i></span>
                                </div>
                                <input type="text" name="serverIP" id="serverIP" class="form-control" data-inputmask="'alias': 'ip'" data-mask="" inputmode="numeric" value="<?php echo($row['server']);?>">
                            </div>
                    <!-- /.input group -->
                    </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Port Number</label>
                            <input type="text" name="port" id="port" class="form-control" name="newDeviceName" placeholder="" value="<?php echo($row['serverport']);?>">
                        </div>
                    </div>

                </div> <!-- row div end -->

                
                <div class="row">  
                <div class="col-md-10">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" name="dhcp" class="custom-control-input align-middle" id="dhcp"  <?php if($dhcpStatus == 1) echo("checked"); else echo("unchecked"); ?> >
                            <label class="custom-control-label align-middle" for="dhcp">DHCP Enable/Disable</label>
                        </div>
                  </div>
                </div> <!-- row div end -->

                <div class="row">  
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Static IP :</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-laptop"></i></span>
                                </div>
                                <input type="text" name="staticip" id="staticip" class="form-control" data-inputmask="'alias': 'ip'" data-mask="" inputmode="numeric" value=<?php echo("\"".$row['staticIP']."\" "); if($dhcpStatus == 0) echo("readonly");?>>
                            </div>
                    <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Getway :</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-laptop"></i></span>
                                </div>
                                <input type="text" name="getway" id="getway" class="form-control" data-inputmask="'alias': 'ip'" data-mask="" inputmode="numeric" value=<?php echo("\"".$row['getway']."\" "); if($dhcpStatus == 0) echo("readonly");?>>
                            </div>
                    <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Subnet :</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-laptop"></i></span>
                                </div>
                                <input type="text" name="subnet" id="subnet" class="form-control" data-inputmask="'alias': 'ip'" data-mask="" inputmode="numeric" value=<?php echo("\"". $row['subnet']."\" "); if($dhcpStatus == 0) echo("readonly");?>>
                            </div>
                    <!-- /.input group -->
                        </div>
                    </div>

                </div> <!-- row div end -->

                
                <div class="row">  
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>DNS 1 :</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-laptop"></i></span>
                                </div>
                                <input type="text" name="dns1" id="dns1" class="form-control" data-inputmask="'alias': 'ip'" data-mask="" inputmode="numeric" value=<?php echo("\"".$row['DNS1']."\" "); if($dhcpStatus == 0) echo("readonly");?>>
                            </div>
                    <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>DNS 2 :</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-laptop"></i></span>
                                </div>
                                <input type="text" name="dns2" id="dns2" class="form-control" data-inputmask="'alias': 'ip'" data-mask="" inputmode="numeric" value=<?php echo("\"".$row['DNS2']."\" "); if($dhcpStatus == 0) echo("readonly");?>>
                            </div>
                    <!-- /.input group -->
                        </div>
                    </div>
                    
                </div> <!-- row div end -->


                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button  id="save" class="btn btn-primary">Save</button>
                </div>
              
            </div>
        </div>      
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


 <!-- /.content-wrapper -->
 
<?php include 'footer.php';?>

  <!-- Control Sidebar -->
<?php include 'controlSidebar.php';?>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/jquery.inputmask.min.js"></script>

<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>

<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>

$('input').inputmask();

  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

  $(".row-address").click(function() {
    var $row = $(this).closest("tr");    // Find the row

    console.log($row.find('.id').text());


    // var $tds = $row.find("td");
    // $.each($tds, function() {
    //     console.log($(this).text());
    // });

});
    

$("#save", document ).click(function(){
    var activeststus = 0;
    var dhcpstatus = 0;
    if($("#isavtive").is(':checked') == true)
    {
      activeststus = 1;
    }
    if($("#dhcp").is(':checked') == true)
    {
      dhcpstatus = 1;
    }
    $.ajax({
    type: "POST",
    dataType: "json",
    data: {r_type : "EditDevice",
        name : $("#d_name").val(),
        id : $("#d_id").val(),
        active : activeststus,
        brightness :  $("#brightness").val(),
        ServerIP :  $("#serverIP").val(),
        port :  $("#port").val(),
        dhcp :  dhcpstatus,
        staticip :  $("#staticip").val(),
        getway :  $("#getway").val(),
        subnet :  $("#subnet").val(),
        dns1 :  $("#dns1").val(),
        dns2 :  $("#dns2").val()},
    url: 'webapi.php',
    success: function(response) {
        if(response['status'] == "success")
        {
        toastr.success('Setting successfully saved.');
        }
        else{
        toastr.error('Something went wrong');
        }
    }
});

});

$("#dhcp", document ).click(function(){
//   alert($(this).prop('checked'));

  if($(this).prop('checked') == true)
  {
    $("#dns1, #dns2, #subnet, #getway, #staticip").each(function() {
        $(this).attr('readonly', false);
    });
  }
  else
  {
    $("#dns1, #dns2, #subnet, #getway, #staticip").each(function() {
        $(this).attr('readonly', true);
    });
  }
  
});
</script>
</body>
</html>
