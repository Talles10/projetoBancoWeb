<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
</head>
<style>
    /* Reset de estilos básicos */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }

    /* Estilização do container do formulário */
    .container {
        width: 350px;
        margin: 50px auto;
        padding: 20px;
        border-radius: 10px;
        background: #f4f4f4;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    /* Título do formulário */
    h2 {
        margin-bottom: 20px;
        color: #333;
    }

    /* Estilização dos labels */
    label {
        display: block;
        margin: 10px 0 5px;
        font-weight: bold;
        text-align: left;
    }

    /* Estilização dos inputs */
    input {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    /* Estilização do botão */
    button {
        margin-top: 15px;
        width: 100%;
        padding: 10px;
        background: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background 0.3s ease;
    }

    button:hover {
        background: #0056b3;
    }
</style>

<body>
    <div class="container">
        <h2>Cadastro de Produto</h2>
        @if($errors->any()) <!-- Verificar se existe algum erro -->
        <div class="error-messages">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(session('success')) <!-- caso não tenha erro -->
        <p class="success">{{ session('success') }}</p>
        @endif

        <form method="POST" action="{{ route('Produtos.salvar') }}">
            @csrf

            <label for="id">Código:</label>
            <input type="text" id="id" name="id" required>

            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="marca">Marca:</label>
            <input type="text" id="marca" name="marca" required>

            <label for="preco">Preço:</label>
            <input type="number" id="preco" name="preco" step="0.01" required>

            <label for="quantidade">Quantidade:</label>
            <input type="number" id="quantidade" name="quantidade" required>

            <label for="categoria_id">Categoria:</label>
            <input type="text" id="categoria_id" name="categoria_id">
            <select name="categoria_id" id="categoria_id">
                @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                @endforeach
            </select>

            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>

</html>