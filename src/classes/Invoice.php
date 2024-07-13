<?php 

namespace App\Classes;

use App\Src\Interfaces\InvoiceInterface;

class Invoice {
    private $invoice_no;
    private $price;
    private $qty;
    private $total;

    public function __construct(int $invoice_no, int $price, int $qty, int $total) {
        $this->invoice_no = $invoice_no;
        $this->price = $price;  
        $this->qty = $qty;  
        $this->total = $total;
     }

}