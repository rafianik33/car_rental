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
            .txt{
                width: 600px;
                height: 200px;
            }
        </style>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
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
                <h2 style="text-decoration:underline">Message Admin Here</h2>
                <ul class="properties_list">
                    <form method="post">
                        <table>
                            <tr>
                                <td style="color: #003300; font-weight: bold; font-size: 24px">Enter Your Message Here:</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>
                                    <textarea name="message" placeholder="Enter Message Here" class="txt"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="submit" name="send" value="Send Message"></td>
                            </tr>
                        </table>
                    </form>
                    <?php
                    if (isset($_POST['send'])) {
                        include 'includes/config.php';

                        $message = $_POST['message'];

                        $qry = "INSERT INTO message (message,client_id,time,status)
							VALUES('$message','$_SESSION[id]',NOW(),'Unread')";
                        $result = $conn->query($qry);
                        if ($result == TRUE) {
                            echo "<script type = \"text/javascript\">
											alert(\"Message Successfully Send\");
											window.location = (\"success.php\")
											</script>";
                        } else {
                            echo "<script type = \"text/javascript\">
											alert(\"Message Not Send. Try Again\");
											window.location = (\"message_admin.php\")
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