<?php

namespace App\Repositories;

use DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CategoryRepository
{
	public function categoryCreate($data,$userId)
	{
		$item = new Category();
        $item->name = $data['name'];
        $item->user_id = $userId;
        $item->save();

        return $item;
	}

	public function getAllCategory($userId)
	{
		return Category::where('user_id',$userId)->where('is_deleted',0)->get();
	}
}