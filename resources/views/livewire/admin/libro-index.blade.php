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
            Registrar Libro
        </h3>
    </div>
    <div class="card-body">
        <form method="POST" action="">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="titulo">Título</label>
                        <input type="text" class="form-control" name="titulo" id='titulo' placeholder="Ingrese el Título" autocomplete="off" required oninput="this.value = this.value.toUpperCase();">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="subtitulo">Subtitulo</label>
                        <input type="text" class="form-control" name="subtitulo" id='subtitulo' placeholder="Ingrese el Subtitulo" autocomplete="off" oninput="this.value = this.value.toUpperCase();">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="isbn">ISBN</label>
                        <input type="text" class="form-control" name="isbn" id='isbn' placeholder="Ingrese el ISBN" autocomplete="off" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="editorial_id">Editorial</label>
                        <select class="form-control" name="editorial_id" id="editorial_id">
                            <option value="" disabled selected>----------Seleccione una Editorial----------</option>
                            @foreach ($editorial as $editoriales)
                                <option value="{{ $editoriales->id }}">{{ $editoriales->nombre_editorial }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="categoria_id">Categoría</label>
                        <select class="form-control" name="categoria_id" id="categoria_id">
                            <option value="" disabled selected>----------Seleccione una Categoría----------</option>
                            @foreach ($categoria as $categorias)
                                <option value="{{ $categorias->id }}">{{ $categorias->nombre_categoria }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="autor_id">Autor</label>
                        <select class="form-control" name="autor_id" id="autor_id">
                            <option value="" disabled selected>------------Seleccione un Autor--------------</option>
                            @foreach ($autor as $autores)
                                <option value="{{ $autores->id }}">{{ $autores->nombres }} {{ $autores->apellidos }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="edicion">Edición</label>
                        <select class="form-control" name="edicion" id="edicion">
                            <option value=""></option>
                            <option value="Primera Edición">Primera Edición</option>
                            <option value="Segunda Edición">Segunda Edición</option>
                            <option value="Tercera Edición">Tercera Edición</option>
                            <option value="Cuarta Edición">Cuarta Edición</option>
                            <option value="Quinta Edición">Quinta Edición</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="anio_publicacion">Año publicación </label>
                        <input type="number" class="form-control" name="anio_publicacion" id='anio_publicacion' placeholder="Año" autocomplete="off" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="idioma">Idioma</label>
                        <select class="form-control" name="idioma" id="idioma">
                            <option value="español">Español</option>
                            <option value="inglés">Inglés</option>
                            <Option value="quechua">Quechua</Option>
                            <option value="otro">Otro</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" class="form-control" name="stock" id="stock" placeholder="stock" autocomplete="off" required>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="fecha_adquisicion">Fecha adquisición</label>
                        <input type="date" class="form-control" name="fecha_adquisicion" id="fecha_adquisicion" autocomplete="off" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <input type="descripcion" class="form-control" name="descripcion" id="descripcion" placeholder="Ingrese una breve descripción" autocomplete="off" required>
                        </div>
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
                Tabla de Libros
        </div>
        <div class="card-body">
            <table id="libro" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Título</th>
                        <th>Subtitulo</th>
                        <th>Descripción</th>
                        <th>ISBN</th>
                        <th>Editorial</th>
                        <th>Autor</th>
                        <th>Categoría</th>
                        <th>Edición</th>
                        <th>Año Publicación</th>
                        <th>Idioma</th>
                        <th>Stock</th>
                        <th>Fecha Adquisición</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($libro as $libros)
                        <tr>
                            <td>{{ $libros->id }}</td>
                            <td>{{ $libros->titulo }}</td>
                            <td>{{ $libros->subtitulo }}</td>
                            <td>{{ $libros->descripcion }}</td>
                            <td>{{ $libros->isbn }}</td>
                            <td>{{ $libros->editorial->nombre_editorial }}</td>
                            <td>{{ $libros->autor->nombres }} {{ $libros->autor->apellidos }}</td>
                            <td>{{ $libros->categoria->nombre_categoria }}</td>
                            <td>{{ $libros->edicion }}</td>
                            <td>{{ $libros->anio_publicacion }}</td>
                            <td>{{ $libros->idioma }}</td>
                            <td>{{ $libros->stock }}</td>
                            <td>{{ $libros->fecha_adquisicion }}</td>
                            <td width="10px">
                                <a href="" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $libros->id }}"><i class="fas fa-edit"></i></a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.libro.destroy', $libros->id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        <!-- Modal de edición -->
                        <div class="modal fade" id="editModal{{ $libros->id }}" tabindex="-1" role="dialog" aria-labelledby="editModal{{ $libros->id }}Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModal{{ $libros->id }}Label">Editar libro</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form action="{{ route('admin.libro.update', $libros->id) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <!-- Campos del formulario de edición -->
                                            <div class="form-group">
                                                <label for="titulo{{ $libros->id }}">titulo</label>
                                                <input type="text" class="form-control" name="titulo" id="titulo{{ $libros->id }}" value="{{ $libros->titulo}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="subtitulo{{ $libros->id }}">subtitulo</label>
                                                <input type="text" class="form-control" name="subtitulo" id="subtitulo{{ $libros->id }}" value="{{ $libros->subtitulo}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="descripcion{{ $libros->id }}">descripcion</label>
                                                <input type="text" class="form-control" name="descripcion" id="descripcion{{ $libros->id }}" value="{{ $libros->descripcion}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="isbn{{ $libros->id }}">isbn</label>
                                                <input type="text" class="form-control" name="isbn" id="isbn{{ $libros->id }}" value="{{ $libros->isbn}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="edicion{{ $libros->id }}">edicion</label>
                                                <input type="text" class="form-control" name="edicion" id="edicion{{ $libros->id }}" value="{{ $libros->edicion}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="anio_publicacion{{ $libros->id }}">Año publicacion</label>
                                                <input type="text" class="form-control" name="anio_publicacion" id="anio_publicacion{{ $libros->id }}" value="{{ $libros->anio_publicacion}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="idioma{{ $libros->id }}">Idioma</label>
                                                <input type="text" class="form-control" name="idioma" id="idioma{{ $libros->id }}" value="{{ $libros->idioma}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="stock{{ $libros->id }}">stock</label>
                                                <input type="text" class="form-control" name="stock" id="stock{{ $libros->id }}" value="{{ $libros->stock}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="fecha_adquisicion{{ $libros->id }}">fecha_adquisicion</label>
                                                <input type="date" class="form-control" name="fecha_adquisicion" id="fecha_adquisicion{{ $libros->id }}" value="{{ $libros->fecha_adquisicion}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="editorial_id{{ $libros->id }}">Editorial</label>
                                                <select class="form-control" name="editorial_id" id="editorial_id{{ $libros->id }}">
                                                    @foreach ($editorial as $editoriales)
                                                        <option value="{{ $editoriales->id }}" {{$libros->editorial_id==$editoriales->id?'selected':''}}>{{ $editoriales->nombre_editorial }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="autor_id{{ $libros->id }}">Autor</label>
                                                <select class="form-control" name="autor_id" id="autor_id{{ $libros->id }}">
                                                    @foreach ($autor as $autores)
                                                        <option value="{{ $autores->id }}" {{$libros->autor_id==$autores->id?'selected':''}}>{{ $autores->nombres }} {{ $autores->apellidos }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="categoria_id{{ $libros->id }}">Categoría</label>
                                                <select class="form-control" name="categoria_id" id="categoria_id{{ $libros->id }}">
                                                    @foreach ($categoria as $categorias)
                                                        <option value="{{ $categorias->id }}" {{$libros->categoria_id==$categorias->id?'selected':''}}>{{ $categorias->nombre_categoria }}</option>
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

