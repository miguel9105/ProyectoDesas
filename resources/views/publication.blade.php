<!DOCTYPE html>

<html lang="en">
<head>
    <!-- definicion del tipo de documento y lenguaje de la pagina -->
    <meta charset="utf-8" /> <!-- configuracion de la codificacion de caracteres utf-8 para soporte de caracteres especiales -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" /> <!-- configuracion del viewport para responsive design en dispositivos moviles -->
    <meta name="description" content="Sistema de publicacion de desastres" /> <!-- meta descripcion para SEO y motores de busqueda -->
    <meta name="author" content="Desas3" /> <!-- meta tag para indicar el autor del sitio web -->
    <title>Publicaciones - Desas3</title> <!-- titulo de la pagina que se muestra en la pestaña del navegador -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" /> <!-- favicon del sitio web cargado desde la carpeta assets -->

    <!-- carga de font awesome para iconos mediante CDN -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <!-- carga de fuentes de google fonts (varela round y nunito) -->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

    <!-- carga de bootstrap css mediante CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    @vite(['resources/js/app.js'])
</head>
<body id="page-top" class="bg-dark" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.7) 75%, #000 100%), url('{{ asset('assets/img/bg-masthead.jpg') }}'); background-position: center; background-repeat: no-repeat; background-attachment: fixed; background-size: cover; padding-top: 120px;">
    <!-- cuerpo de la pagina con fondo oscuro, gradiente superpuesto sobre imagen de fondo fija -->

        <!-- contenedor principal que alberga todo el contenido de la pagina -->
        <div class="container px-4 px-lg-5">
            <!-- fila de encabezado con titulo y boton de accion principal -->
            <div class="row mb-4">
                <div class="col-lg-6">
                    <!-- titulo principal de la pagina -->
                    <h1 class="display-4 text-white fw-bolder mb-3">Publicaciones</h1>
                    <!-- subtitulo descriptivo -->
                    <p class="lead text-white-50">Gestiona y visualiza publicaciones sobre desastres en tu zona</p>
                </div>
                <div class="col-lg-6 text-lg-end">
                    <!-- boton que activa el modal para crear nuevas publicaciones -->
                    <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#createPublicationModal">
                        <i class="fas fa-plus me-2"></i> Nueva publicación
                    </button>
                </div>
            </div>
            
            <!-- seccion de filtros con fondo blanco semitransparente y bordes redondeados -->
            <div class="bg-white bg-opacity-90 rounded-4 shadow-sm p-4 mb-5">
                <!-- formulario de filtrado que envia los parametros por GET -->
                <form action="{{ route('publications.index') }}" method="GET">
                    <!-- titulo de la seccion de filtros -->
                    <h5 class="mb-4 fw-bold text-primary">
                        <i class="fas fa-filter me-2"></i>Filtros de búsqueda
                    </h5>
                    <!-- grid de filtros organizados en filas y columnas -->
                    <div class="row g-4">
                        <!-- filtro por tipo de desastre (select dropdown) -->
                        <div class="col-md-4">
                            <label for="type" class="form-label">Tipo de desastre</label>
                            <select class="form-select rounded-3" name="type" id="type">
                                <option value="">Todos los tipos</option>
                                <option value="inundacion" {{ request('type') == 'inundacion' ? 'selected' : '' }}>Inundación</option>
                                <option value="incendio" {{ request('type') == 'incendio' ? 'selected' : '' }}>Incendio</option>
                                <option value="terremoto" {{ request('type') == 'terremoto' ? 'selected' : '' }}>Terremoto</option>
                                <option value="deslizamiento" {{ request('type') == 'deslizamiento' ? 'selected' : '' }}>Deslizamiento</option>
                            </select>
                        </div>
                    
                        <!-- filtro por ubicacion (input text) -->
                        <div class="col-md-4">
                            <label for="location" class="form-label">Ubicación</label>
                            <input type="text" class="form-control rounded-3" name="location" id="location" value="{{ request('location') }}" placeholder="Filtrar por ubicación">
                        </div>
                    
                        <!-- filtro por severidad (select dropdown) -->
                        <div class="col-md-4">
                            <label for="severity" class="form-label">Severidad</label>
                            <select class="form-select rounded-3" name="severity" id="severity">
                                <option value="">Todas</option>
                                <option value="alta" {{ request('severity') == 'alta' ? 'selected' : '' }}>Alta</option>
                                <option value="media" {{ request('severity') == 'media' ? 'selected' : '' }}>Media</option>
                                <option value="baja" {{ request('severity') == 'baja' ? 'selected' : '' }}>Baja</option>
                            </select>
                        </div>
                    
                        <!-- campo de busqueda por texto libre -->
                        <div class="col-md-8">
                            <label for="search" class="form-label">Buscar por palabra clave</label>
                            <div class="input-group">
                                <input type="text" class="form-control rounded-start-3" name="search" id="search" value="{{ request('search') }}" placeholder="Título o descripción...">
                            </div>
                        </div>
                    
                        <!-- selector de ordenamiento de resultados -->
                        <div class="col-md-4">
                            <label for="sort" class="form-label">Ordenar por</label>
                            <select class="form-select rounded-3" name="sort" id="sort">
                                <option value="date_desc" {{ request('sort') == 'date_desc' ? 'selected' : '' }}>Más recientes primero</option>
                                <option value="date_asc" {{ request('sort') == 'date_asc' ? 'selected' : '' }}>Más antiguos primero</option>
                                <option value="severity_desc" {{ request('sort') == 'severity_desc' ? 'selected' : '' }}>Mayor severidad</option>
                            </select>
                        </div>
                    </div>
                
                    <!-- boton de submit para aplicar los filtros -->
                    <div class="row mt-4">
                        <div class="col text-center">
                            <button type="submit" class="btn btn-primary px-4 py-2 rounded-3 shadow-sm">
                                <i class="fas fa-search me-2"></i>Buscar publicaciones
                            </button>
                        </div>
                    </div>
                </form>
            </div>
    
            <!-- seccion de publicaciones organizadas en grid responsive -->
            <div class="row g-4" id="publicationsGrid">
                <!-- bucle blade que itera sobre las publicaciones o muestra mensaje si no hay -->
                @forelse($publications as $publication)
                <div class="col-lg-4 col-md-6">
                    <!-- tarjeta individual para cada publicacion -->
                    <div class="card h-100 shadow-sm">
                        <!-- contenedor de la imagen con posicion relativa para el badge de severidad -->
                        <div class="position-relative">
                            <!-- condicional para mostrar imagen o placeholder si no existe -->
                            @if($publication->image)
                            <img src="{{ asset('storage/' . $publication->image) }}" class="card-img-top" alt="{{ $publication->title }}" style="height: 200px; object-fit: cover;">
                            @else
                            <div class="card-img-top bg-secondary d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="fas fa-image fa-3x text-white-50"></i>
                            </div>
                            @endif
                            <!-- badge de severidad con colores condicionales segun el valor -->
                            <span class="position-absolute top-0 end-0 badge rounded-pill 
                                @if($publication->severity == 'alta') bg-danger
                                @elseif($publication->severity == 'media') bg-warning text-dark
                                @else bg-success
                                @endif m-2">
                                {{ ucfirst($publication->severity) }}
                            </span>
                        </div>
                        <!-- cuerpo de la tarjeta con contenido principal -->
                        <div class="card-body">
                            <!-- encabezado de la tarjeta con titulo y tipo -->
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="card-title mb-0">{{ $publication->title }}</h5>
                                <!-- badge de tipo con colores condicionales -->
                                <span class="badge 
                                    @if($publication->type == 'inundacion') bg-primary
                                    @elseif($publication->type == 'incendio') bg-warning text-dark
                                    @elseif($publication->type == 'terremoto') bg-danger
                                    @else bg-secondary
                                    @endif">
                                    {{ ucfirst($publication->type) }}
                                </span>
                            </div>
                            <!-- descripcion acortada a 150 caracteres -->
                            <p class="card-text">{{ Str::limit($publication->description, 150) }}</p>
                            <!-- pie de tarjeta con ubicacion y fecha -->
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted"><i class="fas fa-map-marker-alt me-1"></i> {{ $publication->location }}</small>
                                <small class="text-muted"><i class="far fa-calendar-alt me-1"></i> {{ $publication->created_at->format('d M Y') }}</small>
                            </div>
                        </div>
                        <!-- footer de la tarjeta con botones de accion -->
                        <div class="card-footer bg-transparent">
                            <div class="d-flex justify-content-between">
                                <!-- boton para ver detalles de la publicacion -->
                                <a href="{{ route('publications.show', $publication->id) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-eye me-1"></i> Ver
                                </a>
                                <div>
                                    <!-- boton para editar con data attributes para precargar el modal -->
                                    <button class="btn btn-sm btn-warning me-1 edit-publication" 
                                        data-id="{{ $publication->id }}"
                                        data-title="{{ $publication->title }}"
                                        data-type="{{ $publication->type }}"
                                        data-severity="{{ $publication->severity }}"
                                        data-location="{{ $publication->location }}"
                                        data-description="{{ $publication->description }}"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#editPublicationModal">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <!-- formulario para eliminar publicacion con confirmacion -->
                                    <form action="{{ route('publications.destroy', $publication->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta publicación?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <!-- mensaje que se muestra cuando no hay publicaciones -->
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        No se encontraron publicaciones.
                    </div>
                </div>
                @endforelse
            </div>
            
            <!-- paginacion que preserva los parametros de busqueda -->
            @if($publications->hasPages())
            <div class="d-flex justify-content-center mt-5">
                {{ $publications->appends(request()->query())->links() }}
            </div>
            @endif
        </div>
    
        <!-- modal para crear nuevas publicaciones -->
        <div class="modal fade" id="createPublicationModal" tabindex="-1" aria-labelledby="createPublicationModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- cabecera del modal con titulo y boton de cierre -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="createPublicationModalLabel">Crear nueva publicación</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- formulario para crear publicaciones con validacion de campos -->
                    <form action="{{ route('publications.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf <!-- token de seguridad CSRF -->
                        <div class="modal-body">
                            <!-- primera fila de campos: titulo y tipo -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="title" class="form-label">Título *</label>
                                    <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" required>
                                    @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="type" class="form-label">Tipo de desastre *</label>
                                    <select class="form-select" name="type" id="type" required>
                                        <option value="" selected disabled>Seleccionar tipo</option>
                                        <option value="inundacion" {{ old('type') == 'inundacion' ? 'selected' : '' }}>Inundación</option>
                                        <option value="incendio" {{ old('type') == 'incendio' ? 'selected' : '' }}>Incendio</option>
                                        <option value="terremoto" {{ old('type') == 'terremoto' ? 'selected' : '' }}>Terremoto</option>
                                        <option value="deslizamiento" {{ old('type') == 'deslizamiento' ? 'selected' : '' }}>Deslizamiento</option>
                                        <option value="otro" {{ old('type') == 'otro' ? 'selected' : '' }}>Otro</option>
                                    </select>
                                    @error('type') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <!-- segunda fila de campos: severidad y ubicacion -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="severity" class="form-label">Severidad *</label>
                                    <select class="form-select" name="severity" id="severity" required>
                                        <option value="" selected disabled>Seleccionar severidad</option>
                                        <option value="alta" {{ old('severity') == 'alta' ? 'selected' : '' }}>Alta</option>
                                        <option value="media" {{ old('severity') == 'media' ? 'selected' : '' }}>Media</option>
                                        <option value="baja" {{ old('severity') == 'baja' ? 'selected' : '' }}>Baja</option>
                                    </select>
                                    @error('severity') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="location" class="form-label">Ubicación *</label>
                                    <input type="text" class="form-control" name="location" id="location" value="{{ old('location') }}" required>
                                    @error('location') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <!-- campo de descripcion con textarea -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Descripción *</label>
                                <textarea class="form-control" name="description" id="description" rows="4" required>{{ old('description') }}</textarea>
                                @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <!-- campo para subir imagen -->
                            <div class="mb-3">
                                <label for="image" class="form-label">Imagen</label>
                                <input class="form-control" type="file" name="image" id="image" accept="image/*">
                                @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                        <!-- pie del modal con botones de accion -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Guardar Publicación</button>
                        </div>
                    </form>
                </div>  
            </div>
        </div>
    
        <!-- modal para editar publicaciones existentes -->
        <div class="modal fade" id="editPublicationModal" tabindex="-1" aria-labelledby="editPublicationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPublicationModalLabel">Editar publicación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- FORMULARIO CORREGIDO: -->
                <!-- 1. Eliminamos la acción fija -->
                <!-- 2. El JavaScript establecerá la URL dinámicamente -->
                <form id="editPublicationForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Campo oculto para el ID (opcional, alternativa al JavaScript) -->
                    <input type="hidden" name="id" id="edit_publication_id">
                    
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="edit_title" class="form-label">Título *</label>
                                <input type="text" class="form-control" name="title" id="edit_title" required>
                            </div>
                            <div class="col-md-6">
                                <label for="edit_type" class="form-label">Tipo de desastre *</label>
                                <select class="form-select" name="type" id="edit_type" required>
                                    <option value="inundacion">Inundación</option>
                                    <option value="incendio">Incendio</option>
                                    <option value="terremoto">Terremoto</option>
                                    <option value="deslizamiento">Deslizamiento</option>
                                    <option value="otro">Otro</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="edit_severity" class="form-label">Severidad *</label>
                                <select class="form-select" name="severity" id="edit_severity" required>
                                    <option value="alta">Alta</option>
                                    <option value="media">Media</option>
                                    <option value="baja">Baja</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="edit_location" class="form-label">Ubicación *</label>
                                <input type="text" class="form-control" name="location" id="edit_location" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="edit_description" class="form-label">Descripción *</label>
                            <textarea class="form-control" name="description" id="edit_description" rows="4" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="edit_image" class="form-label">Nueva imagen</label>
                            <input class="form-control" type="file" name="image" id="edit_image" accept="image/*">

                            <div class="mt-3" id="currentImageContainer">
                                <div class="d-flex align-items-center">
                                    <span class="text-muted">Cargando imagen actual...</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Actualizar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>



   

