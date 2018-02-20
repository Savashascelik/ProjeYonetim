<?php //controller model ve vievlerin ortak noktada buluştuğu alan denebilir

class btr extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("btr_kayit_model");

    }

    public  function  index() {



        $listele= $this->btr_kayit_model->get_all();
        $viewDate["listeleme"]=$listele;

        $this->load->view("btr_liste", $viewDate); // view dosyamızı buraya çektik


    }
     public function insert_form () {

         $this->load->view("insert_form");
     }

     public function insert() {

    $ad_soyad   = $this->input->post("ad_soyad");
    $email      = $this->input->post("email");
    $telefon    = $this->input->post("telefon");
    $okul       = $this->input->post("okul");
    $adres      = $this->input->post("adres");
    $img= $_FILES["img_id"] ["name"];

    if($ad_soyad && $email && $telefon && $okul && $adres && $img) {

        $config ["upload_path"]= "upload/profil";
        $config ["allowed_types"]= "gif|jpg|png";

        $this->load->library("upload", $config);

        if ($this->upload->do_upload("img_id"))
        {
            $img_id=$this->upload->data("file_name");

            $data =array(
                "ad_soyad" => $ad_soyad,
                "email" => $email,
                "telefon" => $telefon,
                "okul" => $okul,
                "adres" => $adres,
                "img_id" => $img_id

            );

            $insert= $this->btr_kayit_model->insert($data);





            if ($insert){

                $alert=array(
                    "title" => "İşlem Başarılıdır",
                    "message" => "ekleme işlemi başarılı bir şekilde gerçekleştirilmiştir",
                    "type" => "success"
                );


            }
            else {

                $alert=array(
                    "title" => "İşlem Başarısız",
                    "message" => "Ekleme işlemi gerçekleşemedi",
                    "type" => "danger"
                );

            }

        }
        else
        {

            $alert=array(
                "title" => "İşlem Başarısız",
                "message" => "resim yüklemesinde sıkıntı var",
                "type" => "danger"
            );





        }



    }
    else {


        $alert=array(
            "title" => "İşlem Başarısız",
            "message" => "Alanları Doldurunuz",
            "type" => "danger"
        );




    }
         $this->session->set_flashdata("alert",$alert); //flash data yapmamızın nedeni hemen silisin diye
    redirect(base_url("btr"));

     }

     public function update_form($id){

        $where = array("id" => $id);

        $btr = $this->btr_kayit_model->get($where);

      $gosterdata["btr"] = $btr;


       $this->load->view("btr_duzenle",$gosterdata);
     }

     public function update($id) {

        $img = $_FILES["img_id"]["name"];

        if ($img){

            $config["upload_path"] = "upload/profil";
            $config["allowed_types"] = "gif|png|jpg";

            $this->load->library("upload", $config);

            $upload = $this->upload->do_upload("img_id");

            if ($upload){

                $data =array(
                    "ad_soyad" => $this->input->post("ad_soyad"),
                    "email" => $this->input->post("email"),
                    "telefon" => $this->input->post("telefon"),
                    "okul" => $this->input->post("okul"),
                    "adres" => $this->input->post("adres"),
             "img_id" => $this->upload->data("file_name")

         );





            }else {

                //hata
                echo "başarısız upload";
            }




        } else{


            $data =array(
                "ad_soyad" => $this->input->post("ad_soyad"),
                "email" => $this->input->post("email"),
                "telefon" => $this->input->post("telefon"),
                "okul" => $this->input->post("okul"),
                "adres" => $this->input->post("adres")


         );


        }

        $where = array("id" => $id);



       $update= $this->btr_kayit_model->update($where, $data);


         if ($update){

             $alert=array(
                 "title" => "İşlem başarılı",
                 "message" => "Güncelleme İşlemi Gerçekleşti",
                 "type" => "success"
             );

         }
         else {

             $alert=array(
                 "title" => "İşlem başarısız",
                 "message" => "Güncelleme İşlemi Başarısız",
                 "type" => "danger"
             );

         }

         $this->session->set_flashdata("alert",$alert);
         redirect(base_url("btr"));

     }

     public function delete($id) {

        $where =array("id" => $id);

$delete=$this->btr_kayit_model->delete($where);


if ($delete){

    $alert=array(
        "title" => "İşlem başarılı",
        "message" => "Silme İşlemi Gerçekleşti",
        "type" => "success"
    );

}else{

    $alert=array(
        "title" => "İşlem başarısız",
        "message" => "Silme İşlemi Gerçekleştirilemedi",
        "type" => "danger"
    );
}



         $this->session->set_flashdata("alert",$alert);
redirect(base_url());


     }

     public function order($field="id",$order="ASC") {

$listele=$this->btr_kayit_model->order_by($field,$order);
         $viewDate["listeleme"]=$listele;

         $this->load->view("btr_liste", $viewDate); // view dosyamızı buraya çektik
     }


}