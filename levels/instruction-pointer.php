<?php include_once("htmlParts/header.php");?>
      <div>
        <h1>WELCOME TO THE LEVEL++</h1>
        <p>Do you know password?</p>
        <img src="../images/meme1.jpg">
      </div>
      <script>
        //https://developers.google.com/web/tools/chrome-devtools/console/ 

        var password = (x, y) => {
            let i = 0;
            var z = "0";
            while(i<=10){
                if(true+true+true===i){
                    z+=y+x;
                }else{
                    z+=true-true+x;
                }
                i+=1;
            }
            return z+b+x
        };

        var a = 1+'1';
        var b = 11-'1';   
       
       password(a,b);         
        </script>
      <div>
           <form class="mui-form--inline" action= "../index.php" method="GET">
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
 
