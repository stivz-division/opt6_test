@extends('layout.default')

@section('body')
    <div class="my-3">
        <div class="card mx-auto" style="max-width: 450px">
            <div class="card-header">
                {{ __('Редактирование сотрудника') }}
            </div>
            <div class="card-body">


                <form action="{{ route('admin.employees.update', $employee) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="name" class="form-label">* {{__('Имя сотрудника')}}</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $employee->name }}" placeholder="Александр" required>
                    </div>

                    <div class="mb-3">
                        <select class="form-select" name="company_id" aria-label="{{ __('К какой компании относится сотрудника') }}" required>
                            <option value="">* {{ __('Выберите компанию') }}</option>
                            @foreach($companies as $company)
                                <option @selected($employee->company_id === $company->id) value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">{{__('E-Mail сотрудника')}}</label>
                        <input type="email" class="form-control" name="email" value="{{ $employee->email }}" id="email" placeholder="test@test.com">
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">{{__('Номер телефона сотрудника')}}</label>
                        <input type="text" class="form-control" name="phone" value="{{ $employee->phone }}" id="phone" placeholder="89166666666">
                    </div>

                    <div class="text-end">
                        <input type="submit" class="btn btn-primary" value="{{ __('Изменить') }}">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
