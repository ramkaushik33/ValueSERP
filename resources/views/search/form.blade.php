<!DOCTYPE html>
<html>
<head>
    <title>Search Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('search.form') }}">ValueSERP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>        
    </div>
</nav>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Search Form</h4>
                </div>
                <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('search.handle') }}" method="POST">
                    @csrf
                    @for ($i = 0; $i < 5; $i++)
                        <div>
                            <label for="query{{ $i }}">Search Query {{ $i + 1 }}:</label>
                            <input type="text" class="form-control" name="queries[]" id="query{{ $i }}">
                        </div>
                    @endfor
                    <div class="container mt-5">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>                    
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
