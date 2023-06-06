@extends('layouts.app-master')

@section('content')
    <h1 class="mb-3">Candidates Platform</h1>

    <div class="bg-light p-4 rounded">
        <h1 style="color: black;">score users</h1>
        <div class="lead">

        </div>

        <div class="container mt-4">
            <form method="post" action="{{ route('users.update', $user->id) }}">
                @method('patch')
                @csrf

               
                <div class="mb-3">
                    <label for="candidate" class="form-label">Candidate</label>
                    <select class="form-control" name="name" required>
                        <option value="">Select Candidate</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ $user->name ? 'selected' : '' }}>
                                {{ $user->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('user'))
                        <span class="text-danger text-left">{{ $errors->first('user') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="candidate" class="form-label">Exams</label>
                    <select class="form-control" name="name" required>
                        <option value="">Select Exam</option>
                        @foreach ($exams as $exam)
                            <option value="{{ $exam->id }}" {{ $exam->date ? 'selected' : '' }}>
                                {{ $exam->date }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('exam'))
                        <span class="text-danger text-left">{{ $errors->first('exam') }}</span>
                    @endif
                </div>

              

        </div>

    </div>
    <div class="mt-2">
        @include('layouts.partials.messages')
    </div>

    <table class="table table-bordered">
        <thead>

            <tr>
                <th>Qusetion</th>
                <th>Answer</th>
                <th>Candidate Answer</th>
                <th>Sign</th>

            </tr>
        </thead>
        <tbody>
            <tr>

                <td>{{ $question->question }}</td>



                <td>{{ $question->answer }}</td>


                <td>{{ $answer->candidate_answer }}</td>


                <td>
                    <a class="btn btn-info btn-sm" href="">true</a>
                    <a class="btn btn-danger btn-sm" href="">false</a>

                </td>
                
                </form>
            </tr>
        </tbody>
    </table>

    <div class="d-flex">
       
    </div>

    </div>
@endsection
