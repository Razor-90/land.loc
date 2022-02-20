<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Validator;

use App\Portfolio;

class PortfolioAddController extends Controller
{
    //
        public function execute(Request $request) {

           

        
        if($request->isMethod('post')) {
            $input = $request->except('_token');
            
            
            $massages = [
            
                'required'=>'Поле :attribute обязательно к заполнению',
                'unique'=>'Поле :attribute должно быть уникальным'
            
            ];
            
            
            $validator = Validator::make($input,[
            
                'name' => 'required|max:255',
                'filter' => 'required|max:255'
            
            ], $massages);
            
            if($validator->fails()) {
                return redirect()->route('portfolioAdd')->withErrors($validator)->withInput();
            }
            
            if($request->hasFile('img')) {
                $file = $request->file('img');
            
                $input['img'] = $file->getClientOriginalName();
                
                $file->move(public_path().'/assets/img',$input['img']);
            
            }
          
            
            
            $portfolioAdd = new Portfolio();
            
          
            
            
            //$portfolioAdd->unguard();
            
            $portfolioAdd->fill($input);
            

            if($portfolioAdd->save()) {
                return redirect('admin')->with('status','Страница добавлена');
            }
            
        }
        

    
        if(view()->exists('admin.portfolio_add')) {
            
            $data = [
                    
                    'title' => 'Новая страница'
                    
                    ];
            return view('admin.portfolio_add',$data);       
            
        }
        
        abort(404);
        
        
    }
}
