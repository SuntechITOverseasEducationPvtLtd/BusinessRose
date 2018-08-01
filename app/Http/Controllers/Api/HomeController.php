<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Foundation\Application;

class HomeController extends Controller
{
	public $successStatus = 200;
	
    /**
     * Filters api
     *
     * @return \Illuminate\Http\Response
     */
    public function filters(){
        $categories = Category::pluck('cat_name','id');
		return response()->json(['success'=>true,'filters'=>$categories], $this->successStatus);
    }
}
