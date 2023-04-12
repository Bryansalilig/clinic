<?php
require_once('clinicclass.php');
$id = $_GET['id'];
$record = $clinic->select_single_record_medicine($id);
$clinic->update_student();
$clinic->add_mul_dental_record();
$clinic->update_medicine();
$findings = $clinic->select_all_findings();
$phys = $clinic->select_all_phy();
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
                    <button type="button" class="btn btn-primary"><a href="medicine.php" style="color: white;text-decoration: none;">X</a></button>
                </div>
                <div class="modal-body">
             

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">ADD MEDICAL</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <form method="POST">
                    <div class="row">
                        <input type="hidden" name="med_id" id="med_id" value="<?= $record['id']?>">
                        <input type="hidden" name="used" id="used" value="<?= $record['used']?>">
                        <input type="hidden" name="available" id="available" value="<?= $record['available']?>">
                        <div class="col" style="padding: 20px;">
                            <label for="">Medicine name</label>
                            <input type="text" class="form-control" name="med_name" id="med_name" value="<?= $record['med_name']?>">
                        </div>
                        <div class="col" style="padding: 20px;">
                            <label for="">Cure for/Description</label>
                            <input type="text" class="form-control" name="des" id="des" value="<?= $record['des']?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" style="padding: 20px;">
                            <label for="">Quatity</label>
                            <input type="text" class="form-control" name="qty" id="qty" value="<?= $record['qty']?>">
                        </div>
                        <div class="col" style="padding: 20px;">
                            <label for="">Add Stocks</label>
                            <input type="text" class="form-control" name="addqty" id="addqty">
                        </div>
                        <div class="col" style="padding: 20px;">
                            <label for="">Expiry Date</label>
                            <input type="date" class="form-control" name="ex_date" id="ex_date" value="<?= $record['ex_date']?>">
                        </div>
                    </div>
                    <button type="submit" style="margin-left:20px" name="update_medicine" class="btn btn-success" data-bs-dismiss="modal">Update</button>
                    <br><br>
                </form>



                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger"><a href="medicine.php" style="color: white;text-decoration:none">Close</a></button>
                </div>


                </div>
</body>
</html>