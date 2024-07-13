<?php

namespace App\Services;

use App\classes\PdoConnection;
use App\helpers\General;
use Exception;

class InvoiceService {
    private $invoices;
    // private $invoicesWithTotal;
    private $pdo;

    public function __construct() {
        $this->pdo = PdoConnection::getConnection();
    }

    public function fetchAllInvoices(): array
    {
        try {
            $query = $this->pdo->prepare("SELECT * FROM invoices WHERE `invoice_no` = 599");
            $query->execute();

            $this->invoices = $query->fetchAll(\PDO::FETCH_ASSOC);
            return $this->invoices;

        } catch (Exception $e) { 
            return "Something went wrong. Please try again later!";
        }
    }
    
    public function calculateInvoiceTotal(): array
    {
        try {
            if(count($this->invoices) > 0){
                $updated_invoices = [];
                foreach($this->invoices as $invoice) { 
                    $invoice["total"] = $invoice["price"] * $invoice["qty"];
                    array_push($updated_invoices, $invoice);
                }
                $this->invoices = $updated_invoices;
                return $this->invoices;
            } else {
                return [];
            }

        } catch (Exception $e) { 
            return "Something went wrong. Please try again later!";
        }
    }

    public function updateTotalColumn(): array | string
    {
        $casesStr = General::getCasesSqlString($this->invoices);
        // var_dump($casesStr);
        // die();
        try {
            $q = "
                UPDATE invoices 
                    SET total = CASE 
                        {$casesStr}     
                        ELSE price
                    END
            ";
            // var_dump($q);
            // die();
            $this->pdo->beginTransaction();
            $this->pdo->query($q);
            $this->pdo->commit();
            return $this->invoices;

        } catch (Exception $e) { 
            return $e;
            return "Something went wrong. Please try again later!";
        }
    }
    
}