<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - POS</title>
</head>
<body>

    <h1>Register</h1>

    @if ($errors->any())
        <div style="color: red;">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ url('/register') }}" method="POST">
        @csrf

        <div>
            <label>Nama</label><br>
            <input type="text" name="name"
                   value="{{ old('name') }}" required>
        </div>

        <br>

        <div>
            <label>Email</label><br>
            <input type="email" name="email"
                   value="{{ old('email') }}" required>
        </div>

        <br>

        <div>
            <label>Password</label><br>
            <input type="password" name="password" required>
        </div>

        <br>

        <div>
            <label>Konfirmasi Password</label><br>
            <input type="password"
                   name="password_confirmation" required>
        </div>

        <br>

        <button type="submit">Register</button>
    </form>

    <p>
        Sudah punya akun?
        <a href="{{ url('/login') }}">Login</a>
    </p>

</body>
</html>
