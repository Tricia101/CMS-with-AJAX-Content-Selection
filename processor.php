<?php
sleep(1);
require 'Parsedown.php';
function getFile($fileName){
  if(is_readable($fileName)){
    $content = file_get_contents($fileName);
    $Parsedown = new Parsedown();
    $Parsedown->setSafeMode(true);
    echo $Parsedown->text($content);
  }else{
    http_response_code(503);
  }
}

  if(isset($_GET["page"])){
    switch ($_GET["page"]) {
     case "1":
       getFile("home.md");
       break;
     case "2":
       getFile("ucc.md");
       break;
     case "3":
       getFile("personal.md");
       break;
     case "4":
       getFile("contact.md");
       break;
      case "5":
        getFile("blahblah.md");
        break;
     default:
       http_response_code(404);
       break;
     }
   }else{
     getFile("home.md");
   }
?>
