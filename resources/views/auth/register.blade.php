@extends('layouts.app')

@section('content')
   

    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Register</h3>
                        {{-- <p>Fill in the data below.</p> --}}
                        <form method="post" action="{{ route('register.perform') }}">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <div class="col-md-12 ">
                                <input type="email" class="form-control " name="email" value="{{ old('email') }}"
                                placeholder="name@example.com" required="required" autofocus>     
                                <label >Email</label>
                            </div>

                            <div class="col-md-12">
                                <input type="text" class="form-control " name="name" value="{{ old('name') }}" placeholder="name"
                                required="required" autofocus>
                                
                                <label>Name</label>
                            </div>

                           <div class="col-md-12">
                            <input type="text" class="form-control " name="phone" value="{{ old('phone') }}"
                            placeholder="Phone Number" required="required" autofocus>
                            <label>Phone</label>
                           </div>


                           <div class="col-md-12">
                            <input type="text" class="form-control " name="national_id" value="{{ old('national_id') }}"
                            placeholder="National ID" required="required">
                            
                            <label>National ID</label>
                           </div>


                        <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Register And Start Your Exam</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
