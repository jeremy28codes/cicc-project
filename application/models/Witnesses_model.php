<?php
defined('BASEPATH') OR exit('No direct script access allowed');

clASs Witnesses_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->table = 'witnesses';
    }

    public function getAll()
    {
        $query = $this->db->select('a.*
                                    ,b.name as rgv_age_bracket_name
                                    ,c.name as rgv_sex_name
                                    ,d.name as rgv_marital_status_name')
            ->from($this->table.' a')
            ->join('system_reference_group_values b','a.rgv_age_bracket_id = b.id','left outer')
            ->join('system_reference_group_values c','a.rgv_sex_id = c.id','left outer')
            ->join('system_reference_group_values d','a.rgv_marital_status_id = d.id','left outer')
            ->where('a.deleted_by', NULL)
            ->where('a.deleted_at', NULL)
            ->where('b.deleted_by', NULL)
            ->where('b.deleted_at', NULL)
            ->where('c.deleted_by', NULL)
            ->where('c.deleted_at', NULL)
            ->where('d.deleted_by', NULL)
            ->where('d.deleted_at', NULL)
            ->order_by(1, "ASC")
            ->get();

        return $query->result();
    }

    public function get($id)
    {
        $query = $this->db->select('a.*
                                    ,b.name as rgv_age_bracket_name
                                    ,c.name as rgv_sex_name
                                    ,d.name as rgv_marital_status_name')
            ->from($this->table.' a')
            ->join('system_reference_group_values b','a.rgv_age_bracket_id = b.id','left outer')
            ->join('system_reference_group_values c','a.rgv_sex_id = c.id','left outer')
            ->join('system_reference_group_values d','a.rgv_marital_status_id = d.id','left outer')
            ->where('a.deleted_by', NULL)
            ->where('a.deleted_at', NULL)
            ->where('b.deleted_by', NULL)
            ->where('b.deleted_at', NULL)
            ->where('c.deleted_by', NULL)
            ->where('c.deleted_at', NULL)
            ->where('d.deleted_by', NULL)
            ->where('d.deleted_at', NULL)
            ->where('a.id', $id)
            ->order_by(1, "ASC")
            ->get();

        return $query->result();
    
    }

    public function getByReportID($id)
    {
        $query = $this->db->select('a.*
                                    ,b.name as rgv_age_bracket_name
                                    ,c.name as rgv_sex_name
                                    ,d.name as rgv_marital_status_name')
            ->from($this->table.' a')
            ->join('system_reference_group_values b','a.rgv_age_bracket_id = b.id','left outer')
            ->join('system_reference_group_values c','a.rgv_sex_id = c.id','left outer')
            ->join('system_reference_group_values d','a.rgv_marital_status_id = d.id','left outer')
            ->where('a.deleted_by', NULL)
            ->where('a.deleted_at', NULL)
            ->where('b.deleted_by', NULL)
            ->where('b.deleted_at', NULL)
            ->where('c.deleted_by', NULL)
            ->where('c.deleted_at', NULL)
            ->where('d.deleted_by', NULL)
            ->where('d.deleted_at', NULL)
            ->where('a.report_id', $id)
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