<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicesController extends Controller
{
    //
    public function execute(){
        
        if(view()->exists('admin.services')){
            $services = Service::all();
            $neworders = DB::table('orders')->where('status', '=', 0)->get();
            $data = [
                'title'=>'Сервис-страницы',
                'services'=>$services,
                'neworders'=>$neworders
            ];
            return view('admin.services', $data);
        }
        abort(404);
    }

}
