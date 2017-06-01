<?php
//get the q parameter from URL
$q=$_GET["q"];

//find out which feed was selected
if($q=="MangaSanctuary") {
  $xml=("http://www.manga-sanctuary.com/RSS/news.xml"); // http://news.google.com/news?ned=us&topic=h&output=rss
} elseif($q=="DojoManga") {
  $xml=("http://www.ledojomanga.com/rss.xml"); // http://www.otakuji.com/rss/
}

$xmlDoc = new DOMDocument();
$xmlDoc->load($xml);

//get elements from "<channel>"
$channel=$xmlDoc->getElementsByTagName('channel')->item(0);
$channel_title = $channel->getElementsByTagName('title')
->item(0)->childNodes->item(0)->nodeValue;
$channel_link = $channel->getElementsByTagName('link')
->item(0)->childNodes->item(0)->nodeValue;
$channel_desc = $channel->getElementsByTagName('description')
->item(0)->childNodes->item(0)->nodeValue;
$channel_desc = $channel->getElementsByTagName('pubDate')
->item(0)->childNodes->item(0)->nodeValue;

//output elements from "<channel>"
echo("<p><a href='" . $channel_link
  . "'>" . $channel_title . "</a>");
echo("<br>");
echo($channel_desc . "</p>");

//get and output "<item>" elements
$x=$xmlDoc->getElementsByTagName('item');
for ($i=0; $i<=10; $i++) {
  $item_title=$x->item($i)->getElementsByTagName('title')->item(0)->childNodes->item(0)->nodeValue;
  $item_link=$x->item($i)->getElementsByTagName('link')->item(0)->childNodes->item(0)->nodeValue;
  $item_desc=$x->item($i)->getElementsByTagName('description')->item(0)->childNodes->item(0)->nodeValue;
  $item_pub=$x->item($i)->getElementsByTagName('pubDate')->item(0)->childNodes->item(0)->nodeValue;
  echo ("<p><a href='" . $item_link . "'>" . $item_title . "</a>");
  echo ("<br>");
  echo ($item_desc);
  echo ($item_pub . "</p>");
}
?> 