@extends('layout.default')


@section('body')
    <div class="my-3">
        <div class="d-flex align-items-center justify-content-start">
            <div>
                <h1>{{ $employee->name }}</h1>
            </div>
            <div class="ms-2">
                <a href="{{ route('admin.employees.edit', $employee) }}" class="btn btn-primary">Редактировать</a>
            </div>
            <div class="ms-2">
                <form action="{{ route('admin.employees.destroy', $employee) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="Удалить">
                </form>
            </div>
        </div>


        <ul>
            <li>
                Email: {{ $employee->email ?? __('Отсутствует') }}
            </li>
            <li>
                Номер телефона: {{ $employee->phone ?? __('Отсутствует') }}
            </li>
        </ul>

        <p>
            Состоит в: <a href="{{ route('admin.companies.show', $employee->company) }}"> {{ $employee->company->name }}</a>
        </p>
    </div>
@endsection
