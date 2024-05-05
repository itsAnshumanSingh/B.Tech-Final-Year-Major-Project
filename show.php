<?php

$status = "0";

// echo($_POST['newDeviceactive']);
if(isset($_POST['newDeviceName']) and isset($_POST['newDeviceID'])  )// and isset($_POST['newDeviceactive'])
{
  include 'conn.php';
  $id = $_POST['newDeviceID'];
  $name = $_POST['newDeviceName'];
//  $status = $_POST['newDeviceactive'];
  $sql = "INSERT INTO device (d_id, d_name) values (\"$id\", \"$name\")";
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
              <li class="breadcrumb-item active">Add New Device</li>
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
                <h3 class="card-title">ID : 98:F4:AB:B3:2B:E3</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="#">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Count</label>
                    <input type="text" id="count1" class="form-control" name="newDeviceID" placeholder="Nan">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">value</label>
                    <input type="text" id="time1" class="form-control" name="newDeviceName" placeholder="Nan">
                  </div>
                 
                
                </div>
                <!-- /.card-body -->

              </form>
			  <div class="card-footer">
                  <button type="submit" id="reset1" class="btn btn-primary">Reset</button>
                </div>
            </div>
        </div>      
		
        <div class="col-md-6 ">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">ID : 98:F4:AB:B3:2B:E3</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="#">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Count</label>
                    <input type="text" id="count2" class="form-control" name="newDeviceID" placeholder="Nan">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">value</label>
                    <input type="text" id="time2" class="form-control" name="newDeviceName" placeholder="Nan">
                  </div>
                 
                
                </div>
                <!-- /.card-body -->

              </form>
			  <div class="card-footer">
                  <button type="submit" id="reset2" class="btn btn-primary">Reset</button>
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
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="mqttws31.min.js" type="text/javascript"></script>

<!-- Page specific script -->
<script>





$( "#reset1" ).click(function() {
   alert("Clearing Data");
  message = new Paho.MQTT.Message("rs");
  message.destinationName = "98:F4:AB:B3:2B:E3";
  client.send(message);
});

$( "#reset2" ).click(function() {
  
   alert("Clearing Data");
  message = new Paho.MQTT.Message("rs");
  message.destinationName = "ServerToDevice2";
  client.send(message);
});

  // Called after form input is processed
$( document ).ready(function() {
		// alert("DGFDGD");
	startConnect();

});


function startConnect() {
	// alert("DGFDGD");
    // Generate a random client ID
    clientID = "clientID-" + parseInt(Math.random() * 100);

    // Fetch the hostname/IP address and port number from the form
    host = "192.168.1.5";
    port = 9001;

    // Print output for the user in the messages div
    console.log( '<span>Connecting to: ' + host + ' on port: ' + port + '</span><br/>');
    console.log( '<span>Using the following client value: ' + clientID + '</span><br/>');


    // Initialize new Paho client connection
    client = new Paho.MQTT.Client(host, Number(port), clientID);

    // Set callback handlers
    client.onConnectionLost = onConnectionLost;
    client.onMessageArrived = onMessageArrived;

    // Connect the client, if successful, call onConnect function
    client.connect({ 
        onSuccess: onConnect,
    });
}

// Called when the client connects
function onConnect() {
    // Fetch the MQTT topic from the form
    //topic = document.getElementById("topic").value;

    // Print output for the user in the messages div
    //document.getElementById("messages").innerHTML += '<span>Subscribing to: ' + topic + '</span><br/>';

    // Subscribe to the requested topic
    client.subscribe("DeviceToServer");
}

// Called when the client loses its connection
function onConnectionLost(responseObject) {
    console.log("onConnectionLost: Connection Lost");
    if (responseObject.errorCode !== 0) {
        console.log("onConnectionLost: " + responseObject.errorMessage);
    }
}

// Called when a message arrives
function onMessageArrived(message) {

    console.log("onMessageArrived: " +  message.payloadString);
	var s  = '{"lat": "23.893872", "log": "77.047891"}';
	var obj = JSON.parse(message.payloadString);
	console.log("ID : " + obj.id);
	
	if(obj.id === "98:F4:AB:B3:2B:E3")
	{
		console.log("device 1 fount");
		if(obj.count != null)
		{
		document.getElementById("count1").value = obj.count;
		document.getElementById("time1").value = obj.idealTime;
		}	
	}
	
	if(obj.id === "EC:FA:BC:63:0D:DE")
	{
		console.log("device 2 fount");
		if(obj.count != null)
		{
		document.getElementById("count2").value = obj.count;
		document.getElementById("time2").value = obj.idealTime;
		}
	}
	//console.log("COUNT : " + obj.count);
	//console.log("IDEAL TIME : " + obj.idealTime);
   // document.getElementById("messages").innerHTML += '<span>Topic: ' + message.destinationName + '  | ' + message.payloadString + '</span><br/>';
    //updateScroll(); // Scroll to bottom of window
}

// Called when the disconnection button is pressed
function startDisconnect() {
    client.disconnect();
    document.getElementById("messages").innerHTML += '<span>Disconnected</span><br/>';
    updateScroll(); // Scroll to bottom of window
}



</script>
</body>
</html>
