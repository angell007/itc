
<table>
    <thead>
        <tr>
            <th>  # </th>
            <th>  Nombre </th>
            <th>  email </th>
            <th>  Descripción </th>
            <th>  Cantidad de oficinas </th>
            <th> Ciudad </th>
            <th> Departamento </th>
            <th>  Website </th>
            <th>  Número de empleados </th>
            <th>  Fax </th>
            <th>  Telefono </th>
             <th> Industria </th>
            <th>  Activa </th>
           
        </tr>
    </thead>
    <tbody>
        @foreach($data as $datum)
        <tr>
            
            <th> {{ $datum->id }} </th>
            <th> {{ $datum->name }} </th>
            <th> {{ $datum->email }} </th>
            <th> {{ $datum->description }} </th>
            <th> {{ $datum->no_of_offices }} </th>
            <td> {{ $datum->city }} </td>
            <td> {{ $datum->state }} </td>
            <th> {{ $datum->website }} </th>
            <th> {{ $datum->no_of_employees }} </th>
            <th> {{ $datum->fax }} </th>
            <th> {{ $datum->phone }} </th>
            <td> {{ $datum->industry }} </td>
            <th> {{ ($datum->is_active) ? 'Si' : 'No' }} </th>
           
        </tr>
        @endforeach
    </tbody>
</table>