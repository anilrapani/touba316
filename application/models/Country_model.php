<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Country_model extends CI_Model
{
    /**
     * This function is used to get the country listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function countryListingCount($searchText = '')
    {
        $this->db->select('BaseTbl.id, BaseTbl.name');
        $this->db->from('t_country as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.deleted', 2);
        $query = $this->db->get();
        
        return count($query->result());
    }
    
    /**
     * This function is used to get the country listing count
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function countryListing($searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.id, BaseTbl.name');
        $this->db->from('t_country as BaseTbl');
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
     * This function is used to add new country to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewCountry($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('t_country', $userInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    /**
     * This function used to get country information by id
     * @param number $id : This is country id
     * @return array $result : This is country information
     */
    function getCountryInfo($id)
    {
        $this->db->select('id, name');
        $this->db->from('t_country');
        $this->db->where('deleted', 2);
		
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }
    
    
    /**
     * This function is used to update the country information
     * @param array $data : This is country's updated information
     * @param number $id : This is country id
     */
    function editCountry($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('t_country', $data);
        
        return TRUE;
    }
    
    
    
    /**
     * This function is used to delete the country information
     * @param number $id : This is country id
     * @return boolean $result : TRUE / FALSE
     */
    function deleteCountry($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('t_country', $data);
        
        return $this->db->affected_rows();
    }

}

  