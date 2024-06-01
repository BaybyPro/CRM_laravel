@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header"> 
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">CLientes</h1>
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
                <div class="card-header">{{ __('Listado de clientes') }}</div>

                <div class="card-body">
                  <a href="{{route('admin.clients.create')}}" class="btn btn-primary mb-3" >Crear nuevo usuario</a>
                    <table class="table table-bordered" id="client_table">
                      <thead>
                        <tr>
                          <th>Nombre</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>nombre de la empresa</th>
                          <th>direccion de la empresa</th>
                          <th>telefono de la empresa</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($clients as $client)
                          <tr>
                            <td>{{$client->contact_name}}</td>
                            <td>{{$client->contact_email}}</td>
                            <td>{{$client->contact_phone_number}}</td>
                            <td>{{$client->company_name}}</td>
                            <td>{{$client->company_address}}</td>
                            <td>{{$client->company_phone_number}}</td>
                            <td><a href="{{route('admin.clients.edit',$client->id)}}" class="btn btn-success">Editar</a>
                              <form action="{{ route('admin.clients.destroy', $client->id) }}" id="delete_form" method="POST" onsubmit="return confirm('Esta seguro que desea eliminar el registro?')" style="display: inline-block;">
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
  new DataTable('#client_table');
</script>
@endsection
