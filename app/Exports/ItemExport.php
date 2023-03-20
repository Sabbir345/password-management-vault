<?php

namespace App\Exports;

use App\Models\Item;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ItemExport implements FromCollection,WithHeadings
{
    private $response;

    public function __construct($response)
    {

        $this->response = $response;
    }

    /**
     * @return Collection
     */
    public function collection()
    {
        // dd($this->response);
        return collect($this->response);
    }

    // public function map($row): array
    // {
       
    //     $data = [
    //       'folder'=>$row['folder'],
    //       'type'=>$row['type'],
    //       'name'=>$row['name'],
    //       'notes'=>$row['notes'],
    //       'login_uri'=>$row['login_uri'],
    //       'login_username'=>$row['login_username'],
    //     ];
    //    // dd($data);
    //     return $data->collect();
    // }

    public function headings(): array
    {
        return [
            'folder',
            'type',
            'name',
            'notes',
            'login_uri',
            'login_username',
        ];
    }
    
}
