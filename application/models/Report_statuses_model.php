<?php
defined('BASEPATH') OR exit('No direct script access allowed');

clASs Report_statuses_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->table = 'report_statuses';
    }

    public function getAll()
    {
        $query = $this->db->select('*')
            ->from($this->table)
            ->where('deleted_by', NULL)
            ->where('deleted_at', NULL)
            ->order_by(1, "ASC")
            ->get();

        return $query->result();
    }

    public function get($id)
    {
        $query = $this->db->select('*')
            ->from($this->table)
            ->where('deleted_by', NULL)
            ->where('deleted_at', NULL)
            ->where('id', $id)
            ->order_by(1, "ASC")
            ->get();

        return $query->result();
    
    }

    public function getAllGrouped()
    {
        $query = $this->db->select('status')
            ->from($this->table)
            ->where('deleted_by', NULL)
            ->where('deleted_at', NULL)
            ->order_by(1, "ASC")
            ->group_by('status')
            ->get();

        return $query->result();
    }

    public function getByReportID($id)
    {
        $query = $this->db->select('*')
            ->from($this->table)
            ->where('deleted_by', NULL)
            ->where('deleted_at', NULL)
            ->where('report_id', $id)
            ->order_by(1, "ASC")
            ->get();

        return $query->result();
    
    }

    public function getByStatus($status)
    {
        $query = $this->db->select('*')
            ->from($this->table)
            ->where('deleted_by', NULL)
            ->where('deleted_at', NULL)
            ->where('status', $status)
            ->order_by(1, "ASC")
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