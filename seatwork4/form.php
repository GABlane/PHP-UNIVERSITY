<?php
$fname= ""; $mname= ""; $sname= ""; $ext=""; $birth=""; $sex=""; $placeOfBirth=""; $citizenship=""; $civilStatus="";
$height=""; $weight=""; $bloodType=""; $gsis=""; $pagibig=""; $philhealth=""; $sss=""; $tin=""; $agencyEmp="";
$resHouseNo=""; $resStreet=""; $resSubdivision=""; $resBarangay=""; $resCity=""; $resProvince=""; $resZipCode="";
$permHouseNo=""; $permStreet=""; $permSubdivision=""; $permBarangay=""; $permCity=""; $permProvince=""; $permZipCode="";
$telephone=""; $mobile=""; $email="";

if(isset($_POST['btnSave'])){
  $fname= $_POST['FNAME'];
  $mname= $_POST['MNAME'];
  $sname= $_POST['SURNAME'];
  $ext= $_POST['EXT'];
  $birth= $_POST['BIRTH'];
  $sex= $_POST['SEX'];
  $placeOfBirth= $_POST['placeOfBirth'];
  $citizenship= $_POST['citizenship'];
  $civilStatus= $_POST['civilStatus'];
  $height= $_POST['height'];
  $weight= $_POST['weight'];
  $bloodType= $_POST['bloodType'];
  $gsis= $_POST['gsis'];
  $pagibig= $_POST['pagibig'];
  $philhealth= $_POST['philhealth'];
  $sss= $_POST['sss'];
  $tin= $_POST['tin'];
  $agencyEmp= $_POST['agencyEmp'];
  $resHouseNo= $_POST['resHouseNo'];
  $resStreet= $_POST['resStreet'];
  $resSubdivision= $_POST['resSubdivision'];
  $resBarangay= $_POST['resBarangay'];
  $resCity= $_POST['resCity'];
  $resProvince= $_POST['resProvince'];
  $resZipCode= $_POST['resZipCode'];
  $permHouseNo= $_POST['permHouseNo'];
  $permStreet= $_POST['permStreet'];
  $permSubdivision= $_POST['permSubdivision'];
  $permBarangay= $_POST['permBarangay'];
  $permCity= $_POST['permCity'];
  $permProvince= $_POST['permProvince'];
  $permZipCode= $_POST['permZipCode'];
  $telephone= $_POST['telephone'];
  $mobile= $_POST['mobile'];
  $email= $_POST['email'];
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PHP Form Method - Personal Information</title>
    <style media="screen">
    table{
      width: 100%;
    }
    table input{
      width: 95%;
      border: none;
    }
    </style>
  </head>
  <body>
    <center>
      <h1>PERSONAL INFORMATION</h1>
<form name="frmInfo" method="post">
  <table border="1px">
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
        <td><input type="date" name="BIRTH" value="<?php echo $birth; ?>"></td>
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
        <td><input type="text" name="SEX" value="<?php echo $sex; ?>" placeholder="Male/Female"></td>
      </tr>

      <!-- Civil Status and Physical Details -->
      <tr>
        <td><label for="civilStatus">6. CIVIL STATUS</label></td>
        <td colspan="3">
          <input type="text" name="civilStatus" value="<?php echo $civilStatus; ?>" placeholder="Single/Married/Widowed/Separated/Others">
        </td>
      </tr>
      <tr>
        <td><label for="height">7. HEIGHT (ft)</label></td>
        <td><input type="text" name="height" value="<?php echo $height; ?>" placeholder="5"/></td>
        <td><label for="weight">8. WEIGHT (kg)</label></td>
        <td><input type="text" name="weight" value="<?php echo $weight; ?>" placeholder="70"/></td>
      </tr>
      <tr>
        <td><label for="bloodType">9. BLOOD TYPE</label></td>
        <td colspan="3">
          <input type="text" name="bloodType" value="<?php echo $bloodType; ?>" placeholder="A+ / B+ / AB+ / O+ / A- / B- / AB- / O-">
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
        <td colspan="4">17. RESIDENTIAL ADDRESS</td>
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
        <td colspan="4">18. PERMANENT ADDRESS</td>
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
  <input type="submit" name="btnSave" value="SAVE INFORMATION">
</form>
    </center>

    <?php
    if(isset($_POST['btnSave']) && !empty($fname)){
        echo "<div>";
        echo "<h3>Submitted Information:</h3>";
        echo "<strong>Name:</strong> " . $fname . " " . $mname . " " . $sname . " " . $ext . "<br>";
        echo "<strong>Date of Birth:</strong> " . $birth . "<br>";
        echo "<strong>Sex:</strong> " . $sex . "<br>";
        echo "<strong>Place of Birth:</strong> " . $placeOfBirth . "<br>";
        echo "<strong>Civil Status:</strong> " . $civilStatus . "<br>";
        echo "<strong>Height:</strong> " . $height . " m<br>";
        echo "<strong>Weight:</strong> " . $weight . " kg<br>";
        echo "<strong>Blood Type:</strong> " . $bloodType . "<br>";
        echo "<strong>Citizenship:</strong> " . $citizenship . "<br>";
        if(!empty($mobile)) echo "<strong>Mobile:</strong> " . $mobile . "<br>";
        if(!empty($email)) echo "<strong>Email:</strong> " . $email . "<br>";
        echo "</div>";
    }
    ?>
  </body>
</html>
