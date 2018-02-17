<?php
require_once ('connect.php');
session_start();
$RID1=$_GET['rid1'];
$RID2=$_GET['rid2'];

$q = "SELECT * FROM record,patient,user ,hospital
                WHERE Rec_ID = ".$RID1."
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

$q = "SELECT * FROM record,patient,user ,hospital
                WHERE Rec_ID = ".$RID1."
                AND record.Doctor_ID=user.Doctor_ID
                AND record.Patient_ID=patient.Patient_ID
                AND user.Hospital_ID = hospital.Hospital_ID";
$result = $mysqli->query($q);
$row = $result->fetch_array();
$pName2 = $row['Patient_Fname']." ".$row['Patient_Lname'];
$pGender2 = $row['Patient_Gender'];
$pWH2 = $row['Weight']." kg ".$row['Height']." cm";
$pDOB2 = $row['Patient_Birth'];
$pAddr2 = $row['Patient_Address'];
$recDat2 = $row['Rec_Date'];
$Des2 = $row['Desc'];
$Pres2 = $row['Prescription'];
$rid2=$row['Rec_ID'];
$dName2=$row['Doctor_Fname']." ".$row['Doctor_Lname'];
$hName2=$row['Hospital_Name'];
$rName2=$row['Rec_Name'];

?>
<html>
	<head>
		<title>Compare Patient</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	</head>
	<body>

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

        <section id="three" class="wrapper style2">
        <div class="inner">
            <div class="grid-style">

                <div>
                    <div class="box">
                        <div class="content">
                            <header class="align-center">
                                <h2><?php echo $rName; ?></h2>
                                <p><?php echo $dName; ?>, <?php echo $hName; ?></p>
                            </header>
                            <hr>
                            <h3>Patient Information</h3>
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
                            <h3>Record Information</h3>
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
                                <li><a href="recordInfo.php?Rec_ID=<?php echo $rid; ?>" class="button icon fa-check">Done Comparison</a></li>
                                <li><a href="#" class="button alt icon fa-search">see another</a></li>
                            </ul>

                        </div>
                    </div>
                </div>

                <div>
                    <div class="box">
                        <div class="content">
                            <header class="align-center">
                                <h2><?php echo $rName2; ?></h2>
                                <p><?php echo $dName2; ?>, <?php echo $hName2; ?></p>
                            </header>
                            <hr>
                            <h3>Patient Information</h3>
                            <dl>
                                <dt><b>Patient Name</b></dt>
                                <dd>
                                    <p><?php echo $pName2; ?></p>
                                </dd>
                                <dt><b>Gender</b></dt>
                                <dd>
                                    <p><?php echo $pGender2; ?></p>
                                </dd>
                                <dt><b>Weight and Height</b></dt>
                                <dd>
                                    <p><?php echo $pWH2; ?></p>
                                </dd>
                            </dl>
                            <hr>
                            <h3>Record Information</h3>
                            <dl>
                                <dt><b>Record Date</b></dt>
                                <dd>
                                    <p><?php echo $recDat2; ?></p>
                                </dd>
                                <dt><b>Description</b></dt>
                                <dd>
                                    <p><?php echo $Des2; ?></p>
                                </dd>
                                <dt><b>Prescription</b></dt>
                                <dd>
                                    <p><?php
                                        if ($Pres2==NULL){
                                            echo 'No prescription in this record.';
                                        } else {
                                            echo $Pres2;
                                        }
                                        ?></td></p>
                                </dd>
                            </dl>

                            <hr>
                            <ul class="actions" align="center">
                                <li><a href="#" class="button icon">Previous</a></li>
                                <li><a href="#" class="button alt icon">Next</a></li>
                            </ul>

                        </div>
                    </div>
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