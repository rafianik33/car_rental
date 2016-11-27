<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Rajshahi Rent A Car</title>

        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <style type="text/css">
            .status{
                font-size: 20px;
            }

            table td{
                padding: 10px;
            }
        </style>
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
                <h2 style="text-decoration:underline">Your Booking Status</h2>

                <table>
                    <tr>
                        <th>Id</th>
                        <th>Car</th>
                        <th>Rent</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>

                    <?php
                    include 'includes/config.php';
                    $sel = "SELECT h.hire_id, h.rent, h.status, h.datetime, c.car_name, c.car_type FROM hire h, cars c WHERE h.car_id=c.car_id AND h.client_id = " . $_SESSION['id'];
                    $rs = $conn->query($sel);
                    ?>

                    <?php
                    if ($rs->num_rows > 0) :
                        while ($row = $rs->fetch_assoc()):
                            ?>

                            <tr>
                                <td><?php echo $row['hire_id']; ?></td>
                                <td><?php echo $row['car_name']; ?></td>
                                <td><?php echo $row['rent']; ?></td>
                                <td><?php echo $row['datetime'] ?></td>
                                <td><?php echo $row['status'] == 0 ? "Pending" : "Approved"; ?></td>

                            </tr>
                            <?php
                        endwhile;
                    endif;
                    ?>                      
                </table>

            </div>
        </section>	<!--  end listing section  -->

        <div>

            <?php
            include 'footer.php';
            ?>
        </div>

    </body>
</html>