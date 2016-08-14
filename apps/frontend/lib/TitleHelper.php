<?php

class TitleHelper
{
	static function setTitle($text)
	{
		if (strlen($text) > 50)
		{
			$text = substr($text, 0, 45) . '...';
		}
		sfContext::getInstance()->getResponse()->setTitle($text . ' - ' . sfConfig::get('app_title'));
	}
}