<?php 

class Clinic
{

    private $server = "mysql:host=localhost;dbname=db_clinic";
    private $user = "root";
    private $pass = "";
    // PDO Configuration
    private $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
    protected $con;


    public function openConnection()
    {
        try {
            $this->con = new PDO($this->server, $this->user, $this->pass, $this->options);
            return $this->con;
        } catch (PDOException $e) {
            echo "There is an error in the connection" . $e->getMessage();
        }
    }

    public function closeConnection()
    {
        $this->con = null;
    }

    public function login()
    {
        if (isset($_POST['submit'])) {
            $password = md5($_POST['password']);
            $username = $_POST['email'];
            $connection = $this->openConnection();
            $stmt = $connection->prepare("SELECT * FROM tbl_acct WHERE email = ? AND password = ?");
            $stmt->execute([$username, $password]);
            $total = $stmt->rowCount();
            $user = $stmt->fetch();
            if ($total > 0) {
                echo "Welcome " . $user['first_name'] . " " . $user['last_name'];
                $this->set_userdata($user);
                header("Location: index.php");
            } else {
                echo "Login Failed";
            }
        }
    }

    public function set_userdata($array)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['userdata'] = array(
            "fullname" => $array['first_name'] . " " . $array['last_name'],
            "access" => $array['access']
        );
        return $_SESSION['userdata'];
    }

    public function get_userdata()
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        if (isset($_SESSION['userdata'])) {
            return $_SESSION['userdata'];
        } else {
            return null;
        }
    }

    public function logout()
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['userdata'] = null;
        unset($_SESSION['userdata']);
    }

    public function add_discharge()
    {
        if (isset($_POST['discharge'])) {
            $f_name = $_POST['f_name'];
            $m_name = $_POST['m_name'];
            $l_name = $_POST['l_name'];
            $suffix = $_POST['suffix'];
            $discharge_update = $_POST['discharge_update'];
            

                $connection = $this->openConnection();
                $stmt = $connection->prepare("INSERT INTO tbl_discharge (`f_name`,`m_name`, `l_name`, `suffix`)VALUES(?, ?, ?, ?)");
                $stmt->execute([$f_name, $m_name, $l_name, $suffix]);

                $connection = $this->openConnection();
                $stmt = $connection->prepare("UPDATE tbl_ail_dis_chart SET discharge='$discharge_update' WHERE id = 1");
                $stmt->execute();

                header("Location: patient_history.php");
        }
    }

    public function add_course()
    {
        if (isset($_POST['add_course'])) {
            $course_name = $_POST['course_name'];
            $abb = $_POST['abb'];

                $connection = $this->openConnection();
                $stmt = $connection->prepare("INSERT INTO tbl_course (`course_name`,`abb`)VALUES(?, ?)");
                $stmt->execute([$course_name, $abb]);

                header("Location: course.php");
        }
    }

    public function update_course(){
        if(isset($_POST['update_course'])){
            $faculty_id = $_POST['faculty_id'];
            $course_name = $_POST['course_name'];
            $abb = $_POST['abb'];

            $connection = $this->openConnection();
                $stmt = $connection->prepare("UPDATE tbl_course SET course_name='$course_name', abb='$abb' WHERE id='$faculty_id'");
                $stmt->execute();
                
                header("Location: course.php");
        }
    }

    public function delete_course(){
        if(isset($_POST['delete_course'])){
            $id = $_POST['delfaculty_id'];

            $connection = $this->openConnection();
            $stmt = $connection->prepare("DELETE FROM tbl_course WHERE id='$id'");
            $stmt->execute();
            header("Location: course.php");
        }
    }

    public function select_all_course() {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM tbl_course");
        $stmt->execute();
        $findings = $stmt->fetchall();
        $total = $stmt->rowCount();

        if($total > 0) {
            return $findings;
        } else {
            return FALSE;
        }
    }
    
    public function add_phy()
    {
        if (isset($_POST['add_phy'])) {
            $fullname = $_POST['fullname'];
            $dob = $_POST['dob'];
            $gender = $_POST['gender'];
            $address = $_POST['address'];
            $con_num = $_POST['con_num'];
            $position = $_POST['position'];

                $connection = $this->openConnection();
                $stmt = $connection->prepare("INSERT INTO tbl_physician (`fullname`,`dob`, `gender`, `address`, `con_num`, `position`)VALUES(?, ?, ?, ?, ?, ?)");
                $stmt->execute([$fullname, $dob, $gender, $address, $con_num, $position]);

                header("Location: physician.php");
        }
    }

    public function add_student()
    {
        if (isset($_POST['add_student'])) {
            $f_name = $_POST['f_name'];
            $m_name = $_POST['m_name'];
            $l_name = $_POST['l_name'];
            $suffix = $_POST['suffix'];
            $gender = $_POST['gender'];
            $con_num = $_POST['con_num'];
            $address = $_POST['address'];
            $dob = $_POST['dob'];
            $email = $_POST['email'];
            $patient_type = $_POST['patient_type'];
            $course = $_POST['course'];
            $access = "Student";

                $connection = $this->openConnection();
                $stmt = $connection->prepare("INSERT INTO tbl_patient_record (`f_name`,`m_name`, `l_name`, `suffix`, `gender`, `con_num`, `address`, `dob`, `email`, `patient_type`, `course`, `access`)VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([$f_name, $m_name, $l_name, $suffix, $gender, $con_num, $address, $dob, $email, $patient_type, $course, $access]);

                header("Location: student.php");
        }
    }

    public function add_faculty()
    {
        if (isset($_POST['add_faculty'])) {
            $f_name = $_POST['f_name'];
            $m_name = $_POST['m_name'];
            $l_name = $_POST['l_name'];
            $suffix = $_POST['suffix'];
            $gender = $_POST['gender'];
            $con_num = $_POST['con_num'];
            $address = $_POST['address'];
            $dob = $_POST['dob'];
            $email = $_POST['email'];
            $patient_type = $_POST['patient_type'];
            $course = $_POST['course'];
            $access = "Faculty";

                $connection = $this->openConnection();
                $stmt = $connection->prepare("INSERT INTO tbl_patient_record (`f_name`,`m_name`, `l_name`, `suffix`, `gender`, `con_num`, `address`, `dob`, `email`, `patient_type`, `course`, `access`)VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([$f_name, $m_name, $l_name, $suffix, $gender, $con_num, $address, $dob, $email, $patient_type, $course, $access]);

                header("Location: faculty.php");
        }
    }

    public function add_staff()
    {
        if (isset($_POST['add_staff'])) {
            $f_name = $_POST['f_name'];
            $m_name = $_POST['m_name'];
            $l_name = $_POST['l_name'];
            $suffix = $_POST['suffix'];
            $gender = $_POST['gender'];
            $con_num = $_POST['con_num'];
            $address = $_POST['address'];
            $dob = $_POST['dob'];
            $email = $_POST['email'];
            $patient_type = $_POST['patient_type'];
            $course = $_POST['course'];
            $access = "Staff";

                $connection = $this->openConnection();
                $stmt = $connection->prepare("INSERT INTO tbl_patient_record (`f_name`,`m_name`, `l_name`, `suffix`, `gender`, `con_num`, `address`, `dob`, `email`, `patient_type`, `course`, `access`)VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([$f_name, $m_name, $l_name, $suffix, $gender, $con_num, $address, $dob, $email, $patient_type, $course, $access]);

                header("Location: staff.php");
        }
    }

    public function update_staff(){
        if(isset($_POST['update_staff'])){
            $staff_id = $_POST['staff_id'];
            $f_name = $_POST['f_name'];
            $m_name = $_POST['m_name'];
            $l_name = $_POST['l_name'];
            $suffix = $_POST['suffix'];
            $gender = $_POST['gender'];
            $con_num = $_POST['con_num'];
            $address = $_POST['address'];
            $dob = $_POST['dob'];
            $email = $_POST['email'];
            $patient_type = $_POST['patient_type'];
            $course = $_POST['course'];

            $connection = $this->openConnection();
                $stmt = $connection->prepare("UPDATE tbl_patient_record SET f_name='$f_name', m_name='$m_name', l_name='$l_name', suffix='$suffix', gender='$gender', con_num='$con_num', address='$address', dob='$dob', email='$email', patient_type='$patient_type', course='$course' WHERE id='$staff_id'");
                $stmt->execute();
                
                header("Location: staff.php");
        }
    }
    public function delete_staff(){
        if(isset($_POST['delete_staff'])){
            $id = $_POST['delstaff_id'];

            $connection = $this->openConnection();
            $stmt = $connection->prepare("DELETE FROM tbl_patient_record WHERE id='$id'");
            $stmt->execute();
            header("Location: staff.php");
        }
    }

    public function update_student(){
        if(isset($_POST['update_student'])){
            $student_id = $_POST['student_id'];
            $f_name = $_POST['f_name'];
            $m_name = $_POST['m_name'];
            $l_name = $_POST['l_name'];
            $suffix = $_POST['suffix'];
            $gender = $_POST['gender'];
            $con_num = $_POST['con_num'];
            $address = $_POST['address'];
            $dob = $_POST['dob'];
            $email = $_POST['email'];
            $patient_type = $_POST['patient_type'];
            $course = $_POST['course'];

            $connection = $this->openConnection();
                $stmt = $connection->prepare("UPDATE tbl_patient_record SET f_name='$f_name', m_name='$m_name', l_name='$l_name', suffix='$suffix', gender='$gender', con_num='$con_num', address='$address', dob='$dob', email='$email', patient_type='$patient_type', course='$course' WHERE id='$student_id'");
                $stmt->execute();
                
                header("Location: student.php");
        }
    }
    public function delete_student(){
        if(isset($_POST['delete_student'])){
            $id = $_POST['delstudent_id'];

            $connection = $this->openConnection();
            $stmt = $connection->prepare("DELETE FROM tbl_patient_record WHERE id='$id'");
            $stmt->execute();
            header("Location: student.php");
        }
    }

    public function update_faculty(){
        if(isset($_POST['update_faculty'])){
            $faculty_id = $_POST['faculty_id'];
            $f_name = $_POST['f_name'];
            $m_name = $_POST['m_name'];
            $l_name = $_POST['l_name'];
            $suffix = $_POST['suffix'];
            $gender = $_POST['gender'];
            $con_num = $_POST['con_num'];
            $address = $_POST['address'];
            $dob = $_POST['dob'];
            $email = $_POST['email'];
            $patient_type = $_POST['patient_type'];
            $course = $_POST['course'];

            $connection = $this->openConnection();
                $stmt = $connection->prepare("UPDATE tbl_patient_record SET f_name='$f_name', m_name='$m_name', l_name='$l_name', suffix='$suffix', gender='$gender', con_num='$con_num', address='$address', dob='$dob', email='$email', patient_type='$patient_type', course='$course' WHERE id='$faculty_id'");
                $stmt->execute();
                
                header("Location: faculty.php");
        }
    }
    public function delete_faculty(){
        if(isset($_POST['delete_faculty'])){
            $id = $_POST['delfaculty_id'];

            $connection = $this->openConnection();
            $stmt = $connection->prepare("DELETE FROM tbl_patient_record WHERE id='$id'");
            $stmt->execute();
            header("Location: faculty.php");
        }
    }
    public function update_phy(){
        if(isset($_POST['update_phy'])){
            $phy_id = $_POST['phy_id'];
            $fullname = $_POST['fullname'];
            $dob = $_POST['dob'];
            $gender = $_POST['gender'];
            $address = $_POST['address'];
            $con_num = $_POST['con_num'];
            $position = $_POST['position'];


            $connection = $this->openConnection();
                $stmt = $connection->prepare("UPDATE tbl_physician SET fullname='$fullname', dob='$dob', gender='$gender', address='$address', con_num='$con_num', position='$position' WHERE id='$phy_id'");
                $stmt->execute();
                
                header("Location: physician.php");
        }
    }
    public function delete_phy(){
        if(isset($_POST['delete_phy'])){
            $id = $_POST['del_phy'];

            $connection = $this->openConnection();
            $stmt = $connection->prepare("DELETE FROM tbl_physician WHERE id='$id'");
            $stmt->execute();
            header("Location: physician.php");
        }
    }

    public function select_staff($id) {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM tbl_patient_record WHERE id = ?");
        $stmt->execute([$id]);
        $patient = $stmt->fetchall();
        $total = $stmt->rowCount();

        if($total > 0) {
            return $patient;
        } else {
            return FALSE;
        }
    }

    public function select_all_despensing($id) {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM tbl_despensing WHERE despensing_id = ?");
        $stmt->execute([$id]);
        $patient = $stmt->fetchall();
        $total = $stmt->rowCount();

        if($total > 0) {
            return $patient;
        } else {
            return FALSE;
        }
    }

    public function add_findings()
    {
        if (isset($_POST['add_findings'])) {
            $findings_name = $_POST['findings_name'];

                $connection = $this->openConnection();
                $stmt = $connection->prepare("INSERT INTO tbl_findings (`findings_name`)VALUES(?)");
                $stmt->execute([$findings_name]);
        }
    }

    public function select_all_findings() {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM tbl_findings");
        $stmt->execute();
        $findings = $stmt->fetchall();
        $total = $stmt->rowCount();

        if($total > 0) {
            return $findings;
        } else {
            return FALSE;
        }
    }
    public function select_all_phy() {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM tbl_physician");
        $stmt->execute();
        $phy = $stmt->fetchall();
        $total = $stmt->rowCount();

        if($total > 0) {
            return $phy;
        } else {
            return FALSE;
        }
    }
    public function select_medicine() {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM tbl_medicine");
        $stmt->execute();
        $med = $stmt->fetchall();
        $total = $stmt->rowCount();

        if($total > 0) {
            return $med;
        } else {
            return FALSE;
        }
    }
    public function add_dental_record()
    {
        if (isset($_POST['add_dental_rec'])) {
            $student_id = $_POST['student_id'];
            $available = $_POST['available'];
            $buymedqty = $_POST['buymedqty'];
            $used = $_POST['used'];
            $totalused = $buymedqty + $used;
            $remainstocks = $available - $buymedqty;
            $f_name = $_POST['f_name'];
            $m_name = $_POST['m_name'];
            $l_name = $_POST['l_name'];
            $suffix = $_POST['suffix'];
            $consult_type = $_POST['consult_type'];
            $blood_pressure = $_POST['blood_pressure'];
            $findings = $_POST['findings'];
            $medication = $_POST['medication'];
            $consult_date = $_POST['consult_date'];
            $remarks = $_POST['remarks'];
            $phy = $_POST['phy'];
            $access = "Student";
            $medcount = $_POST['medcount'];
            $mon = $_POST['mon'];

            if($mon == 1){
                $connection = $this->openConnection();
                $stmt = $connection->prepare("UPDATE tbl_chart SET jan='$medcount' WHERE id = 1");
                $stmt->execute();
                $connection = $this->openConnection();
                $stmt = $connection->prepare("UPDATE tbl_ail_dis_chart SET ailments='$medcount' WHERE id = 1");
                $stmt->execute();
            }

                $connection = $this->openConnection();
                $stmt = $connection->prepare("INSERT INTO tbl_dental_records (`dental_id`,`f_name`,`m_name`, `l_name`, `suffix`, `consult_type`, `blood_pressure`, `findings`, `medication`, `consult_date`, `remarks`, `phy`, `access`)VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([$student_id,$f_name, $m_name, $l_name, $suffix, $consult_type, $blood_pressure, $findings, $medication, $consult_date, $remarks, $phy, $access]);
                $connection = $this->openConnection();

                $connection = $this->openConnection();
                $stmt = $connection->prepare("UPDATE tbl_medicine SET used='$totalused', available='$remainstocks' WHERE med_name='$medication'");
                $stmt->execute();

                $stmt = $connection->prepare("INSERT INTO tbl_despensing (`despensing_id`,`med_name`,`qty`, `date`)VALUES(?, ?, ?, ?)");
                $stmt->execute([$student_id,$medication, $buymedqty, $consult_date]);
                header("Location: denstudent.php");

        }
    }
    public function add_dental_faculty_record()
    {
        if (isset($_POST['add_dental_faculty_rec'])) {
            $faculty_id = $_POST['faculty_id'];
            $available = $_POST['available'];
            $buymedqty = $_POST['buymedqty'];
            $used = $_POST['used'];
            $totalused = $buymedqty + $used;
            $remainstocks = $available - $buymedqty;
            $f_name = $_POST['f_name'];
            $m_name = $_POST['m_name'];
            $l_name = $_POST['l_name'];
            $suffix = $_POST['suffix'];
            $consult_type = $_POST['consult_type'];
            $blood_pressure = $_POST['blood_pressure'];
            $findings = $_POST['findings'];
            $medication = $_POST['medication'];
            $consult_date = $_POST['consult_date'];
            $remarks = $_POST['remarks'];
            $phy = $_POST['phy'];
            $access = "Student";
            $medcount = $_POST['medcount'];
            $mon = $_POST['mon'];

            if($mon == 1){
                $connection = $this->openConnection();
                $stmt = $connection->prepare("UPDATE tbl_chart SET jan='$medcount' WHERE id = 1");
                $stmt->execute();
                $connection = $this->openConnection();
                $stmt = $connection->prepare("UPDATE tbl_ail_dis_chart SET ailments='$medcount' WHERE id = 1");
                $stmt->execute();
            }

                $connection = $this->openConnection();
                $stmt = $connection->prepare("INSERT INTO tbl_dental_records (`dental_id`,`f_name`,`m_name`, `l_name`, `suffix`, `consult_type`, `blood_pressure`, `findings`, `medication`, `consult_date`, `remarks`, `phy`, `access`)VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([$faculty_id,$f_name, $m_name, $l_name, $suffix, $consult_type, $blood_pressure, $findings, $medication, $consult_date, $remarks, $phy, $access]);
                $connection = $this->openConnection();

                $connection = $this->openConnection();
                $stmt = $connection->prepare("UPDATE tbl_medicine SET used='$totalused', available='$remainstocks' WHERE med_name='$medication'");
                $stmt->execute();

                $stmt = $connection->prepare("INSERT INTO tbl_despensing (`despensing_id`,`med_name`,`qty`, `date`)VALUES(?, ?, ?, ?)");
                $stmt->execute([$faculty_id,$medication, $buymedqty, $consult_date]);
                header("Location: denfaculty.php");

        }
    }
    public function add_dental_staff_record()
    {
        if (isset($_POST['add_dental_staff_rec'])) {
            $staff_id = $_POST['staff_id'];
            $available = $_POST['available'];
            $buymedqty = $_POST['buymedqty'];
            $used = $_POST['used'];
            $totalused = $buymedqty + $used;
            $remainstocks = $available - $buymedqty;
            $f_name = $_POST['f_name'];
            $m_name = $_POST['m_name'];
            $l_name = $_POST['l_name'];
            $suffix = $_POST['suffix'];
            $consult_type = $_POST['consult_type'];
            $blood_pressure = $_POST['blood_pressure'];
            $findings = $_POST['findings'];
            $medication = $_POST['medication'];
            $consult_date = $_POST['consult_date'];
            $remarks = $_POST['remarks'];
            $phy = $_POST['phy'];
            $access = "Student";
            $medcount = $_POST['medcount'];
            $mon = $_POST['mon'];

            if($mon == 1){
                $connection = $this->openConnection();
                $stmt = $connection->prepare("UPDATE tbl_chart SET jan='$medcount' WHERE id = 1");
                $stmt->execute();
                $connection = $this->openConnection();
                $stmt = $connection->prepare("UPDATE tbl_ail_dis_chart SET ailments='$medcount' WHERE id = 1");
                $stmt->execute();
            }

                $connection = $this->openConnection();
                $stmt = $connection->prepare("INSERT INTO tbl_dental_records (`dental_id`,`f_name`,`m_name`, `l_name`, `suffix`, `consult_type`, `blood_pressure`, `findings`, `medication`, `consult_date`, `remarks`, `phy`, `access`)VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([$staff_id,$f_name, $m_name, $l_name, $suffix, $consult_type, $blood_pressure, $findings, $medication, $consult_date, $remarks, $phy, $access]);
                $connection = $this->openConnection();

                $connection = $this->openConnection();
                $stmt = $connection->prepare("UPDATE tbl_medicine SET used='$totalused', available='$remainstocks' WHERE med_name='$medication'");
                $stmt->execute();

                $stmt = $connection->prepare("INSERT INTO tbl_despensing (`despensing_id`,`med_name`,`qty`, `date`)VALUES(?, ?, ?, ?)");
                $stmt->execute([$staff_id,$medication, $buymedqty, $consult_date]);
                header("Location: denstaff.php");

        }
    }

    public function add_mul_dental_record()
    {
        if (isset($_POST['add_mul_dental'])) {
            $gen_id = $_POST['gen_id'];
            $available = $_POST['available'];
            $buymedqty = $_POST['buymedqty'];
            $used = $_POST['used'];
            $totalused = $buymedqty + $used;
            $remainstocks = $available - $buymedqty;
            $f_name = $_POST['f_name'];
            $m_name = $_POST['m_name'];
            $l_name = $_POST['l_name'];
            $suffix = $_POST['suffix'];
            $consult_type = $_POST['consult_type'];
            $blood_pressure = $_POST['blood_pressure'];
            $findings = $_POST['findings'];
            $medication = $_POST['medication'];
            $consult_date = $_POST['consult_date'];
            $remarks = $_POST['remarks'];
            $phy = $_POST['phy'];
            $medcount = $_POST['medcount'];
            $mon = $_POST['mon'];
            $access = "---";

                $connection = $this->openConnection();
                $stmt = $connection->prepare("INSERT INTO tbl_mul_dental (`mul_id`,`f_name`,`m_name`, `l_name`, `suffix`, `consult_type`, `blood_pressure`, `findings`, `medication`, `consult_date`, `remarks`, `phy`, `access`)VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([$gen_id,$f_name, $m_name, $l_name, $suffix, $consult_type, $blood_pressure, $findings, $medication, $consult_date, $remarks, $phy, $access]);
                $connection = $this->openConnection();
                $stmt = $connection->prepare("UPDATE tbl_medicine SET used='$totalused', available='$remainstocks' WHERE med_name='$medication'");
                $stmt->execute();

                $stmt = $connection->prepare("INSERT INTO tbl_despensing (`despensing_id`,`med_name`,`qty`, `date`)VALUES(?, ?, ?, ?)");
                $stmt->execute([$gen_id,$medication, $buymedqty, $consult_date]);
                header("Location: dental.php");
        }
    }

    
    public function add_medical_record()
    {
        if (isset($_POST['add_medical_rec'])) {
            $student_id = $_POST['student_id'];
            $available = $_POST['available'];
            $buymedqty = $_POST['buymedqty'];
            $used = $_POST['used'];
            $totalused = $buymedqty + $used;
            $remainstocks = $available - $buymedqty;
            $f_name = $_POST['f_name'];
            $m_name = $_POST['m_name'];
            $l_name = $_POST['l_name'];
            $suffix = $_POST['suffix'];
            $consult_type = $_POST['consult_type'];
            $blood_pressure = $_POST['blood_pressure'];
            $findings = $_POST['findings'];
            $medication = $_POST['medication'];
            $consult_date = $_POST['consult_date'];
            $remarks = $_POST['remarks'];
            $phy = $_POST['phy'];
            $access = "Student";
            $medcount = $_POST['medcount'];
            $mon = $_POST['mon'];

            if($mon == 1){
                $connection = $this->openConnection();
                $stmt = $connection->prepare("UPDATE tbl_chart SET jan='$medcount' WHERE id = 1");
                $stmt->execute();
                $connection = $this->openConnection();
                $stmt = $connection->prepare("UPDATE tbl_ail_dis_chart SET ailments='$medcount' WHERE id = 1");
                $stmt->execute();
            }

                $connection = $this->openConnection();
                $stmt = $connection->prepare("INSERT INTO medical_records (`med_id`,`f_name`,`m_name`, `l_name`, `suffix`, `consult_type`, `blood_pressure`, `findings`, `medication`, `consult_date`, `remarks`, `phy`, `access`)VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([$student_id,$f_name, $m_name, $l_name, $suffix, $consult_type, $blood_pressure, $findings, $medication, $consult_date, $remarks, $phy, $access]);
                $connection = $this->openConnection();

                $connection = $this->openConnection();
                $stmt = $connection->prepare("UPDATE tbl_medicine SET used='$totalused', available='$remainstocks' WHERE med_name='$medication'");
                $stmt->execute();

                $stmt = $connection->prepare("INSERT INTO tbl_despensing (`despensing_id`,`med_name`,`qty`, `date`)VALUES(?, ?, ?, ?)");
                $stmt->execute([$student_id,$medication, $buymedqty, $consult_date]);
                header("Location: medstudent.php");

        }
    }

    public function add_medical_record_faculty()
    {
        if (isset($_POST['add_medical_rec_faculty'])) {
            $faculty_id = $_POST['faculty_id'];
            $available = $_POST['available'];
            $buymedqty = $_POST['buymedqty'];
            $used = $_POST['used'];
            $totalused = $buymedqty + $used;
            $remainstocks = $available - $buymedqty;
            $f_name = $_POST['f_name'];
            $m_name = $_POST['m_name'];
            $l_name = $_POST['l_name'];
            $suffix = $_POST['suffix'];
            $consult_type = $_POST['consult_type'];
            $blood_pressure = $_POST['blood_pressure'];
            $findings = $_POST['findings'];
            $medication = $_POST['medication'];
            $consult_date = $_POST['consult_date'];
            $remarks = $_POST['remarks'];
            $phy = $_POST['phy'];
            $access = "Faculty";
            $medcount = $_POST['medcount'];
            $mon = $_POST['mon'];

            if($mon == 1){
                $connection = $this->openConnection();
                $stmt = $connection->prepare("UPDATE tbl_chart SET jan='$medcount' WHERE id = 1");
                $stmt->execute();
                $connection = $this->openConnection();
                $stmt = $connection->prepare("UPDATE tbl_ail_dis_chart SET ailments='$medcount' WHERE id = 1");
                $stmt->execute();
            }

                $connection = $this->openConnection();
                $stmt = $connection->prepare("INSERT INTO medical_records (`med_id`,`f_name`,`m_name`, `l_name`, `suffix`, `consult_type`, `blood_pressure`, `findings`, `medication`, `consult_date`, `remarks`, `phy`, `access`)VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([$faculty_id,$f_name, $m_name, $l_name, $suffix, $consult_type, $blood_pressure, $findings, $medication, $consult_date, $remarks, $phy, $access]);

                $connection = $this->openConnection();
                $stmt = $connection->prepare("UPDATE tbl_medicine SET used='$totalused', available='$remainstocks' WHERE med_name='$medication'");
                $stmt->execute();

                $stmt = $connection->prepare("INSERT INTO tbl_despensing (`despensing_id`,`med_name`,`qty`, `date`)VALUES(?, ?, ?, ?)");
                $stmt->execute([$faculty_id,$medication, $buymedqty, $consult_date]);
                header("Location: medfaculty.php");
        }
    }
    public function add_medical_record_staff()
    {
        if (isset($_POST['add_medical_rec_staff'])) {
            $staff_id = $_POST['staff_id'];
            $available = $_POST['available'];
            $buymedqty = $_POST['buymedqty'];
            $used = $_POST['used'];
            $totalused = $buymedqty + $used;
            $remainstocks = $available - $buymedqty;
            $f_name = $_POST['f_name'];
            $m_name = $_POST['m_name'];
            $l_name = $_POST['l_name'];
            $suffix = $_POST['suffix'];
            $consult_type = $_POST['consult_type'];
            $blood_pressure = $_POST['blood_pressure'];
            $findings = $_POST['findings'];
            $medication = $_POST['medication'];
            $consult_date = $_POST['consult_date'];
            $remarks = $_POST['remarks'];
            $phy = $_POST['phy'];
            $access = "Faculty";
            $medcount = $_POST['medcount'];
            $mon = $_POST['mon'];

            if($mon == 1){
                $connection = $this->openConnection();
                $stmt = $connection->prepare("UPDATE tbl_chart SET jan='$medcount' WHERE id = 1");
                $stmt->execute();
                $connection = $this->openConnection();
                $stmt = $connection->prepare("UPDATE tbl_ail_dis_chart SET ailments='$medcount' WHERE id = 1");
                $stmt->execute();
            }

                $connection = $this->openConnection();
                $stmt = $connection->prepare("INSERT INTO medical_records (`med_id`,`f_name`,`m_name`, `l_name`, `suffix`, `consult_type`, `blood_pressure`, `findings`, `medication`, `consult_date`, `remarks`, `phy`, `access`)VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([$staff_id,$f_name, $m_name, $l_name, $suffix, $consult_type, $blood_pressure, $findings, $medication, $consult_date, $remarks, $phy, $access]);

                $connection = $this->openConnection();
                $stmt = $connection->prepare("UPDATE tbl_medicine SET used='$totalused', available='$remainstocks' WHERE med_name='$medication'");
                $stmt->execute();

                $stmt = $connection->prepare("INSERT INTO tbl_despensing (`despensing_id`,`med_name`,`qty`, `date`)VALUES(?, ?, ?, ?)");
                $stmt->execute([$staff_id,$medication, $buymedqty, $consult_date]);

                header("Location: medstaff.php");
        }
    }

    public function add_mul_medical_record()
    {
        if (isset($_POST['add_mul_medical'])) {
            $gen_id = $_POST['gen_id'];
            $available = $_POST['available'];
            $buymedqty = $_POST['buymedqty'];
            $used = $_POST['used'];
            $totalused = $buymedqty + $used;
            $remainstocks = $available - $buymedqty;
            $f_name = $_POST['f_name'];
            $m_name = $_POST['m_name'];
            $l_name = $_POST['l_name'];
            $suffix = $_POST['suffix'];
            $consult_type = $_POST['consult_type'];
            $blood_pressure = $_POST['blood_pressure'];
            $findings = $_POST['findings'];
            $medication = $_POST['medication'];
            $consult_date = $_POST['consult_date'];
            $remarks = $_POST['remarks'];
            $phy = $_POST['phy'];
            $medcount = $_POST['medcount'];
            $mon = $_POST['mon'];
            $access = "---";

                $connection = $this->openConnection();
                $stmt = $connection->prepare("INSERT INTO tbl_mul_medical (`mul_id`,`f_name`,`m_name`, `l_name`, `suffix`, `consult_type`, `blood_pressure`, `findings`, `medication`, `consult_date`, `remarks`, `phy`, `access`)VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([$gen_id,$f_name, $m_name, $l_name, $suffix, $consult_type, $blood_pressure, $findings, $medication, $consult_date, $remarks, $phy, $access]);
                $connection = $this->openConnection();
                $stmt = $connection->prepare("UPDATE tbl_medicine SET used='$totalused', available='$remainstocks' WHERE med_name='$medication'");
                $stmt->execute();

                $stmt = $connection->prepare("INSERT INTO tbl_despensing (`despensing_id`,`med_name`,`qty`, `date`)VALUES(?, ?, ?, ?)");
                $stmt->execute([$gen_id,$medication, $buymedqty, $consult_date]);
                header("Location: medical.php");
        }
    }


    public function select_single_record($id){
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM medical_records WHERE med_id = ?");
        $stmt->execute([$id]);
        $record = $stmt->fetch();
        $total = $stmt->rowCount();

        if($total > 0) {
            return $record;
        } else {
            return FALSE;
        }

    }
    public function select_single_record_dental($id){
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM tbl_dental_records WHERE dental_id = ?");
        $stmt->execute([$id]);
        $record = $stmt->fetch();
        $total = $stmt->rowCount();

        if($total > 0) {
            return $record;
        } else {
            return FALSE;
        }

    }
    public function select_single_record_medicine($id){
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM tbl_medicine WHERE id = ?");
        $stmt->execute([$id]);
        $record = $stmt->fetch();
        $total = $stmt->rowCount();

        if($total > 0) {
            return $record;
        } else {
            return FALSE;
        }

    }

    public function select_patient_rec($id) {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM tbl_patient_record WHERE access = ?");
        $stmt->execute([$id]);
        $patient = $stmt->fetchall();
        $total = $stmt->rowCount();

        if($total > 0) {
            return $patient;
        } else {
            return FALSE;
        }
    }

    public function select_all_mul_rec($id) {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM tbl_mul_medical WHERE mul_id = ?");
        $stmt->execute([$id]);
        $patient = $stmt->fetchall();
        $total = $stmt->rowCount();

        if($total > 0) {
            return $patient;
        } else {
            return FALSE;
        }
    }
    public function select_all_mul_dental_rec($id) {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM tbl_mul_dental WHERE mul_id = ?");
        $stmt->execute([$id]);
        $patient = $stmt->fetchall();
        $total = $stmt->rowCount();

        if($total > 0) {
            return $patient;
        } else {
            return FALSE;
        }
    }

    public function add_medicine()
    {
        if (isset($_POST['add_medicine'])) {
            $med_name = $_POST['med_name'];
            $des = $_POST['des'];
            $qty = $_POST['qty'];
            $used = 0;
            $available = $_POST['qty'];
            $ex_date = $_POST['ex_date'];

                $connection = $this->openConnection();
                $stmt = $connection->prepare("INSERT INTO tbl_medicine (`med_name`,`des`,`qty`, `used`, `available`, `ex_date`)VALUES(?, ?, ?, ?, ?, ?)");
                $stmt->execute([$med_name,$des, $qty, $used, $available, $ex_date]);

                header("Location: medicine.php");
        }
    }

    public function update_medicine(){
        if(isset($_POST['update_medicine'])){
            $med_id = $_POST['med_id'];
            $med_name = $_POST['med_name'];
            $des = $_POST['des'];
            $addqty = $_POST['addqty'];
            $qty = $_POST['qty'];
            $totalqty = $qty + $addqty;
            $used = $_POST['used']; 
            $ex_date = $_POST['ex_date'];
            $available = $_POST['available'];
            $totalavail = $addqty + $available;
            $connection = $this->openConnection();
                $stmt = $connection->prepare("UPDATE tbl_medicine SET med_name='$med_name', des='$des', qty='$totalqty', used='$used', available='$totalavail', ex_date='$ex_date' WHERE id = $med_id");
                $stmt->execute();
                
                header("Location: medicine.php");
        }
    }

    public function delete_medicine(){
        if(isset($_POST['delete_medicine'])){
            $id = $_POST['delfaculty_id'];

            $connection = $this->openConnection();
            $stmt = $connection->prepare("DELETE FROM tbl_medicine WHERE id='$id'");
            $stmt->execute();
            header("Location: medicine.php");
        }
    }
 


}
$clinic = new Clinic();

?>