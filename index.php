<?php
require_once('clinicclass.php');
$userdetails = $clinic->get_userdata();

if (isset($userdetails)) {
    if ($userdetails['access'] != "administrator") {
        header("Location: login.php");
    }
} else {
    header("Location: login.php");
}
include("connect.php");

$query = "select jan,feb,march,april,may,june,july,august,sept,oct,nov,dece from tbl_chart where id='1'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) >= 1) {
    while ($row = mysqli_fetch_assoc($result)) {

        $jan = $row['jan'];
        $feb = $row['feb'];
        $march = $row['march'];
        $april = $row['april'];
        $may = $row['may'];
        $june = $row['june'];
        $july = $row['july'];
        $august = $row['august'];
        $sept = $row['sept'];
        $oct = $row['oct'];
        $nov = $row['nov'];
        $dece = $row['dece'];
    }
} else {
    echo "somting went wrong";
}

include_once('connection.php');
$total_gallon = "SELECT COUNT(f_name) AS sum FROM `medical_records`";
$tquery_result = mysqli_query($conn, $total_gallon);

while ($rows = mysqli_fetch_assoc($tquery_result)) {
    $medcount = $rows['sum'];
}
$total_dental = "SELECT COUNT(f_name) AS sum FROM `tbl_dental_records`";
$dquery_result = mysqli_query($conn, $total_dental);

while ($rows = mysqli_fetch_assoc($dquery_result)) {
    $dencount = $rows['sum'];
}
$total_phy = "SELECT COUNT(fullname) AS sum FROM `tbl_physician`";
$phy_result = mysqli_query($conn, $total_phy);

while ($rows = mysqli_fetch_assoc($phy_result)) {
    $totalphy = $rows['sum'];
}
$total_discharge = "SELECT COUNT(f_name) AS sum FROM `tbl_discharge`";
$dis = mysqli_query($conn, $total_discharge);

while ($rows = mysqli_fetch_assoc($dis)) {
    $t_dis = $rows['sum'];
}
$drugs = "SELECT SUM(used) AS sum FROM `tbl_medicine`";
$d = mysqli_query($conn, $drugs);

while ($rows = mysqli_fetch_assoc($d)) {
    $dd = $rows['sum'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="wgstyle.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="style.css">
    <style>
        nav {
            width: 83%;
            height: 75px;
            background-color: #505d61;
            line-height: 75px;
            padding: 0px 100px;
            position: fixed;
            z-index: 1;
        }

        nav .logo {
            font-size: 30px;
            font-weight: bold;
            letter-spacing: 1.5px;
        }

        nav .logo p {
            float: left;
            color: #fff;
            text-transform: uppercase;
        }

        nav ul {
            float: right;
        }

        nav ul li {
            display: inline-block;
            list-style: none;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            text-transform: uppercase;
            padding: 0px 32px;
        }

        nav ul li a:hover {
            color: #c0d96f;
        }

        nav ul li .active {
            color: #c0d96f;
        }

        .image img {
            width: 100%;
            height: 0px auto;
            opacity: 0.80;
        }

        #lop {
            background-color: #F0E68C;
        }

        .icon-button {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            color: #333333;
            margin-top: 15px;
            background: #dddddd;
            border: none;
            outline: none;
            border-radius: 50%;
        }

        .icon-button:hover {
            cursor: pointer;
        }

        .icon-button:active {
            background: #cccccc;
        }

        .icon-button__badge {
            position: absolute;
            top: -10px;
            right: -10px;
            width: 25px;
            height: 25px;
            background: red;
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
        }

        .scroll-bg {
            width: 100%;

        }

        .scroll-div {
            width: 100%;
            background: white;
            height: 100px;
            overflow: hidden;
            overflow-y: scroll;
        }

        .scroll-object {
            color: black;

        }

        .scroll-bg-a {
            width: 100%;
        }

        .scroll-div-a {
            width: 100%;
            background: white;
            height: 400px;
            overflow: hidden;
            overflow-y: scroll;
        }

        .scroll-object-a {
            color: black;

        }

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  float: right;
  position: absolute;
  background-color: #f9f9f9;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content .a {
  color: black;
  text-decoration: none;
  float: right;
  display: block;
  font-size: 15px;
}

.dropdown-content .a:hover {
    background-color: #f1f1f1;

}

.dropdown:hover .dropdown-content {
  display: block;
  float: right;
  margin-left: 50px;

}

