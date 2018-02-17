<?php
require_once ('connect.php');
session_start();
$RID=$_GET['Rec_ID'];
$q = "SELECT * FROM record,patient,user,hospital 
                WHERE Rec_ID = ".$RID."
                AND record.Doctor_ID=user.Doctor_ID
                AND record.Patient_ID=patient.Patient_ID
                AND user.Hospital_ID = hospital.Hospital_ID";
$result = $mysqli->query($q);
$row = $result->fetch_array();
$pName = $row['Patient_Fname']." ".$row['Patient_Lname'];
$pGender = $row['Patient_Gender'];
$pWH = $row['Weight']." kg ".$row['Height']." cm";
$pDOB = $row['Patient_Birth'];
$pAddr = $row['Patient_Address'];
$recDat = $row['Rec_Date'];
$Des = $row['Desc'];
$Pres = $row['Prescription'];
$rid=$row['Rec_ID'];
$dName=$row['Doctor_Fname']." ".$row['Doctor_Lname'];
$hName=$row['Hospital_Name'];
$rName=$row['Rec_Name'];
?>
<html>
<head>
    <title>Record Information</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
</head>
<body class="subpage">

<!-- Header -->
<header id="header" >
    <div class="logo"><a href="index.php">Hospital Collaboration Resource <i class="fas fa-hospital"></i></a></div>
    <a href="#menu" class="toggle"><span>Menu</span></a>
</header>

<!-- Nav -->
<nav id="menu">
    <ul class="links">
        <li><a href="index.php">Home</a></li>
        <li><a href="">Logout</a></li>
    </ul>
</nav>

<!-- One -->
<section id="one" class="wrapper style2">
    <div class="inner">
        <div class="box">
            <div class="image fit">
                <img src="images/pic01.jpg" alt="" />
            </div>
            <div class="content">
                <header class="align-center">
                    <h2><?php echo $rName; ?></h2>
                    <p><?php echo $dName; ?>, <?php echo $hName; ?></p>
                </header>
                <hr>
                <h3><i class="fas fa-info-circle"></i> Patient Information</h3>
                <dl>
                    <dt><b>Patient Name</b></dt>
                    <dd>
                        <p><?php echo $pName; ?></p>
                    </dd>
                    <dt><b>Gender</b></dt>
                    <dd>
                        <p><?php echo $pGender; ?></p>
                    </dd>
                    <dt><b>Weight and Height</b></dt>
                    <dd>
                        <p><?php echo $pWH; ?></p>
                    </dd>
                </dl>
                <hr>
                <h3><i class="fas fa-user-md"></i> Record Information</h3>
                <dl>
                    <dt><b>Record Date</b></dt>
                    <dd>
                        <p><?php echo $recDat; ?></p>
                    </dd>
                    <dt><b>Description</b></dt>
                    <dd>
                        <p><?php echo $Des; ?></p>
                    </dd>
                    <dt><b>Prescription</b></dt>
                    <dd>
                        <p><?php
                            if ($Pres==NULL){
                                echo 'No prescription in this record.';
                            } else {
                                echo $Pres;
                            }
                            ?></td></p>
                    </dd>
                </dl>

                <hr>
                <ul class="actions" align="center">
                    <li><a href="record.php" class="button icon fa-download">Add more Record</a></li>
                    <li><a href="search.php?rid1=<?php echo $rid; ?>" class="button alt icon fa-search">Compare Others</a></li>
                </ul>

            </div>

        </div>
    </div>
</section>

<!-- Four -->
<section id="four" class="wrapper style3">
    <div class="inner">

        <header class="align-center">
            <h2>Declaration of Geneva</h2>
            <p>THE HEALTH AND WELL-BEING OF MY PATIENT will be my first consideration</p>
        </header>

    </div>
</section>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.scrolly.min.js"></script>
<script src="assets/js/jquery.scrollex.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>