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

    public function headings(): array
    {
        return [
            'folder',
            'type',
            'name',
            'notes',
            'login_uri',
            'login_username',
            'login_password',
            'category'
        ];
    }
    
}
