@extends('layouts.admin_template')

        <!-- Validation Errors -->
        <!-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> -->

        @section('content')

        <form method="POST" action="{{ route('register') }}">
            @csrf

         <div class="form-group">
          <input type="text" class="form-control" id="name" name="name" value="{{old('name')}} " placeholder="Enter your user name" required autofocus>
        </div>

        <div class="form-group">
          <input type="email" class="form-control" id="email" name="email" value="{{old('email')}} " placeholder="Enter your email" required>
        </div>

        <div class="form-group">
          <input type="password" class="form-control" id="password" name="password"  placeholder="Enter your password" required autocomplete="new-password">
        </div>

        <div class="form-group">
          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"  placeholder="Enter your password" required autocomplete="new-password">
        </div>

        <div class="form-group">
             <button type="submit" class="btn btn-info btn-block">Login</button>
        </div>

         <div class="mg-t-10 tx-center">Already registered?
           <a href="{{ route('login') }}" class="tx-info">Login Here</a>
         </div>
  
        </form>

        @endsection 
