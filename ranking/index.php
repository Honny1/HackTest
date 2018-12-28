<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<title>RankingTable</title>
</head>
<body>
<div class="w3-container">
<table class="w3-table-all w3-centered">
  <tr class="w3-black">
    <th>NAME</th> 
    <th>LOGGED IN</th>	
    <th>LEVEL 1</th> 
    <th>LEVEL 2</th>
    <th>LEVEL 3</th> 
    <th>LEVEL 4</th>
    <th>LEVEL 5</th> 
    <th>LEVEL 6</th>
    <th>LEVEL 7</th> 
    <th>POINTS</th>	
  </tr>
<?php 
    include(realpath($_SERVER['DOCUMENT_ROOT']).'/controlDatabase/connectDatabase.php');
    $sql = "
    SELECT user.name,
        IF(score.level0=1, 'YES', 'NO') AS loggedIn,
        IF(score.level1=1, 2, 0) AS level1,
        IF(score.level2=1, 2, 0) AS level2,
        IF(score.level3=1, 2, 0) AS level3,
        IF(score.level4=1, 2, 0) AS level4,
        IF(score.level5=1, 2, 0) AS level5,
        IF(score.level6=1, 2, 0) AS level6,
        IF(score.level7=1, 2, 0) AS level7,
    
 	    IF(score.level1=1, 2, 0)+
        IF(score.level2=1, 2, 0)+
        IF(score.level3=1, 2, 0)+
        IF(score.level4=1, 2, 0)+
        IF(score.level5=1, 2, 0)+
        IF(score.level6=1, 2, 0)+
        IF(score.level7=1, 1, 0) AS points 
    FROM user 
    JOIN score 
    ON user.idUser = score.user_idUser
    ";

    $query = mysqli_query($db, $sql);

    if (!$query) {die ('SQL Error: ' . mysqli_error($db));}

    while ($row = mysqli_fetch_array($query)) {
	    echo "<tr>
    	    	<td>".$row['name']."</td>
                <td>".$row['loggedIn']."</td>
                <td>".$row['level1']."</td>    
                <td>".$row['level2']."</td>
                <td>".$row['level3']."</td>
                <td>".$row['level4']."</td>
                <td>".$row['level5']."</td>	
                <td>".$row['level6']."</td>
                <td>".$row['level7']."</td>
    		    <td>".$row['points']."</td>
		      </tr>";
        }
    mysqli_close($db);
?>
</table>
</div>
</body>
</html>
