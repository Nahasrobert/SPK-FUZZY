<?php
// include database connection file
include_once("config.php");
 
// Get id from URL to delete that user
$id = $_GET['id'];
 
// Delete user row from table based on given id
$result = mysqli_query($conn, "DELETE FROM nilai WHERE id_nilai=$id");
 
// After delete redirect to Home, so that latest user list will be displayed.
header("Location:index.php?success=3");
?>