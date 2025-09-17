<?php
$msg='';
$editId = 0;

// Initialize variables
$fname= ""; $mname= ""; $sname= ""; $ext=""; $birth=""; $sex=""; $placeOfBirth=""; $citizenship=""; $civilStatus="";
$height=""; $weight=""; $bloodType=""; $gsis=""; $pagibig=""; $philhealth=""; $sss=""; $tin=""; $agencyEmp="";
$resHouseNo=""; $resStreet=""; $resSubdivision=""; $resBarangay=""; $resCity=""; $resProvince=""; $resZipCode="";
$permHouseNo=""; $permStreet=""; $permSubdivision=""; $permBarangay=""; $permCity=""; $permProvince=""; $permZipCode="";
$telephone=""; $mobile=""; $email="";

include('config.php');

// Handle Save (Insert)
if(isset($_POST['btnSave'])){
  // Gather values
  $sname= $_POST['SURNAME']; $fname= $_POST['FNAME']; $mname= $_POST['MNAME']; $ext= $_POST['EXT'];
  $birth= $_POST['BIRTH']; $sex= $_POST['SEX']; $placeOfBirth= $_POST['placeOfBirth'];
  $citizenship= $_POST['citizenship']; $civilStatus= $_POST['civilStatus'];
  $height= $_POST['height']; $weight= $_POST['weight']; $bloodType= $_POST['bloodType'];
  $gsis= $_POST['gsis']; $pagibig= $_POST['pagibig']; $philhealth= $_POST['philhealth'];
  $sss= $_POST['sss']; $tin= $_POST['tin']; $agencyEmp= $_POST['agencyEmp'];
  $resHouseNo= $_POST['resHouseNo']; $resStreet= $_POST['resStreet']; $resSubdivision= $_POST['resSubdivision'];
  $resBarangay= $_POST['resBarangay']; $resCity= $_POST['resCity']; $resProvince= $_POST['resProvince']; $resZipCode= $_POST['resZipCode'];
  $permHouseNo= $_POST['permHouseNo']; $permStreet= $_POST['permStreet']; $permSubdivision= $_POST['permSubdivision'];
  $permBarangay= $_POST['permBarangay']; $permCity= $_POST['permCity']; $permProvince= $_POST['permProvince']; $permZipCode= $_POST['permZipCode'];
  $telephone= $_POST['telephone']; $mobile= $_POST['mobile']; $email= $_POST['email'];

  // Check duplicate by name + birthdate
  $check="SELECT * FROM personal_data WHERE Surname='$sname' AND FirstName='$fname' AND MiddleName='$mname' AND BirthDate='$birth'";
  $result=$conn->query($check);

  if($result->num_rows>0){
    $msg='<div class="alert alert-danger">Record already exists!</div>';
  }else{
    $sql="INSERT INTO personal_data 
    (Surname, FirstName, MiddleName, Ext, BirthDate, Sex, PlaceOfBirth, Citizenship, CivilStatus, Height, Weight, BloodType, 
    GSIS, Pagibig, Philhealth, SSS, TIN, AgencyEmp, 
    ResHouseNo, ResStreet, ResSubdivision, ResBarangay, ResCity, ResProvince, ResZipCode, 
    PermHouseNo, PermStreet, PermSubdivision, PermBarangay, PermCity, PermProvince, PermZipCode, 
    Telephone, Mobile, Email) 
    VALUES 
    ('$sname','$fname','$mname','$ext','$birth','$sex','$placeOfBirth','$citizenship','$civilStatus','$height','$weight','$bloodType',
    '$gsis','$pagibig','$philhealth','$sss','$tin','$agencyEmp',
    '$resHouseNo','$resStreet','$resSubdivision','$resBarangay','$resCity','$resProvince','$resZipCode',
    '$permHouseNo','$permStreet','$permSubdivision','$permBarangay','$permCity','$permProvince','$permZipCode',
    '$telephone','$mobile','$email')";
    
    if($conn->query($sql)){
      $msg='<div class="alert alert-success">Record Successfully Saved!</div>';
      // Reset form after successful save
      $fname= ""; $mname= ""; $sname= ""; $ext=""; $birth=""; $sex=""; $placeOfBirth=""; $citizenship=""; $civilStatus="";
      $height=""; $weight=""; $bloodType=""; $gsis=""; $pagibig=""; $philhealth=""; $sss=""; $tin=""; $agencyEmp="";
      $resHouseNo=""; $resStreet=""; $resSubdivision=""; $resBarangay=""; $resCity=""; $resProvince=""; $resZipCode="";
      $permHouseNo=""; $permStreet=""; $permSubdivision=""; $permBarangay=""; $permCity=""; $permProvince=""; $permZipCode="";
      $telephone=""; $mobile=""; $email="";
    }else{
      echo $conn->error;
    }
  }
}

