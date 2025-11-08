@extends('admin.layout.main')
@section('content')
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Dashboard</h3>
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
                    <h5>Категории</h5>
                    <div class="col-12">
                        <a href="{{ route('admin.category.create') }}" class="btn btn-primary mb-2">Добавить</a>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="card-tools">
                                <ul class="pagination pagination-sm float-end">
                                    {{ $categories->withQueryString()->links() }}
                                </ul>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table" role="table">
                                <thead>
                                    <tr>
                                        <th style="width: 10px" scope="col">ID</th>
                                        <th scope="col">Название</th>
                                        <th colspan="3" scope="col" class="text-center">Действия</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                    <tr class="align-middle">
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->title }}</td>
                                        <td><a class="text-primary" href="{{ route('admin.category.show', $category->id) }}"><i class="nav-icon bi bi-eye"></i></a></td>
                                        <td><a class="text-success" href="{{ route('admin.category.edit', $category->id) }}"><i class="nav-icon bi bi-pen"></i></a></td>
                                        <td>
                                            <form action="{{ route('admin.category.delete', $category->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="bg-transparent border-0 text-danger" type="submit"><i class="nav-icon bi bi-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
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