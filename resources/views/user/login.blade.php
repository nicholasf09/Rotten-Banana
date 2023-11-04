@extends('admin.layout.main')
@section('content')
    <form action="{{route('user.cekLogin')}}" method="POST">
        @csrf  
        <label for="email">Email: </label>
        <input type="email" id="email" name="email">
        <br><br>
        <label for="email">Password: </label>
        <input type="password" id="password" name="password">
        <br><br>
        <input type="submit">
    </form>
@endsection