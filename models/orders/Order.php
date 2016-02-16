<?php

class Order {

    private $dbObject;
    private $con;

    public function __construct($dbObj) {
        $this->dbObject = $dbObj;
    }

    public function addNew(){

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
            'contract' => $contract,
            'contract_date'=> Datas::dateToDb($contract_date),
            'name' => $name,
            'product' => $product,
            'adress' => $adress,
            'phone'  => $phone,
            'term' => $term,
            'designer' => $designer,
            'sum' => $sum,
            'prepayment' => $prepayment,
            'rassr' => $rassr,
            'beznal' => $beznal
        ));

        $oid = $this->dbObject->lastInsertId ();

        return $oid;

        $stmt2 = $db -> prepare("
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
            ':plan' => $term
        ));

        if($note != ''){
            $res = $db->prepare("
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
                ':note'=>$note
            ));
        }


    }

    public function setCon($con){

        $this->con = $con;
    }

    public function getCon(){
        return $this->con;
    }
} 