<?php
defined('BASEPATH') OR exit('No direct script access allowed');

clASs System_divisions_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->table = 'system_divisions';
    }

    public function getAll()
    {
        $query = $this->db->select('a.*
                                    , b.name as department_name')
            ->from($this->table.' a')
            ->join('system_departments b' ,'a.system_department_id = b.id', 'inner')
            ->where('a.deleted_by', NULL)
            ->where('a.deleted_at', NULL)
            ->where('b.deleted_by', NULL)
            ->where('b.deleted_at', NULL)
            ->order_by("b.ctr", "ASC")
            ->order_by("a.ctr", "ASC")
            ->get();

        return $query->result();
    }

    public function get($id)
    {
        $query = $this->db->select('a.*
                                    , b.name as department_name')
            ->from($this->table.' a')
            ->join('system_departments b' ,'a.system_department_id = b.id', 'inner')
            ->where('a.deleted_by', NULL)
            ->where('a.deleted_at', NULL)
            ->where('b.deleted_by', NULL)
            ->where('b.deleted_at', NULL)
            ->where('a.id', $id)
            ->order_by("b.ctr", "ASC")
            ->order_by("a.ctr", "ASC")
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