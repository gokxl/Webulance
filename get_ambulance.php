<?php

require './config.php';

$id = $_GET['q'];

//$id = 'Manipal';

try {

$db = new PDO("mysql:host=$host", $user, $password, $options);
$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

$stmt = $db->prepare("SELECT * FROM AmbulanceDetails where amb_hos_id = (SELECT hos_id from hospitalService where hos_name=?) and amb_status ='on_duty' LIMIT 1");
$stmt->execute([$id]);
$rows = $stmt->fetch();

$ambulance = array("driver_name" => $rows['amb_driver'], "ambulance_Registration" => $rows['amb_reg_no']);

echo json_encode($ambulance);

} catch (Exception $e) {
echo $e->getMessage();
}

?>