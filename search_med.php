<?php
require_once('clinicclass.php');


$connect = mysqli_connect("localhost", "root", "", "db_clinic");
$output = '';
$sql = "SELECT * FROM tbl_medicine WHERE med_name LIKE '{$_POST['search']}%'";
$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) > 0) {
    $output .= '<h4 align="center">Search Result</h4>';
    $output .= '  <div class="table-responsive" style="text-align:center">
    
    <div class="td" style="background-color: transparent;padding:30px;box-shadow: 1px 1px 10px 1px grey;">
<table class="table" style="font-size: 20px;">
    <tr>
    <th>Name</th>
    <th>Description</th>
    <th>Quantity</th>
    <th>Used</th>
    <th>Available</th>
    <th>Expiry Date</th>
    <th>Action</th>
</tr>
    ';

    while ($row = mysqli_fetch_array($result)) {
        $output .= '
        <tr>
        <td>'.$row['med_name'].'</td>
        <td>'.$row['des'].'</td>
        <td>'.$row['qty'].'</td>
        <td>'.$row['used'].'</td>
        <td>'.$row['available'].'</td>
        <td>'.$row['ex_date'].'</td>
        <td>
        <button type="button" class="btn btn-success"><a href="editmed.php?id='.$row['id'].'">Edit</a></button>
        <button type="button" class="btn btn-danger"><a href="delmed.php?id='.$row['id'].'">Delete</a></button>
        </td>
    </tr>
 
    ';
    
    }
    
    echo $output;
} else {
    echo 'Data Not Found!';
}


?>
