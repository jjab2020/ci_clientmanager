<?php
//Dynamically add Javascript files to header page
if(!function_exists('add_js')){
    function add_js($file='')
    {
        $str = '';
        $ci = &get_instance();
        $header_js = $ci->config->item('header_js');
        if(empty($file)){
            return;
        }
        if(is_array($file)){
            if(!is_array($file) && count($file) <= 0){
                return;
            }
            foreach($file AS $item){
                $header_js[] = $item;
            }
            $ci->config->set_item('header_js',$header_js);
        }else{
            $str = $file;
            $header_js[] = $str;
            $ci->config->set_item('header_js',$header_js);
        }
    }
}
//Dynamically add CSS files to header page
if(!function_exists('add_css')){
    function add_css($file='')
    {
        $str = '';
        $ci = &get_instance();
        $header_css = $ci->config->item('header_css');
        if(empty($file)){
            return;
        }
        if(is_array($file)){
            if(!is_array($file) && count($file) <= 0){
                return;
            }
            foreach($file AS $item){
                $header_css[] = $item;
            }
            $ci->config->set_item('header_css',$header_css);
        }else{
            $str = $file;
            $header_css[] = $str;
            $ci->config->set_item('header_css',$header_css);
        }
    }
}
//Putting our CSS and JS files together
if(!function_exists('put_headers')){
    function put_headers()
    {
        $str = '';
        $ci = &get_instance();
        $header_css = $ci->config->item('header_css');
        $header_js  = $ci->config->item('header_js');
        foreach($header_css AS $item){
            $str .= '<link rel="stylesheet" href="'.base_url().'assets/css/'.$item.'" type="text/css" />'."\n";
        }
        if(count($header_js)!=0){
            foreach($header_js AS $item){
             $str .= '<script type="text/javascript" src="'.base_url().'assets/js/'.$item.'"></script>'."\n";
         }
     }

     return $str;
 }
}

if (!function_exists('pretty_dump')) {
    /**
     * @param array|object $input
     * @param bool $export
     */
    function pretty_dump($input, $export = false)
    {
        if ($export === true) {
            echo "<pre>", var_export($input) , "</pre>";
        } else {
            echo "<pre>", var_dump($input) , "</pre>";
        }
    }
}


if (!function_exists('data_list')) {
    /**
     * @param array|object $input
     * @param bool $export
     */
    function data_list($data,$id,$val,$label="")
    {
        if(!empty($label))  $output = array('' => $label) ;
        
        foreach ($data as $record) {
            $output[$record[$id]]=$record[$val];
        }
        return $output;    
    }
}
