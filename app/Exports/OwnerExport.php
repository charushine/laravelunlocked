<?php

namespace App\Exports;

use App\Traits\CommonTrait;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OwnerExport implements FromCollection, WithHeadings
{
    Use CommonTrait;
    public function headings(): array {
      return [
         "Id","Firstname","Lastname","email","status","created"
      ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        return collect($this->getOwners());
    }
}
