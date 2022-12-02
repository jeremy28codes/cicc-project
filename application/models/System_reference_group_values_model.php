<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class System_reference_group_values_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->table = 'system_reference_group_values';
    }

    public function getAll()
    {
        $query = $this->db->select('a.*
                                    , b.name AS group_name')
            ->from($this->table.' a')
            ->join('system_reference_groups b', 'a.system_reference_group_id = b.id', 'INNER')
            ->where('a.deleted_by', NULL)
            ->where('a.deleted_at', NULL)
            ->where('b.deleted_by', NULL)
            ->where('b.deleted_at', NULL)
            ->order_by("a.ctr", "asc")
            ->order_by("b.ctr", "asc")
            ->get();

        return $query->result();
    }

    // public function getWithFilter($searchString)
    // {
    //     $query = $this->db->select('*')
    //         ->from($this->table)
    //         ->where('deleted_by', NULL)
    //         ->where('deleted_at', NULL);
    //     if ($searchString) {
    //         $query->group_start()
    //                 ->like("code", $searchString)
    //                 ->or_like("name", $searchString)
    //                 ->or_like("location", $searchString)
    //                 ->or_like("contact_number", $searchString)
    //                 ->or_like("email", $searchString)
    //             ->group_end();
	// 	}
    //     $query->order_by("is_main", "desc")
    //           ->order_by("name", "asc");
              
    //     return $query->get()->result();
    // }

    public function get($id)
    {
        $query = $this->db->select('a.*
                                    , b.name AS group_name')
            ->from($this->table.' a')
            ->join('system_reference_groups b', 'a.system_reference_group_id = b.id', 'INNER')
            ->where('a.deleted_by', NULL)
            ->where('a.deleted_at', NULL)
            ->where('b.deleted_by', NULL)
            ->where('b.deleted_at', NULL)
            ->where('a.id', $id)
            ->order_by("a.ctr", "asc")
            ->order_by("b.ctr", "asc")
            ->get();

        return $query->result();
    
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        $id = $this->db->insert_id();

        return $id;
    }

    public function update($id, $data)
    {
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

    public function delete($id, $data)
    {
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

    public function getBy_GroupCodeDepartmentDivision($group_code, $department_id, $division_id)
    {
        $query = $this->db->select('a.*
                                    , b.name AS group_name')
            ->from($this->table.' a')
            ->join('system_reference_groups b', 'a.system_reference_group_id = b.id', 'INNER')
            ->where('a.deleted_by', NULL)
            ->where('a.deleted_at', NULL)
            ->where('b.deleted_by', NULL)
            ->where('b.deleted_at', NULL)
            ->where('a.deleted_at', NULL)
            ->where('b.code', $group_code);
            if($department_id){
                $query->where('b.department_id', $department_id);
            }
            if($division_id){
                $query->where('b.division_id', $division_id);
            }
        $query->order_by("a.ctr", "asc")
            ->order_by("b.ctr", "asc");

        return $query->get()->result();
    
    }
}