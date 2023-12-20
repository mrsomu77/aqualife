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
        <table border="5px solid black" width="90%">
            <h1><u>Rental Informations</u></h1>
            <tr class="f">
                <th>Name</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Pincode</th>
                <th>Email</th>
                <th>Issue Date</th>
                <th>Return Date</th>
                <th>Yield</th>
                <th>Health</th>
            </tr>
            <?php
            try {

                $conn = new PDO("mysql:host=localhost;dbname=aqua", "root", "");
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("select * from rent");
                $stmt->execute();
                $result = $stmt->fetchAll();

                foreach ($result as $row) {
            ?>
                    <tr>
                        <th><?php echo $row["name"]; ?></th>
                        <th><?php echo $row["address"]; ?></th>
                        <th><?php echo $row["city"]; ?></th>
                        <th><?php echo $row["state"]; ?></th>
                        <th><?php echo $row["pincode"]; ?></th>
                        <th><?php echo $row["email"]; ?></th>
                        <th><?php echo $row["issuedate"]; ?></th>
                        <th><?php echo $row["returndate"]; ?></th>
                        <th><?php echo $row["yield"]; ?></th>
                        <th><?php echo $row["health"]; ?></th>
                    </tr>
            <?php
                }

            } catch (Exception $e) {

            }
            ?>
        </table>
    </center>
</body>

</html>
