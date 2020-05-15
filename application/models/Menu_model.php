<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model 
{

	public function getSubMenu()
	{
		$this->db->select('user_sub_menu.*,user_menu.menu');
		$this->db->from('user_sub_menu');
		$this->db->join('user_menu', 'user_menu.id = user_sub_menu.menu_id');
		return $query = $this->db->get()->result_array();

	}
	

}

/* End of file Menu_model.php */
/* Location: ./application/models/Menu_model.php */