.dropdown:hover .dropbtn {
  background-color: #3e8e41;
}

    </style>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <nav class="sidebar">
        <header>
            <div class="image-text">
                <span class="image">
                    <!--<img src="logo.png" alt="">-->
                </span>

                <div class="text logo-text">
                    <span style="margin-left: -50px;" class="name">NONESCOST | CIMS</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="index.php" id="lop">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">DASHBOARD</span>
                        </a>
                    </li>
                    <li class="nav-link">
                    <div class="dropdown" style="height: 30px;">
                        <a href="list_of_prk.php">
                            <i class='bx bx-bug-alt icon'></i>
                            <span class="text">PATIENT INFO</span>
                            <div class="dropdown-content">
                                <a class="a" href="faculty.php">Faculty Info</a>
                                <a class="a" href="#">Staff Info</a>
                                <a class="a" href="student.php">Student Info</a>
                            </div>
                            </div>
                            
                        </a>

                    </li>
                    <li class="nav-link">
                    <div class="dropdown" style="height: 30px;">
                        <a href="list_of_prk.php">
                            <i class='bx bx-bug-alt icon'></i>
                            <span class="text">CONSULTATION</span>
                            <div class="dropdown-content">
                                <a class="a" href="medical.php">Medical</a>
                                <a class="a" href="dental.php">Dental</a>
                            </div>
                            </div>
                            
                        </a>

                    </li>
                    <li class="nav-link">
                        <a href="patient_history.php">
                            <i class='bx bx-plus-medical icon plus-medical'></i>
                            <span class="text nav-text">PATIENT HISTORY</span>
                        </a>

                    </li>
                    <li class="nav-link">
                        <a href="medicine.php">
                            <i class='bx bx-map icon map'></i>
                            <span class="text nav-text">MEDICINE INFO</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="despensing.php">
                            <i class='bx bx-buildings icon buildings'></i>
                            <span class="text nav-text">DESPENSING</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="physician.php">
                            <i class='bx bx-buildings icon buildings'></i>
                            <span class="text nav-text">PHYSICIAN</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="course.php">
                            <i class='bx bx-buildings icon buildings'></i>
                            <span class="text nav-text">COURSES</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="logout.php">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>
            </div>
        </div>

    </nav>

    <section class="home">
        <div class="text">

            <nav>
                <div class="logo">
                    <p>DASHBOARD</p>
                </div>


            </nav><br><br>
                    <!--Widget Start-->
        <div class="card-body color1">
            <div class="float-left">
                <h3>
                    <span class="count">
                        <?php 
                        $a = $medcount;
                        $b = $dencount;
                        $total = $a + $b;
                        echo $total;
                        ?>
                    </span>
                </h3>
                <p>Patient History</p>
            </div>
            
            <div class="float-right">
                <i class="pe-7s-cart"></i><br>
                <p style="margin-left: -150px;margin-top:-10px"><span class="count" style="font-size: 20px;color:#FDF5E6"><?= $medcount?></span> Medical / <span class="count" style="font-size: 20px;"><?= $dencount?></span> Dental</p>
            </div>
        </div>
        
        <!--Widget End-->
        <!--Widget Start-->
        <div class="card-body color2">
            <div class="float-left">
                <h3>
                    <span class="count"><?= $totalphy?></span>
                </h3>
                <p>Physician/Dentist</p>
            </div>
            <div class="float-right">
                <i class="pe-7s-users"></i>
            </div>
        </div>
        <!--Widget End-->
        <!--Widget Start-->
        <div class="card-body color1">
            <div class="float-left">
                <h3>
                    <span class="count">
                    <?php 
                        $da = $medcount;
                        $db = $dencount;
                        $t = $da + $db;
                        $t_dis = $t_dis;
                        $atotal = $t + $t_dis;
                        echo $atotal;
                        ?>
                    </span>
                </h3>
                <p>Records</p>
            </div>
            
            <div class="float-right">
                <i class="pe-7s-users"></i><br>
                <p style="margin-left: -150px;margin-top:-10px"><span class="count" style="font-size: 20px;color:#FDF5E6">  <?php 
                        $a = $medcount;
                        $b = $dencount;
                        $total = $a + $b;
                        echo $total;
                        ?></span> Consultation</p>
                        <!-- <span class="count" style="font-size: 20px;"><?= $t_dis?></span> Discharge -->
            </div>
        </div>
        <div class="card-body color3">
            <div class="float-left">
                <h3>
                    <span class="count"><?= $dd?></span>
                </h3>
                <p>Inventory of Drugs</p>
            </div>
            <div class="float-right">
                <i class="pe-7s-browser" style="font-size: 80px;"></i>
            </div>
        </div>
        <!--Widget End-->

        <script type="text/javascript">
        $('.count').each(function(){
            $(this).prop('Counter',0).animate({
                Counter: $(this).text()
            }, {
                duration:4000,
                easing:'swing',
                step: function(now){
                    $(this).text(Math.ceil(now));
                }
            });
        });
        </script>
            <div class="" style="margin-top: -5px;width:100%;height:0px;float:left">
            <center>
    <h4>Consultation Statistics</h4>
    </center>
                <canvas id="myChart" style="height: 150px;width:500px"></canvas>
            </div>

            <?php

            echo "<input type='hidden' id= 'jan' value = '$jan' >";
            echo "<input type='hidden' id= 'feb' value = '$feb' >";
            echo "<input type='hidden' id= 'march' value = '$march' >";
            echo "<input type='hidden' id= 'april' value = '$april' >";
            echo "<input type='hidden' id= 'may' value = '$may' >";
            echo "<input type='hidden' id= 'june' value = '$june' >";
            echo "<input type='hidden' id= 'july' value = '$july' >";
            echo "<input type='hidden' id= 'august' value = '$august' >";
            echo "<input type='hidden' id= 'sept' value = '$sept' >";
            echo "<input type='hidden' id= 'oct' value = '$oct' >";
            echo "<input type='hidden' id= 'nov' value = '$nov' >";
            echo "<input type='hidden' id= 'dece' value = '$dece' >";

            ?>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>

            <script>
                var jan = document.getElementById("jan").value;
                var feb = document.getElementById("feb").value;
                var march = document.getElementById("march").value;
                var april = document.getElementById("april").value;
                var may = document.getElementById("may").value;
                var june = document.getElementById("june").value;
                var july = document.getElementById("july").value;
                var august = document.getElementById("august").value;
                var sept = document.getElementById("sept").value;
                var oct = document.getElementById("oct").value;
                var nov = document.getElementById("nov").value;
                var dece = document.getElementById("dece").value;

                window.onload = function() {
                    var randomScalingFactor = function() {
                        return Math.round(Math.random() * 100);
                    };
                    var config = {
                        type: 'bar',
                        data: {
                            borderColor: "#fffff",
                            datasets: [{
                                data: [
                                    jan,
                                    feb,
                                    march,
                                    april,
                                    may,
                                    june,
                                    july,
                                    august,
                                    sept,
                                    oct,
                                    nov,
                                    dece
                                ],
                                borderColor: "#fff",
                                borderWidth: "3",
                                hoverBorderColor: "#000",

                                label: 'Monthly Patient Report',

                                backgroundColor: [
                                    "#0190ff",
                                    "#56d798",
                                    "#ff8397",
                                    "#6970d5",
                                    "#f312cb",
                                    "#ff0060",
                                    "#ffe400",
                                    "#FF1493",
                                    "#C71585",
                                    "#E6E6FA",
                                    "#8A2BE2",
                                    "#6A5ACD"

                                ],
                                hoverBackgroundColor: [
                                    "#f38b4a",
                                    "#56d798",
                                    "#ff8397",
                                    "#6970d5",
                                    "#ffe400"
                                ]
                            }],

                            labels: [
                                'Jan',
                                'Feb',
                                'March',
                                'April',
                                'May',
                                'June',
                                'July',
                                'august',
                                'sept',
                                'oct',
                                'nov',
                                'dece'
                            ]
                        },

                        options: {
                            responsive: true

                        }
                    };
                    var ctx = document.getElementById('myChart').getContext('2d');
                    window.myPie = new Chart(ctx, config);


                };
            </script>
        </div>

        <br><br>
        <?php include("connect.php"); ?>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'discharge ', 'admitted '],
          <?php 
          $query = "SELECT * FROM tbl_ail_dis_chart";
          $res = mysqli_query($conn, $query);
          while($data = mysqli_fetch_array($res)){
            $month = $data['Month'];
            $sale = $data['ailments'];
            $expenses = $data['discharge'];
            ?>
            ['<?php echo $month;?>', <?php echo $expenses?>, <?php echo $sale?>],
            <?php 
          }
          ?>
        ]);
        var options = {
          title: '',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <!-- ======= Products Section ======= -->
    <center>
    <h4>Consultaion & Recover</h4>
    </center>
    <div id="curve_chart" style="width:100%;height:500px;"></div>

  <br><br>
 </div>
    </section>
    
    <?php
    include_once 'footer.php';

    ?>

    <script>
        const body = document.querySelector('body'),
            sidebar = body.querySelector('nav'),
            toggle = body.querySelector(".toggle"),
            searchBtn = body.querySelector(".search-box"),
            modeSwitch = body.querySelector(".toggle-switch"),
            modeText = body.querySelector(".mode-text");
        toggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        })

        searchBtn.addEventListener("click", () => {
            sidebar.classList.remove("close");
        })

        modeSwitch.addEventListener("click", () => {
            body.classList.toggle("dark");

            if (body.classList.contains("dark")) {
                modeText.innerText = "Light mode";
            } else {
                modeText.innerText = "Dark mode";

            }
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {

            $('.editbtn').on('click', function() {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                console.log(data);

            });



        });
    </script>
</body>

</html>