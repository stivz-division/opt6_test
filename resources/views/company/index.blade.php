@extends('layout.default')

@pushonce('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#table_show').DataTable({
                "paging": false
            });
            $('.dataTables_info').remove();
        });
    </script>
@endpushonce

@section('body')
    <div class="my-3">
        <div class="d-flex align-items-center justify-content-start">
            <div>
                <h1>{{ __('Компании') }}</h1>
            </div>
            <div class="ms-2">
                <a href="{{ route('admin.companies.create') }}" class="btn btn-primary">Добавить компанию</a>
            </div>
        </div>


            @include('company.shared.list')



        {{ $companies->links() }}
    </div>
@endsection
