<?php

namespace App\Http\Controllers\Frontend\Dashboard;

use DB;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Repositories\FolderRepository;

class DashboardController extends Controller
{

	public $request;
	protected $repository;

    public function __construct(Request $request,FolderRepository $repository)
    {
        $this->request = $request;
        $this->repository = $repository;
    }

	public function index()
	{
		return view('frontend.dashboard.index');
	}

	public function store()
	{
		$this->validate($this->request,[
         	'name'   => 'required',
        ]);

        try {
            $response = $this->repository->folderStore($this->request,Auth::user()->id);
            $status = true;
            $message = "Successfully folder created";
        } catch (\Exception $exception) {
        	$status = false;
            $message = "Internal server error";
        }
        
        if($this->request->wantsJson()) {
            return response()->json([
                'status'  => $status,
                'message'     => $message
          ]);
        }
	}

	public function getFolders()
	{
		try {
            $response = $this->repository->getAllFolder(Auth::user()->id);
            $message = "success";
    		$status = true;
        } catch (\Exception $exception) {
        	$status = false;
            $message = "Internal server error";
            $response = [];
        }
		if($this->request->wantsJson()) {
            return response()->json([
                'status'  => $status,
                'message' => $message,
                'folders' => $response
          ]);
        }
	}

	public function folderUpdate()
	{
		
	}

	public function folderDelete()
	{
		
	}
}