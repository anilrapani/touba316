<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class State_model extends CI_Model
{
    /**
     * This function is used to get the state listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function stateListingCount($searchText = '')
    {
        $this->db->select('BaseTbl.id, BaseTbl.name');
        $this->db->from('t_state as BaseTbl');
        
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.deleted', 2);
        $query = $this->db->get();
        
        return count($query->result());
    }
    
    /**
     * This function is used to get the state listing count
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function stateListing($searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.id, BaseTbl.name, country.name as countryname');
        $this->db->from('t_state as BaseTbl');
        $this->db->join('t_country as country', 'country.id = BaseTbl.country_id','left');
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
     * This function is used to add new state to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewState($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('t_state', $userInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    /**
     * This function used to get state information by id
     * @param number $id : This is state id
     * @return array $result : This is state information
     */
    function getStateInfo($id)
    {
        $this->db->select('id, name, country_id');
        $this->db->from('t_state');
        $this->db->where('deleted', 2);
		
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }
    
    
    /**
     * This function is used to update the state information
     * @param array $data : This is state's updated information
     * @param number $id : This is state id
     */
    function editState($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('t_state', $data);
        
        return TRUE;
    }
    
    
    
    /**
     * This function is used to delete the state information
     * @param number $id : This is state id
     * @return boolean $result : TRUE / FALSE
     */
    function deleteState($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('t_state', $data);
        
        return $this->db->affected_rows();
    }
    
    
      /**
     * This function is used to get the states information
     * @return array $result : This is result of the query
     */
    function getStateList()
    {
        $this->db->select('id, name, status');
        $this->db->from('t_state');
        $query = $this->db->get();
        $this->db->where(array('deleted'=>2));
        return $query->result();
    }
    


}

  