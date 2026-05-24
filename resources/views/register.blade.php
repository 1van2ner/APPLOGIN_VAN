<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro Simple</title>
    <style>
        /* 1. CONFIGURACIÓN DEL FONDO */
        body {
            background-color: #f0f2f5;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* 2. LA TARJETA DEL FORMULARIO */
        .caja-registro {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            width: 350px;
        }

        /* 3. TÍTULO Y ESPACIADOS */
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .campo {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        /* 4. ESTILO DE LOS INPUTS Y SELECT */
        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box; /* Evita que el input se salga de la caja */
        }

        /* 5. BOTÓN DE ENVÍO */
        button {
            width: 100%;
            background-color: #007bff;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3; /* Oscurece el botón al pasar el mouse */
        }
    </style>
</head>
<body>

    <div class="caja-registro">
        <h2>Registro</h2>

        <form action="{{ url('/register') }}" method="POST">
            @csrf

            <div class="campo">
                <label>Nombre:</label>
                <input type="text" name="name" required>
            </div>

            <div class="campo">
                <label>Correo:</label>
                <input type="email" name="email" required>
            </div>

            <div class="campo">
                <label>Contraseña:</label>
                <input type="password" name="password" required>
            </div>

            <div class="campo">
                <label>Carrera:</label>
                <select name="career_id" required>
                    <option value="">Seleccione...</option>
                    @foreach($careers as $career)
                        <option value="{{ $career->id }}">{{ $career->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit">Registrar</button>
        </form>
    </div>

</body>
</html>