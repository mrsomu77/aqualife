<?php
$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$msg = $_POST["msg"];

try {
    $conn = new PDO("mysql:host=localhost;dbname=aqua", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("INSERT INTO contact (name, phone, email, message) VALUES (?, ?, ?, ?)");
    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $phone);
    $stmt->bindParam(3, $email);
    $stmt->bindParam(4, $msg);

    $stmt->execute();

    if ($stmt) {
        header("Location: Home.html");
        exit();
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
