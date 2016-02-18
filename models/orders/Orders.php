<?php

class Orders extends BaseView {

    public function getContent($arg){

        switch ($arg){
            case 'addnew':
                if(sizeof($_POST)>0){
                    $order = new Order($this->dbObject);
                    $order->con = $_POST['con'];
                    $order->con_date = $_POST['con_date'];
                    $order->name = $_POST['name'];
                    $order->prod = $_POST['prod'];
                    $order->term = $_POST['term'];
                    $order->sum = $_POST['sum'];
                    $order->pred = $_POST['pred'];
                    $order->dis = $_POST['dis'];
                    $order->adress = $_POST['adress'];
                    $order->phone = $_POST['phone'];
                    $order->rassr = @$_POST['rassr'];
                    $order->beznal = @$_POST['beznal'];
                    $order->note = $_POST['note'];

                    print_r('con     : '.$order->con     );
                    print_r('con_date: '.$order->con_date);
                    print_r('name    : '.$order->name    );
                    print_r('prod    : '.$order->prod    );
                    print_r('term    : '.$order->term    );
                    print_r('sum     : '.$order->sum     );
                    print_r('pred    : '.$order->pred    );
                    print_r('dis     : '.$order->dis     );
                    print_r('adress  : '.$order->adress  );
                    print_r('phone   : '.$order->phone   );
                    print_r('rassr   : '.$order->rassr   );
                    print_r('beznal  : '.$order->beznal  );
                    print_r('note    : '.$order->note    );

                    $this->smObj->assign('message', $order->addNew());
                }else{
                    $this->smObj->assign('message', '');
                }
                $content = $this->smObj->fetch('addnew.tpl');
                break;

        }

 /*       if(file_exists(SITE_PATH .'templates/'.$arg.'.tpl')){
            $content = $this->smObj->fetch($arg.'.tpl');
        }else{
            $content = 'File not found';
        }*/
        return $content;
    }



}