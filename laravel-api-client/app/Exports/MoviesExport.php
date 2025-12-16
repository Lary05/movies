<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\Http;

class MoviesExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $response = Http::api()->get('movies');
        $rows = $response->json('data') ?? $response->json();

        // alakítsuk át kollekcióvá (a csomag Expect Collection of arrays/Models)
        return collect($rows)->map(function($m){
            return [
                $m['id'] ?? $m->id,
                $m['title'] ?? $m->title,
                $m['director']['name'] ?? ($m->director->name ?? ''),
                $m['release_year'] ?? $m->release_year,
            ];
        });
    }

    public function headings(): array
    {
        return ['ID', 'Title', 'Director', 'Release Year'];
    }
}
