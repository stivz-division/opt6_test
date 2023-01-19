<table id="table_show" class="display" style="width:100%">
    <thead>
    <tr>
        <th>{{ __('Имя') }}</th>
        <th>{{ __('E-Mail') }}</th>
        <th>{{ __('Адрес') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($companies as $company)
        <tr>
            <td>
                <a href="{{ route('admin.companies.show', $company) }}">
                    {{ $company->name }}
                </a>
            </td>
            <td>
                {{ $company->email }}
            </td>
            <td>{{ $company->address }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
