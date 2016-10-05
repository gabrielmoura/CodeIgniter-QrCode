<?php

/**
 * User: gabrielmoura
 * Date: 04/10/16
 * Time: 23:39
 * Gerador de QrCode
 */
class Qrcode extends CI_Controller
{
    public function index()
    {
        if ($this->input->get()) {
            $this->load->view('lab/qrcode');
        } else {
            $this->output
                ->set_content_type('text/html')
                ->set_output("<h1 style='text-align: center'>Erro de parametros!</h1>");
        }
    }
}
