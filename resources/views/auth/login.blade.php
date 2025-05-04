<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión | KizumaScore</title>
    <style>
        :root {
            --primary: #1a1a2e;
            --secondary: #16213e;
            --accent: #f9c80e;
            --text: #e6e6e6;
            --highlight: #0f3460;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--text);
        }
        
        .login-container {
            background-color: rgba(26, 26, 46, 0.8);
            padding: 2.5rem;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 400px;
            border: 1px solid var(--highlight);
            position: relative;
            overflow: hidden;
        }
        
        .login-container::before {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: url('https://images.unsplash.com/photo-1574629810360-7efbbe195018?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center;
            background-size: cover;
            opacity: 0.1;
            z-index: -1;
        }
        
        h1 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: var(--accent);
            font-size: 2rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        form {
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
        }
        
        input {
            padding: 12px 15px;
            border: 2px solid var(--highlight);
            border-radius: 5px;
            background-color: rgba(15, 52, 96, 0.3);
            color: var(--text);
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        input:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(249, 200, 14, 0.3);
        }
        
        input::placeholder {
            color: #a0a0a0;
        }
        
        button {
            background-color: var(--accent);
            color: var(--primary);
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 0.5rem;
        }
        
        button:hover {
            background-color: #ffd700;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(249, 200, 14, 0.4);
        }
        
        a {
            display: block;
            text-align: center;
            margin-top: 1.5rem;
            color: var(--accent);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        
        a:hover {
            color: #ffd700;
            text-decoration: underline;
        }
        
        @media (max-width: 480px) {
            .login-container {
                padding: 1.5rem;
                margin: 0 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Iniciar Sesión</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="email" name="email" placeholder="Correo" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Entrar</button>
        </form>
        <a href="{{ route('register') }}">¿No tienes cuenta? Regístrate</a>
    </div>
</body>
</html>
