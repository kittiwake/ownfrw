<?php

class Schedule extends BaseModel {

    public $claim = false;

    public function getPlan()
    {
        //количество недель для отображения
        $nW = 6;

        //получить список заказов в диапазоне дат

        $orderList = $this->getOrdersForSomeWeeks($nW);
        foreach ($orderList as $key=>$order){
            if($this->claim != $this->isRekl($order['contract'])){
                unset ($orderList[$key]);
            }
        }
        return $orderList;
    }

    public function getOrdersForSomeWeeks($countWeeks){
        $today = strtotime('today');
        $begin =  date('Y-m-d', strtotime('last sunday + 24 hours -1 week'));
        $end =  date('Y-m-d', strtotime('last sunday + 24 hours +'.$countWeeks.' week'));

        $orderList = array();

        $res = $this->dbObject->prepare('
            SELECT
                `oid`,
                `contract`,
                `plan`,
                `rassr`,
                `beznal`,
                `tech_end`,
                `upak_end`,
                `otgruz_end`
            FROM `order_stan`, `orders`
            WHERE `plan` BETWEEN :begin AND :end
            AND `order_stan`.`oid` = `orders`.`id`
        ');
        $res->execute(array(
            ':begin' => $begin,
            ':end' => $end
        ));
        $res->setFetchMode(PDO::FETCH_ASSOC);

        while ($row = $res->fetch()){
            $orderList[] = $row;
        }

        return $orderList;

    }

    public static function isRekl ($contract){//если рекламация, возвращаем true

        if (preg_match('/^.*[РрД][1-9]?$/', $contract) == 1){
            return true;
        }
        return false;
    }

}