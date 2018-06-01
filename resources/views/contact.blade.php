        
@extends('layouts.app')

@section('content')
<!-- Hero-area -->
<div class="hero-area section">

    <!-- Backgound Image -->
    <div class="bg-image bg-parallax overlay" style="background-image:url({{url('/images/home.jpg')}})"></div>
    <!-- /Backgound Image -->

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <ul class="hero-area-tree">
                    <li><a href="/">Home</a></li>
                    <li>Contacto</li>
                </ul>
                <h1 class="white-text">Contactanos</h1>

            </div>
        </div>
    </div>

</div>
<!-- /Hero-area -->

<!-- Contact -->
<div id="contact" class="section">

    <!-- container -->
    <div class="container">

        <!-- row -->
        <div class="row">

            <!-- contact form -->
            <div class="col-md-6">
                <div class="contact-form">
                    <h4> Envianos un mensaje </h4>
                    <form action="/contact" method="post" enctype="multipart/form-data" >
                        <input class="input" type="text" name="name" placeholder="Nombre">
                        <input class="input" type="email" name="email" placeholder="Email">
                        <input type="file" name="file">
                        <textarea class="input" name="message" placeholder="Introduce tu mensaje"></textarea>
                        <button class="main-button icon-button pull-right">Enviar mensaje</button>
                    </form>
                </div>
            </div>
            <!-- /contact form -->

            <!-- contact information -->
            <div class="col-md-5 col-md-offset-1">
                <h4>Informacion de contacto</h4>
                <ul class="contact-details">
                    <li><i class="fa fa-envelope"></i>ydaoud00@estudiantes.unileon.es</li>
                    <li><i class="fa fa-envelope"></i>mdaoud00@estudiantes.unileon.es</li>
                    <li><i class="fa fa-phone"></i>652-626-657</li>
                    <li><i class="fa fa-map-marker"></i> León, España</li>
                </ul>

            </div>
            <!-- contact information -->

        </div>
        <!-- /row -->

    </div>
    <!-- /container -->

</div>
<!-- /Contact -->
@endsection