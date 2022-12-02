<?php
defined('BASEPATH') OR exit('No direct script access allowed');

clASs System_reference_provinces_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->table = 'system_reference_provinces';
    }

    public function getAll()
    {
        $query = $this->db->select('a.*
                                    , b.name AS region_name')
            ->from($this->table.' a')
            ->join('system_reference_regions b', 'a.reference_region_id = b.id', 'LEFT OUTER')
            ->where('a.deleted_by', NULL)
            ->where('a.deleted_at', NULL)
            ->where('b.deleted_by', NULL)
            ->where('b.deleted_at', NULL)
            ->order_by("a.ctr", "ASC")
            ->order_by("a.name", "ASC")
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
    //           ->order_by("name", "ASC");
              
    //     return $query->get()->result();
    // }

    public function get($id)
    {
        $query = $this->db->select('a.*
                                    , b.name AS region_name')
            ->from($this->table.' a')
            ->join('system_reference_regions b', 'a.reference_region_id = b.id', 'LEFT OUTER')
            ->where('a.deleted_by', NULL)
            ->where('a.deleted_at', NULL)
            ->where('b.deleted_by', NULL)
            ->where('b.deleted_at', NULL)
            ->where('a.id', $id)
            ->order_by("a.ctr", "ASC")
            ->order_by("a.name", "ASC")
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
}