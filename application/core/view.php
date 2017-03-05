<?php
class View
{
	//1-content view, 2- general view, 3 - elements array
	function generate($content_view, $template_view, $data = null)
	{
		include 'application/views/'.$template_view;
		show_error();
	}
}
?>
