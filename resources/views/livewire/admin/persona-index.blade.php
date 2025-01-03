<div class="mt-3">
    @if (session('success'))
    <script>
        Swal.fire({
            icon: "success",
            title: "¡Éxito!",
            text: "{{ session('success') }}"
        });
    </script>
    @endif
    @if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: "{{ $errors->first() }}"
        })
    </script>
    @endif
    <!-- formulario -->
    <div class="card card-danger">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-edit mr-2"></i>
            Registrar Estudiante
        </h3>
    </div>
    <div class="card-body">
        <form method="POST" action="">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nombres">Nombres</label>
                        <input type="text" class="form-control" name="nombres" id='nombres' placeholder="Escriba el nombre" autocomplete="off" required oninput="this.value = this.value.toUpperCase();">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="apellidos">Apelllidos</label>
                        <input type="text" class="form-control" name="apellidos" id='apellidos' placeholder="Escriba el nombre" autocomplete="off" required oninput="this.value = this.value.toUpperCase();">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input type="text" class="form-control" name="dni" id='dni' placeholder="Escriba su dni" autocomplete="off" required >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Programa de estudio</label>
                            <select class="form-control" name="programa_id" required>
                                <option selected disabled>Seleccione una opción</option>
                                @foreach ($programa as $programas)
                                    <option value="{{ $programas->id }}">{{ $programas->nombre_programa }}</option>
                                @endforeach
                            </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info active">Registrar</button>
            </div>
        </form>
    </div>
    </div>
    <div class="card card-danger card-outline">
        <div class="card-header">
            <h3 class="card-title text-center">
                <i class="fas fa-table mr-2"></i>
                Tabla de personas
            </h3>
        </div>
        <div class="card-body">
            <table id="persona" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>DNI</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Programa</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($persona as $personas)
                        <tr>
                            <td>{{ $personas->id }}</td>
                            <td> {{$personas->dni}} </td>
                            <td>{{ $personas->nombres }}</td>
                            <td>{{ $personas->apellidos }}</td>
                            <td>{{ $personas->programa->nombre_programa }}</td>
                            <td width="10px">
                                <a href="" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $personas->id }}"><i class="fas fa-edit"></i></a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.persona.destroy', $personas->id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        <!-- Modal de edición -->
                        <div class="modal fade" id="editModal{{ $personas->id }}" tabindex="-1" role="dialog" aria-labelledby="editModal{{ $personas->id }}Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModal{{ $personas->id }}Label">Editar persona</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form action="{{ route('admin.persona.update', $personas->id) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <!-- Campos del formulario de edición -->
                                            <div class="form-group">
                                                <label for="dni{{ $personas->id }}">DNI</label>
                                                <input type="text" class="form-control" name="dni" id="dni{{ $personas->id }}" value="{{ $personas->dni}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="nombres{{ $personas->id }}">Nombre</label>
                                                <input type="text" class="form-control" name="nombres" id="nombres{{ $personas->id }}" value="{{ $personas->nombres}}" oninput="this.value = this.value.toUpperCase();">
                                            </div>
                                            <div class="form-group">
                                                <label for="apellidos{{ $personas->id }}">Apellidos</label>
                                                <input type="text" class="form-control" name="apellidos" id="apellidos{{ $personas->id }}" value="{{ $personas->apellidos}}" oninput="this.value = this.value.toUpperCase();">
                                            </div>
                                            <div class="form-group">
                                                <label for="programa_id{{ $personas->id }}">Programa de estudio</label>
                                                <select class="form-control" name="programa_id" id="programa_id{{ $personas->id }}">
                                                    @foreach ($programa as $programas)
                                                        <option value="{{ $programas->id }}" {{ $personas->programa_id == $programas->id ? 'selected' : '' }}>{{ $programas->nombre_programa }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-danger active">Guardar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
