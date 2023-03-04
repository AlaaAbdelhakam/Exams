@extends('layouts.app-master')

@section('content')
    {{-- <h1 class="mb-3">Laravel 8 User Roles and Permissions Step by Step Tutorial - codeanddeploy.com</h1> --}}

    <div class="bg-light p-4 rounded">
        <h2>Questions</h2>
        <div class="lead">
            {{-- Manage your posts here. --}}
            {{-- <a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm float-right">Add post</a> --}}
        </div>

        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>
        <div class="mx-0 mx-sm-auto">
            <div class="card">
                <div class="card-body ">
                    @if ($posts->count() === 1)
                        {{-- <form class="px-2" method="POST"  action="{{ route('posts.store') }}" id="theform">
                            {{ csrf_field() }}
                            
                            @method('PUT')
                            <input type="hidden" name="_method" value="PUT"> --}}
                            <form method="POST" action="{{ route('posts.finish', $post->id) }}">
                                @method('patch')
                                @csrf
                            

                            {{-- <input type="hidden" name="_method" value="patch"> --}}
                    @else
                    <form method="POST" action="{{ route('posts.update', $post->id) }}">
                        @method('patch')
                        @csrf
                            {{-- <form class="px-2" method="POST" action="{{ route('posts.finish') }}">
                                @csrf
                                @method('post')
                                <input type="hidden" name="_method" value="post"> --}}
                    @endif 

                    {{-- <form  action="">{{ $post['id'] }}{{ $examanswers[$key]->payment }} --}}
                    {{-- <p class="text-center"><strong>How do you rate customer support:</strong></p> --}}
                    {{-- @foreach ($post as $key => $ques) --}}
                    {{-- {{ dd($post->count()); }} --}}


                        <p class="text-center"><strong>{{ $post->questions->question }}</strong></p>
                        @if ($post->questions->image)
                        <div class="text-center m-3">
                            <img src="/storage/{{ $post->questions->image }}" alt=""  width="500px" height="500px">
                            </div>
                        @endif
                            
                        <!-- Message input -->
                        @if ($post->questions->isComplete())
                            <input class="form-check-input" type="hidden" name="id" value="{{ $post->questions->id }}" />

                            <div class="form-outline mb-4">
                                <textarea class="form-control" name="candidate_answer" id="form4Example6" rows="4"></textarea>
                                <label class="form-label" for="form4Example6">Your answer</label>
                            </div>
                        @elseif ($post->questions->isTrueorFalse())
                            <div class="row col-5">

                                <h4 class="fw-bold text-center mt-3"></h4>
                                <input class="form-check-input" type="hidden" name="id" value="{{ $post->questions->id }}" />

                                {{-- <p class="fw-bold">How satisfied are you with our product?</p> --}}
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" value="false" name="candidate_answer"
                                        id="radioExample1" />
                                    <label class="form-check-label" for="radioExample1">
                                        false
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" value="true" name="candidate_answer"
                                        id="radioExample2" />
                                    <label class="form-check-label" for="radioExample2">
                                        true
                                    </label>
                                </div>

                            </div>
                        @elseif ($post->questions->isMultipleChoice())
                            {{-- <div class="row col-5">
                    <h4 class="fw-bold text-center mt-3"></h4>
                    <form class=" bg-white px-4" action="">
                      <p class="fw-bold">How satisfied are you with our product?</p> --}}
                            {{-- @foreach ($answers->where('id', $post->questions->id)->first() as $answer) --}}

                            <input class="form-check-input" type="hidden" name="id" value="{{ $post->questions->id }}" />

                            {{-- @if (is_array($answers->where('id', $post->questions->id)) || is_object($answers->where('id', $post->questions->id))) --}}

                            @foreach ($answers as $answer)
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="candidate_answer"
                                        id="radioExample1" value="{{ $answer->possible_answer }}" />
                                    <label class="form-check-label" for="radioExample1">
                                        {{ $answer->possible_answer }}
                                    </label>
                                </div>
                            @endforeach

                            {{-- @endif --}}
                            {{-- </form>
                        {{-- </div> --}}
                        @endif
                    {{-- @endforeach --}}

                </div>
                {{-- @foreach ($post->questionss as $q_value) --}}
                {{-- {{ dd($posts->hasMorePages()); }} --}}
                @if ($posts->count() ===1 )
                {{-- @if ($post->hasMorePages()) --}}
                {{-- {{ dd($post->count()); }} --}}
                    {{-- <div class="card-footer text-end">
                        <a href="{{ $posts->nextPageUrl() }}" type="submit" name="_token"
                            onclick="event.preventDefault(); document.getElementById('theform').submit(); "
                            class="btn btn-primary" name="_method" value="POST">Next</a>
                        {{-- <button type="submit"  onchange="window.location.href='{{ $posts->nextPageUrl() }}'" class="btn btn-primary">Next</button> --}}
                        {{-- <button type="submit"   class="btn btn-primary">Next</button> --}}
                        {{-- {!! Form::hidden('redirects_to', URL::current().'?page='.$posts->currentPage()+1) !!} --}}

                        {{-- {{ dd($posts); }}total --}}
                      {{-- {{ dd(); }} --}}
                        {{-- <button type="button" class="btn btn-primary">Next</button> --}}
                    {{-- </div>  --}}
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Finish</button>
                    </div>
                   
                @else
                {!! Form::hidden('redirects_to', URL::current()) !!}

                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary">Next</button>
                </div>
                @endif
                    {{-- @if ($posts->lastpage())
                      {{   Session::flush(); }}  
                    @endif --}}
                {{-- @endforeach --}}
                        
              
            </div>
            </form>
        </div>
        {{-- {{ $posts->links() }} --}}
        {{-- {{ $posts->onEachSide(1)->links() }} --}}
    </div>
  
@endsection
