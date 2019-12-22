<?php 
function saveLevel($idUser,$pass){
  include("connectDatabase.php");
  $passTolevel = array(
      "L0" =>                                      "level0",
      "poopybutthole" =>                           "level1",
      "hidden" =>                                  "level2",
      "TEA_TIME"=>                                 "level3",
      "stackoverflow" =>                           "level4",
      "parameters" =>                              "level5",
      "level6" =>                                  "level6",
      "LIDL" =>                                    "level7",
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
