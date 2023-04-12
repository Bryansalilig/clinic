<?php
require_once('clinicclass.php');
$id = $_GET['id'];
$staffs = $clinic->select_staff($id);
$clinic->update_faculty();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
</head>
<script>
    $(document).ready(function(){
        $("#myModal").modal('show');
    });
</script>
<body>
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content" style="margin-left:-120px;width: 150%;">
                <div class="modal-header">
                    <button type="button" class="btn btn-primary"><a href="users_purchased.php" style="color: white;text-decoration: none;">X</a></button>
                </div>
                <div class="modal-body">

                <!-- Modal body -->
                <form method="POST">
<?php foreach($staffs as $staff){?>
  <div class="row">
    <input type="hidden" name="faculty_id" id="faculty_id" value="<?= $staff['id']?>">
    <div class="col" style="padding: 20px;">
    <label for="">First name</label>
      <input type="text" class="form-control" name="f_name" id="f_name" value="<?= $staff['f_name']?>">
    </div>
    <div class="col" style="padding: 20px;">
    <label for="">Middle name</label>
      <input type="text" class="form-control" name="m_name" id="m_name" value="<?= $staff['m_name']?>">
    </div>
    <div class="col" style="padding: 20px;">
    <label for="">Last name</label>
      <input type="text" class="form-control" name="l_name" id="l_name" value="<?= $staff['l_name']?>">
    </div>
    <div class="col" style="padding: 20px;">
    <label for="">Suffix</label>
      <select name="suffix" id="suffix" class="form-control">
        <option value="<?= $staff['suffix']?>"><?= $staff['suffix']?></option>
        <option value="Jr">Jr</option>
        <option value="Sr">Sr</option>
      </select>
    </div>
  </div>
  <div class="row">
  <div class="col" style="padding: 20px;">
  <label for="">Gender</label>
      <select name="gender" id="gender" class="form-control">
        <option value="<?= $staff['gender']?>"><?= $staff['gender']?></option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
      </select>
    </div>
    <div class="col" style="padding: 20px;">
    <label for="">Contact #</label>
      <input type="text" class="form-control" name="con_num" id="con_num" value="<?= $staff['con_num']?>">
    </div>
    <div class="col" style="padding: 20px;">
    <label for="">Address</label>
      <input type="text" class="form-control" name="address" id="address" value="<?= $staff['address']?>">
    </div>
    <div class="col" style="padding: 20px;">
    <label for="">Date of Birth</label>
      <input type="date" name="dob" id="dob" class="form-control" value="<?= $staff['dob']?>">
    </div>
  </div>
  <div class="row">
  <div class="col" style="padding: 20px;">
    <label for="">Email Address</label>
      <input type="email" name="email" id="email" class="form-control" value="<?= $staff['email']?>">
    </div>
  <div class="col" style="padding: 20px;">
  <label for="">Patient Type</label>
      <select name="patient_type" id="patient_type" class="form-control">
        <option value="<?= $staff['patient_type']?>"><?= $staff['patient_type']?></option>
        <option value="Check-ups">Check-ups</option>
        <option value="Headache">Headache</option>
      </select>
    </div>
  <div class="col" style="padding: 20px;">
  <label for="">Course</label>
      <select name="course" id="course" class="form-control">
        <option value="<?= $staff['course']?>"><?= $staff['course']?></option>
        <option value="BSIT">BSIT</option>
        <option value="BSN">BSN</option>
      </select>
    </div>

  </div>
        <button type="submit" style="margin-left:20px" name="update_faculty" class="btn btn-success">Update</button>
       <br><br>  
       <?php } ?>
</form>

</body>
</html>