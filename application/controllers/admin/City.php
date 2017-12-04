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

class City extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('city_model');
        $this->isLoggedIn(); 
        
    }
    
    /**
     * This function used to load the first screen of the city
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
     * This function is used to load the city list
     */
    function cityListing()
    {
        
        
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('city_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $count = $this->city_model->cityListingCount($searchText);
            $segment = 4;
            $returns = $this->paginationCompress( "admin/city/cityListing/", $count, 5, $segment );
            
            
            $data['cityRecords'] = $this->city_model->cityListing($searchText, $returns['page'], $returns['offset']);
            
            $this->global['pageTitle'] = 'Touba : City Listing';
            $this->loadViews("admin/city/cities", $this->global, $data, NULL);
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
            $this->load->model('state_model');
            $data['states'] = $this->state_model->getStateList();
            
            $this->load->model('city_model');
            
            $this->global['pageTitle'] = 'Touba : Add New City';

            $this->loadViews("admin/city/addNew", $this->global, $data, NULL);
        }
    }

    
    
    /**
     * This function is used to add new user to the system
     */
    function addNewCity()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('name','Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('state_id','State','trim|required|max_length[128]');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addNew();
            }
            else
            {
                $name = ucwords(strtolower($this->input->post('name')));
                $state_id = $this->input->post('state_id');

                
                $cityInfo = array('name'=> $name, 'state_id' => $state_id, 'status'=> 1, 'deleted'=> 2, 'created_by'=>$this->vendorId, 'create_time'=>date('Y-m-d H:i:s'));
                
                $this->load->model('city_model');
                $result = $this->city_model->addNewCity($cityInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New City created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'City creation failed');
                }
                
                redirect('admin/City/addNew');
            }
        }
    }

    
    /**
     * This function is used load City edit information
     * @param number $cityId : Optional : This is city id
     */
    function editOld($cityId = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            if($cityId == null)
            {
                redirect('admin/city/cityListing');
            }
            
            $this->load->model('state_model');
            $data['states'] = $this->state_model->getStateList();
          
            $data['cityInfo'] = $this->city_model->getCityInfo($cityId);
            
            $this->global['pageTitle'] = 'Touba : Edit City';
            
            $this->loadViews("admin/city/editOld", $this->global, $data, NULL);
        }
    }
    
    
    /**
     * This function is used to edit the city information
     */
    function editCity()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $cityId = $this->input->post('id');
            
            $this->form_validation->set_rules('name','Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('state_id','State','trim|required|max_length[128]');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editOld($cityId);
            }
            else
            {
                $name = ucwords(strtolower($this->input->post('name')));
                $state_id = $this->input->post('state_id');
                
                
                $cityInfo = array('name'=>$name, 'state_id'=>$state_id, 'updated_by'=>$this->vendorId, 'update_time'=>date('Y-m-d H:i:s'));
             
                $result = $this->city_model->editCity($cityInfo, $cityId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'City updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'City updation failed');
                }
                
                redirect('admin/city/cityListing');
            }
        }
    }


    /**
     * This function is used to delete the city using id
     * @return boolean $result : TRUE / FALSE
     */
    function deleteCity()
    {
 
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        
        }
        else
        {
            $id = $this->input->post('id');
            $data = array('deleted'=>1,'updated_by'=>$this->vendorId, 'update_time'=>date('Y-m-d H:i:s'));
           
            $result = $this->city_model->deleteCity($id, $data);
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