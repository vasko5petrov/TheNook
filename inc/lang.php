<?php
function setLanguage()
{
	if(isset($_GET['lan']))
	{
			if ($_GET['lan'] == 'bg')
		{
			require_once('languages/bg.php');
		}
		else
		{
			require_once('languages/en.php');
		}
	}
	else
	{
			require_once('languages/en.php');
	}
}

setLanguage();
?>