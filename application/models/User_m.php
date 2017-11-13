<?php 
class User_m extends MY_Model{
    protected $_table_name = 'users';
    protected $_primary_key = 'usr_id';
    protected $_order_by = 'usr_id';
    public $rules = array(
        'email' => array(
            'field' => 'email',
            'label' => 'Email', 
            'rules' => 'trim|required|valid_email'
            ),
        'password' => array(
            'field' => 'password', 
            'label' => 'Password', 
            'rules' => 'trim|required'
            )
    );

    public $rules_admin = array(
        'usr_name' => array(
            'field' => 'usr_name',
            'label' => 'Name', 
            'rules' => 'trim|required'
            ),
        'usr_email' => array(
            'field' => 'usr_email',
            'label' => 'Email', 
            'rules' => 'trim|required|valid_email|callback__unique_email'
            ),
        'usr_pass' => array(
            'field' => 'usr_pass', 
            'label' => 'Password', 
            'rules' => 'matches[password_confirm]|trim'
            ),
        'password_confirm' => array(
            'field' => 'password_confirm', 
            'label' => 'Password_confirm', 
            'rules' => 'trim'
            )
    );
    
    function __construct(){
        parent::__construct();
    }

    public function login(){

        $user = $this->select_by(array(
            'usr_email' => $this->input->post('email'),
            'usr_pass' => $this->hash($this->input->post('password')),
        ), TRUE);

        if(count($user)){
            $data = array(
                'name' => $user->usr_name,
                'email' => $user->usr_email,
                'id' => $user->usr_id,
                'loggedin' => TRUE,
            );
            $this->session->set_userdata($data);
        }
    }

    public function logout(){
        $this->session->sess_destroy();
    }

    public function loggedin(){
        return (bool) $this->session->userdata('loggedin');
    }

    public function get_new(){
        $user = new stdClass();
        $id = $this->select();
         foreach ($id as $user):
         $uid = $user->usr_id;
         endforeach;
        $count = substr($uid, 3);
        $no1= sprintf("%03d", $count+1);
        $uid = "USR" . $no1;
        $user->usr_id = $uid;
        $user->usr_name = '';
        $user->usr_email = '';
        $user->usr_pass = '';
        return $user;
    }

    public function hash($string){
        return hash('sha512', $string . config_item('encryption_key'));
    }
}

?>