<form method="post" action="{{ url('usuarios/updatepassword') }}" id="UpdatePasswordForm">
    <div class="form-group">
        <label for="mypassword">Contraseña Actual:</label>
        <input type="password" id="mypassword" name="mypassword" class="form-control">
        <div id="mypassword_error" class="alert alert-danger hide"><ul></ul></div>
    </div>
    <div class="form-group">
        <label for="password">Nueva Contraseña:</label>
        <input type="password" id="password" name="password" class="form-control">
        <div id="password_error" class="alert alert-danger hide"><ul></ul></div>
    </div>
    <div class="form-group">
        <label for="password_confirmation">Confirma Nueva Contraseña:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
		<div id="password_confirmation_error" class="alert alert-danger hide"><ul></ul></div>
    </div>
    <button class="btn btn-primary" type="submit">
        <i class="fa fa-floppy-o"></i> Guardar
    </button>
</form>