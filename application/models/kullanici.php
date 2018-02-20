<?php
class  kullanici_model extends CI_Model {

    public function get($where=array()){

        $row=$this->where($where)->get("kullanici")->row();

return $row;
    }

}