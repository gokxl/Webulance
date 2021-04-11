<?php

/*session_start();

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
            //echo '<script>alert("Invalid PatName or Password. Try again")</script>';
            echo '<script>alert("Invalid PatName or Password. TTTTTry again")</script>';

            header('refresh:0; url=./index.php');
            exit();
        }
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}*/

?>

<?php
//if (isset($_SESSION["uid"])) {
?>
<html>

<head>
    <title>Register</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="./assets/css/register.css" />
</head>

<body>
    <nav>
        <h3>Webulance</h3>
        <a href="./logout.php">
            <img src="./assets/vectors/logout.svg" alt="Logout" height="20" />
            Logout
        </a>
    </nav>
    <section class="main">
        <h1 class="empty">No active requests</h1>
    </section>
    <!-- <script>
      // Create a new WebSocket.
      console.log('about to establish web socket connection')

      var socket = new WebSocket('ws://cf66d9b1f6bf.ngrok.io')

      socket.onopen = function (e) {
        console.log('Connection established!')
        socket.send('Hi da')
      }

      // Define the
      var message = document.getElementById('message')

      function transmitMessage() {
        socket.send(message.value)
      }

      socket.onmessage = function (e) {
        console.log(e.data)
        var object = JSON.parse(e.data)
        var time = new Date(object.date)
        var div = document.createElement('div')
        div.setAttribute('id', 'Div1')
        div.style.color = 'white'
        document.body.appendChild(div)
        //document.getElementById("Div1").appendChild(object);
        var x = document.createElement('INPUT')
        x.setAttribute('type', 'text')
        x.value = object.text
        var y = document.createElement('INPUT')
        y.setAttribute('type', 'text')
        y.value = object.text1
        var z = document.createElement('INPUT')
        z.setAttribute('type', 'text')
        z.value = object.text2
        document.getElementById('Div1').appendChild(x)
        var br = document.createElement('BR')
        document.getElementById('Div1').appendChild(br)
        document.getElementById('Div1').appendChild(y)
        document.getElementById('Div1').appendChild(br)
        document.getElementById('Div1').appendChild(z)
        //document.getElementById('message1').value = e.data;
      }

      document.getElementById('myButton').onclick = function () {
        location.href = 'http://3007f8e97f51.ngrok.io/MapsBackUp.html'
      }
    </script> -->
</body>

</html>
<!-- <?php
        //}
        ?> -->