<?php
// Check if form is submitted
if(isset($_POST['submit'])){   // Retrieve form data
    $passid = $_POST['passid'];
    $email = $_POST['input-email'];
    $from_date = $_POST['input-date'];
    $to_date = $_POST['output-date'];
    $old_pass = $_FILES['input-address']['name']; // Assuming the file input is used for uploading the old pass
    $verification_code = $_POST['input-city'];
    
    // Directory for file uploads
    $upload_directory = 'uploads/';
    
    // Create the directory if it doesn't exist
    if (!file_exists($upload_directory)) {
        if (!mkdir($upload_directory, 0777, true)) {
            die("Failed to create upload directory");
        }
    }
    
    // Database connection
    $conn = new mysqli("localhost", "root", "", "mahaepass");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
    // Prepare and execute SQL insert statement
    $stmt = $conn->prepare("INSERT INTO `renewpass`(`passid`, `email`, `from_date`, `to_date`, `old_pass`, `verification_code`) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $passid, $email, $from_date, $to_date, $old_pass, $verification_code);
    if ($stmt->execute() && move_uploaded_file($_FILES['input-address']['tmp_name'], $upload_directory . $_FILES['input-address']['name'])) {
        echo "Pass renewal successful";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>

<!-- for posting data of new pass to database -->

 


<html>

<head>
  <title>MAHA-E-PASS | user</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
  <script src="js/script.js" type="text/javascript"></script>
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
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
              <input class="form-control" placeholder="Search" type="text">
            </div>
          </div>
        </form> 
        <!-- User -->



        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="image/profile.jpg">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold" href="login.php?logout">Aditya Chavan</span>
                </div>
              </div>
            </a>

            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class="dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="../examples/profile.php" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
              <a href="../examples/profile.php" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Settings</span>
              </a>
              <a href="../examples/profile.php" class="dropdown-item">
                <i class="ni ni-calendar-grid-58"></i>
                <span>Activity</span>
              </a>
              <a href="../examples/profile.php" class="dropdown-item">
                <i class="ni ni-support-16"></i>
                <span>Support</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#!" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
      style="min-height: 600px; background-image: url(../images/background.png); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hello Aditya</h1>
            <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your
              work and manage your projects or assigned tasks</p>
            <!-- <a href="#!" class="btn btn-info">Apply pass</a> -->
            <button class="btn btn-info" style="width:auto;"><a href="apply.php" style="text-decoration:none; color:white;">Apply Pass</a></button>
            <button type="button" class="btn btn-alert" style="width:auto;" name="pay"><a href="pay.php" style="text-decoration:none; color:white;">Payment</a></button>
          </div>
        </div>
      </div>
    </div>
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



    <?php
// Check if form is submitted
if(isset($_POST['submit1'])){
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
    $full_name = $_POST['username'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $photo = $_FILES["photo"]["name"];
    $institute_name = $_POST['institute'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $postal_code = $_POST['postal-code'];
    $source = $_POST['Source1'];
    $destination = $_POST['Destination1'];
    $from_date = $_POST['fdate'];
    $to_date = $_POST['tdate'];
    $declarance_form = $_FILES["declarance_form"]["name"];
    $bonafide_certificate = $_FILES["bonafide_certificate"]["name"];
    $aadhar_card = $_FILES["aadhar_card"]["name"];
    $passid = mt_rand(100000000, 999999999);

    // File upload handling
    $target_dir = "uploads/";
  

    
    $target_photo = $target_dir . basename($_FILES["photo"]["name"]);
    $target_declarance_form = $target_dir . basename($_FILES["declarance_form"]["name"]);
    $target_bonafide_certificate = $target_dir . basename($_FILES["bonafide_certificate"]["name"]);
    $target_aadhar_card = $target_dir . basename($_FILES["aadhar_card"]["name"]);

    // Move uploaded files
   move_uploaded_file($_FILES["photo"]["tmp_name"], $target_photo);
    move_uploaded_file($_FILES["declarance_form"]["tmp_name"], $target_declarance_form);
    move_uploaded_file($_FILES["bonafide_certificate"]["tmp_name"], $target_bonafide_certificate);
    move_uploaded_file($_FILES["aadhar_card"]["tmp_name"], $target_aadhar_card);
    

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
            <form method="post" action="index.php" enctype="multipart/form-data">
    <h6 class="heading-small text-muted mb-4">User information</h6>
    <div class="pl-lg-4">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group focused">
                    <label class="form-control-label" for="input-username">Enter Full Name</label>
                    <input type="text" id="input-username" class="form-control form-control-alternative" name="username" placeholder="Aditya chavan">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label" for="input-email">Email address</label>
                    <input type="email" id="input-email" class="form-control form-control-alternative" name="email" placeholder="mahaepass@gmail.com">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group focused">
                    <label class="form-control-label" for="input-first-name">DOB</label>
                    <input type="date" id="input-first-name" class="form-control form-control-alternative" name="dob">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group focused">
                <label class="form-control-label" for="input-last-name">Identity Photo (passport size)</label>
                    <input type="file" id="input-photo" class="form-control form-control-alternative" name="photo">
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
                    <input id="input-address" class="form-control form-control-alternative" name="institute" placeholder="G.P. Solapur" type="text">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group focused">
                    <label class="form-control-label" for="input-address">Address</label>
                    <input id="input-address" class="form-control form-control-alternative" name="address" placeholder="Home Address" type="text">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group focused">
                    <label class="form-control-label" for="input-city">City</label>
                    <input type="text" id="input-city" class="form-control form-control-alternative" name="city" placeholder="City">
                </div>
            </div>
            <div class="col-lg-4">
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label" for="input-country">Postal code</label>
                    <input type="number" id="input-postal-code" class="form-control form-control-alternative" name="postal-code" placeholder="Postal code">
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
                    <input type="text" id="Source" class="form-control form-control-alternative" name="Source1">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group focused">
                    <label class="form-control-label" for="Destination">Destination</label>
                    <input type="text" id="Destination" class="form-control form-control-alternative" name="Destination1">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group focused">
                    <label class="form-control-label" for="input-date">From</label>
                    <input type="date" id="input-date" class="form-control form-control-alternative" name="fdate" max="">
                    <input type="button" onclick="calculateDate()" class="btn btn-info" value="submit" />
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group focused">
                    <label class="form-control-label" for="input-last-name">To</label>
                    <input type="date" id="output-date" class="form-control form-control-alternative" name="tdate" readonly>
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
                    <label class="form-control-label" for="input-last-name">Declarance Form</label>
                    <input type="file" id="input-declarance-form" class="form-control form-control-alternative" name="declarance_form">
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group focused">
                <label class="form-control-label" for="input-last-name">Bonafide Certificate</label>
                    <input type="file" id="input-bonafide-certificate" class="form-control form-control-alternative" name="bonafide_certificate">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <label class="form-control-label" for="input-last-name">Aadhar Card</label>
                    <input type="file" id="input-aadhar-card" class="form-control form-control-alternative" name="aadhar_card">
            </div>
        </div>
    </div>
   


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
            <button type="submit" class="btn btn-info" style="width:auto;" name="submit1">Submit</button>
            <button type="button" class="btn btn-danger" style="width:auto;" name="close">Close</button>
              </form>
            </div>
          </div>
          <!-- <div class="container" style="background-color:#f1f1f1">
            <button type="submit" style.display='none' class=" cancelbtn"
              style="background-color: skyblue;" name="submit1">Sunmit</button>
            <button type="button" onclick="document.getElementById('id01').style.display='none'"
              class="cancelbtn">Cancel</button>

          </div> -->

        </div>

      </form>
    </div>
  </div>
  <!-- sadfsdfd     -->

  <!-- Page content -->
  <div class="container-fluid mt--7">
    <div class="row">
      <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
        <div class="card card-profile shadow">
          <div class="row justify-content-center">
            <div class="col-lg-3 order-lg-2">
              <div class="card-profile-image">
                <a href="#">
                  <img src="image/profile.jpg" class="rounded-circle">
                </a>
              </div>
            </div>
          </div>
          <!-- <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
            <div class="d-flex justify-content-between">
              <a href="../index.php#" data-w-id="8c23997f-196c-b199-0897-1b3b66474dd3" class="btn btn-sm btn-info mr-4" style="text-decoration: none;">Connect</a>
              <a href="../index.php" class="btn btn-sm btn-default float-right"
                style="text-decoration: none;">Message</a>
            </div>
          </div> -->
          <div class="card-body pt-0 pt-md-4">
            <br>
            <br>
            <br>
            <hr />
            <br>
            <!-- <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    <div>
                      <span class="heading">22</span>
                      <span class="description">Friends</span>
                    </div>
                    <div>
                      <span class="heading">10</span>
                      <span class="description">Photos</span>
                    </div>
                    <div>
                      <span class="heading">89</span>
                      <span class="description">Comments</span>
                    </div>
                  </div>
                </div>
              </div> -->
            <div class="text-center">
              <h3>
                Aditya Chavan<span class="font-weight-light">, 18</span>
              </h3>
              <div class="h5 font-weight-300">
                <i class="ni location_pin mr-2"></i>Nannaj-Solapur
              </div>
              <div class="h5 mt-4">
                <i class="ni business_briefcase-24 mr-2"></i>Pass Categorie - Student Pass
              </div>
              <div>
                <i class="ni education_hat mr-2"></i>Government Polytechnic, Solapur
              </div>
              <br/><br/>
              <div>
               <a href = "../login.php?logout"> <input type="button" value="logout"/></a>
              </div>
              <!-- <hr class="my-4">
                <p>Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music.</p>
                <a href="#">Show more</a> -->
            </div>
          </div>
          <br>
          <hr />
          <br>
        </div>
      </div>

    


      <div class="col-xl-8 order-xl-1">
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="mb-0">Renew Pass</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="index.php">
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group focused">
                                <label class="form-control-label" for="input-username">Pass Id</label>
                                <input type="text" id="input-username" class="form-control form-control-alternative" name="passid" placeholder="Pass Id" >
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
                                <label class="form-control-label" for="input-date">From</label>
                                <input type="date" id="input-date" class="form-control form-control-alternative" name="input-date" max="" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group focused">
                            <label class="form-control-label" for="output-date">To</label>
<input type="date" id="output-date" class="form-control form-control-alternative" name="output-date" title="Please select a date that is at least 30 days from today">



                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-4">
                <!-- Old Pass Section -->
                <h6 class="heading-small text-muted mb-4">Old Pass</h6>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group focused">
                                <label class="form-control-label" for="input-address">Upload Old Pass</label>
                                <input id="input-address" class="form-control form-control-alternative" name="input-address" placeholder="Home Address" type="file">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group focused">
                                <label class="form-control-label" for="input-city">Verification Code</label>
                                <input type="text" id="input-city" class="form-control form-control-alternative" name="input-city" placeholder="****">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-info" style="width:auto;" name="submit">Submit</button>
                <hr class="my-4">
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>



  <footer class="footer">
    <div class="row align-items-center justify-content-xl-between">
      <div class="col-xl-6 m-auto text-center">
        <div class="copyright">
          <p>Made with <a href="cineflix029.000webhostapp.com target=" _blank >MAHA-E-PASS</a> by Creative Team</p>
        </div>
      </div>
    </div>
  </footer>

  <script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  </script>
  

</body>
<html>