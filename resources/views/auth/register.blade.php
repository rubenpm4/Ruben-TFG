<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro | KizumaScore</title>
    <style>
        :root {
            --primary: #0f172a;
            --secondary: #1e293b;
            --accent: #facc15;
            --text: #f8fafc;
            --highlight: #3b82f6;
            --success: #22c55e;
            --error: #ef4444;
            --info: #3b82f6;
            --cookie-bg: rgba(30, 41, 59, 0.95);
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

        .register-container {
            background-color: rgba(30, 41, 59, 0.95);
            padding: 3rem 2.5rem;
            border-radius: 1rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.6);
            width: 100%;
            max-width: 480px;
            border: 1px solid var(--highlight);
            position: relative;
            overflow: hidden;
        }

        .register-container::before {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: url('https://images.unsplash.com/photo-1552667466-07770ae110d0?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center;
            background-size: cover;
            opacity: 0.07;
            z-index: -1;
        }

        h1 {
            text-align: center;
            margin-bottom: 2rem;
            color: var(--accent);
            font-size: 2.4rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        h1::after {
            content: "KizumaScore";
            display: block;
            font-size: 0.85rem;
            color: #cbd5e1;
            margin-top: 0.4rem;
            font-weight: normal;
            text-transform: none;
            letter-spacing: 2px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
        }

        input {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid var(--highlight);
            border-radius: 8px;
            background-color: rgba(59, 130, 246, 0.15);
            color: var(--text);
            font-size: 1rem;
            transition: border-color 0.3s, box-shadow 0.3s;
            box-sizing: border-box;
        }

        input:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(250, 204, 21, 0.3);
        }

        input.error {
            border-color: var(--error);
        }

        input.valid {
            border-color: var(--success);
        }

        input::placeholder {
            color: #94a3b8;
        }

        .password-container, .username-container {
            position: relative;
        }

        .password-match, .username-status, .password-strength {
            font-size: 0.85rem;
            margin-top: 0.3rem;
            display: none;
        }

        .password-match.valid, .username-status.valid, .password-strength.valid {
            color: var(--success);
            display: block;
        }

        .password-match.error, .username-status.error, .password-strength.error {
            color: var(--error);
            display: block;
        }

        .password-strength.info {
            color: var(--info);
            display: block;
        }

        button {
            background-color: var(--accent);
            color: var(--primary);
            padding: 14px;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 1rem;
        }

        button:hover {
            background-color: #fde047;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(250, 204, 21, 0.4);
        }

        button:disabled {
            background-color: #94a3b8;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 2rem;
            color: var(--accent);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #fde047;
            text-decoration: underline;
        }

        /* Estilos para el modal de cookies */
        .cookie-modal {
            display: none;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: var(--cookie-bg);
            padding: 1.5rem;
            box-shadow: 0 -5px 20px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            border-top: 2px solid var(--accent);
        }

        .cookie-content {
            max-width: 800px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .cookie-title {
            color: var(--accent);
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .cookie-text {
            color: var(--text);
            line-height: 1.5;
        }

        .cookie-buttons {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
        }

        .cookie-btn {
            padding: 0.5rem 1rem;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s;
        }

        .cookie-accept {
            background-color: var(--accent);
            color: var(--primary);
            border: none;
        }

        .cookie-accept:hover {
            background-color: #fde047;
        }

        @media (max-width: 480px) {
            .register-container {
                padding: 2rem 1.5rem;
                margin: 0 1rem;
            }

            h1 {
                font-size: 2rem;
            }

            .cookie-content {
                padding: 1rem;
            }

            .cookie-buttons {
                flex-direction: column;
                gap: 0.5rem;
            }

            .cookie-btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h1>Registro</h1>
        <form method="POST" action="{{ route('register') }}" id="registerForm">
            @csrf

            <div class="username-container">
                <input type="text" name="name" id="username" placeholder="Nombre de usuario" required>
                <div id="username-status" class="username-status"></div>
                @error('name')
                    <div class="username-status error">{{ $message }}</div>
                @enderror
            </div>

            <input type="email" name="email" placeholder="Correo electrónico" required>

            <div class="password-container">
                <input type="password" name="password" id="password" placeholder="Contraseña" required>
                <div id="password-strength" class="password-strength"></div>
            </div>

            <div class="password-container">
                <input type="password" name="password_confirmation" id="confirm_password" placeholder="Confirmar contraseña" required>
                <div id="password-match" class="password-match">¡Las contraseñas coinciden!</div>
            </div>

            <button type="submit" id="submitBtn" disabled>Registrarse</button>
        </form>
        <a href="{{ route('login') }}">¿Ya tienes cuenta? Inicia sesión</a>
    </div>

    <!-- Modal de Cookies -->
    <div id="cookieModal" class="cookie-modal">
        <div class="cookie-content">
            <div class="cookie-title">🍪 Uso de Cookies</div>
            <div class="cookie-text">
                Utilizamos cookies para mejorar tu experiencia en nuestro sitio web. Al registrarte, aceptas el uso de cookies según nuestra Política de Privacidad. Las cookies nos ayudan a personalizar contenido, proporcionar funciones de redes sociales y analizar nuestro tráfico.
            </div>
            <div class="cookie-buttons">
                <button class="cookie-btn cookie-accept" id="acceptCookies">Aceptar</button>
            </div>
        </div>
    </div>

    <script>
        const password = document.getElementById('password');
        const confirm_password = document.getElementById('confirm_password');
        const password_match = document.getElementById('password-match');
        const password_strength = document.getElementById('password-strength');
        const usernameInput = document.getElementById('username');
        const usernameStatus = document.getElementById('username-status');
        const submitBtn = document.getElementById('submitBtn');
        const cookieModal = document.getElementById('cookieModal');
        const acceptCookiesBtn = document.getElementById('acceptCookies');
        let usernameAvailable = false;
        let passwordValid = false;

        // Mostrar modal de cookies cuando el formulario se envía correctamente
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            if (!usernameAvailable || !passwordValid) {
                e.preventDefault();
                return;
            }
            
            // Solo mostramos el modal si el formulario es válido
            if (this.checkValidity()) {
                e.preventDefault(); // Prevenimos el envío para mostrar primero el modal
                showCookieModal();
            }
        });

        function showCookieModal() {
            cookieModal.style.display = 'block';
            document.body.style.overflow = 'hidden';
        }

        function hideCookieModal() {
            cookieModal.style.display = 'none';
            document.body.style.overflow = 'auto';
            // Enviamos el formulario después de aceptar las cookies
            document.getElementById('registerForm').submit();
        }

        acceptCookiesBtn.addEventListener('click', hideCookieModal);

        function checkPasswordStrength(pw) {
            let strength = 0;
            let messages = [];

            // Longitud mínima
            if (pw.length < 8) {
                messages.push("Al menos 8 caracteres");
            } else {
                strength++;
            }

            // Contiene mayúsculas
            if (!/[A-Z]/.test(pw)) {
                messages.push("Al menos una mayúscula");
            } else {
                strength++;
            }

            // Contiene minúsculas
            if (!/[a-z]/.test(pw)) {
                messages.push("Al menos una minúscula");
            } else {
                strength++;
            }

            // Contiene números
            if (!/[0-9]/.test(pw)) {
                messages.push("Al menos un número");
            } else {
                strength++;
            }

            // Contiene caracteres especiales
            if (!/[^A-Za-z0-9]/.test(pw)) {
                messages.push("Al menos un carácter especial");
            } else {
                strength++;
            }

            return { strength, messages };
        }

        function validatePassword() {
            const pw = password.value;
            const confirmPw = confirm_password.value;
            
            // Validar fortaleza de la contraseña
            if (pw.length > 0) {
                const { strength, messages } = checkPasswordStrength(pw);
                
                if (strength < 3) {
                    password_strength.textContent = "Contraseña débil: " + messages.join(", ");
                    password_strength.classList.remove('valid', 'info');
                    password_strength.classList.add('error');
                    passwordValid = false;
                } else if (strength < 5) {
                    password_strength.textContent = "Contraseña media: " + messages.join(", ");
                    password_strength.classList.remove('valid', 'error');
                    password_strength.classList.add('info');
                    passwordValid = true;
                } else {
                    password_strength.textContent = "Contraseña fuerte ✓";
                    password_strength.classList.remove('error', 'info');
                    password_strength.classList.add('valid');
                    passwordValid = true;
                }
            } else {
                password_strength.classList.remove('valid', 'error', 'info');
                passwordValid = false;
            }

            // Validar coincidencia de contraseñas
            const passwordsMatch = pw === confirmPw && pw !== '';
            
            if (pw !== '' && confirmPw !== '') {
                if (passwordsMatch && passwordValid) {
                    password_match.classList.add('valid');
                    password_match.classList.remove('error');
                    password_match.textContent = '¡Las contraseñas coinciden!';
                } else {
                    password_match.classList.remove('valid');
                    password_match.classList.add('error');
                    password_match.textContent = 'Las contraseñas no coinciden o no cumplen los requisitos';
                }
            } else {
                password_match.classList.remove('valid');
                password_match.classList.remove('error');
            }

            updateSubmitButton();
        }

        function updateSubmitButton() {
            const passwordsMatch = password_match.classList.contains('valid');
            submitBtn.disabled = !(usernameAvailable && passwordsMatch && passwordValid);
        }

        usernameInput.addEventListener('input', function () {
            const username = this.value.trim();

            if (username.length < 3) {
                usernameStatus.textContent = 'El nombre de usuario debe tener al menos 3 caracteres';
                usernameStatus.classList.remove('valid');
                usernameStatus.classList.add('error');
                usernameAvailable = false;
                updateSubmitButton();
                return;
            }

            fetch(`/check-username?username=${encodeURIComponent(username)}`)
                .then(response => response.json())
                .then(data => {
                    if (data.available) {
                        usernameStatus.textContent = 'Nombre de usuario disponible';
                        usernameStatus.classList.remove('error');
                        usernameStatus.classList.add('valid');
                        usernameAvailable = true;
                    } else {
                        usernameStatus.textContent = 'Este nombre de usuario ya está en uso';
                        usernameStatus.classList.remove('valid');
                        usernameStatus.classList.add('error');
                        usernameAvailable = false;
                    }
                    updateSubmitButton();
                })
                .catch(error => {
                    console.error('Error:', error);
                    usernameAvailable = false;
                    updateSubmitButton();
                });
        });

        password.addEventListener('input', validatePassword);
        confirm_password.addEventListener('input', validatePassword);
    </script>
</body>
</html>
