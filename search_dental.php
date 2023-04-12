<?php
require_once('clinicclass.php');


$connect = mysqli_connect("localhost", "root", "", "db_clinic");
$output = '';
$sql = "SELECT * FROM tbl_dental_records WHERE f_name LIKE '{$_POST['search']}%'";
$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) > 0) {
    $output .= '<h4 align="center">Search Result</h4>';
    $output .= '  <div class="table-responsive" style="text-align:center">
    
    <div class="td" style="background-color: transparent;padding:30px;box-shadow: 1px 1px 10px 1px grey;">
<table class="table" style="font-size: 20px;">
    <tr>
    <th>Name</th>
    <th>Consultation Type</th>
    <th>Findings</th>
    <th>Medication</th>
    <th>Date</th>
    <th>Physician</th>
    <th>Action</th>
</tr>
    ';

    while ($row = mysqli_fetch_array($result)) {
        $output .= '
        <tr>
        <td style="display: none;">'.$row['dental_id'].'</td>
        <td>'.$row['l_name'].', '.$row['f_name'].' '.$row['m_name'].''.$row['suffix'].'</td>
        <td style="display: none;">'.$row['l_name'].'</td>
        <td style="display: none;">'.$row['f_name'].'</td>
        <td style="display: none;">'.$row['m_name'].'</td>
        <td style="display: none;">'.$row['suffix'].'</td>
        <td>'.$row['consult_type'].'</td>
        <td>'.$row['findings'].'</td>
        <td>'.$row['medication'].'</td>
        <td>'.$row['consult_date'].'</td>
        <td>'.$row['phy'].'</td>

        <td>
        <button type="button" class="btn btn-success"><a href="addden.php?id='.$row['dental_id'].'" style="color:white;text-decoration:none;">+ Den</a></button>
        </td>
    </tr>
 
    ';
    
    }
    
    echo $output;
} else {
    echo 'Data Not Found!';
}


?>
