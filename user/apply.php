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
        echo "Applied for New Pass Sucessfully";
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
  <link href="style.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
  <script src="js/script.js" type="text/javascript"></script>

<style>
body{
    width: 70%;
    align-items: center;
    margin-left:15%;
    /* background-color: grey; */
}
    </style>

    </head>
<body>
        <div class="col-xl-5 order-xl-1" style="width: auto;">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h2 class="mb-0" style="margin-left: 55%; color: red;">Apply New Pass</h2>
                </div>
                <!-- <div class="col-4 text-right">
              <a href="#!" class="btn btn-sm btn-primary">Settings</a>
            </div> -->
              </div>
            </div>
            <div class="card-body">
            <form method="post" action="apply.php" enctype="multipart/form-data">
    <h6 class="heading-small text-muted mb-4">User information</h6>
    <div class="pl-lg-4">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group focused">
                    <label class="form-control-label" for="input-username">Enter Full Name</label>
                    <input type="text" id="input-username" class="form-control form-control-alternative" name="username" placeholder="Aditya chavan" >
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label" for="input-email">Email address</label>
                    <input type="email"  
                    id="input-email" class="form-control form-control-alternative" name="email" placeholder="mahaepass@gmail.com">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group focused">
                    <label class="form-control-label" for="input-first-name">DOB</label>
                    <input type="date" id="input-first-name"  class="form-control form-control-alternative" name="dob">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group focused">
                <label class="form-control-label" for="input-last-name">Identity Photo (passport size)</label>
                    <input type="file" id="input-photo"  class="form-control form-control-alternative" name="photo">
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
                    <input id="input-address"   class="form-control form-control-alternative" name="institute" placeholder="G.P. Solapur" type="text">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group focused">
                    <label class="form-control-label" for="input-address">Address</label>
                    <input id="input-address"  class="form-control form-control-alternative" name="address" placeholder="Home Address" type="text">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group focused">
                    <label class="form-control-label" for="input-city">City</label>
                    <input type="text" id="input-city"  class="form-control form-control-alternative" name="city" placeholder="City">
                </div>
            </div>
            <div class="col-lg-4">
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label" for="input-country">Postal code</label>
                    <input type="number"  id="input-postal-code" class="form-control form-control-alternative" name="postal-code" placeholder="Postal code" >
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
                    <input type="text" id="Source"  class="form-control form-control-alternative" name="Source1">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group focused">
                    <label class="form-control-label" for="Destination">Destination</label>
                    <input type="text" id="Destination"  class="form-control form-control-alternative" name="Destination1">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group focused">
                    <label class="form-control-label" for="input-date">From</label>
                    <input type="date" id="input-date"  class="form-control form-control-alternative" name="fdate" max="">
                    <input type="button" onclick="calculateDate()"  class="btn btn-info" value="submit" />
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group focused">
                    <label class="form-control-label" for="input-last-name">To</label>
                    <input type="date" id="output-date"  class="form-control form-control-alternative" name="tdate" readonly>
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
                    <input type="file" id="input-declarance-form"  class="form-control form-control-alternative" name="declarance_form">
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group focused">
                <label class="form-control-label" for="input-last-name">Bonafide Certificate</label>
                    <input type="file" id="input-bonafide-certificate"  class="form-control form-control-alternative" name="bonafide_certificate">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                <label class="form-control-label" for="input-last-name">Aadhar Card</label>
                    <input type="file" id="input-aadhar-card"  class="form-control form-control-alternative" name="aadhar_card">
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
            <button type="button" class="btn btn-alert" style="width:auto;" name="close"><a href="index.php" style="text-decoration:none; color:white;">Close</a></button>
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
</body>
</html>