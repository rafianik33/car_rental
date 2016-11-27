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
            <div align="center">

                <h3>Signup Here</h3>
                <form method="post">
                    <table>
                        <tr>
                            <td>Full Name:</td>
                            <td><input type="text" name="fname" required></td>
                        </tr>
                        <tr>
                            <td>Phone Number:</td>
                            <td><input type="text" name="phone" required></td>
                        </tr>
                        <tr>
                            <td>Email Address:</td>
                            <td><input type="email" name="email" required></td>
                        </tr>
                        <tr>
                            <td>Password:</td>
                            <td><input type="password" name="id_no" required></td>
                        </tr>
                        <tr>
                            <td>Gender:</td>
                            <td>
                                <select name="gender">
                                    <option> Select Gender </option>
                                    <option> Male </option>
                                    <option> Female </option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Location:</td>
                            <td><input type="text" name="location" required></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align:right"><input type="submit" name="save" value="Submit Details"></td>
                        </tr>
                    </table>
                </form>
                <?php
                if (isset($_POST['save'])) {
                    include 'includes/config.php';
                    $fname = $_POST['fname'];
                    $id_no = $_POST['id_no'];
                    $gender = $_POST['gender'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $location = $_POST['location'];

                    $qry = "INSERT INTO users (fname,id_no,gender,email,phone,location,status)
							VALUES('$fname','$id_no','$gender','$email','$phone','$location','Approved')";
                    $result = $conn->query($qry);
                    if ($result == TRUE) {

                        echo "<script type = \"text/javascript\">
											alert(\"Successfully Registered.\");
											window.location = (\"account.php\")
											</script>";
                    } else {
                        echo "<script type = \"text/javascript\">
											alert(\"Registration Failed. Try Again\");
											window.location = (\"signup.php\")
											</script>";
                    }
                }
                ?>
                
            </div>
        </section>	<!--  end listing section  -->

        <div>

            <?php
            include 'footer.php';
            ?>
        </div>

    </body>
</html>