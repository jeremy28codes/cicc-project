<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class System_user_roles_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
        $this->table = 'system_user_roles';
        
    }

	public function get_all(){
    	$query = $this->db->select('*')
                ->from($this->table)
                ->where('deleted_at', NULL)
                ->where('deleted_by', NULL)
                ->get();

    	return $query->result();
    }

    public function get($id=NULL){

    	$query = $this->db->select('*')
                ->from($this->table)
                ->where('deleted_at', NULL)
                ->where('deleted_by', NULL)
                ->where("id", $id)
                ->get(); 

        return $query->result();
    }

    public function get_by_user_id($id=NULL){

    	$query = $this->db->select('*')
                ->from($this->table)
                ->where('deleted_at', NULL)
                ->where('deleted_by', NULL)
                ->where("user_id", $id)
                ->get(); 

        return $query->result();
    }

    public function save($data=NULL) {

       $this->db->insert($this->table, $data);

       $id = $this->db->insert_id();

       return $id;
    }

    public function update($data=NULL, $id=NULL) {

        $this->db->trans_start();
        $this->db->set($data)
                ->where('id', $id)
                ->update($this->table);
        $this->db->trans_complete();

        if($this->db->trans_status())
        {
            return $id;
        }
        else{
            return $this->db->trans_status();
        }
    }

    public function delete($data=NULL, $id=NULL) {

        $this->db->trans_start();
        $this->db->set($data)
                ->where('id', $id)
                ->update($this->table);
        $this->db->trans_complete();

        if($this->db->trans_status())
        {
            return $id;
        }
        else{
            return $this->db->trans_status();
        }
    }

}