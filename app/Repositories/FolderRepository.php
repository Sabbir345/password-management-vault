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
		$item = new Folder();
        $item->name = $data['name'];
        $item->user_id = $userId;
        $item->save();

        return $item;
	}

	public function getAllFolder($userId)
	{
		return Folder::where('user_id',$userId)->where('is_deleted',0)->get();
	}
}

   