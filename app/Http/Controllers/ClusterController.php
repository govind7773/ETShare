<?php

namespace App\Http\Controllers;
use App\Cluster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
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
        $view_data = [];
        $view_data[0]= DB::table('clusters')
                    ->selectRaw('clusters.id as id,clusters.name as name,clusters.section as section, users.name as user_name')
                    ->leftJoin('users', 'clusters.user_id', '=', 'users.id')
                    ->where('clusters.user_id',$user_id)
                    ->where('clusters.id',$cluster)
                    ->get();
        $view_data[1] = DB::table('content_clusters')
                    ->selectRaw('content_clusters.id as id,content_clusters.message as message,content_clusters.content as content, content_clusters.created_at as create_time,users.name as sender_name')
                    ->leftJoin('clusters','content_clusters.cluster_id','=','clusters.id')
                    ->leftJoin('users','content_clusters.sender_id','=','users.id')
                    ->where('clusters.id',$cluster)
                    ->get();
        //  return $view_data;
        return view('cluster.view',['data'=>$view_data]);
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
                'input_file' => ['required'],
                'sender' => ['exists:users,id'],
                'cluster_id' => ['exists:clusters,id']
            ]);
            
            $fileName = $validatedData['input_file']->getClientOriginalName().'_'.$validatedData['cluster_id'].'_'.$validatedData['sender'].'.'.$validatedData['input_file']->getClientOriginalExtension();
            $validatedData['input_file']->move(public_path('/uploadedFile'), $fileName);
            $insertdata = DB::table('content_clusters')
                            ->insert([
                                'message' => $validatedData['message'], 
                                'cluster_id' => $validatedData['cluster_id'],
                                'sender_id' => $validatedData['sender'],
                                'content' => $fileName
                                ]);

            return redirect('/cluster/'.$validatedData['cluster_id']);          
    }
    /***********
     * below function is used to handaled ajax request to download file content from the application
     */
    public function downloadFileContent($fname){

        $filepath = public_path()."/uploadedFile/".$fname;
        return Response()->download($filepath);

    }
    public function removeFile($file_id){
        $file_name= DB::table('content_clusters')
                    ->select('content_clusters.content as content')
                    ->where('id',$file_id)
                    ->get();

        $file_path = public_path()."/uploadedFile/".$file_name[0]->content;
            unlink($file_path);



        $c_id = DB::table('content_clusters')
                    ->select('content_clusters.cluster_id as cluster_id')
                    ->where('id',$file_id)
                    ->get();

        $deleted_file = DB::table('content_clusters')
                    ->where('id',$file_id)
                    ->delete();
        return redirect('/cluster/'.$c_id[0]->cluster_id); 
    }
}
