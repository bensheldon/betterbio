<?php 
  $raw = file_get_contents("http://www.indiegogo.com/betterbio"); 
  $newlines = array("\t","\n","\r","\x20\x20","\0","\x0B");
  $content = str_replace($newlines, "", html_entity_decode($raw));
  
  $start = strpos($content,'<span class="agContributeTitle">');
  $end = strpos($content,'</span>',$start) + 7;
  
  echo substr($content,$start,$end-$start);
?>