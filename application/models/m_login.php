<?php

class m_login extends CI_model {
    
    public function proses_login($email,$pass)
    {
        $password = $pass;
        $email = $this->db->where('email', $email);
        $pass = $this->db->where('password', $pass);
        $query = $this->db->get('user');
        if ($query->num_rows()>0) {
            foreach ($query->result() as $row) {
                $sess = array(
                    'userID'       =>  $row->userID ,
                    'username'     =>  $row->username ,
                    'password'     =>  $row->password ,
                    'email'        =>  $row->email ,
                    'nama_lengkap' =>  $row->nama_lengkap ,
                    'level'        =>  $row->level ,
                );
                $this->session->set_userdata($sess);
            }
        redirect('dashboard');
        }else{
            $this->session->set_flashdata('info', '<div class="alert alert-denger" role="alert">username dan password salah silahkan coba lagi</div>');
            redirect('auth/index');

        }
}
}