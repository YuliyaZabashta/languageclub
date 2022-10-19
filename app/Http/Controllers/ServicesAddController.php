<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ServicesAddController extends Controller
{
    //
    public function execute(Request $request){

        if($request->isMethod('post')){
            
            $input = $request->except('_token');
        
            $validator = Validator::make($input,[
                'name'=>'required|max:255',
                'alias'=>'required|max:255|unique:services,alias',
                'text'=>'required'
            ]);
        
            if($validator->fails()){
                return redirect()->route('servicesAdd')->withErrors($validator)->withInput();
            }
            if($request->hasFile('img')){
                $file = $request->file('img');
                $input['img'] = $file->getClientOriginalName();
                $file->move(public_path().'/images',$input['img']);
            }
            $service = new Service();

            $service->fill($input);
            if($service->save()){
                return redirect('admin')->with('status', 'Сервис добавлен');
            }
        }
        
        
        $neworders = DB::table('orders')->where('status', '=', 0)->get();
        if(view()->exists('admin.services_add')){
            $data = [
                'title'=>'Добавление страницы сервиса',
                'neworders'=>$neworders
                ];
            return view('admin.services_add', $data);
        }
    }  
}
