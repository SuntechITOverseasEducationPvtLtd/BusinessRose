<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public static function allTransactions() { 

    	$res = Transaction::where('user_id',4)->select('created_at as date', 'credits as plan', 'validity as validity', 'price as amount','transaction_id')->get();
    	return $res;
    }
}
