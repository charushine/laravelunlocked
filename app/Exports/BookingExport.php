<?php

namespace App\Exports;

use App\Traits\CommonTrait;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BookingExport implements FromCollection, WithHeadings
{
    Use CommonTrait;
    public function headings(): array {
      return [
         "Id","Venue Name","Customer Name","Booking Name","Booking Email","Booking Date","Status","Created"
      ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect($this->getBookings());
    }
}
