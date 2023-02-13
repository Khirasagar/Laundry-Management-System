
<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="Dashboard.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <input type="checkbox" id="checkbox">
    <header class="header">
        <h2 class="u-name">Laundary Manamement System
            <label for="checkbox">
                <i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
            </label>
        </h2>
        <i class="fa fa-user" aria-hidden="true"></i>
    </header>
    <div class="body">
        <nav class="side-bar">

            <ul>
                <li>
                    <a href="Dashboard.html">
                        <i class="fa fa-desktop" aria-hidden="true"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-folder" aria-hidden="true"></i>
                        <span>Laundary Request</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-folder" aria-hidden="true"></i>
                        <span>Request Status</span>
                    </a>
                </li>

            </ul>
        </nav>
        <section class="section-1">
            <div class="main-title">
                <h2 style="padding: 20px;">DASHBOARD</h2>
            </div>
            <form action="#" method="post">
                <div class="column">
                    <div class="input-box">
                        <input type="date" name="date" placeholder="Enter birth date" required />
                    </div>
                    <div class="input-box">
                        <input type="type" name="top" placeholder="Topwear(Tshirt,Top,Shirt)" required />
                    </div>
                </div>
                <div class="input-box">
                    <input type="text" name="bottom" placeholder="Bottomwear(Lower,jeans,Leggins)" required>
                </div>
                <div class="input-box">
                    <input type="text" name="woolen" placeholder="Woolen" required>
                </div>
                <div class="input-box">
                    <input type="text" name="others" placeholder="Others" required>
                </div>
                <div class="input-box">
                    <input type="text" name="service_type" placeholder="Select Service type" required>
                </div>
                <div class="input-box">
                    <input type="text" name="contact_person" placeholder="Contact person" required>
                </div>
                <div class="input-box">
                    <input type="text" name="description" placeholder="Descriptive(if any)" >
                </div>
                
                
                <!-- <div class="policy">
                    <input type="checkbox">
                    <h3>I accept all terms & condition</h3>
                </div> -->
                <div class="input-box button">
                    <input type="Submit" name="submit">
                </div>
            </form>
    </div>
    </section>
    </div>

</body>

</html>
<?php
    session_start();
    include('./conn.php');
    if(isset($_POST['submit'])){
        $id = $_SESSION['userId'];
        $top = $_POST['top'];
        $bottom = $_POST['bottom'];
        $woolen = $_POST['woolen'];
        $others = $_POST['others'];
        $service_type = $_POST['service_type'];
        $contact_person = $_POST['contact_person'];
        $description = $_POST['description'];
        $date = $_POST['date'];
        if(mysqli_query($conn,"INSERT INTO `requests` (`placed_by`, `top`, `bottom`, `woolen`, `others`, `service_type`, `contact_person`, `description`, `date`) VALUES ('$id', '$top', '$bottom', '$woolen', '$others', '$service_type', '$contact_person', '$description', '$date')")){
            ?>
                <script>
                $(document).ready(function(){
                    swal("Requested Successfully","","success");
                });
                </script>
            <?php
        }
    }
?>