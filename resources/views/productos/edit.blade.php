<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Editar producto</title>
</head>
<body>
    <h1>Editar producto #{{ $producto->id }}</h1>

    @if($errors->any())
        <ul style="color: red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('productos.update', $producto) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Nombre</label><br>
            <input type="text" name="nombre" value="{{ old('nombre', $producto->nombre) }}">
        </div>

        <div>
            <label>Precio</label><br>
            <input type="number" step="0.01" name="precio" value="{{ old('precio', $producto->precio) }}">
        </div>

        <div>
            <label>Descripción</label><br>
            <textarea name="descripcion">{{ old('descripcion', $producto->descripcion) }}</textarea>
        </div>

        <button type="submit">Actualizar</button>
        <a href="{{ route('productos.index') }}">Volver</a>
    </form>
</body>
</html>
