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
         if($this->isAdmin() == TRUE && $this->session->userdata('role') != 2)
        {
            $this->loadThis();
        }
        $this->global['pageTitle'] = 'Touba : Dashboard';
        
        $this->loadViews("dashboard", $this->global, NULL , NULL);
    }
    
    /**
     * This function is used to load the job list
     */
    function jobListing()
    {
        if($this->isAdmin() == TRUE && $this->session->userdata('role') != 2)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('job_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $count = $this->job_model->jobListingCount($searchText);
            $segment = 4;
            $returns = $this->paginationCompress( "jobprovider/job/jobListing/", $count, 5, $segment );
            
            
            $data['jobRecords'] = $this->job_model->jobListing($searchText, $returns['page'], $returns['offset']);
            
            $this->global['pageTitle'] = 'Touba : Job Listing';
            $this->loadViews("jobprovider/job/jobs", $this->global, $data, NULL);
        }
    }
    
    /**
     * This function is used to load the add new form
     */
    function addNew()
    {
        if($this->isAdmin() == TRUE && $this->session->userdata('role') != 2)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('jobtype_model');
            $data['job_types'] = $this->jobtype_model->getJobTypeList();
            
            $this->load->model('discipline_model');
            $data['disciplines'] = $this->discipline_model->getDisciplineList();
            
            $this->global['pageTitle'] = 'Touba : Add New Job';

            $this->loadViews("jobprovider/job/addNew", $this->global, $data, NULL);
        }
    }

    
    
    /**
     * This function is used to add new user to the system
     */
    function addNewJob()
    {
        if($this->isAdmin() == TRUE && $this->session->userdata('role') != 2)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('name','Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('job_type_id','Job type','trim|required|max_length[128]');
            $this->form_validation->set_rules('discipline_id','Discipline','trim|required|max_length[128]');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addNew();
            }
            else
            {
                $name = ucwords(strtolower($this->input->post('name')));
                $job_type_id = $this->input->post('job_type_id');
                $discipline_id = $this->input->post('discipline_id');
                
                $jobInfo = array('name'=> $name, 'job_type_id' => $job_type_id, 'discipline_id' => $discipline_id, 'status'=> 1, 'deleted'=> 2, 'created_by'=>$this->vendorId, 'create_time'=>date('Y-m-d H:i:s'));
                
                $this->load->model('job_model');
                $result = $this->job_model->addNewJob($jobInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Job created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Job creation failed');
                }
                
                redirect('jobprovider/job/addNew');
            }
        }
    }

    
    /**
     * This function is used load job edit information
     * @param number $jobId : Optional : This is job id
     */
    function editOld($jobId = NULL)
    {
        if($this->isAdmin() == TRUE && $this->session->userdata('role') != 2)
        {
            $this->loadThis();
        }
        else
        {
            if($jobId == null)
            {
                redirect('jobprovider/job/jobListing');
            }
            
            $this->load->model('jobtype_model');
            $data['job_types'] = $this->jobtype_model->getJobTypeList();
            
            $this->load->model('discipline_model');
            $data['disciplines'] = $this->discipline_model->getDisciplineList();
            
            $data['jobInfo'] = $this->job_model->getJobInfo($jobId);
            
            $this->global['pageTitle'] = 'Touba : Edit Job';
            
            $this->loadViews("jobprovider/job/editOld", $this->global, $data, NULL);
        }
    }
    
    
    /**
     * This function is used to edit the job information
     */
    function editJob()
    {
        if($this->isAdmin() == TRUE && $this->session->userdata('role') != 2)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $jobId = $this->input->post('id');
            
            $this->form_validation->set_rules('name','Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('job_type_id','Job type','trim|required|max_length[128]');
            $this->form_validation->set_rules('discipline_id','Discipline','trim|required|max_length[128]');
            
            
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editOld($jobId);
            }
            else
            {
                $name = ucwords(strtolower($this->input->post('name')));
                 $job_type_id = $this->input->post('job_type_id');
                $discipline_id = $this->input->post('discipline_id');
                
                
                
                $jobInfo = array('name'=>$name, 'job_type_id'=>$job_type_id, 'discipline_id' =>$discipline_id, 'updated_by'=>$this->vendorId, 'update_time'=>date('Y-m-d H:i:s'));
                
                $result = $this->job_model->editJob($jobInfo, $jobId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'job updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Job updation failed');
                }
                
                redirect('jobprovider/job/jobListing');
            }
        }
    }


    /**
     * This function is used to delete the job using id
     * @return boolean $result : TRUE / FALSE
     */
    function deleteJob()
    {
 
        if($this->isAdmin() == TRUE && $this->session->userdata('role') != 2)
        {
            echo(json_encode(array('status'=>'access')));
        
        }
        else
        {
            $id = $this->input->post('id');
            $data = array('deleted'=>1,'updated_by'=>$this->vendorId, 'update_time'=>date('Y-m-d H:i:s'));
           
            $result = $this->job_model->deleteJob($id, $data);
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
    

    function pageNotFound()
    {
        $this->global['pageTitle'] = 'Touba : 404 - Page Not Found';
        
        $this->loadViews("404", $this->global, NULL, NULL);
    }
    
    
    
}

?>