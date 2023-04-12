<?php
require_once('clinicclass.php');
$id = $_GET['id'];
$staffs = $clinic->select_staff($id);
$clinic->update_faculty();
$clinic->delete_faculty();
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
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn btn-primary"><a href="faculty.php" style="color: white;text-decoration: none;">X</a></button>
                </div>
                <div class="modal-body">

                <!-- Modal body -->
                <form method="POST">
<?php foreach($staffs as $staff){?>
        <input type="hidden" name="delfaculty_id" value="<?= $staff['id']?>">
        <h4>Are you sure you want to delete?</h4>

       <?php } ?>

<button type="button" style="float:right;margin-left:10px" class="btn btn-primary"><a href="faculty.php" style="color: white;text-decoration: none;">No</a></button>
<button type="submit" style="float:right" name="delete_faculty" class="btn btn-danger">Yes</button>
                </form>
</body>
</html>