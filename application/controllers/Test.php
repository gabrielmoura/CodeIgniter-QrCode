<?php

/**
 * User: gabrielmoura
 * Date: 04/10/16
 * Time: 23:39
 * Gerador de QrCode
 */
class Test extends CI_Controller
{
    public function index()
    {
        // here our data
        $name = 'Gabriel Moura';
        $sortName = 'Gabriel;Moura';
        $phone = '(000)0000-0000';
        $phonePrivate = '(000)0000-0000';
        $phoneCell = '(000)0000-0000';
        $orgName = 'test inc.';

        $email = 'test@example.com';

        // if not used - leave blank!
        $addressLabel = 'Our Office';
        $addressPobox = '';
        $addressExt = 'Suite 123';
        $addressStreet = '7th Avenue';
        $addressTown = 'New York';
        $addressRegion = 'NY';
        $addressPostCode = '0000000-000';
        $addressCountry = 'BR';


        // we building raw data
        $vcard = base_url('qrcode?d=');
        $vcard .= 'BEGIN:VCARD' . "\n";
        $vcard .= 'VERSION:2.1' . "\n";
        $vcard .= 'N:' . $sortName . "\n";
        $vcard .= 'FN:' . $name . "\n";
        $vcard .= 'ORG:' . $orgName . "\n";

        $vcard .= 'TEL;WORK;VOICE:' . $phone . "\n";
        $vcard .= 'TEL;HOME;VOICE:' . $phonePrivate . "\n";
        $vcard .= 'TEL;TYPE=cell:' . $phoneCell . "\n";

        $vcard .= 'ADR;TYPE=work;' .
            'LABEL="' . $addressLabel . '":'
            . $addressPobox . ';'
            . $addressExt . ';'
            . $addressStreet . ';'
            . $addressTown . ';'
            . $addressPostCode . ';'
            . $addressCountry
            . "\n";

        $vcard .= 'EMAIL:' . $email . "\n";

        $vcard .= 'END:VCARD';
        $vcard .= '&e=H';
        $this->output
            ->set_content_type('text/html')
            ->set_output("<img src='$vcard'>");


    }
}