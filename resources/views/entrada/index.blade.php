@extends('plantilla.app')  <!-- Extiende la plantilla base llamada 'app' para usar su estructura. -->
@section('contenido')  <!-- Inicia la sección de contenido que reemplazará la sección correspondiente en la plantilla base. -->

<!-- CONTENIDO -->
<!-- Contenido principal -->
<div class="content">  <!-- Div contenedor para el contenido principal. -->
    <div class="container-fluid">  <!-- Contenedor fluido para permitir que el contenido ocupe todo el ancho disponible. -->
        <div class="row">  <!-- Inicia una fila para organizar el contenido. -->
            <div class="col-lg-12">  <!-- Columna que ocupará todo el ancho en dispositivos grandes. -->
                <div class="card">  <!-- Tarjeta para agrupar contenido relacionado. -->
                    <div class="card-header">  <!-- Encabezado de la tarjeta. -->
                        <h5 class="m-0">Entrada  <!-- Título de la sección. -->
                            {{-- <button class="btn btn-primary" data-toggle="modal" data-target="#modal-update">  <!-- Botón para abrir un modal para crear un nuevo registro. -->
                                <i class="fas fa-file"></i> Nuevo  <!-- Ícono de archivo junto al texto "Nuevo". -->
                            </button> --}}


                             <button class="btn btn-primary" onclick="nuevo()"><i class="fas fa-file"></i> Nuevo</button>

                            <a href="" class="btn btn-success">  <!-- Botón para descargar un archivo CSV. -->
                                <i class="fas fa-file-csv"></i> CSV  <!-- Ícono de CSV junto al texto. -->
                            </a>
                        </h5>
                    </div>
                    <div class="card-body">  <!-- Cuerpo de la tarjeta donde se coloca el contenido. -->
                        <form action="/" method="get">  <!-- Formulario que realiza una búsqueda. Enviará una solicitud GET a la raíz del sitio. -->
                            <div class="input-group">  <!-- Agrupación de entrada y botón. -->
                                <input name="texto" type="text" class="form-control" value="">  <!-- Campo de entrada de texto para buscar. -->
                                <div class="input-group-append">  <!-- Agrupación adicional para el botón de búsqueda. -->
                                    <button type="submit" class="btn btn-info">  <!-- Botón para enviar la búsqueda. -->
                                        <i class="fas fa-search"></i> Buscar  <!-- Ícono de lupa junto al texto "Buscar". -->
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div class="alert alert-info alert-dismissible fade show mt-2">  <!-- Alerta informativa que se puede cerrar. -->
                            <span class="alert-icon"><i class="fa fa-info"></i></span>  <!-- Ícono de información en la alerta. -->
                            <span class="alert-text">Mensaje del sistema</span>  <!-- Texto del mensaje de alerta. -->
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">  <!-- Botón para cerrar la alerta. -->
                                <span aria-hidden="true">&times;</span>  <!-- Símbolo de cierre. -->
                            </button>
                        </div>

                        <div class="alert alert-secondary mt-2" role="alert">  <!-- Alerta secundaria para mostrar que no hay registros. -->
                            No hay registros para mostrar  <!-- Mensaje que indica la ausencia de registros. -->
                        </div>


                        <div class="mt-2 table-responsive">  <!-- Sección que hace que la tabla sea responsive. -->




                            <table class="table table-striped table-bordered table-hover table-sm">  <!-- Tabla con estilos Bootstrap. -->
                                <thead>  <!-- Encabezado de la tabla. -->
                                <tr>
                                    <th style="width: 20%">Opciones</th>  <!-- Columna para opciones de editar y eliminar. -->
                                    <th style="width: 20%">ID_Evento</th>  <!-- Columna para mostrar el nombre. -->
                                    <th style="width: 20%">PAGO</th>  <!-- Columna para opciones de editar y eliminar. -->
                                    <th style="width: 40%">DNI</th>  <!-- Columna para mostrar el nombre. -->

                                </tr>
                                </thead>


                                <tbody>  <!-- Cuerpo de la tabla donde se mostrarán los datos. -->


                                    @if(count($registros)==0)
                                    <tr>
                                        <td colspan="3">No hay resultados</td>
                                    </tr>
                                    @else
                                    @foreach($registros as $reg)
                                    <tr>
                                        <td><button class="btn btn-warning btn-sm" onclick="editar({{$reg->id}})"><i class="fas fa-edit"></i> </button>
                                            <button type="button" data-toggle="modal" data-target="#modal-eliminar-{{$reg->id}}"
                                                class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                        </td>
                                        <td>{{$reg->evento_id}}</td>
                                        <td>{{$reg->pago}}</td>
                                        <td>{{$reg->dni}}</td>

                                    </tr>
                                    @include('entrada.delete')
                                    @endforeach
                                    @endif





                                </tbody>
                            </table>  <!-- Fin de la tabla. -->





                        </div>
                    </div>




                </div>
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>



<!-- FIN TABLA -->
<!--MODAL UPDATE-->
<div class="modal fade" id="modal-action" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
    </div>
</div>
<!--FIN MODAL UPDATE-->

<!--FIN CONTENIDO-->


@endsection  <!-- Fin de la sección de contenido. -->


@push('scripts')
<script>
    $('#liAlmacen').addClass("menu-open");
    $('#liEntrada').addClass("active");
    $('#aAlmacen').addClass("active");

    function nuevo(){
      $.ajax({
            method: 'get',
            url: `{{url('entrada/create')}}`,  //Alt + 96 `
            success: function(res){
              $('#modal-action').find('.modal-dialog').html(res);
              $("#textoBoton").text("Guardar");
              $('#modal-action').modal("show");
            }
          });
    }

    function editar(id){
      $.ajax({
            method: 'get',
            url: `{{url('entrada')}}/${id}/edit`,
            success: function(res){
              $('#modal-action').find('.modal-dialog').html(res);
              $("#textoBoton").text("Editar");
              $('#modal-action').modal("show");
            }
          });
    }

</script>
 @endpush
