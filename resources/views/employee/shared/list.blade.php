<table id="table_show" class="display" style="width:100%">
    <thead>
    <tr>
        <th>{{ __('Имя') }}</th>
        <th>{{ __('Компания') }}</th>
        <th>{{ __('E-Mail') }}</th>
        <th>{{ __('Номер телефона') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($employees as $employee)
        <tr>
            <td>
                <a href="{{ route('admin.employees.show', $employee) }}">
                    {{ $employee->name }}
                </a>
            </td>
            <td>
                <a href="{{ route('admin.companies.show', $employee->company) }}">
                    {{ $employee->company->name }}
                </a>
            </td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->phone }}</td>
        </tr>
    @endforeach

    </tbody>
</table>
