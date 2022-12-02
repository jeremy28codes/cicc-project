<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class System_user_role_module_access_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
        $this->table = 'system_user_role_module_access';
        
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

    public function get_by_role_id($role_id=NULL){

    	$query = $this->db->select('*')
                ->from($this->table)
                ->where('deleted_at', NULL)
                ->where('deleted_by', NULL)
                ->where("system_role_id", $role_id)
                ->where("can_access", 1)
                ->get(); 

        $result = $query->result();
        $array = array();
        foreach($result as $key => $value)
        {
            array_push($array,$value->system_web_module_id);
        }
        return $array;
    }

    public function has_access($role_id=NULL,$module_id=NULL){

    	$query = $this->db->select('*')
                ->from($this->table)
                ->where('role_id', $role_id)
                ->where('module_id', $module_id)
                ->where('deleted_at', NULL)
                ->where('deleted_by', NULL)
                ->where("can_access", 1)
                ->get(); 

        return $query->result();
    }

    public function can_view($role_id=NULL,$module_id=NULL){

    	$query = $this->db->select('*')
                ->from($this->table)
                ->where('role_id', $role_id)
                ->where('system_module_id', $module_id)
                ->where('deleted_at', NULL)
                ->where('deleted_by', NULL)
                ->where("can_view", 1)
                ->get(); 

        return $query->result();
    }   

    public function can_create($role_id=NULL,$module_id=NULL){

    	$query = $this->db->select('*')
                ->from($this->table)
                ->where('role_id', $role_id)
                ->where('system_module_id', $module_id)
                ->where('deleted_at', NULL)
                ->where('deleted_by', NULL)
                ->where("can_create", 1)
                ->get(); 

        return $query->result();
    }

    public function can_edit($role_id=NULL,$module_id=NULL){

    	$query = $this->db->select('*')
                ->from($this->table)
                ->where('role_id', $role_id)
                ->where('system_module_id', $module_id)
                ->where('deleted_at', NULL)
                ->where('deleted_by', NULL)
                ->where("can_edit", 1)
                ->get(); 

        return $query->result();
    }

    public function can_delete($role_id=NULL,$module_id=NULL){

    	$query = $this->db->select('*')
                ->from($this->table)
                ->where('role_id', $role_id)
                ->where('system_module_id', $module_id)
                ->where('deleted_at', NULL)
                ->where('deleted_by', NULL)
                ->where("can_delete", 1)
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