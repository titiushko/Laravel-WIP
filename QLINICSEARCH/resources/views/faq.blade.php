@extends('templates.public')
@section('title', 'Preguntas Frecuentes')
@section('styles')
<link href="{{ asset('css/plugins/reset/reset.css')}}" rel="stylesheet" />
<link href="{{ asset('css/plugins/reset/style.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<h1>Preguntas Frecuentes</h1>
	</div>
</div>
<hr>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <section class="cd-faq">
            <ul class="cd-faq-categories">
                <li><a class="selected" href="#basics">Directorio</a></li>
                <li><a href="#account">Cuenta</a></li>
                <li><a href="#payments">Pagos</a></li>
                <li><a href="#privacy">Privacidad</a></li>
            </ul> <!-- cd-faq-categories -->
            <div class="cd-faq-items">
                <ul id="basics" class="cd-faq-group">
                    <li class="cd-faq-title"><h2>Directorio</h2></li>
                    <li>
                        <a class="cd-faq-trigger" href="#0">¿Cualquier clinica puede incluirse en el directorio médico?</a>
                        <div class="cd-faq-content">
                            <p>Si puede participar cualquier clinica en el directorio de especialidades médica, siempre y cuando, los servicios o productos que ofrezcan estén relacionados con la salud y el bienestar físico de las personas en general y se haya realizado el pago requerido para crear un anuncio</p>
                        </div> <!-- cd-faq-content -->
                    </li>
                    <li>
                        <a class="cd-faq-trigger" href="#0">¿Existe requisitos para mantener un perfil dentro del directorio médico?</a>
                        <div class="cd-faq-content">
                            <p> Si existen tres requisitos. Estos son:</p>
                            <p>1. Que los servicios o productos que se ofrezcan estén relacionados con la salud y el bienestar físico de las personas.</p>
                            <p>2. Que todos los datos del perfil estén completos y claros</p>
                            <p>3. Que se haya contactado con nuestros administradores y hacer los respectivos pagos por el anuncio</p>
                        </div> <!-- cd-faq-content -->
                    </li>
                </ul> <!-- cd-faq-group -->
                <ul id="account" class="cd-faq-group">
                    <li class="cd-faq-title"><h2>Cuenta</h2></li>
                    <li>
                        <a class="cd-faq-trigger" href="#0">¿Se puede borrar un perfil existente en el directorio médico?</a>
                        <div class="cd-faq-content">
                            <p>Sí, se puede borrar o eliminar un perfil del directorio de especialidades médicas en cualquier momento. Para esto se debe enviar un correo electrónico a qlinicsearch@gmail.com indicando el deseo de eliminarlo.</p>
                        </div> <!-- cd-faq-content -->
                    </li>
                    <li>
                        <a class="cd-faq-trigger" href="#0">¿Como cambio mi contraseña?</a>
                        <div class="cd-faq-content">
                            <p>Sí, se puede cambiar la contraseña. Para esto se debe enviar un correo electrónico a qlinicsearch@gmail.com indicando el deseo de cambiarla.</p>
                        </div> <!-- cd-faq-content -->
                    </li>
                    <li>
                        <a class="cd-faq-trigger" href="#0">¿Como elimino mi cuenta?</a>
                        <div class="cd-faq-content">
                            <p>Para eliminar su cuenta debe enviar un correo electrónico a qlinicsearch@gmail.com indicando el deseo de eliminarla.</p>
                        </div> <!-- cd-faq-content -->
                    </li>
                </ul> <!-- cd-faq-group -->
                <ul id="payments" class="cd-faq-group">
                    <li class="cd-faq-title"><h2>Pagos</h2></li>
                    <li>
                        <a class="cd-faq-trigger" href="#0">¿Tiene algún costo el poder publicitar en el directorio de especialidades médicas?</a>
                        <div class="cd-faq-content">
                            <p>Si tiene un costo, para mayor informacion puede contactarnos a qlinicsearch@gmail o llamar a nuestro numero 2207-2577</p>
                        </div> <!-- cd-faq-content -->
                    </li>
                    <li>
                        <a class="cd-faq-trigger" href="#0">¿Puedo obtener un recibo al comprar mi cuenta de QlinicSearch?</a>
                        <div class="cd-faq-content">
                            <p>Sí, al realizar la compra de tu cuenta obtienes un recibo detallando tu transaccion</p>
                        </div> <!-- cd-faq-content -->
                    </li>
                    <li>
                        <a class="cd-faq-trigger" href="#0">¿Puedo hacer el pago de mi cuenta de QlinicSearch en linea?</a>
                        <div class="cd-faq-content">
                            <p>No, por el momento no contamos con ese servicio, pero para mayor informacion sobre crear tu cuenta puedes contactarnos a qlinicsearch@gmail o llamar a nuestro numero 2207-2577</p>
                        </div> <!-- cd-faq-content -->
                    </li>
                </ul> <!-- cd-faq-group -->
                <ul id="privacy" class="cd-faq-group">
                    <li class="cd-faq-title"><h2>Privacidad</h2></li>
                    <li>
                        <a class="cd-faq-trigger" href="#0">¿Pueden otras personas ver las clinicas medicas que administro?</a>
                        <div class="cd-faq-content">
                            <p>No, Solamente el propietario de las clinicas pueden ver la parte administrativas de sus clinicas.</p>
                        </div> <!-- cd-faq-content -->
                    </li>
                </ul> <!-- cd-faq-group -->
            </div> <!-- cd-faq-items -->
            <a href="#0" class="cd-close-panel">Close</a>
        </section> <!-- cd-faq -->
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/plugins/jquery/jquery.mobile.custom.min.js')}}"></script>
<script src="{{ asset('js/plugins/reset/main.js')}}"></script>
@endsection