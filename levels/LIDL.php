<?php include_once("htmlParts/header.php");?>
<div>
    <h1>CLICK ON BUTTON FOR THE END</h1>
    <button type="button" onclick="theEnd()">THE END</button>
</div>
<script>
    function theEnd() {
        window.open("index.php?pass=end", "_self");
        alert("THE END!");

    }
</script>
<?php include_once("htmlParts/footer.php");?>