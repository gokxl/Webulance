<?php

session_start();

if (isset($_SESSION["uid"])) {
    $uid = $_SESSION["uid"];
}

if (isset($_SESSION['errorMessage'])) {
    echo "<script type='text/javascript'>
            alert('" . $_SESSION['errorMessage'] . "');
          </script>";
    //to not make the error message appear again after refresh:
    unset($_SESSION['errorMessage']);
}

if (
    isset($_POST["login"]) && !empty($_POST["uid"])
    && !empty($_POST["pwd"])
) {

    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];

    include './config.php';
    //set table name based on local or remote connection
    if ($connection == "local") {
        $t_patients = "patients";
    } else {
        $t_patients = "$database.patients";
    }

    try {
        $db = new PDO("mysql:host=$host", $user, $password, $options);

        $sql_select = "Select * from $t_patients where pat_PatName =  '$uid' and pat_pwd = '$pwd'";
        //echo "SQL Statement is : $sql_select <BR>";

        $stmt = $db->prepare($sql_select);
        $stmt->execute();

        if ($rows = $stmt->fetch()) {
            $_SESSION['valid'] = TRUE;
            $_SESSION['uid'] = $_POST["uid"];
            $_SESSION["pwd"] = $_POST["pwd"];
        } else {
            echo '<script>alert("Invalid PatName or Password. Try again")</script>';
        }
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}
?>
<html>

<head>
    <meta charset="UTF-8">
    <style>
        input,
        button {
            padding: 10px;
        }
    </style>
</head>

<body>
    
    <select name="EmergencyType" id="EmergencyType" >
        <option value="Serious Injuries">Serious Injuries</option>
        <option value="Cardiac arrests">Cardiac arrests</option>
        <option value="Respiratory">Respiratory</option>
        <option value="Diabetics">Diabetics</option>
        <option value="Unconsciousness">Unconsciousness</option>
        <option value="Animal bites">Animal bites</option>
        <option value="Infections">Infections</option>
    </select>
    <button onclick="transmitMessage()">Send</button>

    <script>
        // Create a new WebSocket.
        console.log("about to establish web socket connection");

        var socket = new WebSocket('ws://c8b20779a4f6.ngrok.io');

        socket.onopen = function(e) {
            console.log("Connection established!");
        };

        // Define the 
        var message = document.getElementById('EmergencyType');

        function transmitMessage() {
            socket.send(message.value);
        }

        socket.onmessage = function(e) {
            alert(e.data);
        }
    </script>
</body>

</html>