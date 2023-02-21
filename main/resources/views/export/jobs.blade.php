<table>
    <thead>
        <tr>
             <td> # </td>
             <td> Empresa </td>
             <td> Título </td>
             <td> Descripción </td>
             <td> Remoto </td>
             <td> Salario de </td>
             <td> Salario a </td>
             <td> Número de vacantes </td>
             <td> Vence en  </td>
             <td> Activo </td>
           
        </tr>
    </thead>
    <tbody>
        @foreach($data as $datum)
        <tr>
            
    <td> {{ $datum->id }}</td>
    <td> {{ $datum->name}}</td>
    <td> {{ $datum->title }}</td>
    <td style="word-wrap: break-word;
    word-break: break-all;
    white-space: normal;"> {{ $datum->description }}</td>
    <td> {{ ($datum->is_freelance) ? 'Si' : 'No' }}</td>
    <td> {{ $datum->salary_from }}</td>
    <td> {{ $datum->salary_to }}</td>
    <td> {{ $datum->num_of_positions }}</td>
    <td> {{ $datum->expiry_date }}</td>
    <td> {{ ($datum->is_active) ? 'Si' : 'No' }}</td>
   
           
        </tr>
        @endforeach
    </tbody>
</table>