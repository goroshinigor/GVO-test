<?php

namespace App\Common\Sales;

class Report{
    public function __construct(
        private int $sum = 0,
        private int $quantity = 0
    ){}
    
    public function asArray(){
        return [
            'sum' => $this->sum,
            'quantity' => $this->quantity,
        ];
    }
}
