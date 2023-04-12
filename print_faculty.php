<?php
require_once('clinicclass.php');
$id = $_GET['id'];
$patients = $clinic->select_patient_rec($id);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css" rel="stylesheet">
    
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style1.css">
    <style type="text/css" media="print">
        @media print{
            .noprint, noprint *{
                display: none !important
            }
        }

    </style>

</head>
<body onload="print()">

<?php if($id == "Faculty"){
    echo "<button class='btn btn-info noprint' type='submit' style='width:100%' name='delete'><a href='faculty.php'>Back</a></button>";
}else if($id == "Staff"){
    echo  "<button class='btn btn-info noprint' type='submit' style='width:100%' name='delete'><a href='staff.php'>Back</a></button>";
}else {
    echo  "<button class='btn btn-info noprint' type='submit' style='width:100%' name='delete'><a href='student.php'>Back</a></button>";
}
?>              
<div style="text-align: center;">

    <h4><?php if($id == "Faculty"){
        echo "FACULTY";
    }else if($id == "Staff"){
        echo "STAFF";
    }else {
        echo "STUDENT";
    }
    ?> RECORDS</h4>
    <br>
<div class="con col-md-10 offset-md-1">
</div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Contact #</th>
                    <th scope="col">Address</th>
                    <th scope="col">Dob</th>
                    <th scope="col">Email</th>
                    <th scope="col">Course</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($patients > 0) { ?>
                    <?php foreach ($patients as $patient) { ?>
                        <tr>
                            <th><?= $patient['l_name'] ?>, <?= $patient['f_name'] ?> <?= $patient['m_name'] ?></th>
                            <td><?= $patient['gender'] ?></td>
                            <td><?= $patient['con_num'] ?></td>
                            <td><?= $patient['address'] ?></td>
                            <td><?= $patient['dob'] ?></td>
                            <td><?= $patient['email'] ?></td>
                            <td><?= $patient['course'] ?></td>
                            </td>
                        </tr>
                <?php }
                } ?>

            </tbody>
        </table>
    </div> 

</body>

</html>