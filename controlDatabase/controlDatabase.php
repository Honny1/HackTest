<?php 
function saveLevel($idUser,$pass){
  include($_SERVER['DOCUMENT_ROOT']."/controlDatabase/connectDatabase.php");
  $passTolevel = array(
      "L0" =>                                      "level0",
      "1qaz2wsx" =>                                "level1",
      "5e4i3t2" =>                                 "level2",
      "unicornsarereal"=>                          "level3",
      "instruction-pointer" =>                     "level4",
      "001101101110110110110110110110110111011" => "level5",
      "mail" =>                                    "level6",
      "ThisIsNotAPassword" =>                      "level7",
      "end" =>                                     "level8"
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
