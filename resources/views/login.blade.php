@extends('layouts.app-master')

@section('content')
    <form method="post" action="{{ route('login.perform.candidate') }}">
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div class="text-center container" style="width:50%;height:100%;">
        <h1 class="h3 mb-3 fw-normal text-center">Login</h1>
        <input type='hidden' name='password' value='0'>

        @include('layouts.partials.messages')

      
        <div class="form-group form-floating mb-3">
            <input type="national_id" class="form-control" name="national_id" value="{{ old('national_id') }}" placeholder="national_id" required="required">
            <label for="floatingnational_id">National_id</label>
            @if ($errors->has('national_id'))
                <span class="text-danger text-left">{{ $errors->first('national_id') }}</span>
            @endif
        </div>
        <div class="mb-3">
            <label for="template" class="form-label">Template</label>
            <select class="form-select mt-3"  name="template"  required>
                <option selected value="">Select template</option>

                @foreach ($templates as $template)

                <option value="{{ $template->id }}">{{ $template->name }}</option>
                @endforeach
         </select>
         
            @if ($errors->has('template'))
                <span class="text-danger text-left">{{ $errors->first('template') }}</span>
            @endif
        </div>
       
        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
    </div>
        {{-- @include('auth.partials.copy') --}}
    </form>
@endsection