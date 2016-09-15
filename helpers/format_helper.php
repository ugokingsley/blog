<?php

function formatDate($date){
	return date('F j, Y, g:i a',strtotime($date));

}

function shortentext($text,$chars=200){
	$text=$text." ";
	$text=substr($text,0,$chars);
	$text=substr($text,0,strrpos($text,' '));
	$text=$text."...";
	return $text;
}
?>