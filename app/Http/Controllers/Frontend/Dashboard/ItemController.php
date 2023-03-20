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
use App\Exports\ItemExport;
use App\Import\ItemImport;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;

class ItemController extends Controller
{

	public $request = null;
    public $res_message = "Internal server error";
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
            $message = $this->res_message;
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
		$searchKey = $this->request->search;
        $folderSearch = $this->request->folderSearch;
        $perPage = $this->request->per_page;
		try {
            $response = $this->repository->getAllItems($searchKey,$folderSearch,$perPage,Auth::user()->id);
            $message = "success";
    		$status = true;
        } catch (\Exception $exception) {
        	$status = false;
            $message = $this->res_message;
            $response = [];
        }
		if($this->request->wantsJson()) {
            return response()->json([
                'status'  => $status,
                'message' => $message,
                'items' => $response
          ]);
        }
	}

	public function itemExport()
	{
		try {
            $response = $this->repository->getExportItems(Auth::user()->id);
            $file_name = 'items' . time() . '.csv';
            return Excel::download(new ItemExport($response), $file_name);

        } catch (\Exception $exception) {
            $status = false;
            $message = $this->res_message;
            $response = [];
        }
	}

    public function itemImport()
    {
        Excel::import(new ItemImport,$this->request->file('file'));

        if($this->request->wantsJson()) {
            return response()->json([
                'status'  => true,
                'message' => "Successfully file imported",
          ]);
        }
    }

    public function exampleCSV()
    {
        return response()->download(public_path('assets/items1679237011.csv'));
    }
}