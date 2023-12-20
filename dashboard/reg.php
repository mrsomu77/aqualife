<?php
$name = $_REQUEST["text"];
$password = $_REQUEST["password"];
$phone = $_REQUEST["tel"];

try {
    $conn = new PDO("oci:dbname=localhost:1521/xe", "system", "admin");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $conn->prepare("INSERT INTO signup VALUES (:name, :password, :phone)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':phone', $phone);

    $stmt->execute();
    
    $conn = null;

    header("Location: login.html");
    exit();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
