<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    //
    public function execute(Request $request){

        if($request->isMethod('post')){
        
            $input = $request->except('_token');
            dd($input);die;
        
            $validator = Validator::make($input,[
                'language'=>'required',
                'age'=>'required',
                'class_schedule'=>'required',
                'class_type'=>'required',
            ]);
        
            if($validator->fails()){
                return redirect('service#calc')
                        ->withErrors($validator);
            }

            $cals = $_POST;
            //dd($_POST);die;
            $calc = $cals['language']*$cals['age']*$cals['class_schedule']*$cals['class_type'];
            return redirect('service#calc')->with('calc', $calc);
        }

        $languages = DB::table('prices')->where('language', '!=', null)->get();
        $ages = DB::table('prices')->where('age', '!=', null)->get();
        $class_schedules = DB::table('prices')->where('class_schedule', '!=', null)->get();
        $class_types = DB::table('prices')->where('class_type', '!=', null)->get();
        //dd($class_types);die;
        $services = Service::all();
        return view('site.service', array(
                            'services'=>$services,
                            'languages'=>$languages,
                            'ages'=>$ages,
                            'class_schedules'=>$class_schedules,
                            'class_types'=>$class_types,
        ));

        return view('site.service');
    }

    public function feedback(Request $request){
        if($request->isMethod('post')){
            $messages = [
                'required'=>"Поле :attribute не заполнено",
            ];

            $validator = Validator::make($request->all(), [
                'name'=>'required|max:255',
                'telephone'=>'required|max:12|min:11'
            ]);
    
            if ($validator->fails()) {
                return redirect('/service#calc')
                            ->withErrors($validator);
            }

            $data = $request->all();
            if($data){
                DB::table('orders')->insert([
                    'name' => $data['name'],
                    'telephone' => $data['telephone']
                ]);
                $result = Mail::send('site.email',['data'=>$data],function($message) use($data) {
                    $mail_admin = env('MAIL_ADMIN');
                    $message->from($mail_admin, $_SERVER['SERVER_NAME']);
                    $message->to($mail_admin)->subject('Новая заявка');
                });
                if($result){
                    return redirect('/service#calc')->with('status', 'Спасибо за заявку');
                }
            }
        }
    }
}
