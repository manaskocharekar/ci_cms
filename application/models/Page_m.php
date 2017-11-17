<?php 
class Page_m extends MY_Model{
    public $_table_name = 'pages';
    public $_primary_key = 'pg_id';
    public $_order_by = 'pg_order';
    public $ord = 'pg_id';
    public $_timestamps = NULL;
    public $rules = array(
        'pg_parent_id' => array(
            'field' => 'pg_parent_id',
            'label' => 'Title', 
            'rules' => 'trim'
            ),
        'pg_title' => array(
            'field' => 'pg_title',
            'label' => 'Title', 
            'rules' => 'trim|required|max_length[100]'
            ),
        'pg_template' => array(
            'field' => 'pg_template',
            'label' => 'Title', 
            'rules' => 'trim|required'
            ),
        'pg_slug' => array(
            'field' => 'pg_slug',
            'label' => 'Slug', 
            'rules' => 'trim|required|max_length[100]|url_title|callback__unique_slug'
            ),
        'pg_content' => array(
            'field' => 'pg_content',
            'label' => 'Content', 
            'rules' => 'trim|required|max_length[10000]'
            )
        );
    public function get_new(){
        $page = new stdClass();
        $uid = 'PAG000';
        $this->db->order_by($this->ord);
        $id = $this->select();
         foreach ($id as $page):
         $uid = $page->pg_id;
         endforeach;
        $count = substr($uid, 3);
        $no1= sprintf("%03d", $count+1);
        $uid = "PAG" . $no1;
        $page->pg_id = $uid;
        $page->pg_parent_id = 0;
        $page->pg_title = '';
        $page->pg_slug = '';
        $page->pg_order = '';
        $page->pg_content = '';
        $page->pg_author = '';
        $page->pg_created_date = '';
        $page->pg_active = '';
        $page->pg_template = 'page';
        
        return $page;
    }

    public function delete($id){
        //Delete The page
        parent::delete($id);
        //Set childrens parent to 0
        $this->db->Set(array('pg_parent_id' => 0))->where('pg_parent_id', $id)->update($this->_table_name);

    }

    public function save_order($pages){
        if(count($pages)){
            //var_dump($pages);
            foreach ($pages as $order => $page) {
                if ($page['item_id'] != ''){
                    if($page['parent_id'] == 'none' || $page['parent_id'] == 'none' ){
                        $page['parent_id'] == 0;
                    }
                    $data = array('pg_parent_id' => $page['parent_id'], 'pg_order' => $order);
                    $this->db->set($data)->where($this->_primary_key, $page['item_id'])->update($this->_table_name);
                    //echo $this->db->last_query();

                }
            }
        }

    }

    
	public function get_nested ()
	{
		$this->db->order_by($this->_order_by);
		$pages = $this->db->get('pages')->result_array();
		
		$array = array();
		foreach ($pages as $page) {
			if (! $page['pg_parent_id']) {
				// This page has no parent
				$array[$page['pg_id']] = $page;
			}
			else {
				// This is a child page
				$array[$page['pg_parent_id']]['children'][] = $page;
			}
		}
		return $array;
	}

    public function get_with_parent($id = NULL, $single = FALSE){
        $this->db->select('pages.*, p.pg_slug as parent_slug, p.pg_title as parent_title');
        $this->db->join('pages as p', 'pages.pg_parent_id = p.pg_id', 'left' );
        return parent:: select($id, $single);
    }

    public function get_no_parents ()
	{
		// Fetch pages without parents
		$this->db->select('pg_id, pg_title');
		$this->db->where('pg_parent_id', 0);
		$pages = parent::select();
		
		// Return key => value pair array
		$array = array(
			0 => 'No parent'
		);
		if (count($pages)) {
			foreach ($pages as $page) {
				$array[$page->pg_id] = $page->pg_title;
			}
		}
		
		return $array;
	}
}

?>