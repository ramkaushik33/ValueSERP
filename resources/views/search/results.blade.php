<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
</head>
<body>
    <a href="{{ url('/export-csv') }}" class="btn btn-primary">Download CSV</a>
    <h1>Search Results</h1>
    @foreach ($results as $query => $result)
        <h2>Results for "{{ $query }}"</h2>
        <pre>{{ print_r($result, true) }}</pre>
    @endforeach
    <a href="{{ route('search.form') }}">Back to Search</a>
</body>
</html>