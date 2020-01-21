<?php 
    include('../controlDatabase/connectDatabase.php');
    $sql = "
    SELECT user.name,
        IF(score.level0=1, 'YES', 'NO') AS loggedIn,
        IF(score.level1=1, 2, 0) AS level1,
        IF(score.level2=1, 2, 0) AS level2,
        IF(score.level3=1, 4, 0) AS level3,
        IF(score.level4=1, 4, 0) AS level4,
        IF(score.level5=1, 4, 0) AS level5,
        IF(score.level6=1, 6, 0) AS level6,
        IF(score.level7=1, 6, 0) AS level7,
        IF(score.level8=1, 6, 0) AS level8,

 	    IF(score.level1=1, 1, 0)+
        IF(score.level2=1, 2, 0)+
        IF(score.level3=1, 4, 0)+
        IF(score.level4=1, 4, 0)+
        IF(score.level5=1, 4, 0)+
        IF(score.level6=1, 6, 0)+
        IF(score.level7=1, 6, 0)+
        IF(score.level8=1, 6, 0) AS points 
    FROM score 
    RIGHT JOIN user 
    ON user.idUser = score.user_idUser
    ";

    $query = mysqli_query($db, $sql);

    if (!$query) {die ('SQL Error: ' . mysqli_error($db));}
    $out = [];
    while ($row = mysqli_fetch_array($query)) {
        $out[] = array(
            "name" => $row['name'], 
            "loggedIn"=> $row['loggedIn'], 
            "level1" => $row['level1'],
            "level2" => $row['level2'],
            "level3" => $row['level3'],
            "level4" => $row['level4'],
            "level5" => $row['level5'], 
            "level6" => $row['level6'],
            "level7" => $row['level7'],
            "level8" => $row['level8'],
            "score" => $row['points']
        );
        }
    
    mysqli_close($db);
    print json_encode($out);

?>