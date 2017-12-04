<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Discipline_model extends CI_Model
{
    /**
     * This function is used to get the discipline listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function disciplineListingCount($searchText = '')
    {
        $this->db->select('BaseTbl.id, BaseTbl.name, BaseTbl.status');
        $this->db->from('t_discipline as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where(array('BaseTbl.deleted'=>2));
        $query = $this->db->get();
        
        return count($query->result());
    }
    
    /**
     * This function is used to get the discipline listing count
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function disciplineListing($searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.id, BaseTbl.name, BaseTbl.status');
        $this->db->from('t_discipline as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where(array( 'BaseTbl.deleted'=>2));
        $this->db->limit($page, $segment);
        $query = $this->db->get();
   
        $result = $query->result();        
        return $result;
    }
    
    /**
     * This function is used to add new discipline to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewDiscipline($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('t_discipline', $userInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }
    
    /**
     * This function used to get discipline information by id
     * @param number $id : This is discipline id
     * @return array $result : This is discipline information
     */
    function getDisciplineInfo($id)
    {
        $this->db->select('id, name');
        $this->db->from('t_discipline');
        $this->db->where(array('deleted'=>2));
        $query = $this->db->get();
        return $query->result();
    }
    
    
    /**
     * This function is used to update the discipline information
     * @param array $data : This is discipline's updated information
     * @param number $id : This is discipline id
     */
    function editDiscipline($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('t_discipline', $data);
        
        return TRUE;
    }
    
    
    
    /**
     * This function is used to delete the discipline information
     * @param number $id : This is discipline id
     * @return boolean $result : TRUE / FALSE
     */
    function deleteDiscipline($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('t_discipline', $data);
        
        return $this->db->affected_rows();
    }
    
    /**
     * This function is used to get the countries information
     * @return array $result : This is result of the query
     */
    function getDisciplineList()
    {
        $this->db->select('id, name, status');
        $this->db->from('t_discipline');
        $query = $this->db->get();
        $this->db->where(array('deleted'=>2));
        return $query->result();
    }
    

}

  