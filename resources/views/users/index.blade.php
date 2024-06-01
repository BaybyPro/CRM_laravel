@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header"> 
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Usuarios</h1>
          </div><!-- /.col -->
        <div>
          @if (session('success'))
          <div class="alert alert-success" role="alert">
           {{session('success')}}
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>
          @endif
        </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">{{ __('Listado de usuarios') }}</div>

                <div class="card-body">
                  <a href="{{route('admin.user.create')}}" class="btn btn-primary mb-3" >Crear nuevo usuario</a>
                    <table class="table table-bordered" id="user_table">
                      <thead>
                        <tr>
                          <th>Nombre</th>
                          <th>Email</th>
                          <th>Fecha de verificación</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($users as $user)
                          <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->email_verified_at}}</td>
                            <td><a href="{{route('admin.user.edit',$user->id)}}" class="btn btn-success">Editar</a>
                              <form action="{{ route('admin.user.destroy', $user->id) }}" id="delete_form" method="POST" onsubmit="return confirm('Esta seguro que desea eliminar el registro?')" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-danger" value="Eliminar">
                            </form>
                            </td>
                          </tr>                          
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('scripts')
<script>
  new DataTable('#user_table');
</script>
@endsection
