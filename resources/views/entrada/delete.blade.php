<!-- MODAL ELIMINAR -->
<!-- Se define un modal con el efecto 'fade' que aparecerá cuando se active el ID 'modal-eliminar-{/{$reg-/>id}}'.
     Esto permite distinguir los modales de eliminación de diferentes registros. -->
     <div class="modal fade" id="modal-eliminar-{{$reg->id}}">

        <!-- Contenedor del diálogo del modal -->
        <div class="modal-dialog">

            <!-- Formulario que realizará la acción de eliminar el registro.
                 La ruta 'categoria.destroy' es llamada usando el método DELETE para eliminar el registro especificado por su ID. -->
            <form action="{{route('entrada.destroy',$reg->id)}}" method="post">

                <!-- Directiva de seguridad CSRF, necesaria para proteger el formulario de ataques Cross-Site Request Forgery -->
                @csrf

                <!-- Directiva para cambiar el método del formulario a DELETE, ya que los formularios HTML solo admiten GET y POST por defecto -->
                @method('DELETE')

                <!-- Contenedor del contenido del modal, con un diseño visual de fondo rojo ('bg-danger')
                     que indica que se está realizando una acción importante (eliminar un registro). -->
                <div class="modal-content bg-danger">

                    <!-- Encabezado del modal con un título y un botón para cerrar el modal sin realizar la acción -->
                    <div class="modal-header">
                        <h4 class="modal-title">Eliminar registro</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <!-- Cuerpo del modal donde se muestra el mensaje de confirmación.
                         Se utiliza la variable '$reg->nombre' para mostrar dinámicamente el nombre del registro a eliminar. -->
                    <div class="modal-body">
                        ¿Deseas eliminar la entrada par el evento para evento {{$reg->evento_id}}?
                    </div>

                    <!-- Pie del modal con dos botones: uno para cerrar el modal y otro para confirmar la eliminación del registro -->
                    <div class="modal-footer justify-content-between">

                        <!-- Botón para cerrar el modal sin realizar ninguna acción -->
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>

                        <!-- Botón para enviar el formulario y confirmar la eliminación del registro -->
                        <button type="submit" class="btn btn-outline-light">Eliminar</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </form>
            <!-- Fin del formulario -->

        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- FIN MODAL ELIMINAR -->
