<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Uploadprogress_model extends CI_Model {
public function __construct()
{
parent::__construct();
}

function getprogress($pcid)
{   //Where ID is Client's ID, user type is 2

    $this->db->where('cid',$pcid);
	
    $this->db->where('deleted', 0);
    //$this->db->where('profile_pic', $profilepic);

    // access DB table 'user'
    $query=$this->db->get('progress_photos');

    // return/display result
    $result = $query->result();
    return $result;
	 
  } // closes 

// GET/ACCESS Progress Thumbnail
function getprogressthumb($pcid)
{   //Where ID is Client's ID, user type is 2
    $this->db->where('id',$pcid);
	$this->db->where('deleted', 0);

    // access DB table 'user'
    $query=$this->db->get('progress_photos');
	
    // return/display result
    $result = $query->result_array();
    return $result[0]['profile_thumb'];
     
  } // closes getprofilepic()
  
function add_image($data)
{
	$full_pic = $data['path_prefix'] . $data['path'] . $data['photo'] . $data['ext'];
	$full_thumb = $data['path_prefix'] . $data['path'] . $data['thumb_name'] . $data['ext'];
	//$pcid = $this->input->post('pcid');
    $pcid = $data['pcid'];
    //$this->db->insert('profile_pic',$data['profile_pic']);
    //$this->db->where('id', $pcid);
    $this->db->set('cid', $pcid);
    $this->db->set('photo', $full_pic);
    $this->db->set('photo_thumb', $full_thumb);
    $this->db->insert('progress_photos');
}}