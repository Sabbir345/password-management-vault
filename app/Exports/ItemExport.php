<?php

namespace App\Exports;

use App\Models\Item;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ItemExport implements FromCollection,WithMapping,WithHeadingRow
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
        return $this->response;
    }
}
