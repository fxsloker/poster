<?php

defined('_JEXEC') or die('Restricted access');

class PosterViewLogin extends PosterView
{

	public function showLogin($data = null) 
	{
		
		$tmpl = new PTemplate();

		echo $tmpl->fetch('login/login');

	}

}