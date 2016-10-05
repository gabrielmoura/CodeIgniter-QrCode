<?php

/**
 * User: gabrielmoura
 * Date: 04/10/16
 * Time: 23:39
 * Gerador de QrCode
 */
class Test extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Qrcode');
    }

    public function index()
    {
        $smodel = base_url('qrcode?d=');
        $smodel .= 'Teste';

        $mecard = $this->Qrcode->mecard('Moura', 'Gabriel', '00 0000-0000', '00 00000-0000', 'Rua da Ficticia 123');
        $wifi = $this->Qrcode->wifi('SSID', 'WPA', 'SENHA1234', false);

        $this->output
            ->set_content_type('text/html')
            ->set_output("<h1>Teste1</h1><img src='$mecard'><br><h1>teste2</h1><img src='$wifi'><br><h1>Teste3</h1><img src='$smodel'>");


    }
}