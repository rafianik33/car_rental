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
                    <h3 style="text-decoration: underline">Make Payments Here</h3>

                    <form method="post">
                        <table>
                            <tr>
                                <td>bKash Transaction ID:</td>
                                <td><input type="text" name="bKash" required></td>
                            </tr>
                            <tr>
                                <td>Phone No:</td>
                                <td><input type="text" name="phoneno" required></td>
                            </tr>

                            <tr>
                                <td colspan="2" style="text-align:right"><input type="submit" name="pay" value="Submit Details"></td>
                            </tr>
                        </table>
                    </form>
                    <?php
                    if (isset($_POST['pay'])) {

                        include 'includes/config.php';
                        $bKash = $_POST['bKash'];
                        $phone = $_POST['phoneno'];
                        $id = $_SESSION['id'];
                        $car_id = $_GET['carid'];
                        $sel = "SELECT * FROM cars WHERE car_id =" . $car_id;

                        $rs = $conn->query($sel);
                        $rws = $rs->fetch_assoc();

                        $rent = $rws['hire_cost'];

                        $qry = "INSERT INTO hire(client_id, car_id, Rent, phoneno, bkash_tran_id, status) VALUES ($id,$car_id,$rent,$phone,$bKash,'PENDING')";
                        $result = $conn->query($qry);

                        if ($result == TRUE) {
                            echo "<script type = \"text/javascript\">
											alert(\"Payment Successfully Done. Wait for Admin Approval\");
											window.location = (\"wait.php\")
											</script>";
                        } else {
                            echo "<script type = \"text/javascript\">
											alert(\"Payment Failed. Try Again\");
											window.location = (\"pay.php\")
											</script>";
                        }
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