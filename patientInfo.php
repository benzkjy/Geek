<?php
require_once ('connect.php');
session_start();
$PID=$_POST['PID'];

$q = "SELECT * FROM patient WHERE Patient_ID = '".$PID."'";
$result = $mysqli->query($q);
$row = $result->fetch_array();
$pName = $row['Patient_Fname']." ".$row['Patient_Lname'];
$pGender = $row['Patient_Gender'];
$pDOB = $row['Patient_Birth'];
$pAddr = $row['Patient_Address'];

?>
<html>
<head>
    <title>Patient Information</title>
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
        <li><a href="index.html">Home</a></li>
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
                    <h2><?php echo $pName; ?></h2>
                    <p><?php echo $PID; ?></p>
                </header>
                <hr />
                <h3><i class="fas fa-info-circle"></i> Patient Information</h3>
                <dl>
                    <dt><b>Name</b></dt>
                    <dd>
                        <p><?php echo $pName; ?></p>
                    </dd>
                    <dt><b>Gender</b></dt>
                    <dd>
                        <p><?php echo $pGender; ?></p>
                    </dd>
                    <dt><b>Birth Date</b></dt>
                    <dd>
                        <p><?php echo $pDOB; ?></p>
                    </dd>
                    <dt><b>Address</b></dt>
                    <dd>
                        <p><?php echo $pAddr; ?></p>
                    </dd>
                </dl>
                <hr>
                        <h3><i class="fas fa-user-md"></i> Medical Record</h3>
                        <div class="table-wrapper" align="center">
                            <table>
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Record Name</th>
                                    <th>Doctor Name</th>
                                    <th>Hospital Name</th>
                                    <th>Prescription</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $qLAB = "SELECT record.Rec_ID,record.Rec_Date, record.Rec_Name,
                                          user.Doctor_Fname,user.Doctor_Lname,hospital.hospital_Name,
                                                record.Prescription
                                          FROM record,patient,user,hospital 
                                          WHERE patient.Patient_ID = ".$PID." 
                                          AND patient.Patient_ID=record.Patient_ID 
                                          AND user.Doctor_ID = record.Doctor_ID 
                                          AND user.Doctor_ID = record.Doctor_ID
                                          AND user.Hospital_ID = hospital.Hospital_ID
                                          ORDER BY record.Rec_Date";
                                $result = $mysqli->query($qLAB);
                                if (!$result) {
                                    echo "Select failed. Error: " . $mysqli->error;
                                } else {
                                    while ($row = $result->fetch_array()) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['Rec_Date'];?></td>
                                            <td><b><?php echo $row['Rec_Name'];?></b></td>
                                            <td><?php echo $row['Doctor_Fname']." ".$row['Doctor_Lname'];?></td>
                                            <td><?php echo $row['hospital_Name'];?></td>
                                            <td><?php
                                                if ($row['Prescription']==NULL){
                                                    echo 'No';
                                                } else {
                                                    echo 'Yes';
                                                }
                                                ?></td>
                                            <td align="right">
                                                <li><a href="recordInfo.php?Rec_ID=<?php echo $row['Rec_ID']; ?>" class="button special">Details</a></li>
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
                            <ul class="actions" align="center">
                                <li><a href="record.php" class="button icon fa-download">Add more Record</a></li>
                            </ul>
                        </div>

                <hr>
                <h3><i class="fas fa-flask"></i> Laboratory Result</h3>
                <div class="table-wrapper" align="center">
                    <table>
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Hospital Name</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $qLAB = "SELECT * FROM labinfo,hospital WHERE PID = ".$PID." AND labinfo.Hospital_ID=hospital.Hospital_ID ORDER BY timeStamp DESC";
                        $result = $mysqli->query($qLAB);
                        if (!$result) {
                            echo "Select failed. Error: " . $mysqli->error;
                        } else {
                            while ($row = $result->fetch_array()) {
                                ?>
                                <tr>
                                    <td><?php echo $row['timeStamp'];?></td>
                                    <td><b><?php echo $row['Typeinfo'];?></b></td>
                                    <td><?php echo $row['Hospital_Name'];?></td>
                                    <td align="right">
                                        <li><a href="" class="button special">Details</a></li>
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