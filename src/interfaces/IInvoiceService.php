<?php

namespace Src\Interfaces;

interface IInvoiceService {
    public function fetchAllInvoices(): array;
    public function calculateInvoiceTotal(): array;
    public function updateTotalColumn(): array;
}