<?php 
function saveLevel($nameUser,$level){
  include($_SERVER['DOCUMENT_ROOT']."/controlDatabase/connectDatabase.php");

  $sql = "UPDATE user
          SET $level = '1'
          WHERE name = '$nameUser'";

  if ($db->query($sql) === TRUE) {
  }else {
    echo "Error: " . $sql . "<br>" . $db->error;
  }
  mysqli_close($db);
}
?>