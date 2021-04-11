@extends('layouts.admin_layout')

@section('title','Добавить статью')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Добавить статью</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            @if(session('success'))
                <div class="alert alert-success d-flex justify-content-between" role="alert">
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                    <button type="button" class="close text-danger" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times"></i></button>
                </div>
            @endif
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <!-- form start -->
                        <form action="{{ route('post.store') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Название</label>
                                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" required placeholder="Введите название статьй">
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Выберите категорию</label>
                                        <select name="cat_id" class="form-control" required>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category['id'] }}">{{ $category['title'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea name="text" class="editor" ></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="feature_image">Изображения</label>
                                    <img src="" alt="" class="img-Uploaded" style="display: block; width:300px;">
                                    <input class="form-control" type="text" id="feature_image" name="img" value="" readonly>
                                    <a href="" class="popup_selector btn btn-primary mt-2" data-inputid="feature_image">Выбрать картинку</a>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Добавить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection