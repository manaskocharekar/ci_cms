<?php

class MY_Model extends CI_Model{
    
    protected $_table_name = '';
    protected $_primary_key = '';
    protected $_order_by = '';
    public $rules = array();
    protected $_timestamps = NULL;
    
    function __construct(){
        parent:: __construct();
    }

    public function array_from_post($fields){
        $data = array();
        foreach ($fields as $field){
            $data[$field] = $this->input->post($field);
           }
         var_dump($data);
         return $data;
        

    }

    public function select($id = NULL, $single = FALSE){
        if ($id != NULL) {
            $this->db->where($this->_primary_key, $id);
            $method = 'row';        
        }
        elseif ($single == TRUE) {
            $method = 'row';
        }
        else{
            $method = 'result';
        }
        $this->db->order_by($this->_order_by);
            
        return $this->db->get($this->_table_name)->$method();
        
    }
    public function select_by($where, $single = FALSE){
        $this->db->where($where);
        return $this->select(NULL, $single);
    }
    public function put($data, $id = NULL){
        $success = FALSE;
        //INSERT
        if ($id === NULL) {
            //!isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL;
            $this->db->set($data);
            $this->db->insert($this->_table_name);
            $success =  TRUE;
        }
        //UPDATE
        else{
            $this->db->set($data);
            $this->db->where($this->_primary_key, $id);
            $this->db->update($this->_table_name);
            $success = TRUE;

        }
        return $success;
    }
    public function delete($id){

        if(!$id){
            return FALSE;
        }
        $this->db->where($this->_primary_key, $id);
        $this->db->limit(1);
        $this->db->delete($this->_table_name);
    }


} 
?>