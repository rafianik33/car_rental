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


        <section>
            <div align="center">
                <div>
                    <form method="post">
                        <h3>Login</h3>
                        <table>
                            <tr>
                                <td>Email Address:</td>
                                <td><input type="email" name="email" placeholder="Enter Email Address" required></td>
                            </tr>
                            <tr>
                                <td>Password:</td>
                                <td><input type="password" name="pass" placeholder="Enter Your Password" required></td>
                            </tr>
                            <tr>
                                <td><input type="submit" name="log" value="Login Here"></td>
                                <td style="text-align:right;"><a href="signup.php">Sigup Here</a></td>
                            </tr>
                        </table>
                    </form>
                    <?php
                    if (isset($_POST['log'])) {
                        include 'includes/config.php';

                        $uname = $_POST['email'];
                        $pass = $_POST['pass'];

                        $qy = "SELECT * FROM users WHERE email = '$uname' AND id_no = '$pass' AND Status='Approved'";
                        $log = $conn->query($qy);
                        $num = $log->num_rows;
                        $row = $log->fetch_assoc();


                        if ($num == 1) {
                            session_start();
                            $_SESSION['id'] = $row['client_id'];
                            $_SESSION['email'] = $row['email'];
                            $_SESSION['access'] = $row['access_level'];
                            if ($row['access_level'] == 9) {
                                echo "<script type = \"text/javascript\">
									alert(\"Login Successful\");
									window.location = (\"admin\")
									</script>";
                            } else {
                                echo "<script type = \"text/javascript\">
									alert(\"Login Successful\");
									window.location = (\"index.php\")
									</script>";
                            }
                        } else {
                            echo "<script type = \"text/javascript\">
									alert(\"Login Failed, Please Try Again\");
									window.location = (\"account.php\")
									</script>";
                        }
                    }
                    ?>

                    </section><!--  end search section  -->

                    <div>

                        <?php
                        include 'footer.php';
                        ?>
                    </div>

                    </body>
                    </html>