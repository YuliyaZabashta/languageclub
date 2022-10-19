<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ServicesEditController extends Controller
{
    //

public function execute(Service $service, Request $request){

    if($request->isMethod('delete')){
        $service->delete();
        return redirect('admin')->with('status','Страница удалена');
    }

    if($request->isMethod('post')){
        
        $input = $request->except('_token');
    
        $validator = Validator::make($input,[
            'name'=>'required|max:255',
            'alias'=>'required|max:255|unique:services,alias,'.$input['id'],
            'text'=>'required'
        ]);
    
        if($validator->fails()){
            return redirect()
                    ->route('servicesEdit',['service'=>$input['id']])
                    ->withErrors($validator);
        }
        if($request->hasFile('img')){
            $file = $request->file('img');
            $file->move(public_path().'/images',$file->getClientOriginalName());
            $input['img'] = $file->getClientOriginalName();
        }else{
            $input['img'] = $input['old_images'];
        }
        unset($input['old_img']);
    
        $service->fill($input);
        if($service->update()){
            return redirect('admin')->with('status','Информация обновлена');
        }
    }

    $neworders = DB::table('orders')->where('status', '=', 0)->get();
    $old = $service->toArray();
    if(view()->exists('admin.services_edit')){
        $data = [
            'title'=>'Редактирование страницы сервиса - '.$old['name'],
            'data'=>$old,
            'neworders'=>$neworders
            ];
        return view('admin.services_edit', $data);
    }
    }
}
