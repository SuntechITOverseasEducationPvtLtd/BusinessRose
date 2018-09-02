<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Transaction extends Model
{
    public static function allTransactions() { 

    	$res = Transaction::where('user_id',Auth::user()->id)->select('created_at as date', 'credits as plan', 'validity as validity', 'price as amount','transaction_id')->get();
    	return $res;
    }
}
