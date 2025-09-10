<?php
$msg='';
$fname="";
$mname="";
$lname="";
$editId = 0;

include('config.php');

// Handle Save (Insert)
if(isset($_POST['btnSave'])){
  $fname=$_POST['txtFname'];
  $mname=$_POST['txtMname'];
  $lname=$_POST['txtLname'];

  // check duplicate
  $check="SELECT * FROM pageone WHERE FirstName='$fname' AND MiddleName='$mname' AND LastName='$lname'";
  $result=$conn->query($check);

  if($result->num_rows>0){
    $msg='<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Record already exists!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
  }else{
    $sql="INSERT INTO pageone (FirstName, MiddleName, LastName)
          VALUES ('$fname','$mname','$lname')";
    if($conn->query($sql)){
      $msg='<div class="alert alert-success alert-dismissible fade show" role="alert">
              Record Successfully Saved!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }else{
      echo $conn->error;
    }
  }
}

// Handle Edit (Load Data)
if(isset($_GET['token'])){
  $editId = intval($_GET['token']);
  $sql = "SELECT * FROM pageone WHERE Id=$editId";
  $rs = $conn->query($sql);
  if($rs->num_rows > 0){
    $row = $rs->fetch_assoc();
    $fname = $row['FirstName'];
    $mname = $row['MiddleName'];
    $lname = $row['LastName'];
  }
}

// Handle Update
if(isset($_POST['btnUpdate'])){
  $editId = intval($_POST['editId']);
  $fname=$_POST['txtFname'];
  $mname=$_POST['txtMname'];
  $lname=$_POST['txtLname'];

  $sql = "UPDATE pageone SET FirstName='$fname', MiddleName='$mname', LastName='$lname' WHERE Id=$editId";
  if($conn->query($sql)){
    $msg='<div class="alert alert-success alert-dismissible fade show" role="alert">
            Record Successfully Updated!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
    // clear values
    $fname=$mname=$lname="";
    $editId=0;
  }else{
    echo $conn->error;
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title>PERSONAL DATA SHEET Page 1</title>
<link rel="stylesheet" href="css/bootstrap.css">
<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>
<div class="container">
  <fieldset>
    <legend>Personal Information</legend>
<?php echo $msg?>
  <form method="post">
    <input type="hidden" name="editId" value="<?php echo $editId ?>">
    <div class="row">
      <div class="col">
        <label for="txtFname" class="form-label"><b>First Name</b></label>
        <input type="text" class="form-control" name="txtFname" placeholder="Name" value="<?php echo $fname?>" required>
      </div>
      <div class="col">
        <label for="txtMname" class="form-label"><b>Middle Name</b></label>
        <input type="text" class="form-control" name="txtMname" placeholder="Name" value="<?php echo $mname?>" required>
      </div>
      <div class="col">
        <label for="txtLname" class="form-label"><b>Last Name</b></label>
        <input type="text" class="form-control" name="txtLname" placeholder="Name" value="<?php echo $lname?>" required>
      </div>
      <div class="col">
        <br/>
        <?php if($editId > 0): ?>
          <input class="btn btn-success" type="submit" name="btnUpdate" value="UPDATE INFORMATION"/>
          <a href="forms.php" class="btn btn-secondary">Cancel</a>
        <?php else: ?>
          <input class="btn btn-primary" type="submit" name="btnSave" value="SAVE INFORMATION"/>
        <?php endif; ?>
      </div>
    </div>
  </form>

  <br/>
  <div class="row">
       <div class="col">
         <table class="table table-bordered table-hover">
           <thead>
             <tr>
                 <th>No</th>
                 <th>FIRST NAME</th>
                 <th>MIDDLE NAME</th>
                 <th>LAST NAME</th>
                 <th>ACTION</th>
             </tr>
           </thead>
           <tbody id="tbl_data">
  <?php
      $sql="SELECT * FROM pageone";
      if($rs=$conn->query($sql)){
          if($rs->num_rows>0){
            $cnt =1;
              while($row=$rs->fetch_assoc()){
                  echo '<tr>'
                      .'<td>'.$cnt.'</td>'
                      .'<td>'.$row['FirstName'].'</td>'
                      .'<td>'.$row['MiddleName'].'</td>'
                      .'<td>'.$row['LastName'].'</td>'
                      .'<td>
                          <a class="btn btn-warning" href="forms.php?token='.$row['Id'].'">Edit</a>
                          <a class="btn btn-danger" href="del.php?token='.$row['Id'].'" onclick="return confirm(\'Are you sure?\')">Delete</a>
                       </td>'
                      .'</tr>';
                      $cnt++;
              }
          }else{
            echo '<tr><td colspan="5"><center> No Record(s) Found!</center></td></tr>';
          }
      }else{
        echo $conn->error;
      }
  ?>
           </tbody>
         </table>
       </div>
  </fieldset>
</div>
</body>
</html>
