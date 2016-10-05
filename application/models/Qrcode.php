<?php

/**
 * User: Gabriel Moura
 * Date: 05/10/16
 * Time: 18:07
 */
class Qrcode extends CI_Model
{
    private function setprefix()
    {
        /**
         * Url do gerador de QrCode
         */
        return base_url('qrcode?d=');
    }

    private function setsufix()
    {
        /**
         * Parametros caso seja necessário.
         */
        return '';
    }

    public function wifi($ssid, $type, $pass, $hide)
    {
        /**
         * SSID
         * Type 'WPA' ou 'WEP'
         * Pass 'Senha com no minimo 8 caracteres'
         * Hide 'true' ou 'false'
         */
        if ($hide == false) {
            return $this->setprefix() . urlencode('WIFI:S:' . $ssid . ';T:' . $type . ';P:' . $pass . ';;') . $this->setsufix();
        } else {
            return $this->setprefix() . urlencode('WIFI:S:' . $ssid . ';T:' . $type . ';P:' . $pass . ';H:' . $hide . ';') . $this->setsufix();
        }
    }

    public function linkedin($linkNome)
    {

        return $this->setprefix() . urlencode('https://www.linkedin.com/in/' . $linkNome) . $this->setsufix();
    }

    public function facebook($linkNome)
    {
        return $this->setprefix() . urlencode('https://fb.com/' . $linkNome) . $this->setsufix();
    }

    public function loc($latitude, $longitude)
    {
        /**
         * Caso não funcione é necessário por um traço nas coordenadas.
         * Exemplo:
         * -22.650167,-43.029389
         */

        return $this->setprefix() . urlencode('geo:' . $latitude . ',' . $longitude) . $this->setsufix();
    }

    public function youtube($videoURL)
    {
        return $this->setprefix() . urlencode('https://www.youtube.com/watch?v=' . $videoURL) . $this->setsufix();
    }

    public function vcard2($name, $sortName, $phone, $phonePrivate, $phoneCell, $orgName, $email, $addressLabel, $addressPobox, $addressExt, $addressStreet, $addressTown, $addressPostCode, $addressCountry)
    {
        $vcard = 'BEGIN:VCARD' . '\n';
        $vcard .= 'VERSION:2.1' . '\n';
        $vcard .= 'N:' . $sortName . '\n';
        $vcard .= 'FN:' . $name . '\n';
        $vcard .= 'ORG:' . $orgName . '\n';

        $vcard .= 'TEL;WORK;VOICE:' . $phone . '\n';
        $vcard .= 'TEL;HOME;VOICE:' . $phonePrivate . '\n';
        $vcard .= 'TEL;TYPE=cell:' . $phoneCell . '\n';

        $vcard .= 'ADR;TYPE=work;' .
            'LABEL=' . $addressLabel . ':'
            . $addressPobox . ';'
            . $addressExt . ';'
            . $addressStreet . ';'
            . $addressTown . ';'
            . $addressPostCode . ';'
            . $addressCountry
            . '\n';

        $vcard .= 'EMAIL:' . $email . '\n';
        $vcard .= 'END:VCARD';
        return $this->setprefix() . urlencode($vcard) . $this->setsufix();

    }

    public function event($titulo, $dateInicio, $dateTermino, $endereco, $description)
    {
        $vcalendar = 'BEGIN:VCALENDAR' . '\n';
        $vcalendar .= 'VERSION:2.0' . '\n';
        $vcalendar .= 'PRODID:-//Sr Moura ltda.//' . '\n';
        $vcalendar .= 'NONSGML SrMoura.com.br //' . '\n';
        $vcalendar .= 'EN' . '\n';
        $vcalendar .= 'CALSCALE:GREGORIAN' . '\n';
        $vcalendar .= 'BEGIN:VEVENT' . '\n';
        $vcalendar .= 'SUMMARY:' . $titulo . '\n';
        $vcalendar .= 'DTSTART:' . $dateInicio . '\n';
        $vcalendar .= 'DTEND:' . $dateTermino . '\n';
        $vcalendar .= 'LOCATION:' . $endereco . '\n';
        $vcalendar .= 'DESCRIOTION:' . $description . '\n';
        $vcalendar .= 'END:VEVENT' . '\n';
        $vcalendar .= 'END:VCALENDAR' . '\n';
        return $this->setprefix() . urlencode($vcalendar) . $this->setsufix();
    }

    public function email($email)
    {
        return $this->setprefix() . urlencode('mailto:' . $email) . $this->setsufix();
    }

    public function mecard($sobreNome, $nome, $telefone, $celular, $endereco)
    {
        $mecard = 'MECARD:N:' . $sobreNome . ',' . $nome . ';TEL:' . $telefone . ';TEL:' . $celular . ';ADDR:' . $endereco . ';';
        return $this->setprefix() . urlencode($mecard) . $this->setsufix();
    }

}