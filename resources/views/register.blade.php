<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <style>
        /* --- Configuración General y Fondo Animado --- */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        /* --- Tarjeta del Formulario --- */
        .register-container {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 450px;
            padding: 40px 30px;
        }

        h1 {
            color: #333333;
            font-size: 28px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 30px;
            position: relative;
        }

        h1::after {
            content: '';
            display: block;
            width: 50px;
            height: 4px;
            background: #667eea;
            margin: 8px auto 0 auto;
            border-radius: 2px;
        }

        /* --- Alertas de Éxito y Errores --- */
        .alert {
            padding: 12px 15px;
            border-radius: 6px;
            font-size: 14px;
            margin-bottom: 20px;
            font-weight: 500;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            padding-left: 25px;
        }

        .alert-error ul {
            margin: 0;
        }

        /* --- Grupos de Campos (Inputs) --- */
        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            color: #4a5568;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 6px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #cbd5e0;
            border-radius: 8px;
            font-size: 15px;
            color: #2d3748;
            background-color: #f7fafc;
            transition: all 0.3s ease;
            outline: none;
        }

        /* Efecto cuando el usuario hace clic en el campo */
        input:focus, select:focus {
            border-color: #667eea;
            background-color: #ffffff;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.15);
        }

        /* --- Checkbox de Términos --- */
        .checkbox-label {
            display: flex;
            align-items: flex-start;
            cursor: pointer;
            font-weight: normal;
            color: #718096;
            font-size: 13.5px;
            line-height: 1.3;
        }

        .checkbox-label input {
            margin-right: 10px;
            margin-top: 3px;
            width: 16px;
            height: 16px;
            accent-color: #667eea; /* Cambia el color del check interno */
        }

        /* --- Botón Registrar --- */
        button[type="submit"] {
            width: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 14px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 15px;
            transition: transform 0.1s ease, box-shadow 0.3s ease;
        }

        button[type="submit"]:hover {
            box-shadow: 0 5px 15px rgba(118, 75, 162, 0.4);
        }

        button[type="submit"]:active {
            transform: scale(0.98); /* Pequeño efecto de hundido al clickear */
        }
    </style>
</head>
<body>

    <div class="register-container">
        <h1>Registro de Estudiante</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('/register') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nombre Completo</label>
                <input type="text" id="name" name="name" placeholder="Ej. Juan Pérez" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" id="email" name="email" placeholder="juan@ejemplo.com" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" placeholder="Mínimo 8 caracteres" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmar Contraseña</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Repite tu contraseña" required>
            </div>

            <div class="form-group">
                <label for="career_id">Carrera Profesional</label>
                <select name="career_id" id="career_id" required>
                    <option value="" disabled selected>Selecciona tu carrera...</option>
                    @foreach($careers as $career)
                        <option value="{{ $career->id }}">{{ $career->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="terms_accepted" class="checkbox-label">
                    <input type="checkbox" name="terms_accepted" id="terms_accepted" required>
                    Acepto los términos, condiciones y políticas de privacidad de la institución.
                </label>
            </div>

            <button type="submit">Registrar Estudiante</button>
        </form>
    </div>

</body>
</html>