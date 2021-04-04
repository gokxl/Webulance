<?php

session_start();

if (isset($_SESSION["uid"])) {
    $uid = $_SESSION["uid"];
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
        $t_hospital = "hospitalService";
    } else {
        $t_hospital = "$database.hospitalService";
    }

    try {
        $db = new PDO("mysql:host=$host", $user, $password, $options);
        //echo "Database connected successfully <BR>";

        $sql_select = "Select * from $t_hospital where hos_username = '$uid' and hos_pwd = '$pwd'";

        $stmt = $db->prepare($sql_select);
        $stmt->execute();

        if ($rows = $stmt->fetch()) {
            $_SESSION['valid'] = TRUE;
            $_SESSION['uid'] = $uid;
            $_SESSION["pwd"] = $pwd;
            $_SESSION["isadmin"] = TRUE;
        } else {
            echo '<script>alert("Invalid Username or Password. Try again")</script>';
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
    <input type="text" id="message" />
    <button onclick="transmitMessage()">Send</button>
    <script>
        // Create a new WebSocket.
        console.log("about to establish web socket connection");

        var socket = new WebSocket('ws://9830204a488b.ngrok.io');

        socket.onopen = function(e) {
            console.log("Connection established!");
        };

        // Define the 
        var message = document.getElementById('message');

        function transmitMessage() {
            socket.send(message.value);
        }

        socket.onmessage = function(e) {
            alert(e.data);
        }
    </script>
</body>

</html>