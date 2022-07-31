@extends('layouts.main')
@section('section')
<section>
    <div class="center">
        <h3>Top 10 Most Famous Author</h3>
    </div>
    <div class="center">
        <table border="1">
            <tr>
                <td>No.</td>
                <td>Author Name</td>
                <td>Voter</td>
            </tr>
            @foreach($authors as $author => $a)
            <tr>
                <td>{{ $author + 1 }}</td>
                <td>{{ $a->authorName }}</td>
                <td>{{ $a->ratings_count }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</section>
@endsection