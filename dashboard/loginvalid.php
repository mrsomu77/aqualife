<?php
$username = $_POST["uname"];
$password = $_POST["pass"];

try {
    $conn = new PDO("mysql:host=localhost;dbname=aqua", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT username, password FROM sign WHERE username = :username AND password = :password");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);

    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        session_start();
        $_SESSION["user"] = $username;
        header("Location: Home.html");
        exit();
    } else {
        echo "Register first";
        header("Location: login.html");
        exit();
    }

    $conn = null;
} catch (PDOException $ex) {
    echo $ex->getMessage();
}
?>
