@extends('layout.default')

@section('body')
    <div class="my-3">
        <div class="card mx-auto" style="max-width: 450px">
            <div class="card-header">
                {{ __('Авторизация') }}
            </div>
            <div class="card-body">
                <form action="{{ route('admin.auth.handle') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">{{__('Email адрес')}}</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">{{__('Пароль')}}</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="*****"
                               required>
                    </div>

                    <div class="text-end">
                        <input type="submit" class="btn btn-primary" value="{{ __('Авторизоваться') }}">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
