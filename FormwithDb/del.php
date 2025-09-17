<?php
include('config.php');

if(isset($_GET['token'])){
    $id = intval($_GET['token']);
    
    // Delete the record
    $sql = "DELETE FROM personal_data WHERE Id = $id";
    
    if($conn->query($sql)){
        // Redirect back to forms.php with success message
        header("Location: forms.php?msg=deleted");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    // Redirect back if no token provided
    header("Location: forms.php");
}
?>