<?php
$email = $_REQUEST["uname"];
$password = $_REQUEST["password"];

try {
    $conn = new PDO("mysql:host=localhost;dbname=aqua", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT username, password FROM ad WHERE username=:email AND password=:password");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        session_start();
        $_SESSION["user"] = $email;
        header("Location: am.html");
        exit();
    } else {
        echo "<BR><BR><BR><center> <p style='color: red;'>INCORRECT EMAIL/PASSWORD</p> </center>";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

session_start();
$_SESSION["firstname"] = $email;
?>