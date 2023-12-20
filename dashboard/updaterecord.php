<?php
$name = $_REQUEST["name"];
$address = $_REQUEST["email"];
$phone = $_REQUEST["idate"];
$adults = $_REQUEST["rdate"];
$children = $_REQUEST["icount"];
$checkin = $_REQUEST["fcount"];
$checkout = $_REQUEST["ptop"];
$room = $_REQUEST["pmid"];
$message = $_REQUEST["pbot"];

try {
    $conn = new PDO("mysql:host=localhost;dbname=aqua", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("INSERT INTO re VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $address);
    $stmt->bindParam(3, $phone);
    $stmt->bindParam(4, $adults);
    $stmt->bindParam(5, $children);
    $stmt->bindParam(6, $checkin);
    $stmt->bindParam(7, $checkout);
    $stmt->bindParam(8, $room);
    $stmt->bindParam(9, $message);

    $stmt->execute();

    header("Location: am.html");

    if ($conn != null) {
        echo "<br><br>.";
    }

    $conn = null;
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
