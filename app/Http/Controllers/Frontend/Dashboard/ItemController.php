<?php

namespace App\Http\Controllers\Frontend\Dashboard;

use DB;
use Auth;
use App\User;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Repositories\ItemRepository;

class ItemController extends Controller
{

	public $request = null;
	protected $repository;

    public function __construct(Request $request,ItemRepository $repository)
    {
        $this->request = $request;
        $this->repository = $repository;
    }

	public function store(Request $request)
	{
		$this->validate($this->request,[
         	'name'   => 'required',
        ]);

        try {
            $response = $this->repository->itemStore($this->request,Auth::user()->id);
            $status = true;
            $message = "Successfully item created";
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

	public function getItems()
	{
		try {
            $response = $this->repository->getAllItems(Auth::user()->id);
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
}