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
                        <label for="pais">País</label>
                        <input type="text" class="form-control" name="pais" id='pais' placeholder="Escriba el nombre" autocomplete="off" required oninput="this.value = this.value.toUpperCase();">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nacionalidad">Nacionalidad</label>
                        <input type="text" class="form-control" name="nacionalidad" id='nacionalidad' placeholder="Escriba el nombre" autocomplete="off" required oninput="this.value = this.value.toUpperCase();">
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
                Tabla de Nacionalidades
            </h3>
        </div>
        <div class="card-body">
            <table id="nacionalidad" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>País</th>
                        <th>Nacionalidad</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nacionalidad as $nacionalidades)
                        <tr>
                            <td>{{ $nacionalidades->id }}</td>
                            <td>{{ $nacionalidades->pais }}</td>
                            <td>{{ $nacionalidades->nacionalidad }}</td>
                            <td width="10px">
                                <a href="" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $nacionalidades->id }}"><i class="fas fa-edit"></i></a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.nacionalidad.destroy', $nacionalidades->id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        <!-- Modal de edición -->
                        <div class="modal fade" id="editModal{{ $nacionalidades->id }}" tabindex="-1" role="dialog" aria-labelledby="editModal{{ $nacionalidades->id }}Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModal{{ $nacionalidades->id }}Label">Editar nacionalidad</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form action="{{ route('admin.nacionalidad.update', $nacionalidades->id) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <!-- Campos del formulario de edición -->
                                            <div class="form-group">
                                                <label for="pais{{ $nacionalidades->id }}">Pais</label>
                                                <input type="text" class="form-control" name="pais" id="pais{{ $nacionalidades->id }}" value="{{ $nacionalidades->pais}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="nacionalidad{{ $nacionalidades->id }}">Nacionalidad</label>
                                                <input type="text" class="form-control" name="nacionalidad" id="nacionalidad{{ $nacionalidades->id }}" value="{{ $nacionalidades->nacionalidad}}" >
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
