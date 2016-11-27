<?php
include '../includes/config.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin Home</title>
        <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    </head>
    <body>
        <div id="header">
            <div class="shell">

                <?php
                include 'menu.php';
                ?>
            </div>
        </div>


        <div id="container">
            <div class="shell">

                <br />

                <div id="main">
                    <div class="cl">&nbsp;</div>

                    <div id="content">

                        <div class="box">
                            <div class="box-head">
                                <h2>Add New Vehicles</h2>
                            </div>

                            <form action="" method="post" enctype="multipart/form-data">

                                <div class="form">
                                    <p>
                                        <span class="req">max 100 symbols</span>
                                        <label>Vehicle Name <span>(Required Field)</span></label>
                                        <input type="text" class="field size1" name="car_name" required />
                                    </p>	
                                    <p>
                                        <span class="req">max 20 symbols</span>
                                        <label>Vehicle Make <span>(Required Field)</span></label>
                                        <input type="text" class="field size1" name="car_type" required />
                                    </p>
                                    <p>
                                        <span class="req">max 20 symbols</span>
                                        <label>Vehicle Hire Price <span>(Required Field)</span></label>
                                        <input type="text" class="field size1" name="hire_cost" required />
                                    </p>
                                    <p>
                                        <span class="req">Current Images</span>
                                        <label>Vehicle Image <span>(Required Field)</span></label>
                                        <input type="file" class="field size1" name="image" required />
                                    </p>
                                    <p>
                                        <span class="req">In Terms of Passenger Seats</span>
                                        <label>Vehicle Capacity<span>(Required Field)</span></label>
                                        <input type="text" class="field size1" name="capacity" required />
                                    </p>	

                                </div>

                                <div class="buttons">
                                    <input type="button" class="button" value="preview" />
                                    <input type="submit" class="button" value="submit" name="send" />
                                </div>

                            </form>
                            <?php
                            if (isset($_POST['send'])) {

                                $target_path = "../cars/";
                                $target_path = $target_path . basename($_FILES['image']['name']);
                                if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {

                                    $image = basename($_FILES['image']['name']);
                                    $car_name = $_POST['car_name'];
                                    $car_type = $_POST['car_type'];
                                    $hire_cost = $_POST['hire_cost'];
                                    $capacity = $_POST['capacity'];

                                    $qr = "INSERT INTO cars (image, car_name,car_type,hire_cost,capacity,status) 
													VALUES ('$image','$car_name','$car_type','$hire_cost','$capacity','Available')";
                                    $res = $conn->query($qr);
                                    if ($res === TRUE) {
                                        echo "<script type = \"text/javascript\">
											alert(\"Vehicle Succesfully Added\");
											window.location = (\"add_vehicles.php\")
											</script>";
                                    }
                                } else
                                    'Failed';
                            }
                            ?>
                        </div>

                    </div>

                    <div id="sidebar">

                        <div class="box">

                            <div class="box-head">
                                <h2>Management</h2>
                            </div>

                            <div class="box-content">
                                <a href="add_vehicles.php" class="add-button"><span>View Our Vehicles</span></a>
                                <div class="cl">&nbsp;</div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="cl">&nbsp;</div>			
            </div>
        </div>


        <div id="footer">
            <div class="shell">
                <span class="left">&copy; <?php echo date("Y"); ?> - Rajshahi Rent A Car</span>
                <span class="right">

                </span>
            </div>
        </div>

    </body>
</html>