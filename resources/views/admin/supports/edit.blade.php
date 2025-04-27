<h1>Duvida {{ $support->id }}</h1>

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

<form action="{{ route('supports.update', $support->id) }}" method="POST">
    @csrf()
    @method('PUT')
    <input type="text" placeholder="Assunto" name="subject" value="{{ $support->subject }}">
    <textarea name="body" cols="30" rows="5" placeholder="Descricao">{{ $support->body }}</textarea>
    <button type="submit">Enviar</button>
</form>
