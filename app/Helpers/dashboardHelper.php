<?php

use App\Models\accounts;
use App\Models\purchase;
use App\Models\purchase_details;
use App\Models\sale_details;

function totalSales()
{
    return $sales = sale_details::sum('amount');
}

function totalPurchases()
{
   return purchase::sum('total');
}


function myBalance()
{
    $accounts = accounts::all();
    $balance = 0;
    foreach($accounts as $account)
    {
        $balance += getAccountBalance($account->id);
    }

    $stockValue = stockValue();

    $balance = $balance + $stockValue;

    return $balance;
}

