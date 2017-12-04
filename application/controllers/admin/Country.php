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

class Country extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('country_model');
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
     * This function is used to load the country list
     */
    function countryListing()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('country_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->country_model->countryListingCount($searchText);
            $segment = 4;
            $returns = $this->paginationCompress ( "admin/country/countryListing/", $count, 5, $segment );
            // http://demo.codesamplez.com/codeigniter/pagination-demo/3
            $data['countryRecords'] = $this->country_model->countryListing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = 'Touba : Country Listing';
            $this->loadViews("admin/country/countries", $this->global, $data, NULL);
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
            $data = array();
            $this->global['pageTitle'] = 'Touba : Add New Country';

            $this->loadViews("admin/country/addNew", $this->global, $data, NULL);
        }
    }

    
    
    /**
     * This function is used to add new user to the system
     */
    function addNewCountry()
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
                
                $countryInfo = array('name'=> $name, 'status'=> 1, 'deleted'=> 2, 'created_by'=>$this->vendorId, 'create_time'=>date('Y-m-d H:i:s'));
                
                $this->load->model('country_model');
                $result = $this->country_model->addNewCountry($countryInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Country created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Country creation failed');
                }
                
                redirect('admin/Country/addNew');
            }
        }
    }

    
    /**
     * This function is used load country edit information
     * @param number $countryId : Optional : This is country id
     */
    function editOld($countryId = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            if($countryId == null)
            {
                redirect('admin/country/countryListing');
            }
            
            
            $data['countryInfo'] = $this->country_model->getCountryInfo($countryId);
            
            $this->global['pageTitle'] = 'Touba : Edit Country';
            
            $this->loadViews("admin/country/editOld", $this->global, $data, NULL);
        }
    }
    
    
    /**
     * This function is used to edit the country information
     */
    function editCountry()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $countryId = $this->input->post('id');
            
            $this->form_validation->set_rules('name','Name','trim|required|max_length[128]');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editOld($countryId);
            }
            else
            {
                $name = ucwords(strtolower($this->input->post('name')));
                
                $countryInfo = array();
                
                $countryInfo = array('name'=>$name, 'updated_by'=>$this->vendorId, 'update_time'=>date('Y-m-d H:i:s'));
                
                $result = $this->country_model->editCountry($countryInfo, $countryId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'country updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Country updation failed');
                }
                
                redirect('admin/country/countryListing');
            }
        }
    }


    /**
     * This function is used to delete the country using id
     * @return boolean $result : TRUE / FALSE
     */
    function deleteCountry()
    {
 
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        
        }
        else
        {
            $id = $this->input->post('id');
            $data = array('deleted'=>1,'updated_by'=>$this->vendorId, 'update_time'=>date('Y-m-d H:i:s'));
           
            $result = $this->country_model->deleteCountry($id, $data);
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