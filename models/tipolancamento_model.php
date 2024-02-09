<?php

class TipoLancamento_Model extends Model{
    public function __construct(){
        parent::__construct();
    }
    public function tpLanc(){
        $x= file_get_contents('php://input');
        $x=json_decode($x);

        $descricao=$x->dados;
      
        $result = $this->db->insert("fluxocaixa.tipolancamento", array('descricao'=> $descricao));

        if($result){
            $msg=array("codigo"=>1, "texto"=>"Tipo de lancamento registrado com sucesso");
        }else{
            $msg=array("codigo"=>1, "texto"=>"Erro ao registrar");
        }
        echo(json_encode($msg));
    }
    public function lista(){
        
        $result= $this->db->select("select descricao, sequencia 
        from fluxocaixa.tipolancamento t ");
        echo(json_encode($result));
    }
    public function loadData($id){
        $sequencia=(int) $id;
        $result=$this->db->select("SELECT 
                                        descricao, sequencia 
                                    FROM fluxocaixa.tipolancamento t where sequencia = '$sequencia'" );
        $result=json_encode($result);
        echo($result);
    }
    
    public function del(){
        $x=file_get_contents("php://input");
        $a = explode(':', $x);
        $seq = $a[1];
        if($seq > 0){
            $result=$this->db->delete('fluxocaixa.tipolancamento', "sequencia = '$seq'");
            if($result){
                $msg=array("codigo"=>1,"texto"=>"Registro excluido com sucesso");
            }else{
                $msg=array("Erro ao excluir");
            }
        }

        echo(json_encode($msg));
    }

    public function save(){
        $x=file_get_contents('php://input');
        $a=json_decode($x);
        $descricao=$a[0];
        $seq=$a[1];
        $msg=array("codigo"=>0, "texto"=>"Erro ao atualizar");
        if($seq > 0){
            $dadosSave=array('descricao'=>$descricao, 'sequencia'=>$seq);
            $result=$this->db->update('fluxocaixa.tipolancamento', $dadosSave,"sequencia= '$seq'");
            if($result){
                $msg=array("codigo"=>1, "texto"=>"Registro atualizado com sucesso");
            }
            else{
                $msg=array("codigo"=>0, "texto"=>"Erro ao atualizar.");
            }
        }
        echo(json_encode($msg));
    }
}