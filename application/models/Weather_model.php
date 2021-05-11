<?php
class Weather_model extends CI_Model
{
	function get_citys()
	{
		$this->db->select('id_city, name');
		$query = $this->db->get('city');
		if($query->num_rows() > 0) return $query->result_array();
		else return FALSE;
	}
}
