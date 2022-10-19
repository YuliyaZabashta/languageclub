<?php

namespace App\Http\Controllers;

use App\Models\Price;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PricesController extends Controller
{
    //
    public function execute(Price $price, Request $request){

        if($request->isMethod('delete')){
            DB::table('prices')
          ->where('id', '=', $_POST['id'])
          ->delete();
        }

        if($request->isMethod('post')){

            //dd($_POST);die;
        
            $input = $request->except('_token','price');
            //dd($input);die;
        
            if($request->hasFile('img')){
                $file = $request->file('img');
                $file->move(public_path().'/images',$file->getClientOriginalName());
                $input['img'] = $file->getClientOriginalName();
            }
        
            DB::table('prices')
          ->where('id', '=', $_POST['id'])
          ->update($input);
            //$price->update($input);
            if($price->update()){
               return redirect('prices');
            }
        }

        //$languages = DB::table('prices')->where('name', '!=', null)->get();
        //$ages = DB::table('prices')->where('age', '!=', null)->get();
        //$class_schedules = DB::table('prices')->where('class_schedule', '!=', null)->get();
        //$class_types = DB::table('prices')->where('class_type', '!=', null)->get();
        //dd($class_types);die;

        $neworders = DB::table('orders')->where('status', '=', 0)->get();
        $prices = Price::all();
        $old = $price->toArray();
        if(view()->exists('admin.prices')){
        $data = [
            'title'=>'Редактор цен',
            'data'=>$old,
            'neworders'=>$neworders,
            'prices'=>$prices,
            ];
        return view('admin.prices', $data);
    }
    }

    public function add(Request $request){

        if($request->isMethod('post')){
            
            $input = $request->except('_token','price');
            //dd($input);die;
        
            $validator = Validator::make($input,[
                'language' => 'required_without_all:age,class_schedule,class_type',
                'base_price'=> 'required_without:price_factor',
                'img'=>'required',
            ]);
        
            if($validator->fails()){
                return redirect()->route('pricesAdd')->withErrors($validator)->withInput();
            }
        
            if($request->hasFile('img')){
                $file = $request->file('img');
                $input['img'] = $file->getClientOriginalName();
                $file->move(public_path().'/images',$input['img']);
            }
            $price = new Price();

            $price->fill($input);
            if($price->save()){
                return redirect('admin/prices');
            }
        }
        
        $neworders = DB::table('orders')->where('status', '=', 0)->get();
        $prices = Price::all();
        if(view()->exists('admin.prices_add')){
            $data = [
                'title'=>'Добавление категории цен',
                'neworders'=>$neworders,
                'prices'=>$prices,
                ];
            return view('admin.prices_add', $data);
        }
    }  
}
