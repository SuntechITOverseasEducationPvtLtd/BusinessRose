<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
    public static function checkConnection($authUser, $userId)
	{
		return Connection::where(['connected_by'=>$authUser, 'connected_to'=>$userId])
			->orWhere(function($query) use ($authUser, $userId)
			{
			  $query->Where(['connected_by'=>$userId, 'connected_to'=>$authUser]);
			})->count();
	}
}
