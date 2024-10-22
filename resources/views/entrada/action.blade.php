
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Entrada</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{$entrada->id ? route('entrada.update',$entrada) : route('entrada.store')}}" method="post">
            @if($entrada->id)
                @method('PUT')
                <input type="hidden" name="id" value="{{ $entrada->id }}">
            @endif
            @csrf
            <div class="form-group">
                <label for="nombre">evento_id</label>
                <input type="text" class="form-control" name="evento_id" value="{{$entrada->evento_id}}"
                required placeholder="Ingrese evento_id">
            </div>

            <div class="form-group">
                <label for="nombre">pago</label>
                <input type="text" class="form-control" name="pago" value="{{$entrada->pago}}"
                required placeholder="Ingrese pago">
            </div>


            <div class="form-group">
                <label for="nombre">dni</label>
                <input type="text" class="form-control" name="dni" value="{{$entrada->dni}}"
                required placeholder="Ingrese dni">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
</div>
