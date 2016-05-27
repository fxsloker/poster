<?php

defined('_JEXEC') or die('Restricted access');

class PosterViewProfile extends PosterView
{

	public function profile($data = null) 
	{
		
		$tmpl = new PTemplate();

		echo $tmpl->set('user', $data)
				  ->fetch('profile/base');

	}

}