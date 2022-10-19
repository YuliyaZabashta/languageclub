<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use Illuminate\Support\Facades\Validator;
use Error;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    protected $redirect = '/#contacts';


    public function execute(Request $request){
        

        if($request->isMethod('post')){
            $messages = [
                'required'=>"Поле :attribute не заполнено",
            ];

            $validator = Validator::make($request->all(), [
                'name'=>'required|max:255',
                'telephone'=>'required|max:12|min:11'
            ]);
    
            if ($validator->fails()) {
                return redirect('/#contacts')
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
                    return redirect('/#contacts')->with('status', 'Спасибо за заявку');
                }
            }
        }

        return view('site.index');
    }
}
