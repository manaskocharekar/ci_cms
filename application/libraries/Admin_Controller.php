<?php

class Admin_Controller extends MY_Controller{
     function __construct(){
        parent :: __construct();
        $this->data['meta_title'] = 'Dashboard';
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('User_m');

        $exception_urls = array(
                'Admin/User/login',
                'Admin/User/logout'
        );

        //Checking if Loggedin
        if(in_array(uri_string(), $exception_urls) == FALSE){
                
                if ($this->User_m->loggedin() == FALSE) {
                        redirect('Admin/User/login');
                }
        }
}
        }
     







?>