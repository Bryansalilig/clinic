<?php
require_once('clinicclass.php');
$id = $_GET['id'];
$record = $clinic->select_single_record_dental($id);
$clinic->update_student();
$clinic->add_mul_dental_record();
$clinic->add_findings();
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
                    <button type="button" class="btn btn-primary"><a href="dental.php" style="color: white;text-decoration: none;">X</a></button>
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
                        <input type="hidden" name="gen_id" id="gen_id" value="<?= $record['dental_id']?>">
                        <div class="col" style="padding: 20px;">
                            <label for="">First name</label>
                            <input type="text" class="form-control" name="f_name" id="addf_name" value="<?= $record['f_name']?>">
                        </div>
                        <div class="col" style="padding: 20px;">
                            <label for="">Middle name</label>
                            <input type="text" class="form-control" name="m_name" id="addm_name" value="<?= $record['m_name']?>">
                        </div>
                        <div class="col" style="padding: 20px;">
                            <label for="">Last name</label>
                            <input type="text" class="form-control" name="l_name" id="addl_name" value="<?= $record['l_name']?>">
                        </div>
                        <div class="col" style="padding: 20px;">
                            <label for="">Suffix</label>
                            <input type="text" class="form-control" name="suffix" id="addsuffix" value="<?= $record['suffix']?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" style="padding: 20px;">
                            <label for="">Consultation Type</label>
                            <select name="consult_type" id="consult_type" class="form-control">
                                <option value="">---</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col" style="padding: 20px;">
                            <label for="">Blood Pressure</label>
                            <input type="text" class="form-control" name="blood_pressure" id="blood_pressure">
                        </div>
                        <div class="col" style="padding: 20px;">
                      
                            <label for="">Findings</label> <button class="btn btn-primary addfindings" type="button" style="padding-top: 2px;padding-bottom:2px">+</button>
                            <select name="findings" id="findings" class="form-control">
                            <option value="---">---</option>
                            <?php foreach($findings as $finding){?>
                                <option value="<?= $finding['findings_name']?>"><?= $finding['findings_name']?></option>
                                <?php } ?>
                            </select>
                          
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" style="padding: 20px;">
                            <label for="">Medication</label>
                            <select name="medication" id="medication" class="form-control">
                                <option value="">---</option>
                                <option value="Vitamin A">Vitamin A</option>
                            </select>
                        </div>
                        <div class="col" style="padding: 20px;">
                            <label for="">Consultation Date</label>
                            <input type="date" name="consult_date" class="form-control">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col" style="padding: 20px;">
                            <label for="">Remarks</label><br>
                            <textarea name="remarks" id="" cols="50" rows="3"></textarea>
                        </div>
                        <div class="col" style="padding: 20px;">
                            <label for="">Physician Attended</label><br>
                            <select name="phy" id="phy" class="form-control">
                                <option value="">---</option>
                                <?php foreach($phys as $phy){?>
                                <option value="<?= $phy['fullname']?>"><?= $phy['fullname']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <button type="submit" style="margin-left:20px" name="add_mul_dental" class="btn btn-success" data-bs-dismiss="modal">+ Save</button>
                    <br><br>
                </form>



                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger"><a href="dental.php" style="color: white;text-decoration:none">Close</a></button>
                </div>


                </div>
</body>
</html>