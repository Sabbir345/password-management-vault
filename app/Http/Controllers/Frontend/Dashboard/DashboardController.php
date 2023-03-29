<?php

namespace App\Http\Controllers\Frontend\Dashboard;

use DB;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Repositories\FolderRepository;
use App\Repositories\CategoryRepository;

class DashboardController extends Controller
{

	public $request;
	protected $repository;
    protected $categoryRepository;

    public function __construct(Request $request,FolderRepository $repository,CategoryRepository $categoryRepository)
    {
        $this->request = $request;
        $this->repository = $repository;
        $this->categoryRepository = $categoryRepository;
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
            $message = $this->request->id ? "Successfully folder updated" : "Successfully folder created";
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

    public function folderDelete()
    {
        try {
            $response = $this->repository->folderSoftDelete($this->request->id,Auth::user()->id);
            $message = "Successfully deleted";
            $status = true;
        } catch (\Exception $exception) {
            $status = false;
            $message = "Internal server error";
        }
        if($this->request->wantsJson()) {
            return response()->json([
                'status'  => $status,
                'message' => $message,
          ]);
        }
    }

    public function categoryDelete()
    {
        try {
            $response = $this->categoryRepository->categorySoftDelete($this->request->id,Auth::user()->id);
            $message = "Successfully deleted";
            $status = true;
        } catch (\Exception $exception) {
            $status = false;
            $message = "Internal server error";
        }
        if($this->request->wantsJson()) {
            return response()->json([
                'status'  => $status,
                'message' => $message,
          ]);
        }
    }

	public function getCategories()
	{
		try {
            $response = $this->categoryRepository->getAllCategory(Auth::user()->id);
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
                'categories' => $response
          ]);
        }
	}

	public function categoryStore()
	{
		$this->validate($this->request,[
            'name'   => 'required',
        ]);

        try {
            $response = $this->categoryRepository->categoryCreate($this->request,Auth::user()->id);
            $status = true;
            $message = $this->request->id ? "Successfully category updated" : "Successfully category created";
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
}