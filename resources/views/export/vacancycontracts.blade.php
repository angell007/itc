<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Vacante</th>
        <th>Estudiante</th>
    </tr>
    </thead>
    <tbody>
    @foreach($vacancys as $user)
    
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->title }}</td>
            <td>{{ $user->estudent }}</td>
        </tr>
    @endforeach
    </tbody>
</table>