<div style="height: 100%">
    @if ($showCodigo)
        <div class="code-scene">        
            <div id="codigo-label">
                <h1>Tu c&oacute;digo: <b>{{ $codigo }}</b></h1>
                <h3 class="px-3 text-center">Guarda tu <b>c&oacute;digo</b> y descarga tu foto escaneando el c&oacute;digo QR</h3>
            </div>
            <div id="codigo-qr" class="p-2">
                <img src="https://borealtech.com/wp-content/uploads/2018/10/codigo-qr-1024x1024-1.jpg" alt="">
            </div>
        </div> 
    @else
        <div id="menu-scene" class="menu-scene">        
            <div class="form-group pb-3">
                <img src="{{ asset('assets/images/boton.png') }}" height="150" type="button" name="source" id="webcam" value="webcam" style="opacity: 0.5; pointer-events: none;">
            </div>
            <div class="logos">
                <img style="margin-bottom: 5px;" src="{{ asset('assets/images/sanofi.png') }}" height="25">
                <img src="{{ asset('assets/images/allegra.png') }}" height="25" type="button" name="source">
            </div>
        </div>
        <div id="webcam-scene" class="webcam-scene hidden">
            <div class="farmatodo">
                <img src="{{ asset('assets/images/farmatodo.png') }}">
            </div>
            <div id="webar">
                <button id="screen-shot" class="btn btn-primary camera-button"> 
                    <i class="fa-solid fa-camera"></i>
                </button>
                <img id="marco" src="{{ asset('assets/images/marco1.png') }}" style="position: absolute; width: 100%; bottom: 0%;">
            </div>
            <div class="banner">
                <img src="{{ asset('assets/images/escoge-fondo.png') }}">
            </div>
            <div class="miniaturas">
                <img id="fondo-1" src="{{ asset('assets/images/fondo_cuadrado_1.jpg') }}">
                <img id="fondo-2" src="{{ asset('assets/images/fondo_cuadrado_2.jpg') }}">
            </div>
            
            <div class="logos">
                <img style="margin-bottom: 5px;" src="{{ asset('assets/images/sanofi.png') }}" height="25">
                <img src="{{ asset('assets/images/allegra.png') }}" height="25" type="button" name="source">
            </div>
        </div>
    @endif
</div>
  