<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Upload_model extends CI_Model {
public function __construct()
{
parent::__construct();
}
function add_image($data)
{
	$full_pic = $data['path_prefix'] . $data['path'] . $data['profile_pic'] . $data['ext'];
	$full_thumb = $data['path_prefix'] . $data['path'] . $data['thumb_name'] . $data['ext'];
	$pcid = $this->input->post('pcid');
    //$this->db->insert('profile_pic',$data['profile_pic']);
    $this->db->where('id', $pcid);
    $this->db->set('profile_pic', $full_pic);
    $this->db->set('profile_thumb', $full_thumb);
    $this->db->update('user');
}
}