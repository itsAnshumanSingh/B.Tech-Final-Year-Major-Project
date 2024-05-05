  <div class="content-wrapper" onload="startConnect();">
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
              <li class="breadcrumb-item active">Dashboard v1</li>
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
        
		<div class="row">
		
		



<?php
include 'conn.php';
$sql = "SELECT * FROM `device` ORDER BY `device`.`d_active` DESC;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	
	
  while($row = $result->fetch_assoc()) {
  //echo "The number is: $x <br>";
  
  echo("<div class=\"col-lg-4 col-6\">
            <!-- small box -->
            <div class=\"small-box bg-");
			if($row['d_active'] == 0)
			{echo("gray");}
			else
			{
				if($row['d_status'] == 1){echo("green");}
				else{echo("red");}
			}
			echo("\">
              <div class=\"inner\">
                <h3>");
			echo($row['d_name']);
			echo("</h3>
			<p>New Orders</p>
		  </div>
		  <div class=\"icon\">
			<i class=\"ion ion-bag\"></i>
		  </div>
		  <a href=\"?j=adddevice\" class=\"small-box-footer\">More<i class=\"fas fa-arrow-circle-right\"></i></a>
            </div>
          </div>
		  ");
	}
}
?>


        
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
  <script>
	
	 
   // Called after form input is processed
function startConnect() {
	alert("DGFDGD");
    // Generate a random client ID
    clientID = "clientID-" + parseInt(Math.random() * 100);

    // Fetch the hostname/IP address and port number from the form
    host = "192.168.0.10";
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
    topic = document.getElementById("topic").value;

    // Print output for the user in the messages div
    document.getElementById("messages").innerHTML += '<span>Subscribing to: ' + topic + '</span><br/>';

    // Subscribe to the requested topic
    client.subscribe(topic);
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
	console.log("Lat : " + obj.sda);
	console.log("Log : " + obj.log);
    document.getElementById("messages").innerHTML += '<span>Topic: ' + message.destinationName + '  | ' + message.payloadString + '</span><br/>';
    updateScroll(); // Scroll to bottom of window
}

// Called when the disconnection button is pressed
function startDisconnect() {
    client.disconnect();
    document.getElementById("messages").innerHTML += '<span>Disconnected</span><br/>';
    updateScroll(); // Scroll to bottom of window
}

// Updates #messages div to auto-scroll
function updateScroll() {
    var element = document.getElementById("messages");
    element.scrollTop = element.scrollHeight;
}
</script>
