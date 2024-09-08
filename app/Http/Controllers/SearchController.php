<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ValueSerpService;

class SearchController extends Controller
{
    protected $valueSerpService;

    public function __construct(ValueSerpService $valueSerpService)
    {
        $this->valueSerpService = $valueSerpService;
    }

    public function showForm()
    {
        return view('search.form');
    }

    public function handleSearch(Request $request)
    {
        $queries = $request->input('queries');
        $results = [];

        foreach ($queries as $query) {
            $results[$query] = $this->valueSerpService->search($query);
        }

        return view('search.results', ['results' => $results]);
    }

    public function exportToCsv()
    {
        $csvFilePath = storage_path('app\serp_results.csv');
        return response()->download($csvFilePath)->deleteFileAfterSend(true);
    }
}
