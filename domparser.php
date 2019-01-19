<?php
include_once 'simple_html_dom.php';
// Create DOM from URL or file
$domain = 'http://www.sflc.ir';
$html = file_get_html($domain);

// Find all images
/*foreach($html->find('img') as $element)
       echo $element->src . '<br>';
*/
// Find all links
foreach($html->find('a') as $element) {
  $href = $element->href;
  echo $href. '<br>';
  if (strpos($href, "javascript") !== false || strpos($href, "@") !== false) {
    continue;
  }
  elseif (strpos($href, "sflc.ir") !== false) {
    $html_subdomain = file_get_html ("$href");
  }
  else {
    $href = "$domain/$href";
    $html_subdomain = file_get_html ($href);
  }
  if ($html_subdomain === false) {
    continue;
  }
  echo "<p style='color:red'>====We are $href now====</p>";
  foreach($html_subdomain->find('a') as $element) {
    $href = $element->href;
    echo $href. '<br>';
  }
}


























 ?>
