<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ValueSerpService;
use App\Rules\AtLeastOneFilled;

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
        $validatedData = $request->validate([
            'queries' => ['required', 'array', new AtLeastOneFilled],
            'queries.*' => 'nullable|string|max:255',
        ], [
            'queries.*.max' => 'Each search query must be no more than 255 characters.',
        ]);

        $queries = $validatedData['queries'];
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
