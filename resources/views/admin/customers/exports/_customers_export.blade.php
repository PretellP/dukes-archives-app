<table>

    <thead>
        <tr>
            <th>N°</th>
            <th>Nombre</th>
            <th>Sexo</th>
            <th>Email</th>
            <th>Fecha de nacimiento</th>
            <th>Tipo de documento</th>
            <th>Nro. documento</th>
            <th>Teléfono</th>
            <th>Rol</th>
        </tr>
    </thead>

    <tbody>

        @foreach ($customers as $customer)
            <tr>
                <td> {{ $customer->id }} </td>
                <td> {{ $customer->full_name }} </td>
                <td> {{ $customer->gender_name }} </td>
                <td> {{ $customer->email }} </td>
                <td> {{ $customer->birth_only_date }} </td>
                <td> {{ $customer->document_type_name }} </td>
                <td> {{ $customer->document_number }} </td>
                <td> {{ $customer->phone }} </td>
                <td> {{ $customer->role->name ?? '-' }} </td>
            </tr>
        @endforeach

    </tbody>

</table>
