<?php
class View
{
	
	function generate($tmpl_view, $data = null)
	{
		if(is_array($data)) {

			$tmpl_view = file_get_contents('views/'.$tmpl_view);
			foreach ($data as $key => $value) {
				$tmpl_view = str_replace($key, $value, $tmpl_view);
			}
			echo $tmpl_view;
		}
	}
}

?>