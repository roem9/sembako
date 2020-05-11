<?php
    class Sembako_model extends CI_MODEL{
        public function get_all_penerima(){
            $this->db->from("penerima");
            $this->db->order_by("nama", "ASC");
            return $this->db->get()->result_array();
        }

        public function get_penerima_by_status($status){
            $this->db->from("penerima");
            $this->db->where("status", $status);
            $this->db->order_by("nama", "ASC");
            return $this->db->get()->result_array();
        }

        public function edit_by_id($id, $data){
            $this->db->where("id", $id);
            $this->db->update("penerima", $data);
            return $this->db->affected_rows();
        }
    }