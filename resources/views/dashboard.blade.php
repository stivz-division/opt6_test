@extends('layout.default')

@section('body')
    <div class="my-3">
        <ul class="list-group" style="max-width: 350px">
            <li class="list-group-item">
                <a href="{{ route('admin.companies.index') }}">Компании</a>
            </li>

            <li class="list-group-item">
                <a href="{{ route('admin.employees.index') }}">Сотрудники</a>
            </li>
        </ul>
    </div>
@endsection
