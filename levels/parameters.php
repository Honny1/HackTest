<?php include_once("htmlParts/header1.php");?>
<script>
$(document).ready(function(e) {

   console.clear();
   var commandlist = [
      ["help", "Show commands"],
      ["clear", "Clear the console"],
      ["dir", "List files"],
      ["cat &lt;file&gt;", "Show file"],
      ["login &lt;username&gt; &lt;password&gt;", "Login to account - user: root, password: toor "],
   ];
   var previouscommands = [];
   var currentcommand = 0;
   var pages = [
      ["levelPasswords.txt", 
      "L0 =                                         level0",
      "poopybutthole =                              level1",
      "hidden =                                     level2",
      "TEA_TIME =                                   level3",
      "stackoverflow =                              level4",
      "parameters =                                 level5",
      "????? =                                      level6",
      "LIDL =                                       level7",
      "????? =                                      end"],
      ["hackDBCommand.txt", "ssh 10.10.0.66:69@hacktestDB -p 123; sql UPDATE score SET level6 = '1' WHERE user_iduser = '$idUser'"],
	   ["passwords", "123456789","MAMAAJCOMEINGHOME","1qaz2wsx","   ","qwertz","shadowman33"]
   ];
   var pageindex = ["levelPasswords.txt", "hackDBCommand.txt", "passwords"];
   var logRoot = false;
   function init() {
      setInterval(time);
      console.clear();
      console.log(new Date().getTime());
      log("Client", "Welcome to LEVEL 6 && 7");
      log("Client", "Hack to hacktestDB and update your score for level6.");
      log("Client", "Find level7 password.");
      log("Client", "For help say 'help'");
   }

   function _urlvars() {
	   var pagelocs = window.location.pathname.replace("/","").split("/");
	   var pageloc = pagelocs[0];
	   console.log(pageloc);
	   //alert();
		if(pageloc != "") {
            if ($.inArray(pageloc, pageindex) >= 0) {
               currentpage = pageloc;
            }
		}
      	log("Website", "You are currently on page: *" + currentpage + "*");
		if(pageloc != "") {
            if ($.inArray(pageloc, pageindex) >= 0) {
               currentpage = pageloc;
               loadpage($.inArray(pageloc, pageindex));
            } else {
               //Un-note next line to show 404 errors with wrong urls
               //log("Client", "404 - The page '" + pageloc + "' does not exist. To "); 
            }
		}
		if(pageloc == "") {
      		log("Client", "What would you like to access?");	
		}
   }
   function getParam(name){
		name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
		var regexS = "[\\?&]"+name+"=([^&#]*)";
		var regex = new RegExp( regexS );
		var results = regex.exec (window.location.href);
		if (results == null) {
			return "";
		}
		else  {
			return results[1];
		}
	}

   function log(name, information) {
      var d = new Date();
      var hours = ((d.getHours() < 10) ? "0" : "") + d.getHours();
      var minutes = ((d.getMinutes() < 10) ? "0" : "") + d.getMinutes();
      var seconds = ((d.getSeconds() < 10) ? "0" : "") + d.getSeconds();
      var colour = "whitet";
      var textcolour = "";
      var postcolour = "";

      switch (name[0]) {
         case "!":
            postcolour = " important";
            name = name.substr(1);
            break;
      }
      switch (name) {
         case "Root":
            colour = "redt";
            postcolour = " selft";
            break;
         case "Client":
            colour = "bluet";
            break;
         case "User":
            colour = "greent";
            postcolour = " selft";
            break;
      }
      if (information[0] == "A" && information[1] == "!") {
         information = information.substr(2);
         information = information.replace(/ /g, '\u00A0');
      }
      if (information[0] == "E" && information[1] == "!") {
         information = information.substr(2);
         postcolour = " important";
      }

      while (information.indexOf("](") >= 0) { //URL parser

         var NAMEregExp = /\(([^)]+)\)/;
         var uname = NAMEregExp.exec(information)[1];

         var URLregExp = /\[([^)]+)\]/;
         var url = URLregExp.exec(information)[1];
         var newpage = false;
         if (url[0] == "^") {
            newpage = true;
            url = url.substr(1);
         }
         var start = information.indexOf("[");
         var end = information.indexOf(")");
         if (newpage) {
            information = information.replace(information.substring(start, end + 1), "").splice(start, 0, '<a href="' + url + '" target="_blank">' + uname + '</a>');
         } else {
            information = information.replace(information.substring(start, end + 1), "").splice(start, 0, '<a href="' + url + '">' + uname + '</a>');
         }
        

      }
      var tobold = true;
      var boldnumber = 0;
      for (var i = 0; i < information.length; i++) {
         if (information[i] == "*" && information[i - 1] != "*" && information[i + 1] != "*") {
            boldnumber++;
         }
      }
      while (information.indexOf("*") >= 0) {
         var pos = information.indexOf("*");
         information = information.replace("*", "");
         if (tobold) {
            information = information.splice(pos, 0, '<b>');
         } else {
            information = information.splice(pos, 0, '</b>');
         }
         tobold = !tobold;
         if (tobold && boldnumber <= 1) {
            break;
         }
        
      }
      var tounderline = true;
      var underlinenumber = 0;
      for (var i = 0; i < information.length; i++) {
         if (information[i] == "*" && information[i - 1] != "*" && information[i + 1] != "*") {
            underlinenumber++;
         }
      }
      while (information.indexOf("**") >= 0) { 
         var pos = information.indexOf("**");
         information = information.replace("**", "");
         if (tounderline) {
            information = information.splice(pos, 0, '<u>');
         } else {
            information = information.splice(pos, 0, '</u>');
         }
         tounderline = !tounderline;
         if (tounderline && underlinenumber <= 1) {
            break;
         }
        
      } 
      $(".stream").append('<div class="line">' +
         '<p class="time">[' + hours + ":" + minutes + ":" + seconds + ']</p>' +
         '<p class="name ' + colour + '">' + name + '</p>' +
         '<p class="information' + postcolour + '">' + information + '</p>' +
         '</div>');
      $(document).scrollTop($(document).height() - $(window).height());
   }
	var timestring = "";
   function time() {
      var d = new Date();
      var hours = d.getHours();
      var minutes = d.getMinutes();
      var seconds = d.getSeconds();
      if (hours < 10) {
         hours = "0" + hours;
      }
      if (minutes < 10) {
         minutes = "0" + minutes;
      }
      if (seconds < 10) {
         seconds = "0" + seconds;
      }
	  var temptimestring = "[" + hours + ":" + minutes + ":" + seconds + "]";
	  if (temptimestring != timestring) {
		  timestring = temptimestring;
      	$(".editline .time").text(timestring);
	  }
   }

   var ctrldown = false;
   $(".editline .edit").keydown(function(e) {
      var text = $(".editline .edit").text();
      console.log(e.which);
      if (e.which == 13 && text !== "" && !ctrldown) {
         var commands = text.split(' ');
         var output = "";
         if (commands[0] == "help") {
            text = "" + text;
         }
         $(".editline .edit").text("");
         if(logRoot){
            log("Root", text);
         }else{
         log("User", text);}

         previouscommands[currentcommand] = text;
         currentcommand = previouscommands.length;
         $(".editline .edit").keydown(35);
         cmd(commands[0], text, commands);

      }
      if (e.which == 38) { //up
         if (currentcommand > 0) {
            currentcommand--;
            $(".editline .edit").text(previouscommands[currentcommand]);
         }
      }
      if (e.which == 40) { //down

         if (currentcommand < previouscommands.length) {
            currentcommand++;
            $(".editline .edit").text(previouscommands[currentcommand]);
         }
      }
   });

   function cmd(command, words, word) {
      switch (word[0]) {
         
         case "help":
            for (var i = 0; i < commandlist.length; i++) {
               output = commandlist[i][0] + " : " + commandlist[i][1];
               log("Client", output);
            }
            break;
         case "clear":
            $(".stream").text("");
            break;
         case "cat":
            if(logRoot){
            if ($.inArray(word[1], pageindex) >= 0) {
               currentpage = word[1];
               loadpage($.inArray(word[1], pageindex));
            } else {
               log("Root", "'" + word[1] + "' does not exist.");
            }
            }else{log("User", "Access denied");}
            break;
         case "dir":
            if (logRoot){
            $.each(pageindex, function(id, content) {
               log("", "" + content);
            });}else{log("User", "Access denied");}
            break;
         case "login":
            if (word.length >= 3) {
               log("Client", "Attempting to login to " + word[1] + " with " + Array(word[2].length + 1).join("â€¢"));
               loginreturn = false;
               if(word[1]=="root" && word[2]=="toor"){
                  log("Root", "Successful login");
                  logRoot = true;
                  document.getElementById("cmd").innerHTML = "&#35;";
               }else{
                  setTimeout(loginemptyreturn, 20000);
               }
            } else {
               log("Client", "Not enough arguments to log in, you need a USERNAME and a PASSWORD.");
            }
            break;
         case "ssh":
            if (logRoot){
            if (word.length >= 15) {
               log("Root", "Attempting to connect to " + word[1] + " with " + Array(word[2].length + 1).join("â€¢"));
               loginreturn = false;
               if(word[1]=="10.10.0.66:69@hacktestDB" && word[2]=="-p" && word[3]=="123;"){
                  log("Root", "Successful connect");
                  if(word[8]!="level6"){
                     log("Client", "E![SQL] Bad col name.");
                  }else{
                  if(word[4]=="sql" && word[8]=="level6" && word[11]=="WHERE"){
                     var request = new XMLHttpRequest();
                     console.log(window.location.href.replace('parameters','level7'));
                     request.open("GET", "./index.php?pass=level6", true);
                     request.send(null);
                     log("Root", "Command successful");  
                  }else{
                     log("Client", "E![SQL] Bad command.");
                  }}
               }else{
                  setTimeout(loginemptyreturn, 20000);
               }
            } else {
               log("Client", "Not enough arguments to hack database.");
            }}else{log("User", "Access denied");}
            break;
         default:
            output = "Unrecognised command '" + word[0] + "'.";
            log("Client", output);
      }
   }

   function loadpage(i) {
      $.each(pages[i], function(id, content) {
         if (content != pageindex[i]) {
            log("", content);
         }
      });
   }
   var loginreturn = false;

   function loginemptyreturn() {
      if (!loginreturn) {
         log("Client", "E![LOGIN] Bad user name or password.");
      }
   }
   String.prototype.splice = function(idx, rem, str) {
      return this.slice(0, idx) + str + this.slice(idx + Math.abs(rem));
   };
   init();
});
</script>
<div class="stream"></div>
<div class="line editline">
	<p class="time"></p>
	<p id="cmd" class="name">&#126;</p>
	<p contenteditable="true" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"
		class="information edit"></p>
</div>
