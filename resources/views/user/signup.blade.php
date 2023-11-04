@extends('user.layout.main')
@section('content')

<form action="{{route('user.store')}}" method="POST">
    @csrf
    <label for="name">Name: </label>
    <input type="text" id="name" name="name">
    <br><br>
    <label for="email">Email: </label>
    <input type="email" id="email" name="email">
    <br><br>
    <label for="password">Password: </label>
    <input type="password" id="password" name="password">
    <br><br>
    <input type="submit">
</form>



@endsection