        <?php 


class Page extends Admin_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Page_m');
    }

    public function index(){
        $this->data['Pages'] = $this->Page_m->get_with_parent();
        $this->data['subview'] = 'admin/Page/index';
        $this->load->view('admin/_layout_main', $this->data);
    }

    public function order(){
        $this->data['sortable'] = TRUE;
        $this->data['subview'] = 'admin/Page/order';
        $this->load->view('admin/_layout_main', $this->data);
    }
    public function order_ajax(){
        //var_dump($_POST['sortable']);
        if (isset($_POST['sortable'])) {
            $this->Page_m->save_order($_POST['sortable']);
        }
        $this->data['Pages'] = $this->Page_m->get_nested();
        $this->load->view('admin/Page/order_ajax', $this->data);
    }

    public function edit($id = NULL){
        if($id){
            $this->data['Page'] = $this->Page_m->select($id);
            count($this->data['Page']) || $this->data['errors'][] = "No such Page";

        }
        else{
            $this->data['Page'] = $this->Page_m->get_new();
        }

        $this->data['pages_no_parents'] = $this->Page_m->get_no_parents();
        //var_dump($this->data['pages_no_parents']);


        $rules = $this->Page_m->rules;
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run() == TRUE){
            $data = $this->Page_m->array_from_post(array('pg_id', 'pg_title','pg_slug', 'pg_content', 'pg_parent_id'));
            //var_dump($data);
            $this->Page_m->put($data, $id);
            redirect('Admin/Page/');

        }
        $this->data['subview'] = 'admin/Page/edit';
        $this->load->view('admin/_layout_main', $this->data);
    }


    public function delete($id){
        $this->Page_m->delete($id);
        redirect('Admin/Page/');
    }

    


  
    public function _unique_slug($str){
        $this->db->where('pg_slug', $this->input->post('pg_slug'));
        $pg_id = $this->uri->segment(4);
        !$pg_id || $this->db->where('pg_id !=', $pg_id);
        $Page = $this->Page_m->select();

        if(count($Page)){
            $this->form_validation->set_message('_unique_slug', '%s Should be unique');
            return FALSE;
        }
        return TRUE;

    }

    
}





?>