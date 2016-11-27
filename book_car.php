<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Rajshahi Rent A Car</title>

        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">

        <script type="text/javascript" src="js/jquery.js"></script>
    
    </head>
    <body>

        <section class="">
            <?php
            include 'header.php';
            ?>

            <section class="caption">
                <h2 class="caption" style="text-align: center">Find You Dream Cars For Hire</h2>
                <h3 class="properties" style="text-align: center">Toyota - Mitsubishi - Hundai</h3>
            </section>
        </section><!--  end hero section  -->

        <section class="listings">
            <div class="wrapper">
                <ul class="properties_list">
                    <?php
                    include 'includes/config.php';
                    $sel = "SELECT * FROM cars WHERE car_id =" . $_GET['id'];
                    $rs = $conn->query($sel);
                    $rws = $rs->fetch_assoc();
                    ?>
                    <li>
                        <a href="book_car.php?carid=<?php echo $rws['car_id'] ?>">
                            <img class="thumb" src="cars/<?php echo $rws['image']; ?>" width="300" height="200">
                        </a>
                        <span class="price"><?php echo 'Taka:' . $rws['hire_cost']; ?></span>
                        <div class="property_details">
                            <h1>
                                <a href="book_car.php?id=<?php echo $rws['car_id'] ?>"><?php echo 'Car Make>' . $rws['car_type']; ?></a>
                            </h1>
                            <h2>Car Name/Model: <span class="property_size"><?php echo $rws['car_name']; ?></span></h2>
                        </div>
                    </li>
                    <h3>Proceed to Hire <?php echo $rws['car_name']; ?>. </h3>
                    <?php
                    if (!$_SESSION['email']) {
                        header('Location: account.php');
                        ?>

                        <?php
                    } else {
                        ?>
                        <a href="pay.php?carid=<?php echo $rws['car_id']; ?>">Click to Book</a>
                        <?php
                    }
                    ?>

                </ul>
            </div>
        </section>	<!--  end listing section  -->

        <div>

            <?php
            include 'footer.php';
            ?>
        </div>

    </body>
</html>