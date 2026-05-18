<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public string $fromEmail  = 'nurimustikaa1@gmail.com';
    public string $fromName   = 'Yoora Sarah Warehouse';
    public string $protocol   = 'smtp';
    public string $SMTPHost   = 'smtp.googlemail.com';
    public string $SMTPUser   = 'nurimustikaa1@gmail.com';
    public string $SMTPPass   = 'tddbzjqwxrlgsbpv';
    public int    $SMTPPort   = 465;
    public string $SMTPCrypto = 'ssl';
    public string $mailType   = 'html';
    public string $charset    = 'UTF-8';
    public string $CRLF       = "\r\n";
    public string $newline    = "\r\n";
    public int    $priority   = 3;
}