// Handle Edit (Load Data)
if(isset($_GET['token'])){
  $editId = intval($_GET['token']);
  $sql = "SELECT * FROM personal_data WHERE Id=$editId";
  $rs = $conn->query($sql);
  if($rs->num_rows > 0){
    $row = $rs->fetch_assoc();
    // Load all fields
    $sname = $row['Surname']; $fname = $row['FirstName']; $mname = $row['MiddleName']; $ext = $row['Ext'];
    $birth = $row['BirthDate']; $sex = $row['Sex']; $placeOfBirth = $row['PlaceOfBirth'];
    $citizenship = $row['Citizenship']; $civilStatus = $row['CivilStatus'];
    $height = $row['Height']; $weight = $row['Weight']; $bloodType = $row['BloodType'];
    $gsis = $row['GSIS']; $pagibig = $row['Pagibig']; $philhealth = $row['Philhealth'];
    $sss = $row['SSS']; $tin = $row['TIN']; $agencyEmp = $row['AgencyEmp'];
    $resHouseNo = $row['ResHouseNo']; $resStreet = $row['ResStreet']; $resSubdivision = $row['ResSubdivision'];
    $resBarangay = $row['ResBarangay']; $resCity = $row['ResCity']; $resProvince = $row['ResProvince']; $resZipCode = $row['ResZipCode'];
    $permHouseNo = $row['PermHouseNo']; $permStreet = $row['PermStreet']; $permSubdivision = $row['PermSubdivision'];
    $permBarangay = $row['PermBarangay']; $permCity = $row['PermCity']; $permProvince = $row['PermProvince']; $permZipCode = $row['PermZipCode'];
    $telephone = $row['Telephone']; $mobile = $row['Mobile']; $email = $row['Email'];
  }
}

