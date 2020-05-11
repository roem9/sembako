<?php
class Admin extends CI_CONTROLLER{
    public function __construct(){
        parent::__construct();
        $this->load->model('Sembako_model');
        if($this->session->userdata('status') != "login"){
            $this->session->set_flashdata('login', 'Maaf, Anda harus login terlebih dahulu');
			redirect(base_url("login"));
		}
    }

    public function index(){
        $data['title'] = "List Penerima Sembako";
        $data['tab'] = "index";

        $data['user'] = [
            "semua" => COUNT($this->Sembako_model->get_all_penerima()),
            "belum" => COUNT($this->Sembako_model->get_penerima_by_status("belum")),
            "sudah" => COUNT($this->Sembako_model->get_penerima_by_status("sudah"))
        ];

        $data['penerima'] = $this->Sembako_model->get_all_penerima();
        $this->load->view("templates/header", $data);
        $this->load->view("page/index", $data);
        $this->load->view("templates/footer", $data);
    }

    public function belum_menerima(){
        $data['title'] = "List Yang Belum Menerima Sembako";
        $data['tab'] = "belum";
        $data['user'] = [
            "semua" => COUNT($this->Sembako_model->get_all_penerima()),
            "belum" => COUNT($this->Sembako_model->get_penerima_by_status("belum")),
            "sudah" => COUNT($this->Sembako_model->get_penerima_by_status("sudah"))
        ];

        $data['penerima'] = $this->Sembako_model->get_penerima_by_status("belum");

        $this->load->view("templates/header", $data);
        $this->load->view("page/index", $data);
        $this->load->view("templates/footer", $data);
    }

    public function sudah_menerima(){
        $data['title'] = "List Yang Telah Menerima Sembako";
        $data['tab'] = "sudah";
        $data['user'] = [
            "semua" => COUNT($this->Sembako_model->get_all_penerima()),
            "belum" => COUNT($this->Sembako_model->get_penerima_by_status("belum")),
            "sudah" => COUNT($this->Sembako_model->get_penerima_by_status("sudah"))
        ];

        $data['penerima'] = $this->Sembako_model->get_penerima_by_status("sudah");

        $this->load->view("templates/header", $data);
        $this->load->view("page/index", $data);
        $this->load->view("templates/footer", $data);
    }

    public function edit_by_id($id, $status){
        if($status == "belum"){
            $data = [
                "status" => $status,
                "waktu" => date("Y-m-d H:i:s")
            ];
        } else if($status == "sudah"){
            $data = [
                "status" => $status,
            ];
        }

        $result = $this->Sembako_model->edit_by_id($id, $data);

        if($result)
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil mengganti status penerima<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        else
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal mengganti status penerima<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect($_SERVER['HTTP_REFERER']);

    }
}