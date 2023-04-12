<?php
require_once('clinicclass.php');
$id = $_GET['id'];
$record = $clinic->select_single_record_dental($id);
$all_recs = $clinic->select_all_despensing($id);

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   
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
.na{
    background-color: transparent;
    
}
.na ul{
    background-color: transparent;
    border: none;
}
.na li{
   background-color: transparent;
   border: none;
}
.na li a{
   background-color: transparent;
   border: none;
}
.na li a:hover{
   background-color: transparent;
}
.td{
    box-shadow: 1px 1px 10px 1px grey;
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
                        <a href="#">
                            <i class='bx bx-bug-alt icon'></i>
                            <span class="text">PATIENT INFO</span>
                            <div class="dropdown-content">
                                <a class="a" href="faculty.php">Faculty Info</a>
                                <a class="a" href="staff.php">Staff Info</a>
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
                                <a class="a" href="#">Dental</a>
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
    <div class="modal" id="modalstudent" tabindex="1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="width: 140%;">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">EDIT DETAILS</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <form method="POST">
  <div class="row">
    <input type="hidden" name="student_id" id="student_id">
    <div class="col" style="padding: 20px;">
    <label for="">First name</label>
      <input type="text" class="form-control" name="f_name" id="f_name">
    </div>
    <div class="col" style="padding: 20px;">
    <label for="">Middle name</label>
      <input type="text" class="form-control" name="m_name" id="m_name">
    </div>
    <div class="col" style="padding: 20px;">
    <label for="">Last name</label>
      <input type="text" class="form-control" name="l_name" id="l_name">
    </div>
    <div class="col" style="padding: 20px;">
    <label for="">Suffix</label>
      <select name="suffix" id="suffix" class="form-control">
        <option value="">---</option>
        <option value="Jr">Jr</option>
        <option value="Sr">Sr</option>
      </select>
    </div>
  </div>
  <div class="row">
  <div class="col" style="padding: 20px;">
  <label for="">Gender</label>
      <select name="gender" id="gender" class="form-control">
        <option value="">---</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
      </select>
    </div>
    <div class="col" style="padding: 20px;">
    <label for="">Contact #</label>
      <input type="text" class="form-control" name="con_num" id="con_num">
    </div>
    <div class="col" style="padding: 20px;">
    <label for="">Address</label>
      <input type="text" class="form-control" name="address" id="address">
    </div>
    <div class="col" style="padding: 20px;">
    <label for="">Date of Birth</label>
      <input type="date" name="dob" id="dob" class="form-control">
    </div>
  </div>
  <div class="row">
  <div class="col" style="padding: 20px;">
    <label for="">Email Address</label>
      <input type="email" name="email" id="email" class="form-control">
    </div>
  <div class="col" style="padding: 20px;">
  <label for="">Patient Type</label>
      <select name="patient_type" id="patient_type" class="form-control">
        <option value="">---</option>
        <option value="Check-ups">Check-ups</option>
        <option value="Headache">Headache</option>
      </select>
    </div>
  <div class="col" style="padding: 20px;">
  <label for="">Course</label>
      <select name="course" id="course" class="form-control">
        <option value="">---</option>
        <option value="BSIT">BSIT</option>
        <option value="BSN">BSN</option>
      </select>
    </div>

  </div>
        <button type="submit" style="margin-left:20px" name="update_student" class="btn btn-success" data-bs-dismiss="modal">Update</button>
       <br><br>  
</form>



                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <div class="modal" id="delmodal" tabindex="1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">DELETE</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <form method="POST">
                    <center><br>
                    <input type="hidden" name="delstudent_id" id="delstudent_id">
                    <h4>Are you sure you want to delete?</h4>
                    <br>
                    </center>




                <!-- Modal footer -->
                <div class="modal-footer">
                <button type="submit" style="margin-left:20px" name="delete_student" class="btn btn-success" data-bs-dismiss="modal">Yes</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal" id="addusermodal" tabindex="1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="width: 140%;">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">ADD STUDENT</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <form method="POST">
  <div class="row">
    <div class="col" style="padding: 20px;">
    <label for="">First name</label>
      <input type="text" class="form-control" name="f_name" placeholder="First name">
    </div>
    <div class="col" style="padding: 20px;">
    <label for="">Middle name</label>
      <input type="text" class="form-control" name="m_name" placeholder="Middle name">
    </div>
    <div class="col" style="padding: 20px;">
    <label for="">Last name</label>
      <input type="text" class="form-control" name="l_name" placeholder="Last name">
    </div>
    <div class="col" style="padding: 20px;">
    <label for="">Suffix</label>
      <select name="suffix" id="" class="form-control">
        <option value="">---</option>
        <option value="Jr">Jr</option>
        <option value="Sr">Sr</option>
      </select>
    </div>
  </div>
  <div class="row">
  <div class="col" style="padding: 20px;">
  <label for="">Gender</label>
      <select name="gender" id="" class="form-control">
        <option value="">---</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
      </select>
    </div>
    <div class="col" style="padding: 20px;">
    <label for="">Contact #</label>
      <input type="text" class="form-control" name="con_num" placeholder="Contact #">
    </div>
    <div class="col" style="padding: 20px;">
    <label for="">Address</label>
      <input type="text" class="form-control" name="address" placeholder="Address">
    </div>
    <div class="col" style="padding: 20px;">
    <label for="">Date of Birth</label>
      <input type="date" name="dob" class="form-control">
    </div>
  </div>
  <div class="row">
  <div class="col" style="padding: 20px;">
    <label for="">Email Address</label>
      <input type="email" name="email" class="form-control">
    </div>
  <div class="col" style="padding: 20px;">
  <label for="">Patient Type</label>
      <select name="patient_type" id="" class="form-control">
        <option value="">---</option>
        <option value="Check-ups">Check-ups</option>
        <option value="Headache">Headache</option>
      </select>
    </div>
  <div class="col" style="padding: 20px;">
  <label for="">Course</label>
      <select name="course" id="" class="form-control">
        <option value="">---</option>
        <option value="BSIT">BSIT</option>
        <option value="BSN">BSN</option>
      </select>
    </div>

  </div>
        <button type="submit" style="margin-left:20px" name="add_student" class="btn btn-success" data-bs-dismiss="modal">Submit</button>
       <br><br>  
</form>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <script>
    document.querySelectorAll('input[type="number"]').forEach(input =>{
      input.oninput = () =>{
        if(input.value.length > input.maxLength) input.value = input.value.slice(0, input.maxLength);
      }
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>  


<script>
         $(document).ready(function() {
            $('#search_text').keyup(function() {
                var txt = $(this).val();
                if (txt != '') {
                    $.ajax({
                        url: "search_student.php",
                        method: "post",
                        data: {
                        search: txt
                        },
                        dataType: "text",
                        success: function(data) {               
                                $('#result').html(data);
                        }
                    });
                } else {
                    // $('#result').html('');
                    // $.ajax({
                    //     url: "fetch.php",
                    //     method: "post",
                    //     data: {
                    //         search: txt
                    //     },
                    //     dataType: "text",
                    //     success: function(data) {
                    //         $('#result').html(data);
                    //     }
                    // });
                }
                
            });
            $('#search_text').keydown(function() {
                var txt = $(this).val();
              
                    $('#result').html('');
                
                
            });
        });
    </script>

    <section class="home">
        <div class="text">

        <nav>
                <div class="logo">
                    <p><span style="color:#FF8C00"><?= $record['f_name']?></span> DESPENSING OF MEDICINE</p>
                </div>
            </nav><br><br><br><br>
            <button class="btn btn-primary"><a href="despensing.php" style="color: white;text-decoration:none">Back</a></button>
            </button><?= $record['f_name']?>, <?= $record['l_name']?> <?= $record['m_name']?>. <?= $record['suffix']?>
            <input type="text" name="search_text" id="search_text" placeholder="Search Name" style="border-radius: 5px;height:40px;font-size:20px;float:right;padding: 5px;width:200px" />
                <div id="result"></div>
            <div class="mt-3">

            <div class="scroll-bg-a">
                <div class="scroll-div-a" style="background-color:transparent">
                    <div class="scroll-object-a">
                    <table class="table" style="font-size: 20px;">
                        <thead>
                            <tr>
                                <th>Medicine</th>
                                <th>Quantity</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if($all_recs > 0){?>
                            <tr>
                            <?php foreach($all_recs as $all_rec){?>
                                <td><?= $all_rec['med_name']?></td>
                                <td><?= $all_rec['qty']?></td>
                                <td><?= $all_rec['date']?></td>
                                <td><button class="btn btn-danger">Delete</button></td>
                           </tr>
                           <?php } }?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
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
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.addstudent').on('click', function() {

                $('#addusermodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                console.log(data);

            });

            $('.editstudent').on('click', function() {
                
                $('#modalstudent').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                console.log(data);

                $('#student_id').val(data[0])
                $('#l_name').val(data[2]);
                $('#f_name').val(data[3]);
                $('#m_name').val(data[4]);
                $('#suffix').val(data[5]);
                $('#gender').val(data[6]);
                $('#con_num').val(data[7]);
                $('#address').val(data[8]);
                $('#patient_type').val(data[9]);
                $('#dob').val(data[10]);
                $('#email').val(data[11]);
                $('#course').val(data[12]);



            });
            $('.deletestudent').on('click', function() {
                
                $('#delmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                console.log(data);

                $('#delstudent_id').val(data[0])

            });

        });
    </script>
</body>

</html>