<?php

require '../DB/Database.php';

class Produto{

    public int $id;
    public string $nome;
    public string $descricao;
    public int $quant;
    public float $preco;
    public string $tipo;

    public function cadastrar(){
        $db = new Database('produto');
        $result =  $db->insert(
                            [
                            'nome' => $this->nome,
                            'descricao' => $this->descricao,
                            'quant' => $this->quant,
                            'preco' => $this->preco,
                            'tipo' => $this->tipo
                            ]
                        );
        
        if($result) {
            return true;
        }
        else{
            return false;
        }
    }

    public function atualizar(){
            return (new Database('produto'))->update('id_prod ='.$this->id,[
                'nome' => $this->nome,
                'descricao' => $this->descricao,
                'quant' => $this->quant,
                'preco' => $this->preco,
                'tipo' => $this->tipo
            ]);
    }

    public static function buscar(){
        //FETCHALL
        return (new Database('produto'))->select()->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function buscar_by_id($id){
        //FETCHALL
        return (new Database('produto'))->select('id_prod = '. $id)->fetchObject(self::class);
    }

    public function excluir($id){
        return (new Database('produto'))->delete('id_prod = '.$id);
    }

}