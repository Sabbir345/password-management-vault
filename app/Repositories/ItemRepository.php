<?php

namespace App\Repositories;

use DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Item;
use App\Models\Folder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ItemRepository
{
	public function itemStore($data,$userId)
	{
		$item = new Item();
        $item->login_type = $data['login_type'];
        $item->name = $data['name'];
        $item->folder_id = $data['folder_id'];
        $item->login_username = $data['login_username'];
        $item->login_password = $data['login_password'];
        $item->uri = json_encode($data['uris']);
        $item->notes = $data['notes'];
        $item->user_id = $userId;
        $item->save();

        $item->categories()->attach($data['categories'], ['created_at' => now()]);
        return $item;
	}

	public function itemUpdate($data,$userId)
	{
		$item =  Item::find($data['id']);
        $item->login_type = $data['login_type'];
        $item->name = $data['name'];
        $item->folder_id = $data['folder_id'];
        $item->login_username = $data['login_username'];
        $item->login_password = $data['login_password'];
        $item->uri = json_encode($data['uris']);
        $item->notes = $data['notes'];
        $item->user_id = $userId;
        $item->save();
        $item->categories()->sync($data['categories'], ['created_at' => now()]);
        return $item;
	}

	public function getAllItems($searchKey,$folderSearch,$perPage, $userId, $categoryIds = null)
	{
		return Item::with(['folder' => function($query) {
	                    $query->select('id', 'name');
	                }, 'categories'])
		            ->where('user_id',$userId)
		            ->where('is_deleted',0)
		            ->when($categoryIds, function($q) use ($categoryIds) {
		                $q->whereHas('categories', function($query) use ($categoryIds) {
		                    $query->whereIn('category_id', $categoryIds);
		                });
		            })
		            ->when($folderSearch, function($q) use ($folderSearch) {
		                $q->where('folder_id', $folderSearch);
		            })
		            ->when($searchKey, function($q) use ($searchKey) {
		                $q->where(function($query) use ($searchKey) {
		                    $query->where('name', 'like', "%$searchKey%")
		                          ->orWhere('login_username', 'like', "%$searchKey%");
		                });
		            })
		            ->orderBy('id','desc')
		            ->paginate($perPage);
		
	}

	public function getExportItems($userId)
	{
		$items = Item::where('user_id',$userId)
					  ->where('is_deleted',0)
					  ->with(['categories'])
					  ->get();
		$datas = [];
		foreach($items as $item){
			$obj = new \stdClass();
			$obj->folder = isset($item->folder) ? $item->folder->name : '';
			$obj->type = $item['login_type'] == 1 ? 'login' : '';
			$obj->name = $item['name'];
			$obj->notes = $item['notes'];
			$obj->login_uri = $this->formatUris($item['uri']);
			$obj->login_username = $item['login_username'];
			$obj->login_password = $item['login_password'];
			$obj->category = $this->formatCategoryList($item['categories']);

			array_push($datas, $obj);
		}

		return $datas;
	}

	public function manageFolder($name)
	{
		$folder = new Folder();
		$folder->user_id = Auth::user()->id; 
		$folder->name = $name;
		$folder->save();
		return $folder->id;
	}

	public function itemSoftDelete($itemId, $userId)
	{
		$item = Item::where('id',$itemId)
					  ->where('user_id',$userId)
					  ->where('is_deleted',0)
					  ->update(['is_deleted' => 1]);
		return;
	}

	public function formatCategoryList($datas)
	{
		$lists = [];
		foreach($datas as $data) {
			$obj = new \stdClass();
			$obj->name = $data->name;
			array_push($lists, $obj);
		}
		$names = json_decode(json_encode($lists), true);
		$category = collect($names)->pluck('name')->toArray();
		$commaSeparatedNames = implode(',', $category);

		return $commaSeparatedNames;
	}

	public function formatUris($datas)
	{
		$format = json_decode($datas, true);
		$uris = collect($format)->pluck('uri')->toArray();
		$commaSeparatedNames = implode(',', $uris);
		return $commaSeparatedNames; 
	}
}