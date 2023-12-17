<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin | Login</title>

    <style>
        body {
            background-color: black;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container1 {
            background-color: #f2db83;
            height: 50vh;
            width: 50vw;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .container2 {
            background-color: #dba506;
            height: 100vh;
            width: 50vw;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .luar1 {
            background-color: #dba506;
            height: 60vh;
            width: 60vw;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .luar2 {
            background-color: #f2db83;
            height: 110vh;
            width: 60vw;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .content {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <form action="{{route('admin.cekLogin')}}" method="POST">
        @csrf
        <div class="luar1">
            <div class="container1">
              <h1>Login Page</h1>
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
            </div>
        </div>
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
</body>

</html>