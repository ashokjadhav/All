<?php
// this is a sample xml string
$xml_string="<?xml version='1.0'?>
<text>
   <article id='Article1'>
       <title>Title 1</title>
       <content>..text here..</content>
   </article>
   <article id='Article2'>
       <title>Title 2</title>
       <content>..text here..</content>
   </article>
</text>";
 
// load this xml string using simplexml function
$xml = simplexml_load_string($xml_string);
 
// loop through the each node
foreach($xml->article as $key){
   // attribute are accessted by
   echo $key['id'].' ';
   // node are accessted by -> operator
   echo $key->title.' ';
   echo $key->content.'<br />';
}
?>