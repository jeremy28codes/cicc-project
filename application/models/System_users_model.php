<?php
class System_users_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->table = 'system_users';
    }

    public function login($username)
    {
        
        $query = $this->db->select('*')
                ->from($this->table)
                ->where('deleted_at', NULL)
                ->where('deleted_by', NULL)
                ->where("username", $username)
                ->get(); 

        if ( $query->num_rows() == 1 )
        {
            return $query->result();
        }
        else
        {
            return FALSE;
        }
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

    public function getAllByDepartmentDivision($department_id, $division_id){
    	$query = $this->db->select('*')
                ->from($this->table)
                ->where('deleted_at', NULL)
                ->where('deleted_by', NULL);
                if ($department_id) {
                    $query->where('department_id', $department_id);
                }
                if ($division_id) {
                    $query->where('division_id', $division_id);
                }
        return $query->get()->result();
    }
}