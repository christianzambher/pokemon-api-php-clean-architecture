<?php

namespace App\Controllers;

use App\Services\MailService;

class MailController
{
    private MailService $service;

    public function __construct()
    {
        $this->service = new MailService();
    }

    public function send(array $data): string
    {
        return $this->service
            ->sendPokemonMail($data);
    }
}