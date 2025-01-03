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
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="nombre_editorial">Nombre Editorial</label>
                        <input type="text" class="form-control" name="nombre_editorial" id='nombre_editorial' placeholder="Escriba el nombre" autocomplete="off" required oninput="this.value = this.value.toUpperCase();">
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
                Tabla de Editoriales
            </h3>
        </div>
        <div class="card-body">
            <table id="editorial" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre Editorial</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($editorial as $editoriales)
                        <tr>
                            <td>{{ $editoriales->id }}</td>
                            <td>{{ $editoriales->nombre_editorial }}</td>
                            <td width="10px">
                                <a href="" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $editoriales->id }}"><i class="fas fa-edit"></i></a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.editorial.destroy', $editoriales->id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        <!-- Modal de edición -->
                        <div class="modal fade" id="editModal{{ $editoriales->id }}" tabindex="-1" role="dialog" aria-labelledby="editModal{{ $editoriales->id }}Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModal{{ $editoriales->id }}Label">Editar editorial</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form action="{{ route('admin.editorial.update', $editoriales->id) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <!-- Campos del formulario de edición -->
                                            <div class="form-group">
                                                <label for="nombre_editorial{{ $editoriales->id }}">nombre_editorial</label>
                                                <input type="text" class="form-control" name="nombre_editorial" id="nombre_editorial{{ $editoriales->id }}" value="{{ $editoriales->nombre_editorial}}">
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
