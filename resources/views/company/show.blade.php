@extends('layout.default')

@push('js')
    <script src="https://api-maps.yandex.ru/2.1/?apikey={{ config('yandex.map_api_key') }}&lang=ru_RU"
            type="text/javascript"></script>

    @isset($company->coordinates)
        <script type="text/javascript">
            $(document).ready(function () {
                $('#table_show').DataTable({
                    "paging": false
                });
                $('.dataTables_info').remove();
            });

            ymaps.ready(init);

            function init() {
                const myMap = new ymaps.Map("map", {
                    center: [{{ str($company->coordinates) }}],
                    zoom: 18,
                    controls: ['zoomControl'],
                });


                const myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
                    balloonContentHeader: 'Адрес',
                    balloonContentBody: `{{ $company->address }}`
                })

                myMap.geoObjects
                    .add(myPlacemark);

            }
        </script>
    @endisset

@endpush

@section('body')
    <div class="my-3">
        <div class="d-flex align-items-center justify-content-start">
            <div>
                <h1>{{ $company->name }}</h1>
            </div>
            <div class="ms-2">
                <form action="{{ route('admin.companies.destroy', $company) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="Удалить">
                </form>
            </div>
            <div class="ms-2">
                <a href="{{ route('admin.companies.edit', $company) }}" class="btn btn-primary">Редактировать</a>
            </div>
        </div>

        @isset($company->logo)
            <div class="text-center">
                <img class="img-fluid" style="max-height: 400px" src="/storage/images/{{ $company->logo }}"
                     alt="{{ $company->name }}">
            </div>
        @endisset

        <ul>
            <li>
                Email: {{ $company->email ?? __('Отсутствует') }}
            </li>
            <li>
                Адрес: {{ $company->addres ?? __('Отсутствует') }}
            </li>
            <li>
                Координаты: {{ $company->coordinates ?? __('Отсутствуют') }}
            </li>
        </ul>

        @isset($company->coordinates)
            <div id="map" style="max-width: 600px; height: 400px"></div>
        @endisset

        <div class="d-flex align-items-center justify-content-start mt-3">
            <h3>Сотрудники:</h3>
            <div class="ms-2">
                <a class="btn btn-primary" href="{{ route('admin.employees.create') }}">Добавить сотрудника</a>
            </div>
        </div>

        @include('employee.shared.list', ['employees' => $company->employees])
    </div>
@endsection
