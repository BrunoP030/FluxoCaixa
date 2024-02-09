<?php

class Lancamentos_Model extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function getFluxo(){
        $x= file_get_contents("php://input");
        $x=json_decode($x);

        $result=$this->db->select("select codigo,concat(codigo, ' - ', descricao) as fluxo
        from fluxocaixa.tipofluxo");

        if($result){
            $msg=array("codigo"=>1, "texto"=>"", "data" => $result);
        }else{
            $msg=array("codigo"=>0, "texto"=>"erro");
        }

        echo(json_encode($msg));

    }

    public function getTpLanc(){
        $x= file_get_contents("php://input");
        $x=json_decode($x);

        $result=$this->db->select("select sequencia,concat(sequencia, ' - ', descricao) as tplanc
        from fluxocaixa.tipolancamento");

        if($result){
            $msg=array("codigo"=>1, "texto"=>"", "data" => $result);
        }else{
            $msg=array("codigo"=>0, "texto"=>"erro");
        }
        
        echo(json_encode($msg));
    }
    public function lancamento(){
        $x=file_get_contents("php://input");
        $x=json_decode($x);
        $valor=$x->dados[0];
        $obs=$x->dados[1];
        $tplan=$x->dados[2];
        $tpfluxo=$x->dados[3];
        $data= date('Y-m-d');
        $result=$this->db->insert("fluxocaixa.lancamento", array('data'=>$data, 'tipo'=>$tplan, 'valor'=>$valor, 'fluxo'=>$tpfluxo, 'obs'=>$obs));
        
        if($result){
            $msg=array("codigo"=>1, "texto"=>"Lançamento registrado com sucesso");
        }else{
            $msg=array("codigo"=>0, "texto"=> "Falha no lançamento");
        }
        echo(json_encode($msg));
    }

    public function relatorio(){
        
        $result=$this->db->select("select t.descricao as tplanc, tf.descricao, l.valor, l.`data`, l.obs 
        from fluxocaixa.lancamento l 
        join fluxocaixa.tipolancamento t on
        l.tipo = t.sequencia 
        join fluxocaixa.tipofluxo tf on 
        tf.codigo = l.fluxo ");

        echo(json_encode($result));
    }


public function pesquisa(){
    $post = json_decode(file_get_contents("php://input"));

    $datainicio=$post->dataI;
    $datafim=$post->dataF;

    $dados = array("datainicio" => $datainicio, "datafim" => $datafim);
   
    $result = $this->db->select("select l.sequencia, t.descricao as tplanc, tf.descricao, l.valor, l.`data`, l.obs 
                                    from fluxocaixa.lancamento l 
                                    join fluxocaixa.tipolancamento t on
                                    l.tipo = t.sequencia 
                                    join fluxocaixa.tipofluxo tf on 
                                    tf.codigo = l.fluxo
                                where l.`data`  >= :datainicio 
                                and l.`data`  <= :datafim", $dados);

    if($result){
        $msg=array("codigo"=>1, "select"=>$result);
    }else{
        $msg=array("codigo"=>0, "texto"=>"Erro");
    }
    echo(json_encode($msg));
}
}