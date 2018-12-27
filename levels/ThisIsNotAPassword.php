<?php include_once("htmlParts/header.php");?>
    	<div>
    		<h1>FINISH HIM!!!</h1>
            <button type="button" onclick="theEnd(0)"><img src="../images/meme3.jpg"></button>
            <button type="button" onclick="theEnd(1)"><img src="../images/meme4.jpg"></button>
            <button type="button" onclick="theEnd(2)"><img src="../images/meme5.jpg"</button>
    	</div>
        <script>
            function theEnd(endNum){
                if(Math.floor(Math.random() * 3)==endNum){
                    window.open("index.php?pass=end","_self");
                    alert("THE END!");
                }
            }
        </script>
<?php include_once("htmlParts/footer.php");?>
