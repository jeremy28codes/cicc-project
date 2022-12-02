<?php
defined('BASEPATH') OR exit('No direct script access allowed');

clASs Reports_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->table = 'reports';
    }

    public function getAll()
    {
        $query = $this->db->select('a.*
                                    ,b.name as report_type,
                                    ,c.last_name as victim_last_name
                                    ,c.first_name as victim_first_name
                                    ,c.middle_name as victim_middle_name
                                    ,CONCAT(c.last_name,", ",c.first_name," ",c.middle_name) as victim_name')
            ->from($this->table.' a')
            ->join('system_reference_group_values b', 'a.rgv_report_type_id = b.id', 'left outer')
            ->join('victims c', 'a.id = c.report_id', 'left outer')
            ->where('a.deleted_by', NULL)
            ->where('a.deleted_at', NULL)
            ->where('b.deleted_by', NULL)
            ->where('b.deleted_at', NULL)
            ->where('c.deleted_by', NULL)
            ->where('c.deleted_at', NULL)
            ->order_by(1, "DESC")
            ->get();

        return $query->result();
    }

    public function getAllWithFilter($filters)
    {
        $query = $this->db->select('a.*
                                    ,b.name as report_type
                                    ,c.last_name as victim_last_name
                                    ,c.first_name as victim_first_name
                                    ,c.middle_name as victim_middle_name
                                    ,CONCAT(c.last_name,", ",c.first_name," ",c.middle_name) as victim_name')
            ->from($this->table.' a')
            ->join('system_reference_group_values b', 'a.rgv_report_type_id = b.id', 'left outer')
            ->join('victims c', 'a.id = c.report_id', 'left outer')
            ->join('report_assessments d', 'a.id = d.report_id', 'left outer')
            ->join('system_reference_group_values e', 'd.rgv_report_category_id = e.id', 'left outer')
            ->where('a.deleted_by', NULL)
            ->where('a.deleted_at', NULL)
            ->where('b.deleted_by', NULL)
            ->where('b.deleted_at', NULL)
            ->where('c.deleted_by', NULL)
            ->where('c.deleted_at', NULL)
            ->where('d.deleted_by', NULL)
            ->where('d.deleted_at', NULL)
            ->where('e.deleted_by', NULL)
            ->where('e.deleted_at', NULL);
        if ($filters["searchString"]) {
            $query->group_start()
                    ->like("a.reference_number", $filters["searchString"])
                    ->or_like("a.description_of_incident", $filters["searchString"])
                    ->or_like("a.actions_taken", $filters["searchString"])
                    ->or_like("a.after_status_report", $filters["searchString"])
                    ->or_like("a.remarks", $filters["searchString"])
                    ->or_like("a.date_received", $filters["searchString"])
                    ->or_like("a.time_received", $filters["searchString"])
                    ->or_like("a.time_received", $filters["searchString"])
                    ->or_like("b.name", $filters["searchString"])
                    ->or_like("c.last_name", $filters["searchString"])
                    ->or_like("c.first_name", $filters["searchString"])
                    ->or_like("c.middle_name", $filters["searchString"])
                    ->or_like("a.officer_on_case", $filters["searchString"])
                    ->or_like("e.name", $filters["searchString"])
                    // ->or_like("CONCAT(c.last_name,', ',c.first_name,' ',c.middle_name)", $filters["searchString"])
                ->group_end();
		}
        if ($filters["rgv_report_type_id"]) {
            $query->where('a.rgv_report_type_id', $filters["rgv_report_type_id"]);
        }
        if ($filters["date_received"]) {
            $query->where('a.date_received', $filters["date_received"]);
        }
        if ($filters["officer_on_case"]) {
            $query->where('a.officer_on_case', $filters["officer_on_case"]);
        }
        $query->order_by(1, "DESC");
              
        return $query->get()->result();
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