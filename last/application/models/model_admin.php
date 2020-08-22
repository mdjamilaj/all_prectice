<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_admin extends CI_Model {

    public function did_delete_row($id, $oldattachment){
        $path = FCPATH . "assets/images/home_work/" . $id . "." . $oldattachment;
        if(is_file($path)){unlink($path);}
        $this->db->where('id', $id);
        $this->db->delete('home_work_attachment');
        return true;
    }

    public function insertData($data)
    {
        $this->db->insert('home_work', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }

    public function updateData($home_work_id, $data)
    {
		$this->db->where('id', $home_work_id);
		$this->db->update('home_work', $data);
    }

    public function delete_homework_after_expdate()
    {
		$sql = "SELECT * FROM `home_work` WHERE `exp_date`< NOW()";
		$data = $this->db->query($sql)->result();
		
		foreach ($data as $key => $value) {
			// var_dump($value->id);
			$attachmentData = $this->db->where('home_work_id', $value->id)->get('home_work_attachment')->result();

			foreach ($attachmentData as $k => $attvalue) {
				$path = FCPATH .'assets/images/home_work/'.$attvalue->id.'.'.$attvalue->attachment;
				if(is_file($path)){unlink($path);}
				$this->db->where('id', $attvalue->id)->delete('home_work_attachment');
			}
			$submitData = $this->db->where('home_work_id', $value->id)->get('home_work_submit_data')->result();

			foreach ($submitData as $i => $submitvalue) {
                $path = FCPATH .'assets/images/home_work_submit/'.$submitvalue->id.'.'.$submitvalue->attachment;
                if(is_file($path)){unlink($path);}
				$this->db->where('id', $submitvalue->id)->delete('home_work_submit_data');
			}
			$this->db->where('id', $value->id)->delete('home_work');
        }
        
        return "successfully Deleted!";
    }

}