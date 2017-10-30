{!! Form::open(array("url" => "almacen/categoria", "method" => "GET", "autocomplete" => "off", "role" => "search")) !!}
<div class="form-group">
	<div class="input-group">
		<input type="text" class="form-control" name="buscar" placeholder="Buscar..." value="{{ $buscar }}">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary">
				<i class="fa fa-search"></i> Buscar
			</button>
		</span>
	</div>
</div>
{{ Form::close() }}
