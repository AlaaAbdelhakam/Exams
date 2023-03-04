@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h2>Add new post</h2>
        <div class="lead">
            Add new post.
        </div>

        <div class="container mt-4">
            {{-- @foreach ($posts as $key => $post) --}}
           
                {{-- <td>{{ $posts->id }}</td> --}}
                {{-- {{ $collection->first() }} --}}
                <td>{{ $posts->question }}</td>
                {{-- <td>
                    <a class="btn btn-info btn-sm" href="{{ route('posts.show', $post->id) }}">Show</a>
                </td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('posts.edit', $post->id) }}">Edit</a>
                </td> --}}
                {{-- <td>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['posts.destroy', $post->id], 'style' => 'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                </td> --}}

        {{-- @endforeach --}}
            <form method="POST" action="{{ route('posts.store') }}">
                @csrf
                {{-- <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input value="{{ old('title') }}" type="text" class="form-control" name="title" placeholder="Title"
                        required>

                    @if ($errors->has('title'))
                        <span class="text-danger text-left">{{ $errors->first('title') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input value="{{ old('description') }}" type="text" class="form-control" name="description"
                        placeholder="Description" required>

                    @if ($errors->has('description'))
                        <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                    @endif
                </div> --}}

                <div class="mb-3">
                    {{-- <label for="answer" class="form-label">answer</label> --}}
                    <textarea class="form-control" name="answer" placeholder="answer" required>{{ old('answer') }}</textarea>

                    @if ($errors->has('answer'))
                        <span class="text-danger text-left">{{ $errors->first('answer') }}</span>
                    @endif
                </div>


                <button type="submit" class="btn btn-primary">Save role</button>
                <a href="{{ route('posts.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>
@endsection
