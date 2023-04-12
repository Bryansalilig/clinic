<?php
require_once('clinicclass.php');


$connect = mysqli_connect("localhost", "root", "", "db_clinic");
$output = '';
$sql = "SELECT * FROM tbl_patient_record WHERE f_name LIKE '{$_POST['search']}%' and access = 'Student'";
$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) > 0) {
    $output .= '<h4 align="center">Search Result</h4>';
    $output .= '  <div class="table-responsive" style="text-align:center">
    
    <div class="td" style="background-color: transparent;padding:30px;box-shadow: 1px 1px 10px 1px grey;">
<table class="table" style="font-size: 20px;">
    <tr>
    <th>Name</th>
    <th>Gender</th>
    <th>Contact</th>
    <th>Address</th>
    <th>Patient Type</th>
    <th>Action</th>
</tr>
    ';

    while ($row = mysqli_fetch_array($result)) {
        $output .= '
        <tr>
        <td style="display: none;">'.$row['id'].'</td>
        <td>'.$row['l_name'].', '.$row['f_name'].' '.$row['m_name'].''.$row['suffix'].'</td>
        <td style="display: none;">'.$row['l_name'].'</td>
        <td style="display: none;">'.$row['f_name'].'</td>
        <td style="display: none;">'.$row['m_name'].'</td>
        <td style="display: none;">'.$row['suffix'].'</td>
        <td>'.$row['gender'].'</td>
        <td>'.$row['con_num'].'</td>
        <td>'.$row['address'].'</td>
        <td>'.$row['patient_type'].'</td>
        <td style="display: none;">'.$row['dob'].'</td>
        <td style="display: none;">'.$row['email'].'</td>
        <td style="display: none;">'.$row['course'].'</td>
        <td>
        <button type="button" class="btn btn-success"><a href="editstudent.php?id='.$row['id'].'" style="color:white;text-decoration:none;">Edit</a></button>
        <button type="button" class="btn btn-danger"><a href="deletestudent.php?id='.$row['id'].'" style="color:white;text-decoration:none;">Delete</a></button>
        </td>
    </tr>
 
    ';
    
    }
    
    echo $output;
} else {
    echo 'Data Not Found!';
}


?>