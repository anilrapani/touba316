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

class JobType extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('jobtype_model');
        $this->isLoggedIn(); 
        
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
         if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        $this->global['pageTitle'] = 'Touba : Dashboard';
        
        $this->loadViews("dashboard", $this->global, NULL , NULL);
    }
    
    /**
     * This function is used to load the job type list
     */
    function jobTypeListing()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('jobtype_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $count = $this->jobtype_model->jobtypeListingCount($searchText);
            $segment = 4;
            $returns = $this->paginationCompress( "admin/jobtype/jobtypeListing/", $count, 5, $segment );
            
            
            $data['jobtypeRecords'] = $this->jobtype_model->jobtypeListing($searchText, $returns['page'], $returns['offset']);
            
            $this->global['pageTitle'] = 'Touba : Jobtype Listing';
            $this->loadViews("admin/jobtype/jobtypes", $this->global, $data, NULL);
        }
    }

    
    /**
     * This function is used to load the add new form
     */
    function addNew()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('jobtype_model');
            $data = array();
            $this->global['pageTitle'] = 'Touba : Add New Job Type';

            $this->loadViews("admin/jobtype/addNew", $this->global, $data, NULL);
        }
    }

    
    
    /**
     * This function is used to add new user to the system
     */
    function addNewJobType()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('name','Name','trim|required|max_length[128]');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addNew();
            }
            else
            {
                $name = ucwords(strtolower($this->input->post('name')));
                
                $jobTypeInfo = array('name'=> $name, 'status'=> 1, 'deleted'=> 2, 'created_by'=>$this->vendorId, 'create_time'=>date('Y-m-d H:i:s'));
                
                $this->load->model('jobtype_model');
                $result = $this->jobtype_model->addNewJobType($jobTypeInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Job Type created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Job Type creation failed');
                }
                
                redirect('admin/jobtype/addNew');
            }
        }
    }

    
    /**
     * This function is used load jobtype edit information
     * @param number $jobtypeId : Optional : This is jobtype id
     */
    function editOld($jobtypeId = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            if($jobtypeId == null)
            {
                redirect('admin/jobtype/jobtypeListing');
            }
            
            
            $data['jobtypeInfo'] = $this->jobtype_model->getJobtypeInfo($jobtypeId);
         
            $this->global['pageTitle'] = 'Touba : Edit Jobtype';
            
            $this->loadViews("admin/jobtype/editOld", $this->global, $data, NULL);
        }
    }
    
    
    /**
     * This function is used to edit the jobtype information
     */
    function editJobtype()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $jobtypeId = $this->input->post('id');
            
            $this->form_validation->set_rules('name','Name','trim|required|max_length[128]');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editOld($jobtypeId);
            }
            else
            {
                $name = ucwords(strtolower($this->input->post('name')));
                
                $jobtypeInfo = array();
                
                $jobtypeInfo = array('name'=>$name, 'updated_by'=>$this->vendorId, 'update_time'=>date('Y-m-d H:i:s'));
                
                $result = $this->jobtype_model->editJobtype($jobtypeInfo, $jobtypeId);
               
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Job type updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Job type updation failed');
                }
                
                redirect('admin/jobtype/jobtypeListing');
            }
        }
    }


    /**
     * This function is used to delete the jobtype using id
     * @return boolean $result : TRUE / FALSE
     */
    function deleteJobtype()
    {
 
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        
        }
        else
        {
            $id = $this->input->post('id');
            $data = array('deleted'=>1,'updated_by'=>$this->vendorId, 'update_time'=>date('Y-m-d H:i:s'));
           
            $result = $this->jobtype_model->deleteJobtype($id, $data);
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