<?php

$status = "0";
// echo($_POST['newDeviceactive']);
if(isset($_POST['newDeviceName']) and isset($_POST['newDeviceID']) and isset($_POST['newDeviceactive'])  )
{
  include 'conn.php';
  $id = $_POST['newDeviceID'];
  $name = $_POST['newDeviceName'];
  $status = $_POST['newDeviceactive'];
  $sql = "INSERT INTO device (d_id, d_name, d_status) values (\"$id\", \"$name\", $status)";
  // echo($sql);
  if ($conn->query($sql) === TRUE) {
    // echo "New Device Save successfully";
    $status = "1";
  } else {
    $status = "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
}

?>

<?php include 'pagetop.php'?>

  <!-- Main Sidebar Container -->
<?php include 'MainSideBar.php';?>
  <!-- Content Wrapper. Contains page content -->



  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add New Device</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="?">Home</a></li>
              <li class="breadcrumb-item active">Add New Employee</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <?php if($status != "0"){?>
  <div class="alert alert-<?php if($status == "1") {echo("success");}else{echo("danger");}?> alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> Alert!</h5>
                  <?php if($status == "1") {echo("New Device Save successfully");}else{echo("Somthing is wrong");}?>
                </div>
                <?php }?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
		    <div class="row justify-content-center">  

        <div class="col-md-6 ">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="#">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Device ID</label>
                    <input type="text" class="form-control" name="newDeviceID" placeholder="Enter ID">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Name</label>
                    <input type="text" class="form-control" name="newDeviceName" placeholder="Enter Name">
                  </div>
                 
                  <!--
                  <div class="custom-control custom-switch">
                        <input type="checkbox" id="newDeviceactive" value="1" class="custom-control-input align-middle" >
                        <input type='hidden' value='0' name='newDeviceactive'>
                        <label class="custom-control-label align-middle" for="newDeviceactive">Enable/Disable</label>
                  </div>
                   -->
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
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
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
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
</script>
</body>
</html>
