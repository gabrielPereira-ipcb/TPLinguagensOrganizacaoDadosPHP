<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ESTCursosDigitais - Página Inicial</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        h1, h2 {
            color: #2c3e50;
            text-align: center;
        }
        h1 {
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }
        .container {
            text-align: center;
            margin-bottom: 30px;
            font-size: 1.2em;
            color: #555;
        }
        .nav-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 40px;
        }
        a {
            display: inline-block;
            padding: 10px 15px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        a:hover {
            background-color: #2980b9;
        }
        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        input[type="text"], input[type="password"], select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #2ecc71;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #27ae60;
        }
        @media (min-width: 768px) {
            .form-container {
                display: flex;
                justify-content: space-between;
                gap: 40px;
            }
            .form-container > div {
                flex: 1;
            }
        }
    </style>
</head>
<body>
    <h1>Bem-vindo à Empresa de Formação ESTCursosDigitais</h1>
    <div class="container">
        <span class="texto">Formação em Competências Digitais</span>
    </div>
    <div class="nav-links">
        <a href="informacao_empresa.php">Informações sobre a Empresa</a>
        <a href="informacao_cursos.php">Informações sobre cursos</a>
    </div>

    <div class="form-container">
        <div>
            <h2>Login</h2>
            <form action="login.php" method="POST">
                <input type="text" name="user_name" placeholder="Nome de usuário">
                <input type="password" name="password" placeholder="Senha">
                <input type="submit" value="Entrar">
            </form>
        </div>
        <div>
            <h2>Registo</h2>
            <form action="registo.php" method="post">
                <input type="text" name="nome" placeholder="Nome">
                <input type="text" name="ultimo_nome" placeholder="Último nome">
                <input type="text" name="e_mail" placeholder="E-mail">
                <input type="text" name="user_name" placeholder="Nome de usuário">
                <input type="password" name="password" placeholder="Senha">
                <select name="perfil">
                    <option value="">Selecione o perfil</option>
                    <option value="aluno">Aluno</option>
                    <option value="docente">Docente</option>
                    <option value="admin">Administrador</option>
                </select>
                <input type="submit" value="Registar-se">
            </form>
        </div>
    </div>
</body>
</html>