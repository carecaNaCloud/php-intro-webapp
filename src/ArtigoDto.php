<?php

  class ArtigoDto {

    private $mysql;

    public function __construct(mysqli $mysql) {
      $this->mysql = $mysql;
    }

    public function exibirTodos() : array {

      $result = $this->mysql->query("SELECT * FROM artigos");
      
      $artigos = $result->fetch_all(MYSQLI_ASSOC);
      
      return $artigos;
    }

    public function encontrarPorId(string $id) : array {
      $pstm = $this->mysql->prepare("SELECT * FROM artigos WHERE id = ?");
      $pstm->bind_param('s', $id);
      $pstm->execute();
      $result = $pstm->get_result();
      $artigo = $result->fetch_assoc();
      return $artigo;
    }
    

    public function adicionar() : void {
      
      $pstm = $this->mysql->prepare("INSERT INTO artigos 
                                      (titulo, conteudo) VALUES (?, ?) ");
      $pstm->bind_param('ss', $_POST["titulo"], $_POST["conteudo"]);
      $pstm->execute();
    }
    

    public function excluir(string $id) : void {
      $pstm = $this->mysql->prepare("DELETE FROM artigos WHERE id = ?");
      $pstm->bind_param('i', $id);
      $pstm->execute();
    }

    public function atualizar(string $id) : void {
      $pstm = $this->mysql->prepare("UPDATE artigos SET titulo = ?, conteudo = ? WHERE id = ?");
      $pstm->bind_param('sss', $_POST["titulo"], $_POST["conteudo"], $id);
      $pstm->execute();
    }

  }

?>