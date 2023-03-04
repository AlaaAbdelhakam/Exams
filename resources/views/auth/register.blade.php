@extends('layouts.app-master')

@section('content')
    <form method="post" action="{{ route('register.perform') }}">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div class="container text-center" style="height:100%;width:50%;">
            <img class="mb-4" src="{!! url('images/transparent-exam.png') !!}" alt="" width="72" height="57">

            <h1 class="h3 mb-3 fw-normal text-center">Register</h1>

            <div class="form-group form-floating mb-3">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                    placeholder="name@example.com" required="required" autofocus>
                <label>Email address</label>
                @if ($errors->has('email'))
                    <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="name"
                    required="required" autofocus>
                <label>name</label>
                @if ($errors->has('name'))
                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                @endif
            </div>


            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}"
                    placeholder="Phone Number" required="required" autofocus>
                <label>Phone Number</label>
                @if ($errors->has('phone'))
                    <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
                @endif
            </div>

            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="national_id" value="{{ old('national_id') }}"
                    placeholder="National ID" required="required">
                <label>National ID</label>
                @if ($errors->has('national_id'))
                    <span class="text-danger text-left">{{ $errors->first('national_id') }}</span>
                @endif
            </div>



            <button class="w-100 btn btn-lg btn-primary" type="submit">Register to Start Your Exam</button>
        </div>
        {{-- @include('auth.partials.copy') --}}
    </form>
@endsection
