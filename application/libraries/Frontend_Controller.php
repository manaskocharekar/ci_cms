<?php

class Frontend_Controller extends MY_Controller{
     function __construct(){
        parent :: __construct();

        //Load Page
        $this->load->model('Page_m');

        //Fetch Navigation
        $this->data['menu'] = $this->Page_m->get_nested();
        
     }
}
?>