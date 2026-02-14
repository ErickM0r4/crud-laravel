<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Crear producto</title>
</head>
<body>
    <h1>Crear producto</h1>

    @if($errors->any())
        <ul style="color: red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('productos.store') }}" method="POST">
        @csrf

        <div>
            <label>Nombre</label><br>
            <input type="text" name="nombre" value="{{ old('nombre') }}">
        </div>

        <div>
            <label>Precio</label><br>
            <input type="number" step="0.01" name="precio" value="{{ old('precio') }}">
        </div>

        <div>
            <label>Descripción</label><br>
            <textarea name="descripcion">{{ old('descripcion') }}</textarea>
        </div>

        <button type="submit">Guardar</button>
        <a href="{{ route('productos.index') }}">Volver</a>
    </form>
</body>
</html>
