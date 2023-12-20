<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title></title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/responsive.css" rel="stylesheet" />
</head>

<body>
    <div class="header_bottom">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" style="margin-top: -90px;" href="am.html">
                    <span>
                        AQUA LIFE
                    </span>
                </a>
                <div class="slider_section">
                    <div class="detail-box">
                        <a style="margin-left: 1020px;" href="logout.php">Logout</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <form action="userdetails.php" method="post">
        <section class="slider_section" style="margin-top: -86px;">
            <div class="container ">
                <div class="row">
                    <div class="col-md-6 ">
                        <div class="detail-box">
                            <h1>
                                Customer Details
                            </h1>

                            <main style="max-width: 800px; margin: 20px auto; background-color: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); border-radius: 8px; overflow: hidden;">

                                <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
                                    <thead>
                                        <tr>
                                            <th style="border: 1px solid #ddd; padding: 12px; background-color: #fd7e14; color: #fff; text-align: left;">Customer Name</th>
                                            <th style="border: 1px solid #ddd; padding: 12px; background-color: #fd7e14; color: #fff; text-align: left;">Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        try {
                                            $conn = new PDO("mysql:host=localhost;dbname=aqua", "root", "");
                                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                            $stmt = $conn->prepare("select * from sign");
                                            $stmt->execute();
                                            $result = $stmt->fetchAll();

                                            foreach ($result as $row) {
                                        ?>
                                                <tr>
                                                    <th><?php echo $row["username"]; ?></th>
                                                    <th><?php echo $row["email"]; ?></th>
                                                </tr>

                                        <?php
                                            }
                                        } catch (Exception $e) {
                                        }
                                        ?>

                                        <!-- Add more rows as needed -->
                                    </tbody>
                                </table>
                            </main>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="img-box">
                            <img src="images/slider-img.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <input type="submit" name="submit" id="submit">
    </form>
    </div>

    <br><br>
    <footer class="footer_section">
        <div class="container">
            <p>
                &copy; <span id="displayDateYear"></span> All Rights Reserved By
                <a href="https://html.design/">AQUA LIFE</a>
            </p>
        </div>
    </footer>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
</body>

</html>
