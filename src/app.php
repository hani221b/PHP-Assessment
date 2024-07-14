


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Assessment</title>
    <link rel="stylesheet" href="./public/css/index.css">
</head>
<body>
    <?php
        use App\services\InvoiceService;

        $invoices_services = new InvoiceService();
        $invoices_services->fetchInvoicesAtCondition();
        $invoices_services->calculateInvoicesTotal();
        $invoices_services->updateTotalColumn();
    ?>

    <div class="table_container">
    <table>
        <tr class="props_row">
            <th>#</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Total</th>
        </tr>
        <?php
            $num = 0;
            $qty = 0;
            $total = 0;
            foreach($invoices_services->getInvoices() as $invoice){
                $num++;
                $qty += $invoice["qty"];
                $total += $invoice["total"];
                echo "<tr>";
                echo "<td>{$num}</td>";
                echo "<td>{$invoice["price"]}</td>";
                echo "<td>{$invoice["qty"]}</td>";
                echo "<td>{$invoice["total"]}</td>";
                echo "</tr>";
            }
            echo "<tr class='total_row'>";
            echo "<td>Total</td>";
            echo "<td></td>";
            echo "<td>{$qty}</td>";
            echo "<td>{$total}</td>";
            echo "</tr>";
        ?>
    </table>
    </div>
</body>
</html>


<?php

