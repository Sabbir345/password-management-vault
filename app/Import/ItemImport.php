<?php
  
namespace App\Import;
 
use App\Models\Item;
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
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Item::create([
                'user_id' => Auth::user()->id,
                'login_type' => 1,
                'name' => isset($row['name']) ? $row['name'] : '',
                'folder_id' => isset($row['folder']) ? $this->createFolder($row['folder']) : null,
                'login_username' => isset($row['login_username']) ? $row['login_username'] : '',
                'login_password' => isset($row['login_password']) ? $row['login_password'] : '',
                'uri' => isset($row['uri']) ? json_encode($row['uri']) : null,
                'notes' => isset($row['notes']) ? $row['notes'] : '',
            ]);
        }
    }
  

}