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
            Registrar Autores
        </h3>
    </div>
    <div class="card-body">
        <form method="POST" action="">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nombres">Nombres</label>
                        <input type="text" class="form-control" name="nombres" id='nombres' placeholder="Escriba el nombre" autocomplete="off" required oninput="this.value = this.value.toUpperCase();">
                    </div>
                </div>
                <div class='col-md-4'>
                    <div class="form-group">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" class="form-control" name="apellidos" id='apellidos' placeholder="Escriba el apellido" autocomplete="off" required oninput="this.value = this.value.toUpperCase();">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nacionalidad_id">Nacionalidad</label>
                        <select class="form-control" name="nacionalidad_id" id="nacionalidad_id">
                            @foreach ($nacionalidad as $nacionalidades)
                                <option value="{{ $nacionalidades->id }}">{{ $nacionalidades->nacionalidad }}</option>
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
                Tabla de Autores
            </h3>
        </div>
        <div class="card-body">
            <table id="autor" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Nacionalidad</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($autor as $autores)
                        <tr>
                            <td>{{ $autores->id }}</td>
                            <td>{{ $autores->nombres }}</td>
                            <td>{{ $autores->apellidos }}</td>
                            <td>{{ $autores->nacionalidad->nacionalidad }}</td>
                            <td width="10px">
                                <a href="" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $autores->id }}"><i class="fas fa-edit"></i></a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.autor.destroy', $autores->id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <!-- Modal de edición -->
                    @foreach ($autor as $autores)
                        <div class="modal fade" id="editModal{{ $autores->id }}" tabindex="-1" role="dialog" aria-labelledby="editModal{{ $autores->id }}Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModal{{ $autores->id }}Label">Editar autor</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form action="{{ route('admin.autor.update', $autores->id) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <!-- Campos del formulario de edición -->
                                            <div class="form-group">
                                                <label for="nombres">Nombres</label>
                                                <input type="text" class="form-control" name="nombres" id="nombres" value="{{ $autores->nombres}}" oninput="this.value = this.value.toUpperCase();">
                                            </div>
                                            <div class="form-group">
                                                <label for="apellidos">Apellidos</label>
                                                <input type="text" class="form-control" name="apellidos" id="apellidos" value="{{ $autores->apellidos}}" oninput="this.value = this.value.toUpperCase();">
                                            </div>
                                            <div class="form-group">
                                                <label for="nacionalidad_id">Nacionalidad</label>
                                                <select class="form-control" name="nacionalidad_id" id="nacionalidad_id">
                                                    @foreach ($nacionalidad as $nacionalidades)
                                                        <option value="{{ $nacionalidades->id }}">{{ $nacionalidades->nacionalidad }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-danger active">Actualizar</button>
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
