<!DOCTYPE html>
<html>
    {{-- Raul Martin Peña--}}
<head>
    <title>Crear Producto</title>
</head>
<body>
    <h1>Crear nuevo producto</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        @if (@session('status'))
        <div>

        {{session('status')}}
        </div>
        @endif
       
    <form action="{{ route('product.store') }}" method="POST">
        @csrf

        <label>Nombre del producto:</label><br>
        <input type="text" name="nombre-producto" maxlength="50" required>
        <br><br>

        <label>Descripción:</label><br>
        <textarea name="descripcion-producto" required></textarea>
        <br><br>
        
         <label>Precio :</label><br>
        <input type="number" name="precio" min="1" required>
        <br><br>

               <label>unidades</label><br>
        <input type="number" name="unidades" min="1" required>
        <br><br>

        <label>Categoría:</label><br>
        <select name="categoria-producto" required>
            <option value="Electronica">Electrónica</option>
            <option value="Deporte">Deporte</option>
        </select>
        <br><br>

       
        <button type="submit">Guardar producto</button>
    </form>
</body>
</html>