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
    <div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-edit mr-2"></i>
            Registrar Catgoria
        </h3>
    </div>
    <div class="card-body">
        <form method="POST" action="">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nombre_categoria">Nombre Categoria</label>
                        <input type="text" class="form-control" name="nombre_categoria" id='nombre_categoria' placeholder="Escriba el nombre" autocomplete="off" required oninput="this.value = this.value.toUpperCase();">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <input type="text" class="form-control" name="descripcion" id='descripcion' placeholder="Escriba la descripcion" autocomplete="off"></label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info active">Registrar</button>
            </div>
        </form>
    </div>
    </div>
    <div class="card card-info card-outline">
        <div class="card-header">
            <h3 class="card-title text-center">
                <i class="fas fa-table mr-2"></i>
                Tabla de categorias
            </h3>
        </div>
        <div class="card-body">
            <table id="categoriatable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre Categoria</th>
                        <th>Descripcion</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categoria as $categorias)
                        <tr>
                            <td>{{ $categorias->id }}</td>
                            <td>{{ $categorias->nombre_categoria }}</td>
                            <td>{{ $categorias->descripcion }}</td>
                            <td width="10px">
                                <a href="" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $categorias->id }}"><i class="fas fa-edit"></i></a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.categoria.destroy', $categorias->id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        <!-- Modal de edición -->
                        <div class="modal fade" id="editModal{{ $categorias->id }}" tabindex="-1" role="dialog" aria-labelledby="editModal{{ $categorias->id }}Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModal{{ $categorias->id }}Label">Editar categoria</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form action="{{ route('admin.categoria.update', $categorias->id) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <!-- Campos del formulario de edición -->
                                            <div class="form-group">
                                                <label for="nombre_categoria{{ $categorias->id }}">Nombre Categoria</label>
                                                <input type="text" class="form-control" name="nombre_categoria" id="nombre_categoria{{ $categorias->id }}" value="{{ $categorias->nombre_categoria}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="descripcion{{ $categorias->id }}">Descripcion</label>
                                                <input type="text" class="form-control" name="descripcion" id="descripcion{{ $categorias->id }}" value="{{ $categorias->descripcion}}">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-info active">Guardar</button>
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
