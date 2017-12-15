<form method="post" action="{{ url('enviar/comentario') }}" id="ContactanosForm">
	<div class="form-group">
		<label for="nombre">Nombre:</label>
		<input type="text" id="nombre" name="nombre" class="form-control">
		<div id="nombre_error" class="alert alert-danger hide"><ul></ul></div>
	</div>
	<div class="form-group">
		<label for="correo">Correo:</label>
		<input type="text" id="correo" name="correo" class="form-control">
		<div id="correo_error" class="alert alert-danger hide"><ul></ul></div>
	</div>
	<div class="form-group">
		<label for="mensaje">Mensaje:</label>
		<textarea id="mensaje" name="mensaje" class="form-control"></textarea>
		<div id="mensaje_error" class="alert alert-danger hide"><ul></ul></div>
	</div>
	<button class="btn btn-primary" type="submit">
		<i class="fa fa-paper-plane"></i> Enviar
	</button>
</form>