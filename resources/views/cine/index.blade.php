@extends('layouts.app')

@section('template_title')
    Cine
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Cine') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('cines.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Idcine</th>
										<th>Nombre</th>
										<th>Ubicacion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cines as $cine)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $cine->idCine }}</td>
											<td>{{ $cine->nombre }}</td>
											<td>{{ $cine->ubicacion }}</td>

                                            <td>
                                                <form action="{{ route('cines.destroy',$cine->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('cines.show',$cine->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('cines.edit',$cine->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $cines->links() !!}
            </div>
        </div>
    </div>
@endsection
