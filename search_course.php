<?php
require_once('clinicclass.php');


$connect = mysqli_connect("localhost", "root", "", "db_clinic");
$output = '';
$sql = "SELECT * FROM tbl_course WHERE course_name LIKE '{$_POST['search']}%'";
$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) > 0) {
    $output .= '<h4 align="center">Search Result</h4>';
    $output .= '  <div class="table-responsive" style="text-align:center">
    
    <div class="td" style="background-color: transparent;padding:30px;box-shadow: 1px 1px 10px 1px grey;">
<table class="table" style="font-size: 20px;">
    <tr>
    <th>Course Name</th>
    <th>Abbreviation</th>
    <th>Action</th>
</tr>
    ';

    while ($row = mysqli_fetch_array($result)) {
        $output .= '
        <tr>
        <td style="display: none;">'.$row['id'].'</td>
        <td>'.$row['course_name'].'</td>
        <td>'.$row['abb'].'</td>
        <td>
        <button type="button" class="btn btn-success"><a href="editfaculty.php?id='.$row['id'].'" style="color:white;text-decoration:none;">Edit</a></button>
        <button type="button" class="btn btn-danger"><a href="deletefaculty.php?id='.$row['id'].'" style="color:white;text-decoration:none;">Delete</a></button>
        </td>
    </tr>
 
    ';
    
    }
    
    echo $output;
} else {
    echo 'Data Not Found!';
}


?>
