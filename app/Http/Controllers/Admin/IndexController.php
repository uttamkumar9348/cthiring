<?php

namespace App\Http\Controllers\Admin;

use App\Models\Resume;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class IndexController extends Controller
{
  public function index()
    {
        $resume = Resume::all();
        // $resume = Resume::select('*')
        //     ->whereMonth('created_at', Carbon::now()->month)
        //     ->get();
        //dd($resume);
        $current_month=Carbon::now()->format('M');
        return view('dashboard',compact('resume','current_month'));
    }
        public function search_filter(Request $request)
    {
        //dd($request->all());
        
        // $filter = Resume::where('created_at','>=',$request->from_date)
        //                 ->where('created_at','<=',$request->to_date)
        //                 ->when(request('client', function ($query) { $query->where('client_id', 2);}))
        //                 ->get();
                        
        $role =$request->client;
         
        $users = DB::table('resume')
                ->where('created_at','>=',$request->from_date)
                ->where('created_at','<=',$request->to_date)
                ->when($role, function ($query, $role) {
                    $query->where('client_id', $role);
                })
                ->get();
                
        dd($users);
        return redirect()->back();
    }

}
