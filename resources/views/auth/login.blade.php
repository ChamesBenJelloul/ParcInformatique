<html lang="en">
<head>
    <title>{{ config('app.name', 'ParcInformatique') }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/custom1.css') }}" />
    <link rel="shortcut icon" href="{{ asset('img/mylogo.ico') }}">
</head>
<body class="">
<div class="login-page" >
    <div class="row">
        <div class="col-md-4 col-lg-4 col-md-offset-4 col-lg-offset-4">
            <img src="{{ asset('img/logo.jpg') }}" class="user-avatar" />
            <h1>Parc Informatique</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-content" >
                    <div class="form-group">
                        <input type="text" class="form-control input-underline input-lg{{ $errors->has('username') ? ' is-invalid' : '' }}" id="username" placeholder="Nom d'utilisateur" name="username" value="{{ old('username') }}" required autofocus>
                        @if ($errors->has('username'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input id="password" type="password" class="form-control input-underline input-lg{{ $errors->has('password') ? ' is-invalid' : '' }}"  placeholder="Mot De Passe" name="password" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <input type="submit" class="btn btn-white btn-outline btn-lg btn-rounded progress-login" value="S'identifier" />
                &nbsp;
            </form>
        </div>
    </div>
</div>

</body>
</html>
