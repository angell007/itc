<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>rol</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->rol }}</td>
        </tr>
    @endforeach
    </tbody>
</table>