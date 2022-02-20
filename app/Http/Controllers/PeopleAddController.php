<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Validator;

use App\People;

class PeopleAddController extends Controller
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
            
                'name' => 'required|max:255'
            
            ], $massages);
            
            if($validator->fails()) {
                return redirect()->route('peopleAdd')->withErrors($validator)->withInput();
            }
            
            if($request->hasFile('images')) {
                $file = $request->file('images');
            
                $input['images'] = $file->getClientOriginalName();
                
                $file->move(public_path().'/assets/img',$input['images']);
            
            }
          
            
            
            $peopleAdd = new People();
            
          
            
            
            //$peopleAdd->unguard();
            
            $peopleAdd->fill($input);
            

            if($peopleAdd->save()) {
                return redirect('admin')->with('status','Страница добавлена');
            }
            
        }
        

    
        if(view()->exists('admin.portfolio_add')) {
            
            $data = [
                    
                    'title' => 'Новая страница'
                    
                    ];
            return view('admin.people_add',$data);       
            
        }
        
        abort(404);
        
        
    }

}
