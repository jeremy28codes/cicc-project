<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class system_web_modules_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
        $this->table = 'system_web_modules';
        
    }

	public function get_all(){
    	$query = $this->db->select('*')
                ->from($this->table)
                ->where('deleted_at', NULL)
                ->where('deleted_by', NULL)
                ->order_by("ctr","asc")
                ->get();

    	return $query->result();
    }

    public function get($id=NULL){

    	$query = $this->db->select('*')
                ->from($this->table)
                ->where('deleted_at', NULL)
                ->where('deleted_by', NULL)
                ->where("id", $id)
                ->order_by("ctr","asc")
                ->get(); 

        return $query->result();
    }

    public function get_by_link($link=NULL){

    	$query = $this->db->select('*')
                ->from($this->table)
                ->where('deleted_at', NULL)
                ->where('deleted_by', NULL)
                ->where("link", $link)
                ->order_by("is_active",1)
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