<?php
require_once ('connect.php');
session_start();
$RID1=$_GET['rid1'];
//$q = "SELECT * FROM record,patient,user ,hospital
//                WHERE Rec_ID = ".$RID1."
//                AND record.Doctor_ID=user.Doctor_ID
//                AND record.Patient_ID=patient.Patient_ID
//                AND user.Hospital_ID = hospital.Hospital_ID
//                ";
//$result = $mysqli->query($q);
//$row = $result->fetch_array();
//$pName = $row['Patient_Fname']." ".$row['Patient_Lname'];
//$pGender = $row['Patient_Gender'];
//$PID = $row['Patient_ID'];
//$pWH = $row['Weight']." kg ".$row['Height']." cm";
//$pDOB = $row['Patient_Birth'];
//$pAddr = $row['Patient_Address'];
//$recDat = $row['Rec_Date'];
//$Des = $row['Desc'];
//$Pres = $row['Prescription'];
//$rid=$row['Rec_ID'];
//$dName=$row['Doctor_Fname']." ".$row['Doctor_Lname'];
//$hName=$row['Hospital_Name'];
//$rName=$row['Rec_Name'];

?>
<html>
<head>
    <title>Search Information</title>
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
            <div class="content">
                <header class="align-center">
                    <h2>Search Result</h2>
                    <p>Sorted by machine learning for the most similar case.</p>
                </header>
                <hr>
                <form method="post" action="#" class="alt">
                    <div class="row uniform">
                        <div class="9u 12u$(small)">
                            <input type="text" name="query" id="query" value="" placeholder="Keyword" />
                        </div>
                        <div class="3u$ 12u$(small)">
                            <input type="submit" value="Filter" class="fit" />
                        </div>
                    </div>
                </form>
                <hr>

                <h3>Patient Record</h3>
                <div class="table-wrapper" align="center">
                    <table>
                        <thead>
                        <tr>
                            <th>Patient ID</th>
                            <th>Patient Name</th>
                            <th>Gender</th>
                            <th>Last Record</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $q = "SELECT * FROM record,patient,user ,hospital
                WHERE Rec_ID != ".$RID1."
                AND record.Doctor_ID=user.Doctor_ID
                AND record.Patient_ID=patient.Patient_ID
                AND user.Hospital_ID = hospital.Hospital_ID
                ";
                        $result = $mysqli->query($q);
                        if (!$result) {
                            echo "Select failed. Error: " . $mysqli->error;
                        } else {
                            while ($row = $result->fetch_array()) {
                                ?>
                                <tr>
                                    <td><?php echo $row['Patient_ID'];?></td>
                                    <td><b><?php echo $row['Patient_Fname']." ".$row['Patient_Lname'];?></b></td>
                                    <td><?php echo $row['Patient_Gender'];?></td>
                                    <td>May 16, 2015</td>
                                    <td align="right">
                                        <li><a href="compare.php?rid1=<?php echo $RID1; ?>&rid2=<?php echo $row['Rec_ID']; ?>" class="button special">Compare</a></li>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>


                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="6"></td>
                        </tr>
                        </tfoot>
                    </table>
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