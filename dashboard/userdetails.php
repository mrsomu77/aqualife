<!DOCTYPE html>
<html>

<head>
    <style>
        .bg {
            background-color: aqua;
        }

        .f {
            font-size: 30px;
        }
    </style>
    <title>Customer Details</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body class="bg">
    <center>
        <table border="5px solid black" width="50%">
            <h1><u>Customer Details</u></h1>
            <tr class="f">
                <th>username</th>
                <th>password</th>
                <th>phone</th>
            </tr>
            <?php
            try {
                $conn = new PDO("oci:dbname=localhost:1521/xe", "system", "admin");
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $conn->prepare("SELECT * FROM signup");
                $stmt->execute();
                $result = $stmt->fetchAll();

                foreach ($result as $row) {
            ?>
                    <tr>
                        <th><?php echo $row["username"]; ?></th>
                        <th><?php echo $row["password"]; ?></th>
                        <th><?php echo $row["phone"]; ?></th>
                    </tr>
            <?php
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            ?>
        </table>
    </center>
</body>

</html>
