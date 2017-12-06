<?php
require APPPATH . '/libraries/BaseController.php';
/* 
 * Copyright (C) 2017 Kastech
 * @project : touba316
 * @author : Anil Rapani
 * @email : arapani@kastechindia.com
 * @since : Dec 2, 2017
 * @version : 
 */

class Job extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('job_model');
        $this->isLoggedIn(); 
        
    }
    
    /**
     * This function used to load the first screen of the job
     */
    public function index()
    {
        $this->global['pageTitle'] = 'Touba : Dashboard';
        
        $this->loadViews("dashboard", $this->global, NULL , NULL);
    }
    
    /**
     * This function is used to load the job list
     */
    function jobListing()
    {
     
            $this->load->model('job_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $count = $this->job_model->jobListingCount($searchText);
            $segment = 3;
            $returns = $this->paginationCompress( "job/list/", $count, 5, $segment );
            
            
            $data['jobRecords'] = $this->job_model->jobListing($searchText, $returns['page'], $returns['offset']);
            
            $this->global['pageTitle'] = 'Touba : Job Listing';
            $this->loadViews("jobseeker/job/jobs", $this->global, $data, NULL);
      
    }
    
     /**
     * This function is used to load the job list
     */
    function jobDetail($jobId)
    {
            $this->load->model('job_model');
            $this->global['pageTitle'] = 'Touba : Job Detail';
            $this->load->model('job_model');
            $vendorId = $this->vendorId;
            
            $data['savedOrApplied'] = $this->job_model->checkIfAlreadySavedOrApplied($jobId,$vendorId);
            $data['jobInfo'] = $this->job_model->getJobInfo($jobId);
            $this->loadViews("jobseeker/job/detail", $this->global, $data, NULL);
      
    }
    
       /**
     * This function is used to load the job list
     */
    function save()
    {   
            $job_id = $this->input->post('job_id');
            $type = $this->input->post('submit');
            $type = ($type == 'Save')?1:2;
            $jobInfo = array( 'job_id' => $job_id, 'type' => $type, 'user_id_jobseeker' => $this->vendorId, 'status'=> 1, 'deleted'=> 2, 'created_by'=>$this->vendorId, 'create_time'=>date('Y-m-d H:i:s'));
            $this->load->model('job_model');
            $result = $this->job_model->saveJob($jobInfo, $job_id);
            redirect('job/list');
     }
    
     
       /**
     * This function is used to load the job list
     */
    function savedList()
    {   
            $this->load->model('job_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            $vendorId = $this->vendorId;
            $count = $this->job_model->jobSavedOrAppliedListingCount($searchText,$vendorId, 1);
            $segment = 3;
            $returns = $this->paginationCompress( "job/savedList/", $count, 5, $segment );
            
            $data['jobRecords'] = $this->job_model->jobSavedOrAppliedListing($searchText, $returns['page'], $returns['offset'],$vendorId, 1);
            
            $this->global['pageTitle'] = 'Touba : Job Saved Listing';
            $this->loadViews("jobseeker/job/jobs", $this->global, $data, NULL);
      
    }
    
      /**
     * This function is used to load the job list
     */
    function appliedList()
    {   
            $this->load->model('job_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            $vendorId = $this->vendorId;
            $count = $this->job_model->jobSavedOrAppliedListingCount($searchText,$vendorId, 2);
            $segment = 3;
            $returns = $this->paginationCompress( "job/appliedList/", $count, 5, $segment );
            
            $data['jobRecords'] = $this->job_model->jobSavedOrAppliedListing($searchText, $returns['page'], $returns['offset'],$vendorId, 2);
            
            $this->global['pageTitle'] = 'Touba : Job Applied Listing';
            $this->loadViews("jobseeker/job/jobs", $this->global, $data, NULL);
      
    }
    
    
    function pageNotFound()
    {
        $this->global['pageTitle'] = 'Touba : 404 - Page Not Found';
        
        $this->loadViews("404", $this->global, NULL, NULL);
    }
}

?>