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

class State extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('state_model');
        $this->isLoggedIn(); 
        
    }
    
    /**
     * This function used to load the first screen of the state
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
     * This function is used to load the state list
     */
    function stateListing()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('state_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $count = $this->state_model->stateListingCount($searchText);
            $segment = 4;
            $returns = $this->paginationCompress( "admin/state/stateListing/", $count, 5, $segment );
            
            
            $data['stateRecords'] = $this->state_model->stateListing($searchText, $returns['page'], $returns['offset']);
            
            $this->global['pageTitle'] = 'Touba : State Listing';
            $this->loadViews("admin/state/states", $this->global, $data, NULL);
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
            $this->load->model('country_model');
            $data['countries'] = $this->country_model->getCountryList();
            
            $this->load->model('state_model');
            
            $this->global['pageTitle'] = 'Touba : Add New State';

            $this->loadViews("admin/state/addNew", $this->global, $data, NULL);
        }
    }

    
    
    /**
     * This function is used to add new user to the system
     */
    function addNewState()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('name','Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('country','Country','trim|required|max_length[128]');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addNew();
            }
            else
            {
                $name = ucwords(strtolower($this->input->post('name')));
                $country = $this->input->post('country');
                
                $stateInfo = array('name'=> $name, 'country_id' => $country, 'status'=> 1, 'deleted'=> 2, 'created_by'=>$this->vendorId, 'create_time'=>date('Y-m-d H:i:s'));
                
                $this->load->model('state_model');
                $result = $this->state_model->addNewState($stateInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New State created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'State creation failed');
                }
                
                redirect('admin/State/addNew');
            }
        }
    }

    
    /**
     * This function is used load state edit information
     * @param number $stateId : Optional : This is state id
     */
    function editOld($stateId = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            if($stateId == null)
            {
                redirect('admin/state/stateListing');
            }
            
            $this->load->model('country_model');
            $data['countries'] = $this->country_model->getCountryList();
            
            $data['stateInfo'] = $this->state_model->getStateInfo($stateId);
            
            $this->global['pageTitle'] = 'Touba : Edit State';
            
            $this->loadViews("admin/state/editOld", $this->global, $data, NULL);
        }
    }
    
    
    /**
     * This function is used to edit the state information
     */
    function editState()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $stateId = $this->input->post('id');
            
            $this->form_validation->set_rules('name','Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('country_id','Country','trim|required|max_length[128]');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editOld($stateId);
            }
            else
            {
                $name = ucwords(strtolower($this->input->post('name')));
                $country_id = $this->input->post('country_id');
                
                
                $stateInfo = array('name'=>$name, 'country_id'=>$country_id, 'updated_by'=>$this->vendorId, 'update_time'=>date('Y-m-d H:i:s'));
                
                $result = $this->state_model->editState($stateInfo, $stateId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'state updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'State updation failed');
                }
                
                redirect('admin/state/stateListing');
            }
        }
    }


    /**
     * This function is used to delete the state using id
     * @return boolean $result : TRUE / FALSE
     */
    function deleteState()
    {
 
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        
        }
        else
        {
            $id = $this->input->post('id');
            $data = array('deleted'=>1,'updated_by'=>$this->vendorId, 'update_time'=>date('Y-m-d H:i:s'));
           
            $result = $this->state_model->deleteState($id, $data);
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