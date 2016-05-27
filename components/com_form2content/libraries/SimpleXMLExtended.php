<?php
defined('_JEXEC') or die('Restricted acccess');

/*
 * Found on http://coffeerings.posterous.com/php-simplexml-and-cdata
 */
class SimpleXMLExtended extends SimpleXMLElement
{   
	public function addCData($cdata_text)
	{   
   		$node 	= dom_import_simplexml($this);   
   		$no 	= $node->ownerDocument;
   		   
   		$node->appendChild($no->createCDATASection($cdata_text));   
  	}   
}   
?>