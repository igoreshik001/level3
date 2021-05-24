<?php
namespace core;

class View
{
	
	function generate($tmpl_view, $data)
	{
		if(is_array($data)) {


			include 'views/'.$tmpl_view;
			foreach ($data as $key => $value) {
				if(is_string($key)){
					$content = str_replace("{".$key."}", $value, $content);
				}
			}
			echo $content;
		}
	}
}