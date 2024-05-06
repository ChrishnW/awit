<?php
  include('../include/connect.php');
  use PhpOffice\PhpSpreadsheet\Spreadsheet;
  use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

  if (isset($_SESSION['SESS_MEMBER_ID'])) {
    $con->next_result();
    $query = mysqli_query($con, "SELECT * FROM accounts INNER JOIN  section ON section.sec_id=accounts.sec_id WHERE username='$username' ");
    if (mysqli_num_rows($query) > 0) {
      while ($row = $query->fetch_assoc()) {
        $fname = $row['fname'];
        $employee_name_temp = strtolower($row['fname'] . ' ' . $row['lname']);
        $employee_name = ucwords($employee_name_temp);
        $card = $row['card'];
        $email = $row['email'];
        $sec = $row['sec_name'];
        if (empty($row["file_name"])) {
          $imageURL = '../assets/img/user-profiles/nologo.png';
        } else {
          $imageURL = '../assets/img/user-profiles/' . $row["file_name"];
        }
      }
    }
  }

  if (isset($_POST['accounts_create'])){
    session_start();
    $con->next_result();
    $username = strtoupper($_POST['accounts_username']);
    $fname    = strtoupper($_POST['accounts_fname']);
    $lname    = strtoupper($_POST['accounts_lname']);
    $emp_id   = $_POST['accounts_number'];
    $emp_card = $_POST['accounts_card'];
    $access   = $_POST['accounts_access'];
    $section  = strtoupper($_POST['accounts_section']);
    $email    = $_POST['accounts_email'];
    if ($_POST['accounts_password'] != ''){
      $password = password_hash($_POST['accounts_password'], PASSWORD_DEFAULT);
    }
    else {
      $password = '12345';
    }
    $query  = "INSERT INTO accounts (employee_id, card, username, password, fname, lname, email, access, sec_id, status) VALUES ('$emp_id', '$emp_card', '$username', '$password', '$fname', '$lname', '$email', '$access', '$section', '1')";
    $result = mysqli_query($con, $query);
    if ($result){
      $_SESSION['result'] = "Account created successfully!";
      header('location: account.php');
    }
    else {
      $_SESSION['failed'] = "Account creation failed.";
      header('location: account.php');
    }
  }

  if (isset($_POST['accounts_update'])){
    session_start();
    $con->next_result();
    $id       = $_POST['accounts_id_edit'];
    $username = strtoupper($_POST['accounts_username_edit']);
    $fname    = strtoupper($_POST['accounts_fname_edit']);
    $lname    = strtoupper($_POST['accounts_lname_edit']);
    $emp_id   = $_POST['accounts_number_edit'];
    $emp_card = $_POST['accounts_card_edit'];
    $access   = $_POST['accounts_access_edit'];
    $section  = strtoupper($_POST['accounts_section_edit']);
    $email    = $_POST['accounts_email_edit'];
    $query  = "UPDATE accounts SET username='$username', fname='$fname', lname='$lname', email='$email', access='$access', sec_id='$section', employee_id='$emp_id', card='$emp_card' WHERE id='$id'";
    $result = mysqli_query($con, $query);
    if ($result){
      $_SESSION['result'] = "$username account updated successfully!";
      header('location: account.php');
    }
    else {
      $_SESSION['failed'] = "$username account update failed.";
      header('location: account.php');
    }
  }

  if (isset($_POST['accountUpdate'])){
    $con->next_result();
    $id           = $_POST['accounts_id'];
    $accountData  = [];
    $query  = mysqli_query($con, "SELECT * FROM accounts WHERE id='$id'");
    if (mysqli_num_rows($query) > 0){
      while ($row = mysqli_fetch_array($query)){
        array_push($accountData, $row);
        header('content-type: application/json');
        echo json_encode($accountData);
      }
    }
  }

  if(isset($_POST['account_reset_submit'])){
    session_start();
    $con->next_result();
    $id       = $_POST['account_ID1'];
    $new_pass = 12345;
    $hash_new_pass = password_hash($new_pass, PASSWORD_DEFAULT);
    $query  = "UPDATE accounts SET password='$hash_new_pass' WHERE username='$id'";
    $result = mysqli_query($con, $query);
    if ($result){
      $_SESSION['result'] = "Account password reset successfully!";
      header('location: account.php');
    }
    else {
      $_SESSION['failed'] = "Account password reset failed.";
      header('location: account.php');
    }
  }

  if (isset($_POST['departmentUpdate'])){
    $con->next_result();
    $id           = $_POST['departments_id'];
    $departmentData  = [];
    $query  = mysqli_query($con, "SELECT * FROM department WHERE id='$id'");
    if (mysqli_num_rows($query) > 0){
      while ($row = mysqli_fetch_array($query)){
        array_push($departmentData, $row);
        header('content-type: application/json');
        echo json_encode($departmentData);
      }
    }
  }

  if (isset($_POST['department_update'])){
    session_start();
    $con->next_result();
    $id         = $_POST['departments_id_edit'];
    $dept_name  = strtoupper($_POST['departments_dept_name_edit']);
    $dept_id    = $_POST['departments_dept_id_edit'];
    $status     = $_POST['departments_dept_status_edit'];
    $query  = "UPDATE department SET dept_name='$dept_name', dept_id='$dept_id', status='$status' WHERE id='$id'";
    $result = mysqli_query($con, $query);
    if ($result){
      $_SESSION['result'] = "$dept_name department updated successfully!";
      header('location: department.php');
    }
    else {
      $_SESSION['failed'] = "$dept_name department update failed.";
      header('location: department.php');
    }
  }

  if (isset($_POST['department_create'])){
    session_start();
    $con->next_result();
    $dept_name = strtoupper($_POST['departments_dept_name']);
    $dept_id   = $_POST['departments_dept_id'];
    $query  = "INSERT INTO department (dept_name, dept_id, status) VALUES ('$dept_name', '$dept_id', '1')";
    $result = mysqli_query($con, $query);
    if ($result){
      $_SESSION['result'] = "Department created successfully!";
      header('location: department.php');
    }
    else {
      $_SESSION['failed'] = "Department creation failed.";
      header('location: department.php');
    }
  }

  if (isset($_POST['section_create'])){
    session_start();
    $con->next_result();
    $sec_name = strtoupper($_POST['sections_name']);
    $sec_id   = strtoupper($_POST['sections_code']);
    $sec_dept = $_POST['sections_dept'];
    $query  = "INSERT INTO section (sec_id, sec_name, dept_id, status) VALUES ('$sec_id', '$sec_name', '$sec_dept', '1')";
    $result = mysqli_query($con, $query);
    if ($result){
      $_SESSION['result'] = "Section created successfully!";
      header('location: section.php');
    }
    else {
      $_SESSION['failed'] = "Section creation failed.";
      header('location: section.php');
    }
  }

  if (isset($_POST['sectionUpdate'])){
    $con->next_result();
    $id           = $_POST['sections_id'];
    $sectionData  = [];
    $query  = mysqli_query($con, "SELECT * FROM section WHERE id='$id'");
    if (mysqli_num_rows($query) > 0){
      while ($row = mysqli_fetch_array($query)){
        array_push($sectionData, $row);
        header('content-type: application/json');
        echo json_encode($sectionData);
      }
    }
  }

  if (isset($_POST['section_update'])){
    session_start();
    $con->next_result();
    $id         = $_POST['sections_id_edit'];
    $sec_name   = strtoupper($_POST['sections_dept_name_edit']);
    $sec_id     = strtoupper($_POST['sections_dept_id_edit']);
    $dept_id    = $_POST['sections_dept_edit'];
    $status     = $_POST['sections_dept_status_edit'];
    $query  = "UPDATE section SET sec_name='$sec_name', sec_id='$sec_id', dept_id='$dept_id', status='$status' WHERE id='$id'";
    $result = mysqli_query($con, $query);
    if ($result){
      $_SESSION['result'] = "$sec_name department updated successfully!";
      header('location: section.php');
    }
    else {
      $_SESSION['failed'] = "$sec_name department update failed.";
      header('location: section.php');
    }
  }

  if (isset($_POST['save_excel_data'])){
    
  }
?>