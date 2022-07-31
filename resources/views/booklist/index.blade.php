@extends('layouts.main')
@section('section')
<section>
    <div>
        <div>
            <form action="/booklist" method="get">
                <div class="mb-10">
                    <label>List Shown : </label>
                    <select name="numberOfRecord" id="">
                        <option disable selected value></option>
                        @foreach($listShownNumbers as $listShownNumber)
                        <option value="{{ $listShownNumber }}">{{ $listShownNumber }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-10">
                    <label>Search</label>
                    <input type="search" name="search">
                </div>
                <div class="mb-10">
                    <button type="submit" class="btn-primary">SUBMIT</button>
                    <div class="border inline-block">
                        <a href="/booklist/create" class="center">Give Rating</a>
                    </div>
                </div>
            </form>
        </div>
        <table border="1">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Book Name</th>
                    <th>Category Name</th>
                    <th>Author Name</th>
                    <th>Average Rating</th>
                    <th>Voter</th>
                </tr>
            </thead>
            <tbody>
            @foreach($books as $book => $b)
            <tr>
                <td>{{ $book + 1 }}</td>
                <td class="capitalized">{{ $b->bookName }}</td>
                <td class="capitalized">{{ $b->category->categoryName }}</td>
                <td>{{ $b->author->authorName }}</td>
                <td>{{ $b->ratings->avg('rating') }}</td>
                <td>{{ $b->ratings->count('author_id') }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</section>
@endsection