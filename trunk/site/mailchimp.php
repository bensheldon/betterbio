<?php
  $ch = curl_init('http://us2.api.mailchimp.com/1.2/?method=listSubscribe');
  $encoded = '';
  // include GET as well as POST variables; your needs may vary.
  foreach($_GET as $name => $value) {
    $encoded .= urlencode($name).'='.urlencode($value).'&';
  }
  foreach($_POST as $name => $value) {
    $encoded .= urlencode($name).'='.urlencode($value).'&';
  }
  
  // chop off last ampersand
  $encoded = substr($encoded, 0, strlen($encoded)-1);
  curl_setopt($ch, CURLOPT_POSTFIELDS,  $encoded);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_POST, 1);
  $output = curl_exec($ch);
  curl_close($ch);
?>