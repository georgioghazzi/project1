<?php

namespace App;

class Cart
{
    public $items;
    public $totalQty =0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if($oldCart){
            $this->items = $oldCart ->items;
            $this->totalQty=$oldCart ->totalQty;
            $this->totalPrice=$oldCart->totalPrice;
        }
    }

    public function add($item,$id){
        $sotredItem = ['qtt' => 0,'Price' => $item->Price,'item'=>$item];
        if ($this->items){
            if (array_key_exists($id,$this->items)){
                $sotredItem=$this->items[$id];
            }
        }
        $sotredItem['qtt']++;
        $sotredItem['Price']=$item->Price * $sotredItem['qtt'];
        $this->items[$id]=$sotredItem;
        $this->totalQty++;
        $this->totalPrice += $item->Price;
    }
}