<?php
$email = $_REQUEST["uname"];
$password = $_REQUEST["password"];

try {
    $conn = new PDO("oci:dbname=localhost:1521/xe", "system", "admin");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT username FROM signup WHERE username=:email AND password=:password");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        header("Location: index.html");
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
