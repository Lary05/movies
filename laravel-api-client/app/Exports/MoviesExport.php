<?php

namespace App\Exports;

use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MoviesExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $response = Http::api()->get('movies');
        return collect($response->json('movies'));
    }

    public function headings(): array
    {
        return ['ID', 'Title', 'Director', 'Release Year', 'Rating'];
    }
}
