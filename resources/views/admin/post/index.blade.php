@extends('layouts.admin_layout')

@section('title','Все статьй')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Все статьй</h1>
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
                <div class="card">
                  
                    <div class="card-body p-0">
                      <table class="table table-striped projects">
                          <thead>
                              <tr>
                                  <th style="width: 5%">
                                      ID
                                  </th>
                                  <th>
                                      Название
                                  </th>
                                  <th>
                                    Категория
                                </th>
                                <th>
                                    Дата добавления
                                </th>
                                  <th style="width: 30%">
                                  </th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($posts as $post)
                              <tr>
                                  <td>
                                      {{ $post['id'] }}
                                  </td>
                                  <td>
                                    {{ $post['title'] }}
                                  </td>
                                  <td>
                                    {{ $post->category['title'] }}
                                  </td>
                                  <td>
                                    {{ $post['created_at'] }}
                                  </td>
                                  <td>
                                      <img width="50" src="{{ $post['img'] }}" alt="">
                                  </td>
                                  
                                  <td class="project-actions text-right">
                                      
                                      <a class="btn btn-info btn-sm" href="{{ route('post.edit', $post['id'])}}">
                                          <i class="fas fa-pencil-alt">
                                          </i>
                                          Редактировать
                                      </a>
                                      <form action="{{ route('post.destroy', $post['id'] )}}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                            <i class="fas fa-trash">
                                            </i>
                                            Удалить
                                        </button>
                                      </form>
                                  </td>
                          </tbody>
                          @endforeach
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection