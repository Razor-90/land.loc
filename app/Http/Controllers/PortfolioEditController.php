<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Portfolio;

use Validator;

class PortfolioEditController extends Controller
{
    //
       public function execute(Portfolio $portfolio, Request $request){

        if($request->isMethod('delete')){
            $portfolio->delete();
            return redirect('admin')->with('status', 'Portfolio delete');
        }

        if($request->isMethod('post')){
            $input = $request->except('_token');
            $validator = Validator::make($input, [
                'name'=>'required|max:255',
                'filter'=>'required|max:255'
                ]);
            if($validator->fails()){
                return redirect()
                ->route('portfolioEdit', ['portfolio'=>$input['id']])
                ->withErrors($validator);
            }
            if($request->hasFile('img')){
                $file = $request->file('img');
                $file->move(public_path().'/assets/img',$file->GetClientOriginalName());
                $input['img'] = $file->GetClientOriginalName();
            }
            else{
                $input['img'] = $input['old_img'];
            }
            unset( $input['old_img']);

            $portfolio->fill($input);

            if($portfolio->update()){
                return redirect('admin')->with('status', 'Update');
            }

        }

    	$old = $portfolio->toArray();
    	if(view()->exists('admin.portfolio_edit')){
    		$data = [
    			'title'=>'Update Porfolio - '.$old['name'],
    			'data'=>$old
    		];

    	return view('admin.portfolio_edit', $data);
    	}
    }

}
