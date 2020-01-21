<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/w3.css">
  <link rel="shortcut icon" type="image/png" href="../images/favicon.png" />
  <title>RankingTable</title>
</head>

<body class="w3-container w3-black w3-text-black">
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
        <th>LEVEL 8</th>
        <th>POINTS</th>
      </tr>
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

 	    IF(score.level1=1, 2, 0)+
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
                <td>".$row['level8']."</td>
    		    <td>".$row['points']."</td>
		      </tr>";
        }
    mysqli_close($db);
?>
    </table>
  </div>
</body>

</html>