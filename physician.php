<?php
require_once('clinicclass.php');
$clinic->add_phy();
$clinic->update_phy();
$clinic->delete_phy();

include_once('connection.php');


// get page number
if(isset($_GET['page_no']) && $_GET['page_no'] !== ""){
    $page_no = $_GET['page_no'];
} else {
    $page_no = 1;
}
// total rows or records to display
$total_records_per_page = 2;
// get the page offset for the LIMIT query
$offset = ($page_no - 1) * $total_records_per_page;

$previous_page = $page_no - 1;
$next_page = $page_no + 1;

$result_count = mysqli_query($conn, "SELECT COUNT(*) as total_records FROM tbl_physician") or die(mysqli_error($conn));
$records = mysqli_fetch_array($result_count);
$total_records = $records['total_records'];

$total_no_of_pages = ceil($total_records / $total_records_per_page);

// query stirng
$sql = "SELECT * FROM tbl_physician LIMIT $offset, $total_records_per_page";
// result
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
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
                        <a href="index.php">
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
                        <a href="physician.php" id="lop">
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

    <div class="modal" id="modalphy" tabindex="1" role="dialog">
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
    <input type="hidden" name="phy_id" id="phy_id">
    <div class="col" style="padding: 20px;">
    <label for="">Full name</label>
      <input type="text" class="form-control" name="fullname" id="fullname">
    </div>
    <div class="col" style="padding: 20px;">
    <label for="">Date of Birth</label>
      <input type="date" name="dob">
    </div>
    <div class="col" style="padding: 20px;">
    <label for="">Gender</label>
      <input type="text" class="form-control" name="gender" id="gender">
    </div>
  </div>
  <div class="row">
  <div class="col" style="padding: 20px;">
    <label for="">Address</label>
      <input type="text" class="form-control" name="address" id="address">
    </div>
    <div class="col" style="padding: 20px;">
    <label for="">Contact #</label>
      <input type="text" class="form-control" name="con_num" id="con_num">
    </div>
    <div class="col" style="padding: 20px;">
    <label for="">Position</label>
      <input type="text" name="position" id="position" class="form-control">
    </div>
  </div>

        <button type="submit" style="margin-left:20px" name="update_phy" class="btn btn-success" data-bs-dismiss="modal">Update</button>
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
                    <input type="hidden" name="del_phy" id="del_phy">
                    <h4>Are you sure you want to delete?</h4>
                    <br>
                    </center>




                <!-- Modal footer -->
                <div class="modal-footer">
                <button type="submit" style="margin-left:20px" name="delete_phy" class="btn btn-success" data-bs-dismiss="modal">Yes</button>
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
                    <h4 class="modal-title">ADD PHYSICIAN</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <form method="POST">
  <div class="row">
    <div class="col" style="padding: 20px;">
    <label for="">Full name</label>
      <input type="text" class="form-control" name="fullname" placeholder="Full name">
    </div>
    <div class="col" style="padding: 20px;">
    <label for="">Date of Birth</label>
      <input type="text" class="form-control" name="dob" placeholder="Date of Birth">
    </div>
    <div class="col" style="padding: 20px;">
    <label for="">Gender</label>
      <select name="gender" id="" class="form-control">
        <option value="---">---</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
      </select>
    </div>
  </div>
  <div class="row">
  <div class="col" style="padding: 20px;">
    <label for="">Address</label>
      <input type="text" class="form-control" name="address" placeholder="Address">
    </div>
    <div class="col" style="padding: 20px;">
    <label for="">Contact #</label>
      <input type="text" class="form-control" name="con_num" placeholder="Contact #">
    </div>
    <div class="col" style="padding: 20px;">
    <label for="">Position</label>
      <input type="text" class="form-control" name="position" placeholder="Position">
    </div>
  </div>

        <button type="submit" style="margin-left:20px" name="add_phy" class="btn btn-success" data-bs-dismiss="modal">+ Add</button>
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
                        url: "search_faculty.php",
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
                    <p>PHYSICIAN / DENTIST</p>
                </div>
            </nav><br><br><br><br>
            <button class="btn btn-primary addphy">+ Add Physician</button>
            <input type="text" name="search_text" id="search_text" placeholder="Search Name" style="border-radius: 5px;height:40px;font-size:20px;float:right;padding: 5px;width:200px" />
                <div id="result"></div>
            <div class="mt-3">
<div class="td" style="background-color: transparent;padding:30px">
<table class="table" style="font-size: 20px;">
        <thead>
            <tr>
                <th>Name</th>
                <th>Dob</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Contact #</th>
                <th>Position</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_array($result)){?>
            <tr>
                <td style="display: none;"><?= $row['id']?></td>
                <td><?= $row['fullname']?></td>
                <td><?= $row['dob']?></td>
                <td><?= $row['gender']?></td>
                <td><?= $row['address']?></td>
                <td><?= $row['con_num']?></td>
                <td><?= $row['position']?></td>
                <td>
                <button type="button" class="btn btn-success editphy">Edit</button>
                <button type="button" class="btn btn-danger deletephy">Delete</button>
                </td>
            </tr>
            <?php }
            mysqli_close($conn);
            ?>
        </tbody>
    </table>
</div>

    <nav class="na" aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link <?= ($page_no <= 1) ? 'disabled' : '';?> " <?= ($page_no > 1) ? 'href=?page_no='. $previous_page : '';?> style="font-size: 15px;">Previous</a></li>

    <?php for($counter = 1; $counter <= $total_no_of_pages; $counter++){?>

        <?php if($page_no != $counter){?>
    <li class="page-item"><a class="page-link" href="?page_no=<?= $counter; ?>" style="font-size: 15px;color:black"><?= $counter;?></a></li>
    <?php } else { ?>
        <li class="page-item"><a class="page-link active" style="font-size: 15px;color:black"><?= $counter;?></a></li>
        <?php } ?>
        <?php } ?>


    <li class="page-item"><a class="page-link <?= ($page_no >= $total_no_of_pages) ? 'disabled' : '';?> " <?= ($page_no < $total_no_of_pages) ? 'href=?page_no='. $next_page : '';?> style="font-size: 15px;">Next</a></li>
  </ul>
</nav>
<div class="p-10">
    <strong style="font-size: 20px;">Page <?= $page_no;?> of <?= $total_no_of_pages;?></strong>
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
            $('.addphy').on('click', function() {

                $('#addusermodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                console.log(data);

            });

            $('.editphy').on('click', function() {
                
                $('#modalphy').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                console.log(data);

                $('#phy_id').val(data[0])
                $('#fullname').val(data[1]);
                $('#dob').val(data[2]);
                $('#gender').val(data[3]);
                $('#address').val(data[4]);
                $('#con_num').val(data[5]);
                $('#position').val(data[6]);



            });
            $('.deletephy').on('click', function() {
                
                $('#delmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                console.log(data);

                $('#del_phy').val(data[0])

            });

        });
    </script>
</body>

</html>