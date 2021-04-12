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

    include 'config.php';
    //set table name based on local or remote connection
    if ($connection == "local") {
        $t_patients = "patients";
    } else {
        $t_patients = "$database.patients";
    }

    try {
        $db = new PDO("mysql:host=$host", $user, $password, $options);

        $sql_select = "Select * from $t_patients where pat_username =  '$uid' and pat_pwd = '$pwd'";
        //echo "SQL Statement is : $sql_select <BR>";
        //echo "SQL Connection is : $host <BR>";


        $stmt = $db->prepare($sql_select);
        $stmt->execute();

        if ($rows = $stmt->fetch()) {
            //echo "SQL Statement is : $rows <BR>";
            $_SESSION['valid'] = TRUE;
            $_SESSION['uid'] = $_POST["uid"];
            $_SESSION["pwd"] = $_POST["pwd"];
        } else {
            echo '<script> alert("Invalid PatName or Password. Try again");</script>';
            header('refresh:0; url=./index.php');
            exit();
        }
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}
?>

<?php
if (isset($_SESSION["uid"])) {
?>
    <html>

    <head>
        <title>Patients Dashboard</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="./assets/css/patients.css" />
    </head>

    <body>
        <nav>
            <h3>Webulance</h3>
            <a href="./logout.php">
                <img src="./assets/vectors/logout.svg" alt="Logout" height="20" />
                Logout
            </a>
        </nav>
        <main class="main">
            <section class="left-pane">
                <div class="info">
                    <div>
                        ① Select the <strong>Type of Emergency</strong> and the
                        <strong>Type of Vehicle</strong>.
                    </div>
                    <div>② Send your request.</div>
                </div>
            </section>
            <section class="right-pane">
                <div class="message-card">
                    <h3>Request Ambulance</h3>
                    <select name="EmergencyType" id="EmergencyType">
                        <option value="Serious Injuries">Serious Injuries</option>
                        <option value="Cardiac Arrests">Cardiac arrests</option>
                        <option value="Respiratory">Respiratory</option>
                        <option value="Diabetics">Diabetics</option>
                        <option value="Unconsciousness">Unconsciousness</option>
                        <option value="Animal Bites">Animal bites</option>
                        <option value="Infections">Infections</option>
                    </select>
                    <select name="cars" id="cars">
                        <option value="volvo">Volvo</option>
                        <option value="saab">Saab</option>
                        <option value="mercedes">Mercedes</option>
                        <option value="audi">Audi</option>
                    </select>
                    <button onclick="transmitMessage()">Send</button>

                    <script>
                        // Create a new WebSocket.
                        console.log("about to establish web socket connection");

                        var socket = new WebSocket('ws://594bf9adc584.ngrok.io');

                        socket.onopen = function(e) {
                            console.log("Connection established!");
                        };

                        // Define the 
                        var HospitalName = 'Manipal';
                        var Username = '<?php echo $_SESSION["uid"]; ?>';
                        console.log(Username);

                        function makeRequest(url, callback) {
                            var request;
                            if (window.XMLHttpRequest) {
                                request = new XMLHttpRequest(); // IE7+, Firefox, Chrome, Opera, Safari
                            } else {
                                request = new ActiveXObject("Microsoft.XMLHTTP"); // IE6, IE5
                            }
                            request.onreadystatechange = function() {
                                if (request.readyState == 4 && request.status == 200) {
                                    callback(request);
                                }
                            }
                            request.open("GET", url, true);
                            request.send();
                        }

                        function transmitMessage() {
                            makeRequest("get_ambulance.php?q=" + HospitalName + "&r=" + Username, function(data) {

                                var data = JSON.parse(data.responseText);
                                /*var x = document.createElement("INPUT");
                                x.setAttribute("type", "text");
                                x.value = data.driver_name;
                                var y = document.createElement("INPUT");
                                y.setAttribute("type", "text");
                                y.value = data.ambulance_Registration;
                                var z = document.createElement("INPUT");
                                z.setAttribute("type", "text");
                                z.value = data.PatientName;
                                var w = document.createElement("INPUT");
                                w.setAttribute("type", "text");
                                w.value = data.PatientMob;
                                document.body.appendChild(x);
                                document.body.appendChild(y);
                                document.body.appendChild(z);
                                document.body.appendChild(w);*/

                                const emptyHeader = document.querySelector('.info')
                                if (emptyHeader !== null) emptyHeader.remove()
                                const docElem = document.querySelector('.left-pane')
                                docElem.insertAdjacentHTML(
                                    'beforeend',
                                    `   <div class="card">
          <div class="bottom-row">
            <div class="field">
              <span class="bold">Driver Assigned:</span>
              <span>${data.driver_name}</span>
            </div>
            <div class="field">
              <span class="bold">Vehicle Registration:</span>
              <span>${data.ambulance_Registration}</span>
            </div>
          </div>
          <div class="bottom-row">
            <div class="field">
              <span class="bold">Patient Name:</span>
              <span>${data.PatientName}</span>
            </div>
            <div class="field">
              <span class="bold">Mobile Number:</span>
              <span>${data.PatientMob}</span>
            </div>
          </div>
        </div>`
                                )
                                docElem.classList.add('modify')

                                var message = {
                                    type: "message",
                                    text: document.getElementById("EmergencyType").value,
                                    text1: document.getElementById("cars").value,
                                    text2: data.driver_name,
                                    text3: data.ambulance_Registration,
                                    text4: data.PatientName,
                                    text5: data.PatientMob,
                                    date: Date.now()
                                };
                                socket.send(JSON.stringify(message));
                            });
                        }

                        socket.onmessage = function(e) {
                            alert(e.data);
                        }
                    </script>
    </body>

    </html>
<?php } ?>