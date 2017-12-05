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

class Discipline extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();  
        $this->load->model('discipline_model');
        $this->isLoggedIn(); 
    }
    
        /**
         * This function used to load the first screen of the user
         */
        public function index()
        {
             if($this->isjobprovider() == TRUE && $this->session->userdata('role') != 2 )
            {
                $this->loadThis();
            }
            $this->disciplineListing();
            
        }
    
    /**
     * This function is used to load the discipline list
     */
    function disciplineListing()
    {    
       
        if($this->isAdmin() == TRUE && $this->session->userdata('role') != 2 )
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('discipline_model');
        
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            
            $count = $this->discipline_model->disciplineListingCount($searchText);
            $segment = 4;
            $returns = $this->paginationCompress( "jobprovider/discipline/disciplineListing/", $count, 5, $segment );
            
            
            $data['disciplineRecords'] = $this->discipline_model->disciplineListing($searchText, $returns['page'], $returns['offset']);
            
            $this->global['pageTitle'] = 'Touba : Discipline Listing';
            $this->loadViews("jobprovider/discipline/disciplines", $this->global, $data, NULL);
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
            $this->load->model('discipline_model');
            $data = array();
            $this->global['pageTitle'] = 'Touba : Add New Discipline';

            $this->loadViews("jobprovider/discipline/addNew", $this->global, $data, NULL);
        }
    }

    
    
    /**
     * This function is used to add new user to the system
     */
    function addNewDiscipline()
    {
        if($this->isAdmin() == TRUE && $this->session->userdata('role') != 2)
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
                
                $disciplineInfo = array('name'=> $name, 'status'=> 1, 'deleted'=> 2, 'created_by'=>$this->vendorId, 'create_time'=>date('Y-m-d H:i:s'));
                
                $this->load->model('discipline_model');
                $result = $this->discipline_model->addNewDiscipline($disciplineInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Discipline created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Discipline creation failed');
                }
                
                redirect('jobprovider/Discipline/addNew');
            }
        }
    }

    
    /**
     * This function is used load discipline edit information
     * @param number $disciplineId : Optional : This is discipline id
     */
    function editOld($disciplineId = NULL)
    {
        if($this->isAdmin() == TRUE && $this->session->userdata('role') != 2)
        {
            $this->loadThis();
        }
        else
        {
            if($disciplineId == null)
            {
                redirect('jobprovider/discipline/disciplineListing');
            }
            
            
            $data['disciplineInfo'] = $this->discipline_model->getDisciplineInfo($disciplineId);
            
            $this->global['pageTitle'] = 'Touba : Edit Discipline';
            
            $this->loadViews("jobprovider/discipline/editOld", $this->global, $data, NULL);
        }
    }
    
    
    /**
     * This function is used to edit the discipline information
     */
    function editDiscipline()
    {
        if($this->isAdmin() == TRUE && $this->session->userdata('role') != 2)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $disciplineId = $this->input->post('id');
            
            $this->form_validation->set_rules('name','Name','trim|required|max_length[128]');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editOld($disciplineId);
            }
            else
            {
                $name = ucwords(strtolower($this->input->post('name')));
                
                $disciplineInfo = array();
                
                $disciplineInfo = array('name'=>$name, 'updated_by'=>$this->vendorId, 'update_time'=>date('Y-m-d H:i:s'));
                
                $result = $this->discipline_model->editDiscipline($disciplineInfo, $disciplineId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Discipline updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Discipline updation failed');
                }
                
                redirect('jobprovider/discipline/disciplineListing');
            }
        }
    }


    /**
     * This function is used to delete the discipline using id
     * @return boolean $result : TRUE / FALSE
     */
    function deleteDiscipline()
    {
 
        if($this->isAdmin() == TRUE && $this->session->userdata('role') != 2)
        {
            echo(json_encode(array('status'=>'access')));
        
        }
        else
        {
            $id = $this->input->post('id');
            $data = array('deleted'=>1,'updated_by'=>$this->vendorId, 'update_time'=>date('Y-m-d H:i:s'));
           
            $result = $this->discipline_model->deletediscipline($id, $data);
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