<?php

class Cadastro_Model extends Model{
    public function __construct(){
        parent::__construct();
    }
    
    public function cadastro(){
        $x = file_get_contents("php://input");
        $x=json_decode($x);
        $nome=$x->dados[0];
        $id=$x->dados[1];
        $senha=$x->dados[2];
        $lvl=$x->dados[3];
        
        $cripto = hash('sha256', $senha);

        $result=$this->db->insert("fluxocaixa.usuario", array('id'=>$id, 'nome'=>$nome, 'senha'=>$cripto, 'nivel'=>$lvl));
        if($result){
            $msg=array("codigo"=>1,"texto"=>"Registro inserido com sucesso");
        }
        else{
            $msg=array("codigo"=>0,"texto"=>"Erro ao registrar");
        }
        echo(json_encode($msg));
    }
    public function getLvl(){
        $x= file_get_contents("php://input");
        $x=json_decode($x);
        $result=$this->db->select("select codigo,concat(codigo, ' - ', descricao) as nivel
        from fluxocaixa.nivelusuario n");
        if($result){
            $msg=array("codigo"=>1, "texto"=>"FOi", "data" => $result);
        }else{
            $msg=array("codigo"=>0, "texto"=>"erro");
        }
        echo(json_encode($msg));
    }
}