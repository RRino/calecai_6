<?php
namespace App\Helpers;
class DatePair {
    public string $nome;
    public string $descrizione;
    public function __construct(string $nome, string $descrizione) {
        $this->nome = $nome;
        $this->descrizione = $descrizione;
    }
}