<?php

namespace site\erick\blog;

use mysqli;

class Artigo
{
    public $mysql;
    public $artigos;
    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }
    public function recuperaArtigos() : array{
        
        $sqlQuery = $this->mysql->query('SELECT id, titulo, conteudo FROM artigos');
        $artigos = $sqlQuery->fetch_all(MYSQLI_ASSOC);
    
        return $artigos;

    }

    public function encontrarArtigo(string $id) : array
    {
        $sqlQuery = "SELECT `id`, `titulo`, `conteudo` FROM `artigos` WHERE id = ?;";
        $stmt = $this->mysql->prepare($sqlQuery);
        $stmt->bind_param('s', $id);
        $stmt->execute();
        $artigo =  $stmt->get_result()->fetch_assoc();
        return $artigo;
    }
    public function adicionar(string $titulo, string $conteudo) : void
    {
        $sqlInsert = $this->mysql->prepare('INSERT INTO artigos (titulo, conteudo) VALUES (?,?);');
        $sqlInsert->bind_param('ss', $titulo, $conteudo);
        $sqlInsert->execute();
    }
    public function deletar(string $id)
    {
        $sqlDelete = $this->mysql->prepare ('DELETE FROM artigos WHERE artigos.id = ?');
        $sqlDelete->bind_param('s', $id);
        $sqlDelete->execute();
    }
    public function editar(string $id, string $titulo, string $conteudo) : void
    {
        $sqlUpdate = $this->mysql->prepare('UPDATE artigos SET titulo = ?, conteudo = ? WHERE id = ?');
        $sqlUpdate->bind_param('sss', $titulo, $conteudo, $id);
        $sqlUpdate->execute();
    }
}





