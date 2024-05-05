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
$id='unavailable';
if(isset($_GET['d_id']))
{
	$id = $_GET['d_id'];
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
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index">Home</a></li>
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
                <h3 class="card-title">ID : <?php echo($id);?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
			  <?php
			  include 'conn.php';
			  
			  if(isset($_GET['d_id']))
			  {
				  
			  }
				$id=$_GET['d_id']; 
                $sql = "SELECT * FROM `devices` WHERE `device_id` = \"$id\";";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) 
				{
					$row = $result->fetch_assoc();
					
				}
					?>
			  
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name : <?php  echo($row['name'])?>	</label><br>
                    <label for="exampleInputEmail1">ID : <?php  echo($row['device_id'])?></label><br>
                    
                  </div>
                 
                
                </div>
                <!-- /.card-body -->

        </div>      
		
        
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
	  
	  
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
		<div class="row">       

    <div class="col-12">
           
           <div class="card">
             <div class="card-header">
               <h3 class="card-title">DataTable with default features
				<form  method="get" action="#">
				  <input type="text" id="d_id" name="d_id" value="<?php echo($id)?>"><br>
				  <label for="birthday">Select Date:</label>
				  <input type="date" id="date" name="date">
				  <input type="submit">
				</form>
			   
			   </h3>
             </div>
             <!-- /.card-header -->
             <div class="card-body">
               <table id="example1" class="table table-bordered table-striped">
                 <thead>
                 <tr>
                   <th>SNO</th>
                   <th>ID</th>
                   <th>value 1</th>
                   <th>Value 2</th>
                   <th>Value 3</th>
                   <th>Value 4</th>
                   <th>Time</th>
                 </tr>
                 </thead>
                 <tbody>
                <?php
                include 'conn.php';
				
				if(isset($_GET['d_id']) and isset($_GET['date']))
				{
					$did = $_GET['d_id'];
					$date = $_GET['date'];	
					$sql = "select * from history where time between '$date 00:00:00' and '$date 23:59:00' and device_id = '$did'";
					//echo($sql);
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
					  $sno = 1;
					  while($row = $result->fetch_assoc()) {

						echo("
						<tr>
						<form mathod=\"get\" action=\"showdevice\">
					   <td>$sno</td>
					   <td class = \"id\">" . $row['device_id']. "</td>
					   <td>" . $row['value1']. "</td>
					   <td>" . $row['value2']. "</td>
					   <td>" . $row['value3']. "</td>
					   <td>" . $row['value4']. "</td>
					   <td>" . $row['time']. "</td>
					   
						");
						$sno = $sno + 1;


					  }
					}
				}
				
				function secToHR($seconds) {
				$hours = floor($seconds / 3600);
				$minutes = floor(($seconds / 60) % 60);
				$seconds = $seconds % 60;
				return "$hours:$minutes:$seconds";
				}
                ?>

                 </tbody>
                 <tfoot>
                 <tr>
                   <th>SNO</th>
                   <th>ID</th>
                   <th>value 1</th>
                   <th>Value 2</th>
                   <th>Value 3</th>
                   <th>Value 4</th>
                   <th>Time</th>
                 </tr>
                 </tfoot>
               </table>
             </div>
             <!-- /.card-body -->
           </div>
           <!-- /.card -->
         </div>

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
  message.destinationName = "<?php echo($id)?>";//98:F4:AB:B3:2B:E3
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
    host = "<?php echo($_SERVER['HTTP_HOST'])?>";
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
	console.log("<?php echo($id)?>");
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
	
	if(obj.id === "<?php echo($id)?>")
	{
		console.log("device 1 fount");
		if(obj.count != null)
		{
		document.getElementById("count1").value = obj.count;
		document.getElementById("time1").value = convertHMS(obj.idealTime);
		}	
	}
	
	if(obj.id === "EC:FA:BC:63:0D:DEdj")
	{
		console.log("device 2 fount");
		if(obj.count != null)
		{
		document.getElementById("count2").value = obj.count;
		document.getElementById("time2").value = convertHMS(obj.idealTime);
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


function convertHMS(value) {
    const sec = parseInt(value, 10); // convert value to number if it's string
    let hours   = Math.floor(sec / 3600); // get hours
    let minutes = Math.floor((sec - (hours * 3600)) / 60); // get minutes
    let seconds = sec - (hours * 3600) - (minutes * 60); //  get seconds
    // add 0 if value < 10; Example: 2 => 02
    if (hours   < 10) {hours   = "0"+hours;}
    if (minutes < 10) {minutes = "0"+minutes;}
    if (seconds < 10) {seconds = "0"+seconds;}
    return hours+':'+minutes+':'+seconds; // Return is HH : MM : SS
}



</script>

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    // $('#example2').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    //   "responsive": true,
    // });
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
