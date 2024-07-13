<?php 

namespace App\Helpers;

class General {
    public static function getTotalByInvoiceId(array $invoices): array
    {
        $totals = [];
        foreach($invoices as $invoice) {
            $totals[$invoice["id"]] = $invoice["total"];    
        }
        return $totals;
    }

    public static function  getCasesSqlString(array $invoices): string
    {
        $sqlStr = "";
        $totals = self::getTotalByInvoiceId($invoices);
        foreach($totals as $id => $total){
            $sqlStr .= "WHEN id = {$id} THEN {$total} \n";
        }
        return $sqlStr;
    }

    public static function getIdsTuple(array $invoices): array
    {
        $tupleStr = "";
        foreach($invoices as $invoice ) { 
            // $ids = self::getIdsTuple($invoice);
            
         }
    }
}