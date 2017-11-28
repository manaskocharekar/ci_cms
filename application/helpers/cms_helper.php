<?php 

function btn_edit($url){
    return anchor($url, '<i class = "glyphicon glyphicon-pencil"> </i> ');

}

function btn_delete($url){
    return anchor($url, '<i class = "glyphicon glyphicon-trash"> </i> ', array(
        'onclick' => "return confirm('Are You Sure To Delete??');"
    ));

}

function e($string){
    return htmlentities($string);
}
    
function get_menu ($array, $child = FALSE)
{
    $CI =& get_instance();
    $str = '';
	
	if (count($array)) {
		$str .= $child == FALSE ? '<ul class="nav navbar-nav">'. PHP_EOL : '<ul class = "dropdown-menu">'. PHP_EOL;
		
		foreach ($array as $item) {
            $active = $CI->uri->segment(1) ==$item['pg_slug'] ? TRUE : FALSE;
            if (isset($item['children']) && count($item['children'])) {
                $str .= $active ? '<li class = "dropdown active">' : '<li class = "dropdown">';
                $str .= '<a class = "dropdown-toggle" data-toggle = "dropdown" href = "'. base_url(e($item['pg_slug'])).'">' .e($item['pg_title']);
                $str .= '<b class = "caret"></b></a>'. PHP_EOL;
                $str .= get_menu($item['children'], TRUE);
            }
            else {
                $str .= $active ? '<li class = "active">' : '<li>';
                $str .= '<a  href = "'. base_url($item['pg_slug']).'">'.e($item['pg_title']).'</a>';                
            }      

			
			
			$str .= '</li>' . PHP_EOL;
		}
		
		$str .= '</ul>' . PHP_EOL;
	}
	
	return $str;
}
?>