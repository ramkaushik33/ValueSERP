<!DOCTYPE html>
<html>
<head>
    <title>Search Form</title>
</head>
<body>
    <h1>Search Form</h1>
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
                <input type="text" name="queries[]" id="query{{ $i }}">
            </div>
        @endfor
        <button type="submit">Search</button>
    </form>
</body>
</html>
