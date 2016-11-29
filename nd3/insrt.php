<?php
$servername = "localhost";
$username = "root";
$conn = "";
$name = "";
$value = 0;

try {
$conn = new PDO("mysql:host=$servername;dbname=akdemija", $username);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
echo "Connection failed: " . $e->getMessage();
}
$v1 = '2016-09-24';
$v2 = 23;
$v3 = null;
$v4 = '2016-09-24 11:50:00';
$v5 = '2016-09-24 13:05:00';
$v6 = 103;
$v7 = 215;
$micro = microtime(true);

// po viena
for($i = 0; $i < 1000; $i++)
{

$stmt = $conn->prepare("INSERT INTO JobsRegister (arrivalDate, contractId, goal, kkTechnicianArrivalDate, kkTechnicianDepartureDate, kkTechnicianId, objectId)
VALUES (:arrivalDate, :contractId, :goal, :kkTechnicianArrivalDate, :kkTechnicianDepartureDate, :kkTechnicianId, :objectId)");
$stmt->bindParam('arrivalDate', $v1);
$stmt->bindParam('contractId', $v2);
$stmt->bindParam('goal', $v3);
$stmt->bindParam('kkTechnicianArrivalDate', $v4);
$stmt->bindParam('kkTechnicianDepartureDate', $v5);
$stmt->bindParam('kkTechnicianId', $v6);
$stmt->bindParam('objectId', $v7);
// insert one row

$stmt->execute();
}
$time_consumed = round(microtime(true) - $micro,3)*1000;
echo "Time consumed - ".$time_consumed."\n";

// dalimis
for($i = 0; $i < 100; $i++)
{
$stmt = $conn->prepare("INSERT INTO JobsRegister (arrivalDate, contractId, goal, kkTechnicianArrivalDate, kkTechnicianDepartureDate, kkTechnicianId, objectId)
SELECT arrivalDate, contractId, goal, kkTechnicianArrivalDate, kkTechnicianDepartureDate, kkTechnicianId, objectId from JobsRegister limit 1000");
$stmt->execute();
}
$time_consumed = round(microtime(true) - $micro,3)*1000;
echo "Time consumed - ".$time_consumed."\n";
?>