<?php

namespace App\Utils;


class Response {

    private $status;
    private $message;
    private $dados;

    private function __construct($status, $message, $dados = null)
    {
        $this->status = $status;
        $this->message = $message;
        $this->dados = $dados;
    }

    private function __clone()
    {
        
    }

    public static function getResponse(bool $status, string $message, $dados = null) {
        return new Response($status, $message, $dados);
    }

    public function getStatus() {
        return $this->status;
    }

    public function getMessage() {
        return $this->message;
    }

    public function getDados() {
        return $this->dados;
    }
}