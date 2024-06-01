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
                <div class="card-header">{{ __('Listado de projectos') }}</div>

                <div class="card-body">
                  <a href="{{route('admin.projects.create')}}" class="btn btn-primary mb-3" >Crear nuevo project</a>
                    <table class="table table-bordered" id="project_table">
                      <thead>
                        <tr>
                          <th>Projecto</th>
                          <th>Description</th>
                          <th>Fecha limite</th>
                          <th>Status</th>
                          <th>Usuario</th>
                          <th>Cliente</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($projects as $project)
                          <tr>
                            <td>{{$project->name}}</td>
                            <td>{{$project->description}}</td>
                            <td>{{$project->deadline}}</td>
                            <td>{{$project->status}}</td>
                            <td>{{$project->client->contact_name}}</td>
                            <td>{{$project->user->name}}</td>
                            <td><a href="{{route('admin.projects.edit',$project->id)}}" class="btn btn-success">Editar</a>
                              <form action="{{ route('admin.projects.destroy', $project->id) }}" id="delete_form" method="POST" onsubmit="return confirm('Esta seguro que desea eliminar el registro?')" style="display: inline-block;">
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
  new DataTable('#project_table');
</script>
@endsection
