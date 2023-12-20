<?php
$Name = $_REQUEST["name"];
$address = $_REQUEST["email"];
$phone = $_REQUEST["phone"];
$adults = $_REQUEST["idate"];
$children = $_REQUEST["rdate"];
$checkin = $_REQUEST["addr"];
$checkout = $_REQUEST["city"];
$room = $_REQUEST["state"];
$message = $_REQUEST["pincode"];

try {
    $conn = new PDO("mysql:host=localhost;dbname=aqua", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $conn->prepare("INSERT INTO renn VALUES (:Name, :address, :phone, :adults, :children, :checkin, :checkout, :room, :message)");
    $stmt->bindParam(':Name', $Name);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':adults', $adults);
    $stmt->bindParam(':children', $children);
    $stmt->bindParam(':checkin', $checkin);
    $stmt->bindParam(':checkout', $checkout);
    $stmt->bindParam(':room', $room);
    $stmt->bindParam(':message', $message);

    $stmt->execute();
    
    header("Location: Home.html");
    exit();
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
