<?php 
class Post_m extends MY_Model{
    public $_table_name = 'posts';
    public $_primary_key = 'p_id';
    public $_order_by = 'p_date';
    public $ord = 'p_id';
    public $_timestamps = TRUE;
    public $rules = array(
        'p_date' => array(
            'field' => 'p_date',
            'label' => 'Publication Date', 
            'rules' => 'trim|exact_length[10]'
            ),
        'p_title' => array(
            'field' => 'p_title',
            'label' => 'Title', 
            'rules' => 'trim|required|max_length[100]'
            ),
        'p_slug' => array(
            'field' => 'p_slug',
            'label' => 'Slug', 
            'rules' => 'trim|required|max_length[100]|url_title'
            ),
        'p_content' => array(
            'field' => 'p_content',
            'label' => 'Content', 
            'rules' => 'trim|required|max_length[10000]'
            )
        );
    public function get_new(){
        $post = new stdClass();
        $uid = 'POS000';
        $this->db->order_by($this->ord);
        $id = $this->select();
         foreach ($id as $post):
         $uid = $post->p_id;
         endforeach;
        $count = substr($uid, 3);
        $no1= sprintf("%03d", $count+1);
        $uid = "PAG" . $no1;
        $post->p_id = $uid;
        $post->p_date = 0;
        $post->p_title = '';
        $post->p_slug = '';
        $post->p_order = '';
        $post->p_content = '';
        $post->p_author = '';
        $post->p_created_date = '';
        $post->p_active = '';
        $post->p_date = date('Y-m-d');
        return $post;
    }

    public function delete($id){
        //Delete The post
        parent::delete($id);
        //Set childrens parent to 0
        $this->db->Set(array('p_date' => 0))->where('p_date', $id)->update($this->_table_name);

    }

    
}

?>