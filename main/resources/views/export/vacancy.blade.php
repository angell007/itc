<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Vacante</th>
    </tr>
    </thead>
    <tbody>
    @foreach($vacancys as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->title }}</td>
        </tr>
    @endforeach
    </tbody>
</table>