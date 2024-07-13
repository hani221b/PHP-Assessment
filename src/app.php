<?php

use App\services\InvoiceService;

$invoices_services = new InvoiceService();
$invoices_services->fetchAllInvoices();
$invoices_services->calculateInvoiceTotal();
var_dump($invoices_services->updateTotalColumn());