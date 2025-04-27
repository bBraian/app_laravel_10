<h1>Nova duvida</h1>

@if ($errors->any())
    <div>
        <h2>Erros</h2>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('supports.store') }}" method="POST">
    @csrf()
    <input type="text" placeholder="Assunto" name="subject" value="{{ old('subject') }}">
    <textarea name="body" cols="30" rows="5" placeholder="Descricao">{{ old('body') }}</textarea>
    <button type="submit">Enviar</button>
</form>
