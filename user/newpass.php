<?php
// Check if form is submitted
if(isset($_POST['submit'])){
    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mahaepass";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $full_name = $_POST['input-username'];
    $email = $_POST['input-email'];
    $dob = $_POST['input-first-name'];
    
    $institute_name = $_POST['input-address'];
    $address = $_POST['input-address'];
    $city = $_POST['input-city'];
    $postal_code = $_POST['input-postal-code'];
    $source = $_POST['Source'];
    $destination = $_POST['Destination'];
    $from_date = $_POST['input-date'];
    $to_date = $_POST['output-date'];
    $passid = mt_rand(100000000, 999999999);

    // File upload handling
    $target_dir = "uploads/"; // Directory where files will be uploaded
    $photo = $target_dir . basename($_FILES["photo"]["name"]);
    $declarance_form = $target_dir . basename($_FILES["declarance_form"]["name"]);
    $bonafide_certificate = $target_dir . basename($_FILES["bonafide_certificate"]["name"]);
    $aadhar_card = $target_dir . basename($_FILES["aadhar_card"]["name"]);

    // Move uploaded files to specified directory
    move_uploaded_file($_FILES["identity_document"]["tmp_name"], $identity_document);
    move_uploaded_file($_FILES["declarance_form"]["tmp_name"], $declarance_form);
    move_uploaded_file($_FILES["bonafide_certificate"]["tmp_name"], $bonafide_certificate);
    move_uploaded_file($_FILES["aadhar_card"]["tmp_name"], $aadhar_card);

    // SQL query to insert data into database
    $sql = "INSERT INTO `newpasses`(`passid`, `name`, `email`, `dob`, `photo`, `institute`, `address`, `city`, `pin`, `source`, `destination`, `from`, `to`, `declarance`, `bonafide`, `aadhar`) VALUES ('$passid', '$full_name', '$email', '$dob', '$photo', '$institute_name', '$address', '$city', '$postal_code', '$source', '$destination', '$from_date', '$to_date', '$declarance_form', '$bonafide_certificate', '$aadhar_card')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>



<html>

<head>
  <title>MAHA-E-PASS | user</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="style1.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
  <!-- <script src="js/script.js" type="text/javascript"></script> -->
</head>

<body>
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a href="../index.php"><img src="../images/whitelogo3.png" width="168" alt="" class="moon-logo" /></a>
        <!-- <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="../index.php" target="_blank">MAHA-E-PASS</a> -->
        <!-- Form -->
        <!-- <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
              <input class="form-control" placeholder="Search" type="text">
            </div>
          </div>
        </form> -->
        <!-- User -->

    <!-- fjdkfjsdf -->
    <div id="id01" class="modal">

      <form class="modal-content animate" action="index.php" method="post">

        <!-- <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div> -->

        <div class="col-xl-5 order-xl-1" style="width: auto;">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Apply New Pass</h3>
                </div>
                <!-- <div class="col-4 text-right">
              <a href="#!" class="btn btn-sm btn-primary">Settings</a>
            </div> -->
              </div>
            </div>
            <div class="card-body">
            <form method="post" action="insert_into_database.php" enctype="multipart/form-data">
    <h6 class="heading-small text-muted mb-4">User information</h6>
    <div class="pl-lg-4">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group focused">
                    <label class="form-control-label" for="input-username">Enter Full Name</label>
                    <input type="text" id="input-username" class="form-control form-control-alternative" name="input-username" placeholder="Aditya chavan">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label" for="input-email">Email address</label>
                    <input type="email" id="input-email" class="form-control form-control-alternative" name="input-email" placeholder="mahaepass@gmail.com">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group focused">
                    <label class="form-control-label" for="input-first-name">DOB</label>
                    <input type="date" id="input-first-name" class="form-control form-control-alternative" name="input-first-name">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group focused">
                    <label class="form-control-label" for="input-last-name">Identity Photo (passport size)</label>
                    <input type="file" id="input-last-name" class="form-control form-control-alternative" name="photo">
                </div>
            </div>
        </div>
    </div>
    <hr class="my-4">
    <!-- educational details -->
    <h6 class="heading-small text-muted mb-4">Educational Details</h6>
    <div class="pl-lg-4">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group focused">
                    <label class="form-control-label" for="input-address">Institute Name</label>
                    <input id="input-address" class="form-control form-control-alternative" name="input-address" placeholder="G.P. Solapur" type="text">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group focused">
                    <label class="form-control-label" for="input-address">Address</label>
                    <input id="input-address" class="form-control form-control-alternative" name="input-address" placeholder="Home Address" type="text">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group focused">
                    <label class="form-control-label" for="input-city">City</label>
                    <input type="text" id="input-city" class="form-control form-control-alternative" name="input-city" placeholder="City">
                </div>
            </div>
            <div class="col-lg-4">
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label" for="input-country">Postal code</label>
                    <input type="number" id="input-postal-code" class="form-control form-control-alternative" name="input-postal-code" placeholder="Postal code">
                </div>
            </div>
        </div>
    </div>
    <hr class="my-4">
    <!-- Pass Details -->
    <h6 class="heading-small text-muted mb-4">Pass Details</h6>
    <div class="pl-lg-4">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group focused">
                    <label class="form-control-label" for="Source">Source</label>
                    <input type="text" id="Source" class="form-control form-control-alternative" name="Source">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group focused">
                    <label class="form-control-label" for="Destination">Destination</label>
                    <input type="text" id="Destination" class="form-control form-control-alternative" name="Destination">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group focused">
                    <label class="form-control-label" for="input-date">From</label>
                    <input type="date" id="input-date" class="form-control form-control-alternative" name="input-date" max="">
                    <input type="button" onclick="calculateDate()" class="btn btn-info" value="submit" />
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group focused">
                    <label class="form-control-label" for="input-last-name">To</label>
                    <input type="date" id="output-date" class="form-control form-control-alternative" name="output-date" readonly>
                </div>
            </div>
        </div>
    </div>
    <hr class="my-4">
    <!-- upload documents -->
    <h6 class="heading-small text-muted mb-4">Upload Documents</h6>
    <div class="pl-lg-4">
        <div class="row">
            <div class="col-lg-4">
                <div class="col-md-12">
                    <div class="form-group focused">
                        <label class="form-control-label" for="input-address">Declarance Form </label>
                        <input id="input-address" class="form-control form-control-alternative" type="file" name="declarance_form">
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group focused">
                    <label class="form-control-label" for="input-country">Bonafide Certificate</label>
                    <input type="file" id="input-country" class="form-control form-control-alternative" name="bonafide_certificate">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label" for="input-country">Aadhar Card</label>
                    <input type="file" id="input-postal-code" class="form-control form-control-alternative" name="aadhar_card">
                </div>
            </div>
        </div>
    </div>
   
``


                  <hr class="my-4">
                  <!-- Address -->
                  
                 
                  <!-- Description -->
                  <!-- <h6 class="heading-small text-muted mb-4">About me</h6>
            <div class="pl-lg-4">
              <div class="form-group focused">
                <label>About Me</label>
                <textarea rows="4" class="form-control form-control-alternative" placeholder="A few words about you ...">A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</textarea>
              </div>
            </div> -->
              </form>
            </div>
          </div>
          <div class="container" style="background-color:#f1f1f1">
            <button type="submit" style.display='none' class=" cancelbtn"
              style="background-color: skyblue;" name="submit1">Sunmit</button>
            <button type="button"
              class="cancelbtn">Cancel</button>

          </div>

        </div>

      </form>
    </div>
</div>