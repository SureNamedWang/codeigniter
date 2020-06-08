<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('User_model' , 'user');
        $this->load->library('session');

    }

    public function index()
    {

        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('Login');
       
        $this->load->view('templates/footer');
        //  $this->load->view('templates/footer');
    }

    public function cekLogin()
    {

        if ($this->input->post('loginSubmit')) {


            $NIK = $this->input->post('NIK');
            $password = $this->input->post('password');
            $serviceUnitId = $this->input->post('idServiceUnit');

            // form validation
            $this->form_validation->set_rules("NIK", "NIK", "trim|required|xss_clean");
            $this->form_validation->set_rules("password", "Password", "trim|required|xss_clean");

            if ($this->form_validation->run() == FALSE) {
                // validation fail
                $this->load->view('Login');
                //echo validation_errors();
            } else {
                // check for userModel credentials
                $uresult = $this->user->getUser($NIK, $password);

                if (count($uresult) > 0) {
                    // set session
                    // $sess_data = array('login' => TRUE, 'uname' => $uresult[0]->username, 'uid' => $uresult[0]->id,'utype'=>$uresult[0]->type);
                    //$this->session->set_userdata($sess_data);
                    //redirect("POS/outlet");

                    $cookie_data = array(
                        'name' => 'login',
                        'value' => 'true',
                        'expire' => '86500',
                    );
                    $this->input->set_cookie($cookie_data);

                    $cookie_data = array(
                        'name' => 'NIK',
                        'value' => $uresult[0]->nik,
                        'expire' => '86500',
                    );
                    $this->input->set_cookie($cookie_data);
                      $cookie_data = array(
                        'name' => 'role',
                        'value' => $uresult[0]->role,
                        'expire' => '86500',
                    );
                    $this->input->set_cookie($cookie_data);

                    // $cookie_data = array(
                    //     'name' => 'name',
                    //     'value' => $uresult[0]->name,
                    //     'expire' => '86500',
                    // );
                    // $this->input->set_cookie($cookie_data);

                  

                    $cookie_data = array(
                        'name' => 'serviceUnitId',
                        'value' => $serviceUnitId,
                        'expire' => '86500',
                    );
                    $this->input->set_cookie($cookie_data);

                    redirect(base_url().'Home/');
                    // if( $uresult[0]->type==1)
                    // {
                    //     redirect(base_url().'Home/');
                    // }else  if( $uresult[0]->type==2)
                    // {
                    //     redirect(base_url().'HealthWorkers/Detail');
                    // }
                    // else
                    // {
                    //     redirect(base_url().'Admin/');
                    // }





                } else {

                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Wrong User Name or Password!</div>');
                    $this->load->view('templates/header');
                    $this->load->view('templates/navbar');
                    $this->load->view('Login');
                    $this->load->view('templates/footer');
                }
            }


        }

    }

    function logout()
    {

        $this->session->sess_destroy();

        delete_cookie('login');
        delete_cookie('NIK');
        delete_cookie('serviceUnitId');
       
        redirect(base_url().'Login/');
    }
}