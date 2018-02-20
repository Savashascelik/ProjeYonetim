<?php

class btr_kayit_model extends CI_Model {

public function get_all(){

       $result= $this->db->get("btr")->result();

       return $result;
}

public function get($where){

    $result= $this->db->where($where) ->get("btr")->row();

    return $result;

}

public function insert($data) {
            $insert =$this->db->insert("btr",$data);
            return $insert;

}
public function update($where,$data){

    $update=$this->db->where($where)->update("btr", $data);
    return $update;


}
public function delete($id){

    $delete= $this->db->where($id)->delete("btr");
return $delete;

}

public function order_by($field,$order){

    $result= $this->db->order_by($field,$order)->get("btr")->result();

    return $result;


}

}