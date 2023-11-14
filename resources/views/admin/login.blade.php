@extends('admin.layout.main')
@section('content')

<style>
    .error-message {
        color: red;
        font-size: 14px;
        margin-top: 5px;
    }
</style>

<form action="{{route('admin.cekLogin')}}" method="POST">
    @csrf  
    <div style="position: relative;">
        <label for="email">Email: </label>
        <br>
        <input type="email" id="email" name="email" value="{{ old('email') }}">
        @error('email')
            <div class="error-message" style="position: absolute;top: 100%; left: 0">{{ $message }}</div>
        @enderror
    </div>  
    <br><br>
    <div style="position: relative">
        <label for="email">Password: </label>
        <br>
        <input type="password" id="password" name="password" value="{{old('password')}}">
        @error('password')
            <div class="error-message" style="position: absolute;top: 100%; left: 0">{{ $message }}</div>
        @enderror
    </div>
    <br><br>
    <input type="submit">
</form>

@if ($errors->any())
    <script>
            Swal.fire({
            icon: 'error',
            title: '{{ $errors->first() }}',
            text: 'Bisa memasukan ulang email dan password anda!',
        })
    </script>  
@endif
@endsection