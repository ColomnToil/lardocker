@extends('admin.layout.main')
@section('content')
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6 d-flex">
                    <h3 class="mb-0 me-3">{{ $tag->title }}</h3>
                    <a class="text-success me-3" href="{{ route('admin.tag.edit', $tag->id) }}"><i class="nav-icon bi bi-pen"></i></a>
                    <form action="{{ route('admin.tag.delete', $tag->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="bg-transparent border-0 text-danger" type="submit"><i class="nav-icon bi bi-trash"></i></button>
                    </form>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-12">


                    <div class="col-12">
                        <a href="{{ route('admin.tag.create') }}" class="btn btn-primary mb-2">Добавить</a>
                    </div>
                    <div class="card mb-4">
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table" role="table">
                                <tbody>
                                    <tr class="align-middle">
                                        <td>ID</td>
                                        <td>{{ $tag->id }}</td>
                                    </tr>
                                    <tr class="align-middle">
                                        <td>Название</td>
                                        <td>{{ $tag->title }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

            </div>
            <!--end::Row-->
            <!--begin::Row-->

            <!-- /.row (main row) -->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>
@endsection