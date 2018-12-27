<?php 
function saveLevel($idUser,$pass){
  include($_SERVER['DOCUMENT_ROOT']."/controlDatabase/connectDatabase.php");
  $passTolevel = array(
      "L0" =>                                      "level0",
      "1qaz2wsx" =>                                "level1",
      "5e4i3t2" =>                                 "level2",
      "instruction-pointer" =>                     "level3",
      "001101101110110110110110110110110111011" => "level4",
      "mail" =>                                    "level5",
      "ThisIsNotAPassword" =>                      "level6",
      "end" =>                                     "level7"
      );
  $level=$passTolevel[$pass];
  $sql = "UPDATE score
          SET $level = '1'
          WHERE user_iduser = '$idUser'";

  if ($db->query($sql) === TRUE) {
  }else {
    echo "Error: " . $sql . "<br>" . $db->error;
  }
  mysqli_close($db);
}
?>
