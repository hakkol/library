@extends('layouts.app')

@section('title')
    Books
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12" >
                <h2>Books</h2>
            </div>

            <div class="col-md-12">
                <form
                    class="js-disable-when-submit form-group"
                    action="{{ action('BookController@index') }}"
                    method="GET"
                >
                    <div class="form-group">
                        <label for="search">Author/Book</label>
                        <input
                            type="text"
                            id="search"
                            name="search"
                            class="form-control"
                            require
                            value="{{ request()->search }}"
                        >
                    </div>

                    <button type="submit" class="btn btn-success">Search</button>
                </form>
            </div>

            <div class="col-md-12">
                @if (!$books->isEmpty())
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Authors</th>
                                <th>Year</th>
                                <th>Count</th>
                                <th></th>
                                <th>Created at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td>{{ $book->title }}</td>
                                    <td>
                                        @if ($book->authors->isNotEmpty())
                                            @foreach ($book->authors as $author)
                                                {{ $author->name }}<br>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>{{ $book->year }}</td>
                                    <td>{{ $book->count }}</td>
                                    <th>
                                        <img
                                            src="{{ url($book->image_path) }}"
                                            alt="{{ $book->title }}"
                                            width="100px"
                                        >
                                    </th>
                                    <td>{{ $book->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {!! $books->appends(Request::input())->links() !!}
                    </div>
                @else
                    <h3>Books not found</h3>
                @endif
            </div>
        </div>
    </div>
@endsection
