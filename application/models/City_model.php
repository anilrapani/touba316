<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class City_model extends CI_Model
{
    /**
     * This function is used to get the city listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function cityListingCount($searchText = '')
    {
        $this->db->select('BaseTbl.id, BaseTbl.name');
        $this->db->from('t_city as BaseTbl');
        
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.deleted', 2);
        $query = $this->db->get();
        
        return count($query->result());
    }
    
    /**
     * This function is used to get the city listing count
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function cityListing($searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.id, BaseTbl.name, state.name as statename');
        $this->db->from('t_city as BaseTbl');
        $this->db->join('t_state as state', 'state.id = BaseTbl.state_id','left');
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
     * This function is used to add new city to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewCity($cityInfo)
    {
        $this->db->trans_start();
        $this->db->insert('t_city', $cityInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    /**
     * This function used to get city information by id
     * @param number $id : This is city id
     * @return array $result : This is city information
     */
    function getCityInfo($id)
    {
        $this->db->select('id, name, state_id');
        $this->db->from('t_city');
        $this->db->where('deleted', 2);
		
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }
    
    
    /**
     * This function is used to update the city information
     * @param array $data : This is city's updated information
     * @param number $id : This is city id
     */
    function editCity($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('t_city', $data);
        
        return TRUE;
    }
    
    
    
    /**
     * This function is used to delete the city information
     * @param number $id : This is city id
     * @return boolean $result : TRUE / FALSE
     */
    function deleteCity($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('t_city', $data);
        
        return $this->db->affected_rows();
    }

}

  