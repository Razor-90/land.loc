<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Service;

class ServiceController extends Controller
{
    //
         public function execute(){

    	if(view()->exists('admin.service')){
			
			$services = service::all();

			$data = [

				'title'=>'services',
				'service'=>$services


			];

			return view ('admin.service', $data);

    	}

    	abort(404);
    	
    }
}
