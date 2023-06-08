@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"  style="background:#05300e; color:#fff; font-weight:bold;">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-3">
                                <small style="font-size:10px;">First Name</small>
                                <input id="firstname" type="text" placeholder="First Name" class="form-control @error('name') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
                            </div>
                            <div class="col-md-3">
                                <small style="font-size:10px;">Middle Name</small>
                                <input id="middlename" type="text" placeholder="Middle Name" class="form-control @error('name') is-invalid @enderror" name="middlename" value="{{ old('middlename') }}" required autocomplete="middlename" autofocus>
                            </div>
                            <div class="col-md-3">
                            <small style="font-size:10px;">Last Name</small>
                                <input id="lastname" type="text" placeholder="Last Name" class="form-control @error('name') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                            </div>
                            <div class="col-md-3">
                            <small style="font-size:10px;">LRN Number</small>
                                <input id="lrn_number" type="number" placeholder="LRN Number" class="form-control @error('lrn_number') is-invalid @enderror" name="lrn_number" value="{{ old('lrn_number') }}" required autocomplete="lrn_number" autofocus>
                            </div>
                            @error('lrn_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                           
                        </div>

                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <small style="font-size:10px;">Gender</small>
                                <select id="gender" type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}" required autocomplete="gender">
                                    <option disabled selected hidden value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <!-- @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror -->
                            </div>
                            <div class="col-md-3 mb-3">
                                <small style="font-size:10px;">Age</small>
                                <input id="age" type="number" placeholder="Age" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" required autocomplete="age">
                                <!-- @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror -->
                            </div>
                            <div class="col-md-3 mb-3">
                                <small style="font-size:10px;">Grade Level</small>
                                <select id="grade_level" type="text" class="form-control @error('grade_level') is-invalid @enderror" name="grade_level" value="{{ old('grade_level') }}" required autocomplete="grade_level">
                                    <option disabled selected hidden value="">Select Grade Level</option>
                                    <option value="Grade 10">Grade 10</option>
                                    <option value="Grade 12">Grade 12</option>
                                </select>
                                @error('grade_level')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-3">
                                <small style="font-size:10px;">Section</small>
                                <input id="section" type="text" placeholder="Section" class="form-control @error('section') is-invalid @enderror" name="section" value="{{ old('section') }}" required autocomplete="section">
                                <!-- @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <small style="font-size:10px;">Birth Date</small>
                                <input id="birth_date" type="date" value="yyyy-MM-dd" placeholder="Birth Date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" value="{{ old('birth_date') }}" required autocomplete="birth_date">
                                
                                @error('birth_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <small style="font-size:10px;">Home Address</small>
                                <input id="home_address" type="text" placeholder="Home Address" class="form-control @error('home_address') is-invalid @enderror" name="home_address" value="{{ old('home_address') }}" required autocomplete="home_address">

                                @error('home_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <small style="font-size:10px;">Phone Number</small>
                                <input id="phone_number" type="tel" pattern="[0-9]{11}" placeholder="Phone Number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number">

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                            <small style="font-size:10px;">Parent's Name</small>
                                <input id="parent_name" type="text" placeholder="Parent Name" class="form-control @error('parent_name') is-invalid @enderror" name="parent_name" value="{{ old('parent_name') }}" required autocomplete="parent_name">

                                @error('parent_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <small style="font-size:10px;">Email Address</small>
                                <input id="email" type="email" placeholder="Email Address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                            <small style="font-size:10px;">Username</small>
                                <input id="username" type="username" placeholder="Username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <small style="font-size:10px;">Password</small>
                                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                            <small style="font-size:10px;">Confirm Password</small>
                                <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-9">
                                <button type="submit" class="registerbtn">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
