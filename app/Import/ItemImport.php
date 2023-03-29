<?php
  
namespace App\Import;
 
use App\Models\Item;
use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;
use App\Repositories\ItemRepository;
  
class ItemImport implements ToCollection, WithHeadingRow
{
    public function createFolder($data)
    {
        $folder = new ItemRepository();
        return $folder->manageFolder($data);
    }

    public function formatUri($datas)
    {
        $values = explode(",", $datas);

        $objects = array();
        foreach ($values as $value) {
            $obj = new \stdClass();
            $obj->uri = $value;
            $objects[] = $obj;
        }

        return $objects;
    }

    public function manageCategory($datas)
    {
        $values = explode(",", $datas);
        $objects = array();

        foreach ($values as $value) {
            $isAvailable = Category::where('name',$value)->where('user_id',Auth::user()->id)->first();
            if($isAvailable){
                $objects[] = $isAvailable['id'];
            }else{
               $store = new Category();
               $store->name = $value;
               $store->user_id = Auth::user()->id;
               $store->save();
               $objects[] = $store->id;
            }
        }
        return $objects;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $item = Item::create([
                        'user_id' => Auth::user()->id,
                        'login_type' => 1,
                        'name' => isset($row['name']) ? $row['name'] : '',
                        'folder_id' => isset($row['folder']) ? $this->createFolder($row['folder']) : null,
                        'login_username' => isset($row['login_username']) ? $row['login_username'] : '',
                        'login_password' => isset($row['login_password']) ? $row['login_password'] : '',
                        'uri' => isset($row['login_uri']) ? json_encode($this->formatUri($row['login_uri'])) : null,
                        'notes' => isset($row['notes']) ? $row['notes'] : '',
                    ]);
            $item->categories()->sync($this->manageCategory($row['category']), ['created_at' => now()]);
        }
    }
  

}