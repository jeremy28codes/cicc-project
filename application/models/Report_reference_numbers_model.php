<?php
defined('BASEPATH') OR exit('No direct script access allowed');

clASs Report_reference_numbers_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->table = 'report_reference_numbers';
    }

    public function getAll()
    {
        $query = $this->db->select('*')
            ->from($this->table)
            ->where('deleted_by', NULL)
            ->where('deleted_at', NULL)
            ->order_by("ctr", "ASC")
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
            ->order_by("ctr", "ASC")
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

    public function getBy_ReportTypeIDDivisionID($rgv_report_type_id, $division_id)
    {
        $query = $this->db->select('*')
            ->from($this->table)
            ->where('deleted_by', NULL)
            ->where('deleted_at', NULL)
            ->where('system_division_id', $division_id)
            ->where('rgv_report_type_id', $rgv_report_type_id)
            ->where('year', date('Y'))
            ->where('month', date('m'))
            ->order_by("ctr", "DESC");
        
        $result = $query->get()->result();

        if($result){
            return $result;
        }else{
            return 0;
        }
    }
}