<?php 


class Post extends Admin_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Post_m');
    }

    public function index(){
        $this->data['Posts'] = $this->Post_m->select();
        $this->data['subview'] = 'admin/Post/index';
        $this->load->view('admin/_layout_main', $this->data);
    }

    
    public function edit($id = NULL){
        $today = date("Y-m-d H:i:s");
        if($id){
            $this->data['Post'] = $this->Post_m->select($id);
            count($this->data['Post']) || $this->data['errors'][] = "No such Post";
            
            $flag = 0;

        }
        else{
            $this->data['Post'] = $this->Post_m->get_new();
            $flag = 1;
        }

        //var_dump($this->data['Posts_no_parents']);


        $rules = $this->Post_m->rules;
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run() == TRUE){
            
            if($flag == 1){
                $data = $this->Post_m->array_from_post(array('p_id', 'p_title','p_slug', 'p_content', 'p_date','p_created', 'p_modified'));
                $data['p_created'] = $today;
                $data['p_modified'] = $today;
            }
            if($flag == 0){
                $data = $this->Post_m->array_from_post(array('p_id', 'p_title','p_slug', 'p_content', 'p_date', 'p_modified'));
                $data['p_modified'] = $today;
            }
            //var_dump($data);
            $this->Post_m->put($data, $id);
            redirect('Admin/Post/');

        }
        $this->data['subview'] = 'admin/Post/edit';
        $this->load->view('admin/_layout_main', $this->data);
    }


    public function delete($id){
        $this->Post_m->delete($id);
        redirect('Admin/Post/');
    }   
}

?>