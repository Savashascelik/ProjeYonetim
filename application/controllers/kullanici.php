<?php
class kullanici extends CI_Controller {

    public function index(){
        $this->load->helper("captcha");
        $vals = array(
            'word'          => '',
            'img_path'      => 'captcha_image/',
            'img_url'       => base_url("captcha_image"),
            'font_path'     => 'font/corbel.ttf',
            'img_width'     => '135',
            'img_height'    => 45,
            'expiration'    => 7200,
            'word_length'   => 5,
            'font_size'     => 20,
            'img_id'        => 'myCap',
            'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

            // White background and border, black text and red grid
            'colors'        => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40)
            )
        );
        $captcha=create_captcha($vals);

        $viewdata["captcha"]=$captcha["image"];

$this->session->set_flashdata("code",$captcha["word"]);
        $this->load->view("login", $viewdata);
    }
public function login(){

$email=$this->input->post("email");
$pass=$this->input->post("pass");
$captcha=$this->input->post("captcha");
if (!$email||!$pass||!$captcha){




}else{

    if ($captcha== $this->session->userdata("code"))
    {

        $this->load->model("kullanici_model");
        $where=array(
            "email" =>$email,
            "sifre" =>$pass
        );
       $row= $this->kullanci->get($where);

        $alert=array(
            "title" => "Giriş işlemi Başarılıdır",
            "message" => "Hoş geldiniz",
            "type" => "success"

        );
        $this->session->set_flashdata("alert",$alert); //flash data yapmamızın nedeni hemen silisin diye
        redirect(base_url("btr"));

    }
    else{
        $alert=array(
            "title" => "Giriş işlemi hatalı",
            "message" => "Lütfen alanları doğru giriniz",
            "type" => "danger"

        );
        $this->session->set_flashdata("alert",$alert); //flash data yapmamızın nedeni hemen silisin diye
        redirect(base_url("kullanici"));


    }






}





}
    public  function  logout(){


    }


}