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
                    ->selectRaw('clusters.id as id,clusters.name as name,clusters.section as section, users.name as user_name')
                    ->leftJoin('users', 'clusters.user_id', '=', 'users.id')
                    ->where('clusters.user_id',$user_id)
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
    /**
     * Show the information of individual cluster.
     */
    public function show($cluster){
        $user_id = Auth::id();
        $data= DB::table('clusters')
                    ->selectRaw('clusters.id as id,clusters.name as name,clusters.section as section, users.name as user_name')
                    ->leftJoin('users', 'clusters.user_id', '=', 'users.id')
                    ->where('clusters.user_id',$user_id)
                    ->where('clusters.id',$cluster)
                    ->get();
                    // return $data;
        return view('cluster.view',['data'=>$data]);
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
    /***********
     * below function is used to store file in laravel public folder and messages in the database
     */
    public function ajaxMessageSend(Request $request)
    {
            $validatedData = $request->validate([
                'message' => ['required'],
                'input_file' => ['sometimes'],
                'sender' => ['exists:users,id'],
                'cluster_id' => ['exists:clusters,id']
            ]);
            return redirect('/cluster');
    }

}
