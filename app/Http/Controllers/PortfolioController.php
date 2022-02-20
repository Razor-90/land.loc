<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Portfolio;

class PortfolioController extends Controller
{
    //
     public function execute(){

    	if(view()->exists('admin.portfolio')){
			
			$portfolio = portfolio::all();

			$data = [

				'title'=>'portfolio',
				'portfolio'=>$portfolio


			];

			return view ('admin.portfolio', $data);

    	}

    	abort(404);
    	
    }
    
}
