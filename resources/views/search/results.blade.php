<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('search.form') }}">ValueSERP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('search.form') }}">Search</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/export-csv') }}">Download CSV</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
    <div class="row justify-content-center">
        @foreach ($results as $query => $result)
        @if($query != "")
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">
                        Results for "{{ $query }}"
                    </h4>
                </div>                
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Title</th>
                                <th>Link</th>
                                <th>Snippet</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Example Row 1 -->
                            @foreach ($result as $obj)
                            <tr>
                                <td>{{ $obj['title'] }}</td>
                                <td>{{ $obj['link'] }}</td>
                                <td>{{ $obj['snippet'] }}</td>                                
                            </tr>
                            @endforeach
                        </tbody>                        
                    </table>
                </div>                
            </div>
        </div>
        @endif
        @endforeach
    </div>    
</div>

</body>
</html>