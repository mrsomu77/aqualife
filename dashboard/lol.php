<?php
$username = $_POST["uname"];
$email = $_POST["email"];
$password = $_POST["pass"];
$cpassword = $_POST["cpass"];

try {
    $conn = new PDO("mysql:host=localhost;dbname=aqua", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("INSERT INTO sign (username, email, password, confirmpassword) VALUES (?, ?, ?, ?)");
    $stmt->bindParam(1, $username);
    $stmt->bindParam(2, $email);
    $stmt->bindParam(3, $password);
    $stmt->bindParam(4, $cpassword);

    $result = $stmt->execute();

    if ($result) {
        header("Location: login.html");
        exit();
    } else {
        header("Location: login.html");
        exit();
    }

    $conn = null;
} catch (PDOException $ex) {
    echo $ex->getMessage();
}
?>
