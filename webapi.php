
<?php
if(isset($_POST['r_type']) )
{
    if($_POST['r_type'] == "EditDevice")
    {   
        
        if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['active']) && isset($_POST['brightness']) && isset($_POST['ServerIP']) && isset($_POST['port']) && isset($_POST['dhcp']) && isset($_POST['staticip']) && isset($_POST['getway']) && isset($_POST['subnet']) && isset($_POST['dns1']) && isset($_POST['dns2']))
        {

            $id = $_POST['id'];
            $name = $_POST['name'];
            $active = $_POST['active'];
            $brightness = $_POST['brightness'];
            $ServerIP = $_POST['ServerIP'];
            $port = $_POST['port'];
            $dhcp = $_POST['dhcp'];
            $staticip = $_POST['staticip'];
            $getway = $_POST['getway'];
            $subnet = $_POST['subnet'];
            $dns1 = $_POST['dns1'];
            $dns2 = $_POST['dns2'];

            include 'conn.php';
            $sql = "UPDATE device SET d_name=\"$name\",  d_active=\"$active\",  brightness=\"$brightness\",  server=\"$ServerIP\",  serverport=\"$port\",  DHCP=\"$dhcp\",  staticIP=\"$staticip\",  getway=\"$getway\",  subnet=\"$subnet\",  DNS1=\"$dns1\", DNS2=\"$dns2\"  WHERE d_id=\"$id\""  ;
            // VALUES ('John', 'Doe', 'john@example.com')";
             //echo($sql);
            if ($conn->query($sql) === TRUE) {
                $api_res = array("status"=>"success");
                echo json_encode($api_res);

            } else {
                // echo "Error: " . $sql . "<br>" . $conn->error;
                $api_res = array("status"=>"faild");
                echo json_encode($api_res);
            }
            $conn->close();

            
        }

    }

    

    

}

// include 'conn.php';

// $sql = "SELECT unix_timestamp(time), count FROM history";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//   // output data of each row
// //   while($row = $result->fetch_assoc()) {
// //     echo "id: " . $row["id"]. " - Name: " . $row["user"]. " " . $row["time"]. "<br>";
// //   }
// // } else {
// //   echo "0 results";
// $row = $result->fetch_all(MYSQLI_ASSOC);

// echo (json_encode($row));
// }
// $conn->close();
?>