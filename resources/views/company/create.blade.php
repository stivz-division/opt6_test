@extends('layout.default')

@section('body')
    <div class="my-3">
        <div class="card mx-auto" style="max-width: 450px">
            <div class="card-header">
                {{ __('Добавление компании') }}
            </div>
            <div class="card-body">
                <form action="{{ route('admin.companies.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">* {{__('Название компании')}}</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="TexPRO" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">{{__('E-Mail компании')}}</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="test@test.com">
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">{{__('Адрес компании')}}</label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="г. Москва, ул. Садовая">
                    </div>

                    <div class="mb-3">
                        <label for="logo" class="form-label">{{ __('Логотип') }}</label>
                        <input class="form-control" type="file" name="logo" id="logo" accept="image/png, image/jpeg">
                    </div>

                    <div class="mb-3">
                        <label for="coordinates" class="form-label">{{__('Координаты компании на карте')}}</label>
                        <input type="text" class="form-control" name="coordinates" id="coordinates" pattern="^-?\d+\.\d+,\s-?\d+\.\d+$" placeholder="55.5555, 44.4444">
                        <div class="small text-muted">Формат: 55.5555, 44.4444</div>
                    </div>

                    <div class="text-end">
                        <input type="submit" class="btn btn-primary" value="{{ __('Создать') }}">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
