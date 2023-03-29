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
        if(!$data['id']){
			$item = new Category();
			$item->user_id = $userId;
		}else{
			$item = Category::findOrFail($data['id']);
		}
		
        $item->name = $data['name'];
        $item->save();

        return $item;
	}

	public function getAllCategory($userId)
	{
		return Category::where('user_id',$userId)->where('is_deleted',0)->get();
	}

	public function categorySoftDelete($id,$userId)
	{
		$category = Category::findOrFail($id);
		$category->is_deleted = 1;
		$category->save();
		return;
	}
}