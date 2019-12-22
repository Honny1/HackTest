<?php include_once("htmlParts/header.php");?>
<div>
  <h1>WELCOME TO THE LEVEL 4</h1>
  <p>Do you know password?</p>
  <img src="./images/meme1.jpg" height="420" width="420">
</div>
<script>
  //https://developers.google.com/web/tools/chrome-devtools/console/ 

  var youDrink = "coffee";

  var reverse = function (s) {
    return s.split("").reverse().join("");
  };

  var barista = {
    str1: "ers",
    str2: reverse("arap"),
    str3: "met",
    request: function (preference) {
      return preference + " secret word: " +
        this.str2 + this.str3 + this.str1;
    }
  };
  barista.request(youDrink);
</script>
<div>
  <form class="mui-form--inline" action="./index.php" method="GET">
    <div class="mui-textfield">
      <input type="password" name="pass">
    </div>
    <br>
    <br>
    <input class="mui-btn mui-btn--flat" type="submit" value="Confirm">
  </form>
  <br><br>
</div>
<?php include_once("htmlParts/footer.php");?>