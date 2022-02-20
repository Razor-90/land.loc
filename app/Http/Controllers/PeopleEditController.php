<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\People;

use Validator;

class PeopleEditController extends Controller
{
    //
    public function execute(People $service, Request $request){

        if($request->isMethod('delete')){
            $service->delete();
            return redirect('admin')->with('status', 'service delete');
        }

        if($request->isMethod('post')){
            $input = $request->except('_token');
            $validator = Validator::make($input, [
                'name'=>'required|max:255'
                ]);
            if($validator->fails()){
                return redirect()
                ->route('serviceEdit', ['service'=>$input['id']])
                ->withErrors($validator);
            }
            
            $service->fill($input);

            if($service->update()){
                return redirect('admin')->with('status', 'Update');
            }

        }

        $old = $service->toArray();
        if(view()->exists('admin.service_edit')){
            $data = [
                'title'=>'Update Service - '.$old['name'],
                'data'=>$old
            ];

        return view('admin.people_edit', $data);
        }
    }
}
