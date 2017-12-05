<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Job_model extends CI_Model
{
    /**
     * This function is used to get the job listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function jobListingCount($searchText = '')
    {
        $this->db->select('BaseTbl.id, BaseTbl.name');
        $this->db->from('t_job as BaseTbl');
        
        
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.deleted', 2);
        $query = $this->db->get();
        
        return count($query->result());
    }
    
    /**
     * This function is used to get the job listing count
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function jobListing($searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.id, BaseTbl.name, job_type.name as job_type_name, discipline.name as discipline_name');
        $this->db->from('t_job as BaseTbl');
        $this->db->join('t_job_type as job_type', 'job_type.id = BaseTbl.job_type_id','left');
        $this->db->join('t_discipline as discipline', 'discipline.id = BaseTbl.discipline_id','left');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.deleted', 2);
        
        $this->db->limit($page, $segment);
        $query = $this->db->get();
   
        $result = $query->result();        
        return $result;
    }
    
    /**
     * This function is used to add new job to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewJob($data)
    {
        $this->db->trans_start();
        $this->db->insert('t_job', $data);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    /**
     * This function used to get job information by id
     * @param number $id : This is job id
     * @return array $result : This is job information
     */
    function getJobInfo($id)
    {
        $this->db->select('BaseTbl.id, BaseTbl.name, BaseTbl.discipline_id, BaseTbl.job_type_id, job_type.name as jobtype, discipline.name as discipline');
        $this->db->from('t_job as BaseTbl');
        $this->db->join('t_job_type as job_type', 'job_type.id = BaseTbl.job_type_id','left');
        $this->db->join('t_discipline as discipline', 'discipline.id = BaseTbl.discipline_id','left');
        $this->db->where('BaseTbl.deleted', 2);
		
        $this->db->where('BaseTbl.id', $id);
        $query = $this->db->get();
        return $query->result();
    }
    
    
    /**
     * This function is used to update the job information
     * @param array $data : This is job's updated information
     * @param number $id : This is job id
     */
    function editJob($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('t_job', $data);
        
        return TRUE;
    }
    
    
    
    /**
     * This function is used to delete the job information
     * @param number $id : This is job id
     * @return boolean $result : TRUE / FALSE
     */
    function deleteJob($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('t_job', $data);
        
        return $this->db->affected_rows();
    }
    
    
      /**
     * This function is used to get the jobs information
     * @return array $result : This is result of the query
     */
    function getJobList()
    {
        $this->db->select('id, name, status, discipline_id, job_type_id');
        $this->db->from('t_job');
        $query = $this->db->get();
        $this->db->where(array('deleted'=>2));
        return $query->result();
    }
    
    /**
     * This function is used to update the job information
     * @param array $data : This is job's updated information
     * @param number $id : This is job id
     */
    function saveJob($data, $id)
    {
        
        $this->db->trans_start();
        $this->db->insert('t_jobseeker_saved_applied_jobs', $data);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
        
    }
    

}

  