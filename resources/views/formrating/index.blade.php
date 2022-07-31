@extends('layouts.main')
@section('section')
<section>
    <div class="center">
        <h3>Insert Rating</h3>
    </div>
    <div>
        <form action="/booklist" method="post">
            @csrf
            @error('author_id')
            <div>{{ $message }}</div>
            @enderror
            <div class="mb-10 grid-container">
                <label for="">Book Author :</label>    
                <select name="author_id" id="" class="@error('author_id') is invalid @enderror">
                    <option disable selected value></option>
                    @foreach($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->authorName }}</option>
                    @endforeach
                </select>
            </div>    
            @error('book_id')
            <div>{{ $message }}</div>
            @enderror
            <div class="mb-10 grid-container">
                <label for="">Book Name :</label>
                <select name="book_id" id="" class="capitalized @error('book_id') is invalid @enderror">
                    <option disable selected value></option>
                    @foreach($authors as $author)
                    @foreach($author->books as $book)
                    <option value="{{ $book->id }}" class="capitalized">{{ $book->bookName }}</option>
                    @endforeach
                    @endforeach
                </select>
            </div>
            @error('rating')
            <div>{{ $message }}</div>
            @enderror
            <div class="mb-10 grid-container">
                <label for="">Rating :</label>
                <select name="rating" id="" class="@error('rating') is invalid @enderror">
                    <option disable selected value></option>
                    @foreach($values as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-30">
                <button type="submit" class="btn-primary">SUBMIT</button>
            </div>
        </form>
    </div>
</section>
@endsection