// Handle Update
if(isset($_POST['btnUpdate'])){
  $editId = intval($_POST['editId']);
  $sname= $_POST['SURNAME']; $fname= $_POST['FNAME']; $mname= $_POST['MNAME']; $ext= $_POST['EXT'];
  $birth= $_POST['BIRTH']; $sex= $_POST['SEX']; $placeOfBirth= $_POST['placeOfBirth'];
  $citizenship= $_POST['citizenship']; $civilStatus= $_POST['civilStatus'];
  $height= $_POST['height']; $weight= $_POST['weight']; $bloodType= $_POST['bloodType'];
  $gsis= $_POST['gsis']; $pagibig= $_POST['pagibig']; $philhealth= $_POST['philhealth'];
  $sss= $_POST['sss']; $tin= $_POST['tin']; $agencyEmp= $_POST['agencyEmp'];
  $resHouseNo= $_POST['resHouseNo']; $resStreet= $_POST['resStreet']; $resSubdivision= $_POST['resSubdivision'];
  $resBarangay= $_POST['resBarangay']; $resCity= $_POST['resCity']; $resProvince= $_POST['resProvince']; $resZipCode= $_POST['resZipCode'];
  $permHouseNo= $_POST['permHouseNo']; $permStreet= $_POST['permStreet']; $permSubdivision= $_POST['permSubdivision'];
  $permBarangay= $_POST['permBarangay']; $permCity= $_POST['permCity']; $permProvince= $_POST['permProvince']; $permZipCode= $_POST['permZipCode'];
  $telephone= $_POST['telephone']; $mobile= $_POST['mobile']; $email= $_POST['email'];

  $check="SELECT * FROM personal_data WHERE Surname='$sname' AND FirstName='$fname' AND MiddleName='$mname' AND BirthDate='$birth' AND Id!=$editId";
  $result=$conn->query($check);

  if($result->num_rows>0){
    $msg='<div class="alert alert-danger">Record already exists! Cannot update to duplicate.</div>';
  }else{
    $sql = "UPDATE personal_data SET 
    Surname='$sname', FirstName='$fname', MiddleName='$mname', Ext='$ext',
    BirthDate='$birth', Sex='$sex', PlaceOfBirth='$placeOfBirth', Citizenship='$citizenship', CivilStatus='$civilStatus',
    Height='$height', Weight='$weight', BloodType='$bloodType',
    GSIS='$gsis', Pagibig='$pagibig', Philhealth='$philhealth', SSS='$sss', TIN='$tin', AgencyEmp='$agencyEmp',
    ResHouseNo='$resHouseNo', ResStreet='$resStreet', ResSubdivision='$resSubdivision', ResBarangay='$resBarangay', ResCity='$resCity', ResProvince='$resProvince', ResZipCode='$resZipCode',
    PermHouseNo='$permHouseNo', PermStreet='$permStreet', PermSubdivision='$permSubdivision', PermBarangay='$permBarangay', PermCity='$permCity', PermProvince='$permProvince', PermZipCode='$permZipCode',
    Telephone='$telephone', Mobile='$mobile', Email='$email'
    WHERE Id=$editId";
    
    if($conn->query($sql)){
      $msg='<div class="alert alert-success">Record Successfully Updated!</div>';
      $editId=0;
    }else{
      echo $conn->error;
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>PERSONAL DATA SHEET</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<style>
table.pds-form {
  width: 100%;
  border-collapse: collapse;
}
table.pds-form input {
  width: 95%;
  border: none;
  padding: 5px;
}
table.pds-form td {
  padding: 8px;
  border: 1px solid #333;
  vertical-align: middle;
}
.section-header {
  background-color: #f8f9fa;
  font-weight: bold;
  text-align: center;
}
.alert {
  margin: 20px 0;
  padding: 15px;
  border-radius: 4px;
}
.alert-success {
  background-color: #d4edda;
  border-color: #c3e6cb;
  color: #155724;
}
.alert-danger {
  background-color: #f8d7da;
  border-color: #f5c6cb;
  color: #721c24;
}
</style>
</head>
<body>
<div class="container">
  <center>
    <h1>PERSONAL DATA SHEET</h1>
    <?php 
    // Handle delete success message
    if(isset($_GET['msg']) && $_GET['msg'] == 'deleted'){
        echo '<div class="alert alert-success">Record successfully deleted!</div>';
    }
    echo $msg; 
    ?>
  </center>
  
  <form name="frmInfo" method="post">
    <input type="hidden" name="editId" value="<?php echo $editId ?>">
    
    <table border="1" class="pds-form">
      <!-- Name Section -->
      <tr>
        <td width="15%"><label for="sname">1. SURNAME</label></td>
        <td colspan="3"><input type="text" name="SURNAME" value="<?php echo $sname; ?>" placeholder="Enter Last Name" required/></td>
      </tr>
      <tr>
        <td><label for="fname">FIRST NAME</label></td>
        <td width="30%"><input type="text" name="FNAME" value="<?php echo $fname; ?>" placeholder="Enter First Name" required/></td>
        <td width="15%">NAME EXTENSION (JR, SR)</td>
        <td width="40%"><input type="text" name="EXT" value="<?php echo $ext; ?>" placeholder="Jr, Sr, III"/></td>
      </tr>
      <tr>
        <td><label for="mname">2. MIDDLE NAME</label></td>
        <td colspan="3"><input type="text" name="MNAME" value="<?php echo $mname; ?>" placeholder="Enter Middle Name" required/></td>
      </tr>

      <!-- Personal Details Section -->
      <tr>
        <td><label for="birth">3. DATE OF BIRTH<br>(mm/dd/yyyy)</label></td>
        <td><input type="date" name="BIRTH" value="<?php echo $birth; ?>" required></td>
        <td rowspan="3"><label for="citizenship">16. CITIZENSHIP</label></td>
        <td rowspan="3">
          <input type="text" name="citizenship" value="<?php echo $citizenship; ?>" placeholder="Filipino / Dual Citizenship / Others">
        </td>
      </tr>
      <tr>
        <td><label for="placeOfBirth">4. PLACE OF BIRTH</label></td>
        <td><input type="text" name="placeOfBirth" value="<?php echo $placeOfBirth; ?>" placeholder="City/Municipality, Province"></td>
      </tr>
      <tr>
        <td><label for="SEX">5. SEX</label></td>
        <td>
          <select name="SEX" style="width: 95%; border: none; padding: 5px;" required>
            <option value="">Select Sex</option>
            <option value="Male" <?php echo ($sex == 'Male') ? 'selected' : ''; ?>>Male</option>
            <option value="Female" <?php echo ($sex == 'Female') ? 'selected' : ''; ?>>Female</option>
          </select>
        </td>
      </tr>

      <!-- Civil Status and Physical Details -->
      <tr>
        <td><label for="civilStatus">6. CIVIL STATUS</label></td>
        <td colspan="3">
          <select name="civilStatus" style="width: 95%; border: none; padding: 5px;">
            <option value="">Select Civil Status</option>
            <option value="Single" <?php echo ($civilStatus == 'Single') ? 'selected' : ''; ?>>Single</option>
            <option value="Married" <?php echo ($civilStatus == 'Married') ? 'selected' : ''; ?>>Married</option>
            <option value="Widowed" <?php echo ($civilStatus == 'Widowed') ? 'selected' : ''; ?>>Widowed</option>
            <option value="Separated" <?php echo ($civilStatus == 'Separated') ? 'selected' : ''; ?>>Separated</option>
            <option value="Others" <?php echo ($civilStatus == 'Others') ? 'selected' : ''; ?>>Others</option>
          </select>
        </td>
      </tr>
      <tr>
        <td><label for="height">7. HEIGHT (m)</label></td>
        <td><input type="text" name="height" value="<?php echo $height; ?>" placeholder="1.75"/></td>
        <td><label for="weight">8. WEIGHT (kg)</label></td>
        <td><input type="text" name="weight" value="<?php echo $weight; ?>" placeholder="70"/></td>
      </tr>
      <tr>
        <td><label for="bloodType">9. BLOOD TYPE</label></td>
        <td colspan="3">
          <select name="bloodType" style="width: 95%; border: none; padding: 5px;">
            <option value="">Select Blood Type</option>
            <option value="A+" <?php echo ($bloodType == 'A+') ? 'selected' : ''; ?>>A+</option>
            <option value="A-" <?php echo ($bloodType == 'A-') ? 'selected' : ''; ?>>A-</option>
            <option value="B+" <?php echo ($bloodType == 'B+') ? 'selected' : ''; ?>>B+</option>
            <option value="B-" <?php echo ($bloodType == 'B-') ? 'selected' : ''; ?>>B-</option>
            <option value="AB+" <?php echo ($bloodType == 'AB+') ? 'selected' : ''; ?>>AB+</option>
            <option value="AB-" <?php echo ($bloodType == 'AB-') ? 'selected' : ''; ?>>AB-</option>
            <option value="O+" <?php echo ($bloodType == 'O+') ? 'selected' : ''; ?>>O+</option>
            <option value="O-" <?php echo ($bloodType == 'O-') ? 'selected' : ''; ?>>O-</option>
          </select>
        </td>
      </tr>

      <!-- Government IDs Section -->
      <tr>
        <td><label for="gsis">10. GSIS ID NO.</label></td>
        <td><input type="text" name="gsis" value="<?php echo $gsis; ?>" placeholder="GSIS Number"/></td>
        <td><label for="pagibig">11. PAG-IBIG ID NO.</label></td>
        <td><input type="text" name="pagibig" value="<?php echo $pagibig; ?>" placeholder="PAG-IBIG Number"/></td>
      </tr>
      <tr>
        <td><label for="philhealth">12. PHILHEALTH NO.</label></td>
        <td><input type="text" name="philhealth" value="<?php echo $philhealth; ?>" placeholder="PhilHealth Number"/></td>
        <td><label for="sss">13. SSS NO.</label></td>
        <td><input type="text" name="sss" value="<?php echo $sss; ?>" placeholder="SSS Number"/></td>
      </tr>
      <tr>
        <td><label for="tin">14. TIN NO.</label></td>
        <td><input type="text" name="tin" value="<?php echo $tin; ?>" placeholder="TIN Number"/></td>
        <td><label for="agencyEmp">15. AGENCY EMPLOYEE NO.</label></td>
        <td><input type="text" name="agencyEmp" value="<?php echo $agencyEmp; ?>" placeholder="Agency Employee Number"/></td>
      </tr>

      <!-- Residential Address Section -->
      <tr>
        <td colspan="4" class="section-header">17. RESIDENTIAL ADDRESS</td>
      </tr>
      <tr>
        <td>House/Block/Lot No.</td>
        <td><input type="text" name="resHouseNo" value="<?php echo $resHouseNo; ?>" placeholder="House No."/></td>
        <td>Street</td>
        <td><input type="text" name="resStreet" value="<?php echo $resStreet; ?>" placeholder="Street"/></td>
      </tr>
      <tr>
        <td>Subdivision/Village</td>
        <td><input type="text" name="resSubdivision" value="<?php echo $resSubdivision; ?>" placeholder="Subdivision"/></td>
        <td>Barangay</td>
        <td><input type="text" name="resBarangay" value="<?php echo $resBarangay; ?>" placeholder="Barangay"/></td>
      </tr>
      <tr>
        <td>City/Municipality</td>
        <td><input type="text" name="resCity" value="<?php echo $resCity; ?>" placeholder="City/Municipality"/></td>
        <td>Province</td>
        <td><input type="text" name="resProvince" value="<?php echo $resProvince; ?>" placeholder="Province"/></td>
      </tr>
      <tr>
        <td>ZIP CODE</td>
        <td><input type="text" name="resZipCode" value="<?php echo $resZipCode; ?>" placeholder="ZIP Code"/></td>
        <td colspan="2"></td>
      </tr>

      <!-- Permanent Address Section -->
      <tr>
        <td colspan="4" class="section-header">18. PERMANENT ADDRESS</td>
      </tr>
      <tr>
        <td>House/Block/Lot No.</td>
        <td><input type="text" name="permHouseNo" value="<?php echo $permHouseNo; ?>" placeholder="House No."/></td>
        <td>Street</td>
        <td><input type="text" name="permStreet" value="<?php echo $permStreet; ?>" placeholder="Street"/></td>
      </tr>
      <tr>
        <td>Subdivision/Village</td>
        <td><input type="text" name="permSubdivision" value="<?php echo $permSubdivision; ?>" placeholder="Subdivision"/></td>
        <td>Barangay</td>
        <td><input type="text" name="permBarangay" value="<?php echo $permBarangay; ?>" placeholder="Barangay"/></td>
      </tr>
      <tr>
        <td>City/Municipality</td>
        <td><input type="text" name="permCity" value="<?php echo $permCity; ?>" placeholder="City/Municipality"/></td>
        <td>Province</td>
        <td><input type="text" name="permProvince" value="<?php echo $permProvince; ?>" placeholder="Province"/></td>
      </tr>
      <tr>
        <td>ZIP CODE</td>
        <td><input type="text" name="permZipCode" value="<?php echo $permZipCode; ?>" placeholder="ZIP Code"/></td>
        <td colspan="2"></td>
      </tr>

      <!-- Contact Information Section -->
      <tr>
        <td><label for="telephone">19. TELEPHONE NO.</label></td>
        <td><input type="text" name="telephone" value="<?php echo $telephone; ?>" placeholder="Telephone Number"/></td>
        <td><label for="mobile">20. MOBILE NO.</label></td>
        <td><input type="text" name="mobile" value="<?php echo $mobile; ?>" placeholder="Mobile Number"/></td>
      </tr>
      <tr>
        <td><label for="email">21. E-MAIL ADDRESS (if any)</label></td>
        <td colspan="3"><input type="email" name="email" value="<?php echo $email; ?>" placeholder="Email Address"/></td>
      </tr>
    </table>
    
    <br>
    <center>
      <?php if($editId > 0): ?>
        <input class="btn btn-success" type="submit" name="btnUpdate" value="UPDATE INFORMATION"/>
        <a href="forms.php" class="btn btn-secondary">Cancel</a>
      <?php else: ?>
        <input class="btn btn-primary" type="submit" name="btnSave" value="SAVE INFORMATION"/>
      <?php endif; ?>
    </center>
  </form>

  <br><br>
  <h3>Personal Data Records</h3>
  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>No</th><th>Surname</th><th>First</th><th>Middle</th><th>Birthdate</th><th>Sex</th><th>Mobile</th><th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql="SELECT * FROM personal_data ORDER BY Id DESC";
      $rs=$conn->query($sql);
      if($rs && $rs->num_rows>0){
        $cnt=1;
        while($row=$rs->fetch_assoc()){
          echo "<tr>
            <td>$cnt</td>
            <td>{$row['Surname']}</td>
            <td>{$row['FirstName']}</td>
            <td>{$row['MiddleName']}</td>
            <td>{$row['BirthDate']}</td>
            <td>{$row['Sex']}</td>
            <td>{$row['Mobile']}</td>
            <td>
              <a class='btn btn-info btn-sm' href='view.php?id={$row['Id']}'>View</a>
              <a class='btn btn-warning btn-sm' href='forms.php?token={$row['Id']}'>Edit</a>
              <a class='btn btn-danger btn-sm' href='del.php?token={$row['Id']}' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a>
            </td>
          </tr>";
          $cnt++;
        }
      }else{
        echo "<tr><td colspan='8'><center>No records found</center></td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>