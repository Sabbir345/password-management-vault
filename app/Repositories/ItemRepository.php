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

        return $item;
	}

	public function getAllItems($searchKey, $userId)
	{
		return Item::where('user_id',$userId)
		            ->where('is_deleted',0)
					->when($searchKey, function($q) use ($searchKey, $userId) {
	                    $q->where('user_id',$userId)
	                      ->where('is_deleted',0)
	                      ->where(function($query) use ($searchKey) {
                    		$query->where('name', 'like', "%$searchKey%")
                          		  ->orWhere('login_username', 'like', "%$searchKey%");
                		});
	                })
					->get();
	}
}