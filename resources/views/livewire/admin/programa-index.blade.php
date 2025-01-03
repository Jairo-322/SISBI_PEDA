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
        Registrar Carreras Profesinales
    </h3>
</div>
<div class="card-body">
    <form method="POST" action="">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nombre_programa">Nombre Programa</label>
                    <input type="text" class="form-control" name="nombre_programa" id='nombre_programa' placeholder="Escriba el nombre" autocomplete="off" required oninput="this.value = this.value.toUpperCase();">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="abreviatura">Abreviatura</label>
                    <input type="text" class="form-control" name="abreviatura" id='abreviatura' placeholder="Escriba el nombre" autocomplete="off" required oninput="this.value = this.value.toUpperCase();">
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
            Tabla de programas
        </h3>
    </div>
    <div class="card-body">
        <table id="programa" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre programa</th>
                    <th>Abreviatura</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($programa as $programas)
                    <tr>
                        <td>{{ $programas->id }}</td>
                        <td>{{ $programas->nombre_programa }}</td>
                        <td>{{ $programas->abreviatura }}</td>
                        <td width="10px">
                            <a href="" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $programas->id }}"><i class="fas fa-edit"></i></a>
                        </td>
                        <td width="10px">
                            <form action="{{ route('admin.programa.destroy', $programas->id) }}" method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    <!-- Modal de edición -->
                    <div class="modal fade" id="editModal{{ $programas->id }}" tabindex="-1" role="dialog" aria-labelledby="editModal{{ $programas->id }}Label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModal{{ $programas->id }}Label">Editar programa</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <form action="{{ route('admin.programa.update', $programas->id) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <!-- Campos del formulario de edición -->
                                        <div class="form-group">
                                            <label for="nombre_programa{{ $programas->id }}">Nombre</label>
                                            <input type="text" class="form-control" name="nombre_programa" id="nombre_programa{{ $programas->id }}" value="{{ $programas->nombre_programa}}" oninput="this.value = this.value.toUpperCase();">
                                        </div>
                                        <div class="form-group">
                                            <label for="abreviatura{{ $programas->id }}">Abreviatura</label>
                                            <input type="text" class="form-control" name="abreviatura" id="abreviatura{{ $programas->id }}" value="{{ $programas->abreviatura}}" oninput="this.value = this.value.toUpperCase();">
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
