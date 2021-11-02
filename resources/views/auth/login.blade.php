
@extends('layouts.admin_template')

@section('content')



        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" class="form-control" type="email" name="email" :value="{{old('email')}}" required autofocus />
            </div>

            <!-- Password -->

              <div class="form-group">
                <label for="email">Password</label>
                <input id="password" class="form-control" type="password" name="password" :value="{{old('email')}}" required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
           <!--  <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div> -->
             

              <button type="submit" class="btn btn-info btn-block">Login</button>

                      <!-- Session Status -->
				       <x-auth-session-status class="mb-4" :status="session('status')" />

				      <!-- Validation Errors -->
				        <x-auth-validation-errors class="mb-4" :errors="$errors" />

               <div class="mg-t-10 tx-center">Not yet a member? <a href="{{ route('register') }}" class="tx-info">Sign Up</a></div>

                 @if (Route::has('password.request'))
                 <div class="tx-center">Forget Password??<a href="{{ route('password.request') }}" class="tx-info">Click Here</a></div>
                @endif
        </form>
@endsection