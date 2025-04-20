<h1>Listagem dos suportes</h1>
<a href="{{ route('supports.create') }}">Nova Duvida</a>
<table>
    <thead>
        <th>assunto</th>
        <th>status</th>
        <th>descricao</th>
        <th></th>
        <th></th>
        <th></th>
    </thead>
    <tbody>
        @foreach ($supports as $support)
            <tr>
                <td>{{ $support->subject }}</td>
                <td>{{ $support->status }}</td>
                <td>{{ $support->body }}</td>
                <td>
                    <a href="{{ route('supports.show', $support->id) }}">visualizar</a>
                </td>
                <td>
                    <a href="{{ route('supports.edit', $support->id) }}">editar</a>
                </td>
                <td>
                    <form action="{{ route('supports.destroy', $support->id) }}" method="POST">
                        @csrf()
                        @method('DELETE')
                        <button type="submit">deletar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
