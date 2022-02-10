<?php

namespace App\Http\Controllers;
use App\Cluster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class ClusterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $user_id = Auth::id();
        $data= DB::table('clusters')
                    ->where('user_id',$user_id)
                    ->get();
        return view('cluster.index',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('cluster.create');
    }
    /**Store the data within database tables
     * 
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cname' => ['required','string','max:255'],
            'section' => ['string', 'max:255'],
            'creator' =>['exists:users,id']
        ]);
        $nwcluster = Cluster::create([
            'name' => $validatedData['cname'],
            'section' => $validatedData['section'],
            'user_id' => $validatedData['creator'],
            'unique_id'=> $validatedData['cname'].time()
        ]);
           
        return redirect('/cluster');
    }
}
