@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header"> 
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Projectos</h1>
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
                <div class="card-header">{{ __('Listado de tareas') }}</div>

                <div class="card-body">
                  <a href="{{route('admin.tasks.create')}}" class="btn btn-primary mb-3" >Crear tareat</a>
                    <table class="table table-bordered" id="task_table">
                      <thead>
                        <tr>
                          <th>Projecto</th>
                          <th>Description</th>
                          <th>Fecha limite</th>
                          <th>Status</th>
                          <th>Usuario</th>
                          <th>Cliente</th>
                          <th>Projecto</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($tasks as $task)
                          <tr>
                            <td>{{$task->name}}</td>
                            <td>{{$task->description}}</td>
                            <td>{{$task->deadline}}</td>
                            <td>{{$task->task_status}}</td>
                            <td>{{$task->client->contact_name}}</td>
                            <td>{{$task->user->name}}</td>
                            <td>{{$task->project->name}}</td>
                            <td><a href="{{route('admin.tasks.edit',$task->id)}}" class="btn btn-success">Editar</a>
                              <form action="{{ route('admin.tasks.destroy', $task->id) }}" id="delete_form" method="POST" onsubmit="return confirm('Esta seguro que desea eliminar el registro?')" style="display: inline-block;">
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
  new DataTable('#task_table');
</script>
@endsection
