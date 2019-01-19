<?php
include_once 'simple_html_dom.php';
// Create DOM from URL or file
$domain = "http://ketab.ir/bookview.aspx?bookid=";
$book = array();
$file="file.txt";
for ($i=1; $i<10;$i++) {
  $book_url = $domain.$i;
  echo $book_url."<br>";
  $html = file_get_html($book_url);
  echo strlen($html)."<br>";
  $img_src= $html->find("#ctl00_ContentPlaceHolder1_imgBook", 0)->src;
  echo $img_src."<br>";
  if (strpos($img_src, "http") !== false ) {
    file_put_contents($file, $img_src);
  }
//get pic{
  /*if (strpos($img_src, "http") !== false ) {
    file_put_contents("$i.jpg",file_get_contents($img_src));
  }}*/



//encoding text {
  //echo utf8_encode($innertext);
//echo mb_convert_encoding ($innertext, 'UTF-8');
//  $innertext = $html->find('#ctl00_ContentPlaceHolder1_lblBookTitle', 0)->innertext;
//echo utf8_decode($innertext);

//  $str = mb_convert_encoding($innertext, "UTF-8", "auto");
  //echo $innertext;
  //$book[] = $innertext;}
}
?>
