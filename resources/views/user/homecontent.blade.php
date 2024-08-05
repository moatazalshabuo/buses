@extends('user.home')
@section('content')
<div>
    @if (session('status'))
    <div class="max-w-md mx-auto mt-4 bg-green-100 text-green-800 p-4 rounded">
        {{ session('status') }}
    </div>
@endif
    @include('user.profile', ['user' => Auth::user()])

@endsection
