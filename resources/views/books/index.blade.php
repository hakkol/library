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
                @if (!$books->isEmpty())
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Authors</th>
                                <th>Year</th>
                                <th>Count</th>
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
