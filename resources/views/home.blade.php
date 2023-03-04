@extends('layouts.app-master')

@section('content')
<div style="height: 100%;width:100%;text-align:center;">
    <a href="{{ route('register.perform') }}" class="btn btn-warning py-2 mb-2">Press Here To Register For Your Exam</a>

            <img class="" src="{!! url('images/online examination.jpg') !!}" alt="" style="height:30%; width:90%" >

           
</div>
@endsection
