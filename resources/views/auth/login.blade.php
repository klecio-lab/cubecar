<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login CubeCar</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    <div class="container">
        <div class="form-image">
            <img src="assets/img/cubeCarLogin.png">
        </div>
        <div class="form">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-header">
                    <div class="title">
                        <img src="assets/img/cubeCarpngPreto.png">
                        <h1>Login</h1>
                    </div>
                    <div class="login-button">
                        <button><a href="{{ route('register') }}">Cadastro</a></button>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="email">Email</label>
                        <input id="email" name="email" type="email" placeholder="Digite seu email" required>
                    </div>
                    <div class="input-box">
                        <label for="password">Senha</label>
                        <input id="password" name="password" type="password" placeholder="Digite sua senha" required>
                    </div>

                </div>
                <div class="continue-button">
                    <button type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
