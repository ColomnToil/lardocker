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
                    <h6 class="mb-3">Редактирование категории</h6>
                    <form action="{{ route('admin.post.update', $post->id ) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="" class="form-label">Название</label>
                                <input type="text" name="title" class="form-control" id="" aria-describedby="" value="{{ $post->title }}">
                                @error('title')
                                <div class="text-danger">Это поле необходимо к заполнению</div>
                                @enderror
                            </div>
                            <div class="form-group w-100">
                                <label for="" class="form-label">Описание</label>
                                <textarea id="summernote" name="content">{{ $post->content }}</textarea>
                                @error('content')
                                <div class="text-danger">Это поле необходимо к заполнению</div>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <label for="" class="form-label">Превью</label>
                                <div class="mb-3">
                                    <img style="width:128px" src="{{ asset('storage/'.$post->preview_image) }}" alt="">
                                </div>
                                <input type="file" name="preview_image" class="form-control custom-file-input custom-file" id="">
                            </div>
                            <div class="input-group mb-3">
                                <label for="" class="form-label">Главное изображение</label>
                                <div class="mb-3">
                                    <img style="width:156px" src="{{ asset('storage/'.$post->main_image) }}" alt="">
                                </div>
                                <input type="file" name="main_image" class="form-control custom-file-input custom-file" id="">
                            </div>
                            <div class="input-group mb-3 w-100">
                                <label for="" class="form-label">Категории</label>
                                <select class="form-select w-25" name="category_id" id="">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == $post->category_id ? ' selected' : ''}}>{{ $category->title }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="text-danger">Это поле необходимо к заполнению</div>
                                @enderror
                            </div>
                            <div class="input-group mb-3 w-100">
                                <label for="" class="form-label">Теги</label>
                                <select class="form-select w-25 select2" name="tag_ids[]" id="" multiple="multiple" data-placeholder="Выберите теги">
                                    @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}"
                                        {{ is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? ' selected' : ''}}>{{ $tag->title }}</option>
                                    @endforeach
                                </select>
                                @error('tag_ids[]')
                                <div class="text-danger">Это поле необходимо к заполнению</div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Обновить</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--end::Row-->
            <!--begin::Row-->

            <!-- /.row (main row) -->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ]
            });
        });

        $(function() {
            bsCustomFileInput.init();
        })

        $('.select2').select2()
    </script>
</main>
@endsection