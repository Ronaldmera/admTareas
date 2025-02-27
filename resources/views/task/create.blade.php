<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crear Tarea</title>
</head>

<body>
    <form action="{{ route('task.store') }}" method="POST">
        @csrf
        <label for="title"> titulo</label>
        <br>
        <input type="text" name="title" required>
        <br>
        <label for="content"> contenido</label>
        <br>
        <textarea name="content"></textarea>
        <br>
        <label for="status">Estado</label>
        <br>
        <select name="status" id="">
            <option>pendiente</option>
            <option>completada</option>
        </select>
        <button type="submit">Agregar Tarea</button>
    </form>

</body>

</html>
