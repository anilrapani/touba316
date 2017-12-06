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
    
    
    function getDetails($id)
    {
        
        $this->db->select('BaseTbl.id, BaseTbl.name, BaseTbl.discipline_id, BaseTbl.job_type_id');
        $this->db->from('t_job as BaseTbl');
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
    
    /**
     * This function is used to get the job listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function jobSavedOrAppliedListingCount($searchText = '',$vendorId, $savedOrApplied)
    {
        $this->db->select('BaseTbl.id');
        $this->db->from('t_jobseeker_saved_applied_jobs as BaseTbl');
        $this->db->join('t_job', 't_job.id = BaseTbl.job_id','left');
        $this->db->where('BaseTbl.user_id_jobseeker', $vendorId);
        $this->db->where('BaseTbl.type', $savedOrApplied); 
        $this->db->where('BaseTbl.deleted', 2);
        $this->db->where('BaseTbl.status', 1);
        
        if(!empty($searchText)) {
            $likeCriteria = "(t_job.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        
        $query = $this->db->get();
        
        return count($query->result());
    }
    
    
     /**
     * This function is used to get the job listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function jobSavedOrAppliedListing($searchText = '', $page, $segment, $vendorId, $savedOrApplied)
    {
        $this->db->select('t_job.id, t_job.name, t_job_type.name as job_type_name, t_discipline.name as discipline_name');
        $this->db->from('t_jobseeker_saved_applied_jobs as BaseTbl');
        $this->db->join('t_job', 't_job.id = BaseTbl.job_id','left');
        $this->db->join('t_job_type', 't_job_type.id = t_job.job_type_id','left');
        $this->db->join('t_discipline', 't_discipline.id = t_job.discipline_id','left');
        $this->db->where('BaseTbl.deleted', 2);
        $this->db->where('BaseTbl.status', 1);
        $this->db->where('BaseTbl.user_id_jobseeker', $vendorId);
        $this->db->where('BaseTbl.type', $savedOrApplied); 
        if(!empty($searchText)) {
            $likeCriteria = "(t_job.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        return $query->result();        
        
        
    }
  
    
       /**
     * This function used to get job information by id
     * @param number $id : This is job id
     * @return array $result : This is job information
     */
    function checkIfAlreadySavedOrApplied($id, $vendorId)
    {
        $this->db->select('BaseTbl.type');
        $this->db->from('t_jobseeker_saved_applied_jobs as BaseTbl');
        $this->db->where('BaseTbl.job_id', $id);
        $this->db->where('BaseTbl.user_id_jobseeker', $vendorId);
        
        $this->db->order_by('BaseTbl.id', 'DESC');
        $this->db->limit(1);
        
        $query = $this->db->get();
        
        return $query->row();
    }
    
     /**
     * This function used to get job information by id
     * @param number $id : This is job id
     * @return array $result : This is job information
     */
    function checkIfJobseekerAlreadySaved($id, $vendorId)
    {
        $this->db->select('BaseTbl.id');
        $this->db->from('t_recruiter_save_jobseeker as BaseTbl');
        $this->db->where('BaseTbl.user_id_jobseeker', $id);
        $this->db->where('BaseTbl.user_id_recruiter', $vendorId);
        
        $query = $this->db->get();
        return count($query->result());
    }
    
    function getJobseekerInfo($id){
        $this->db->select('id,name');
        $this->db->from('t_user');
        $this->db->where('deleted', 2);
        $this->db->where('status', 1);
	$this->db->where('id', $id);
        $query = $this->db->get();
        
        return $query->result();
    }
    
    
     /**
     * This function is used to update the job information
     * @param array $data : This is job's updated information
     * @param number $id : This is job id
     */
    function saveJobSeeker($data)
    {
        
        $this->db->trans_start();
        $this->db->insert('t_recruiter_save_jobseeker', $data);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
        
    }
    
    
    
    /* This function is used to get the job listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function jobseekerListingCount($searchText = '')
    {
        $this->db->select('BaseTbl.id');
        $this->db->from('t_user as BaseTbl');
        $this->db->where('BaseTbl.role_id !=', 1); 
        $this->db->where('BaseTbl.deleted', 2);
        $this->db->where('BaseTbl.status', 1);
        
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        
        $query = $this->db->get();
        
        return count($query->result());
    }
    
    /* This function is used to get the job listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function jobseekerListing($searchText = '',$page, $segment)
    {
        $this->db->select('BaseTbl.id, BaseTbl.name');
        $this->db->from('t_user as BaseTbl');
        $this->db->where('BaseTbl.role_id !=', 1); 
        $this->db->where('BaseTbl.deleted', 2);
        $this->db->where('BaseTbl.status', 1);
        
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
          $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        return $query->result();
    }
    
    
    
     /**
     * This function is used to get the job listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function jobseekerSavedListingCount($searchText = '',$vendorId)
    {
        $this->db->select('BaseTbl.id');
        $this->db->from('t_recruiter_save_jobseeker as BaseTbl');
        $this->db->join('t_user', 't_user.id = BaseTbl.user_id_jobseeker','left');
        $this->db->where('BaseTbl.user_id_recruiter', $vendorId);
        $this->db->where('t_user.role_id !=', 1);
        $this->db->where('BaseTbl.deleted', 2);
        $this->db->where('BaseTbl.status', 1);
        
        if(!empty($searchText)) {
            $likeCriteria = "(t_user.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
         
        $query = $this->db->get();
        
        return count($query->result());
    }
    
    
     /**
     * This function is used to get the job listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function jobseekerSavedListing($searchText = '', $page, $segment, $vendorId)
    {
        $this->db->select('t_user.id, t_user.name');
        $this->db->from('t_recruiter_save_jobseeker as BaseTbl');
        $this->db->join('t_user', 't_user.id = BaseTbl.user_id_jobseeker','left');
        $this->db->where('BaseTbl.user_id_recruiter', $vendorId);
        $this->db->where('BaseTbl.deleted', 2);
        $this->db->where('BaseTbl.status', 1);
        
        if(!empty($searchText)) {
            $likeCriteria = "(t_user.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        return $query->result();
        
        
    }
  
    
    
    
}

  