<!DOCTYPE html>
<html>
<head>
</head>
<body>
<table>
  <tr>
    <th>NAME</th> 
    <th>POINTS</th>
  </tr>
<?php 
    include(realpath($_SERVER['DOCUMENT_ROOT']).'/controlDatabase/connectDatabase.php');
    $sql = "SELECT user.name,IF(score.level0=1, 1, 0)+IF(score.level1=1, 2, 0)+IF(score.level2=1, 2, 0)+IF(score.level3=1, 2, 0)+IF(score.level4=1, 2, 0)+IF(score.level5=1, 2, 0)+IF(score.level6=1, 2, 0)+IF(score.level7=1, 1, 0) AS points FROM user, score";
    $query = mysqli_query($db, $sql);

    if (!$query) {die ('SQL Error: ' . mysqli_error($db));}

    while ($row = mysqli_fetch_array($query)) {
	    echo "<tr>
    	    	<td>".$row['name']."</td>
    		    <td>".$row['points'] ."</td>
		      </tr>";
        }
    mysqli_close($db);
?>
</table>
</body>
</html>
