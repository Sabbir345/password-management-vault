<?php

namespace App\Repositories;

use DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Folder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class FolderRepository
{
	public function folderStore($data,$userId)
	{
		if(!$data['id']){
			$item = new Folder();
			$item->user_id = $userId;
		}else{
			$item = Folder::findOrFail($data['id']);
		}
		
        $item->name = $data['name'];
        $item->save();

        return $item;
	}

	public function getAllFolder($userId)
	{
		return Folder::where('user_id',$userId)->where('is_deleted',0)->get();
	}

	public function folderSoftDelete($id,$userId)
	{
		$folder = Folder::findOrFail($id);
		$folder->is_deleted = 1;
		$folder->save();
		return;
	}
}