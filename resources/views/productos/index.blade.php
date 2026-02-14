<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Productos</title>
</head>
<body>
    <h1>Productos</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <p><a href="{{ route('productos.create') }}">Crear producto</a></p>

    @if($productos->count() === 0)
        <p>No hay productos todavía.</p>
    @else
        <table border="1" cellpadding="6">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->precio }}</td>
                        <td>
                            <a href="{{ route('productos.edit', $producto) }}">Editar</a>

                            <form action="{{ route('productos.destroy', $producto) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Eliminar este producto?')">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div style="margin-top: 12px;">
            {{ $productos->links() }}
        </div>
    @endif
</body>
</html>
