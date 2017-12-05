<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Jobtype_model extends CI_Model
{
    /**
     * This function is used to get the Jobtype listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function jobtypeListingCount($searchText = '')
    {
        $this->db->select('BaseTbl.id, BaseTbl.name, BaseTbl.status');
        $this->db->from('t_job_type as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where(array('BaseTbl.deleted'=>2));
        $query = $this->db->get();
        
        return count($query->result());
    }
    
    /**
     * This function is used to get the job_type listing count
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function jobtypeListing($searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.id, BaseTbl.name, BaseTbl.status');
        $this->db->from('t_job_type as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where(array( 'BaseTbl.deleted'=>2));
        $this->db->limit($page, $segment);
        $query = $this->db->get();
   
        $result = $query->result();        
        return $result;
    }
    
    /**
     * This function is used to add new job_type to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewJobType($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('t_job_type', $userInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    /**
     * This function used to get jobtype information by id
     * @param number $id : This is jobtype id
     * @return array $result : This is jobtype information
     */
    function getJobtypeInfo($id)
    {
        $this->db->select('id, name');
        $this->db->from('t_job_type');
        $this->db->where(array('deleted'=>2));
        $query = $this->db->get();
        return $query->result();
    }
    
    
    /**
     * This function is used to update the jobtype information
     * @param array $data : This is jobtype's updated information
     * @param number $id : This is jobtype id
     */
    function editJobtype($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('t_job_type', $data);
        
        return TRUE;
    }
    
    
    
    /**
     * This function is used to delete the jobtype information
     * @param number $id : This is jobtype id
     * @return boolean $result : TRUE / FALSE
     */
    function deleteJobtype($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('t_job_type', $data);
        
        return $this->db->affected_rows();
    }
    
    /**
     * This function is used to get the countries information
     * @return array $result : This is result of the query
     */
    function getJobTypeList()
    {
        $this->db->select('id, name, status');
        $this->db->from('t_job_type');
        $query = $this->db->get();
        $this->db->where(array('deleted'=>2));
        return $query->result();
    }
    
}

  
