<?php

class User_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function checkEmail($email)
    {
        $query = $this->db->get_where('user', array('email' => $email));

        if ($query->num_rows() > 0){
            return 'true';
        }
        else{
            return 'false';
        }
    }

    
    function getUser($nik,$pass)
    {
        $otherdb = $this->load->database('other', TRUE);
        $otherdb->where('nik', $nik);
        $otherdb->where('password', $pass);
      
        $query =  $otherdb->get('RMPROGUsers');
        return $query->result();
    }


}