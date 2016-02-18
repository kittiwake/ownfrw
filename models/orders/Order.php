<?php

class Order extends BaseModel {

    private $con;
    private $con_date;
    private $name;
    private $prod;
    private $term;
    private $sum;
    private $pred;
    private $dis;
    private $adress;
    private $phone;
    private $rassr;
    private $beznal;
    private $note;

    public function addNew(){
        try {
            //start transaction
            $this->dbObject->beginTransaction();
            $stmt = $this->dbObject->prepare("
            INSERT INTO orders (
                contract,
                contract_date,
                name,
                product,
                adress,
                phone,
                date,
                term,
                designer,
                sum,
                prepayment,
                rassr,
                beznal
            )
            VALUES (
                :contract,
                :contract_date,
                :name,
                :product,
                :adress,
                :phone,
                CURDATE(),
                :term,
                :designer,
                :sum,
                :prepayment,
                :rassr,
                :beznal
            )
        ");

            $stmt -> execute(array(
                'contract' => $this->con,
                'contract_date'=> $this->con_date,
                'name' => $this->name,
                'product' => $this->prod,
                'adress' => $this->adress,
                'phone'  => $this->phone,
                'term' => $this->term,
                'designer' => $this->dis,
                'sum' => $this->sum,
                'prepayment' => $this->pred,
                'rassr' => $this->rassr,
                'beznal' => $this->beznal
            ));

            $oid = $this->dbObject->lastInsertId ();

            $stmt2 = $this->dbObject -> prepare("
            INSERT INTO order_stan (
                oid,
                plan
            )
            VALUES (
                :oid,
                :plan
            )
        ");
            $stmt2 -> execute(array(
                ':oid' => $oid,
                ':plan' => $this->term
            ));

            if($this->note != ''){
                $res = $this->dbObject->prepare("
                INSERT INTO `notes` (
                    oid,
                    note,
                    date
                )
                VALUES (
                    :oid,
                    :note,
                    CURDATE()
                )
            ");
                $res->execute(array(
                    ':oid'=>$oid,
                    ':note'=>$this->note
                ));
            }
            $this->dbObject->commit();
        } catch (Exception $ex) {
            $this->dbObject->rollBack();
            echo 'Error: '.$ex->getMessage();
        }
    }

    public function __get($key){
        return isset($this->$key) ? $this->$key : 'not set';
    }

    public function __set($key, $val = null){
        switch ($key){
            case 'con':
            case 'name':
            case 'prod':
            case 'adress':
            case 'dis':
                $this->$key = $val;
                break;
            case 'con_date':
            case 'term':
                $dbdate = preg_replace('/(\d{1,2})-(\d{1,2})-(\d{4})/','\3-\2-\1',$val);
                $this->$key = $dbdate;
                break;
            case 'sum':
                $this->$key = $val;
                break;
            case 'pred':
                $this->$key = $val;
                break;
            case 'phone':
                if(strlen($val)==10 && substr($val,0,1)=='9'){
                    $this->$key = '7'.$val;
                }elseif(strlen($val)==11 && substr($val,0,2)=='79'){
                    $this->$key = $val;
                }elseif(strlen($val)==11 && substr($val,0,2)=='89') {
                    $this->$key = substr_replace($val, '7', 0, 1);
                }
                break;
            case 'rassr':
            case 'beznal':
                $this->$key = ($val != null) ? $val : 'off';
                break;
            case 'note':
                $this->$key = $val;
                break;
        }
    }
}