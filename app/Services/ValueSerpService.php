<?php

namespace App\Services;

use GuzzleHttp\Client;

class ValueSerpService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('VALUE_SERP_API_KEY');
    }

    public function search($query)
    {
        if($query != ""){
            
            $response = $this->client->get('https://api.valueserp.com/search', [
                'query' => [
                    'q' => $query,
                    'api_key' => $this->apiKey
                ]
            ]);

            $jsonSearchResult = json_decode($response->getBody()->getContents());
            $organicResult = $jsonSearchResult->organic_results;
            
            $arrProcessedData = $this->processSerpData($organicResult);
            $this->storeCsv($arrProcessedData);

            return $arrProcessedData;

        }else{
            return [];
        }
        
    }

    public function processSerpData($data)
    {
        // Extract the relevant data from the response
        $structuredData = [];

        foreach ($data as $result) {
            $structuredData[] = [
                'title' => isset($result->title)?$result->title:'',
                'link' => isset($result->link)?$result->link:'',
                'snippet' => isset($result->snippet)?$result->snippet:''
            ];
        }

        return $structuredData;
    }

    public function storeCsv($structuredData)
    {
        // Open a file in write mode
        $csvFile = fopen(storage_path('app/serp_results.csv'), 'w');

        // Add the CSV headers
        fputcsv($csvFile, ['title', 'link', 'snippet']);

        // Loop through the structured data and write to the CSV file
        foreach ($structuredData as $row) {
            fputcsv($csvFile, $row);
        }

        // Close the file
        fclose($csvFile);
    }

}
