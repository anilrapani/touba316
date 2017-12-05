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
            $segment = 4;
            $returns = $this->paginationCompress( "jobprovider/job/jobListing/", $count, 5, $segment );
            
            
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
            $data['jobInfo'] = $this->job_model->getJobInfo($jobId);
            $this->loadViews("jobseeker/job/detail", $this->global, $data, NULL);
      
    }
    
       /**
     * This function is used to load the job list
     */
    function save()
    {   
            $job_id = $this->input->post('job_id');
            $jobInfo = array( 'job_id' => $job_id, 'user_id_jobseeker' => $this->vendorId, 'status'=> 1, 'deleted'=> 2, 'created_by'=>$this->vendorId, 'create_time'=>date('Y-m-d H:i:s'));
            $this->load->model('job_model');
            $result = $this->job_model->saveJob($jobInfo, $job_id);
            redirect('job/list');
     }
    
    
    function pageNotFound()
    {
        $this->global['pageTitle'] = 'Touba : 404 - Page Not Found';
        
        $this->loadViews("404", $this->global, NULL, NULL);
    }
}

?>