<?php 


class User extends Admin_Controller{
    
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->data['users'] = $this->User_m->select();
        $this->data['subview'] = 'admin/User/index';
        $this->load->view('admin/_layout_main', $this->data);
    }

    public function edit($id = NULL){
        if($id){
            $this->data['user'] = $this->User_m->select($id);
            count($this->data['user']) || $this->data['errors'][] = "No such User";

        }
        else{
            $this->data['user'] = $this->User_m->get_new();
        }
        $rules = $this->User_m->rules_admin;
        //$id ||  $rules .= '|required';
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run() == TRUE){
            $data = $this->User_m->array_from_post(array('usr_id', 'usr_name', 'usr_email', 'usr_pass'));
            var_dump($data);
            $data['usr_pass'] = $this->User_m->hash($data['usr_pass']);
            var_dump($data);
            $this->User_m->put($data, $id);
            redirect('Admin/user/');

        }
        $this->data['subview'] = 'admin/User/edit';
        $this->load->view('admin/_layout_main', $this->data);
    }
        public function delete($id){
            $this->User_m->delete($id);
            redirect('Admin/User/');
    }

    


    public function login(){
        $dashboard = 'Admin/Dashboard';
        $this->User_m->loggedin() == FALSE || redirect($dashboard);
        $rules = $this->User_m->rules;
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run() == TRUE){
            //LOGIN AND REDIRECT
            if($this->User_m->login() == TRUE){
                redirect($dashboard);
            }
            else{
                $this->session->set_flashdata('error', 'You are not a registered user');
                redirect('Admin/User/login', 'refresh');
            }
        }
        $this->data['subview'] = 'admin/User/Login';
        $this->load->view('admin/_layout_modal', $this->data);
    }

    public function logout(){
        $this->User_m->logout();
        redirect('Admin/User/login');
    }

    public function _unique_email($str){
        $this->db->where('usr_email', $this->input->post('email'));
        $usr_id = $this->uri->segment(4);
        !$usr_id || $this->db->where('usr_id !=', $usr_id);
        $user = $this->User_m->select();

        if(count($user)){
            $this->form_validation->set_message('_unique_email', '%s Should be unique');
            return FALSE;
        }
        return TRUE;

    }

    
}





/*
public function index(){
        $this->data['users'] = $this->User_m->select();
        $this->data['subview'] = 'admin/User/index';
        $this->load->view('admin/_layout_main', $this->data);
    }
    
    public function edit($usr_id = NULL){
        if($usr_id){
             $this->data['user'] = $this->User_m->select($usr_id);
             count($this->data['user']) || $this->data['errors'][] = "This user is not found";
             
        }
        else {
            $this->data['user'] = $this->User_m->get_new();
             
        }
                  //  var_dump($this->data['user']);

        $rules = $this->User_m->rules_admin;
        // $usr_id || $rules['password'] .= '|required';
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run() == TRUE){
            $this->data['user'] = $this->User_m->array_from_post(array('name', 'email', 'password'));
            var_dump($this->data['user']);
            $this->data->user['password'] = $this->User_m->hash($thsi->data->user['password']);
            $this->User_m->put($this->data['user'], $usr_id);
            // redirect('admin/User/'); 


           
        }

        $this->data['subview'] = 'admin/User/edit';
        $this->load->view('admin/_layout_main', $this->data);
    


    }
    public function delete(){
        $this->User_m->delete($usr_id);
        redirect('admin/User/');
    }
    */
?>