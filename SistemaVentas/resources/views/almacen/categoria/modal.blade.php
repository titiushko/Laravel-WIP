<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-eliminar-categoria-{{ $categoria->categoriaid }}">
    {{Form::Open(array(#action#=>array(#CategoriaController@destroy#,$cat->idcategoria),#method#=>#delete#))}}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Eliminar Categoría: {{ $categoria->nombrecategoria }}</h4>
                </div>
                <div class="modal-body">
                    <p>La categoría no se puede recuperar después de eliminar. ¿Estás seguro de continuar?</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> Sí</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times-circle"></i> No</button>
                </div>
            </div>
        </div>
    {{Form::Close()}}
</div>
