<div style="height: 100%">
    @if ($showCodigo)
        <div class="code-scene">         
            <div id="codigo-label">
                <h1>Tu c&oacute;digo: <b>{{ $codigo }}</b></h1>
                <h3 class="px-3 text-center">Guarda tu <b>c&oacute;digo</b> y descarga tu foto escaneando el c&oacute;digo QR</h3>
            </div>
            <div id="codigo-qr" class="p-2">
                <img src="{{ asset('assets/images/qr-code.png') }}" alt="">
            </div>
            <a class="btn btn-primary" href="{{ route('/') }}" style="background-color: #6f42c1; border-color: #6f42c1">  
                <i class="fa-solid fa-rotate-left"></i>
            </a>
        </div> 
    @else 
        <div id="menu-scene" class="menu-scene">        
            <div class="logos">
                {{-- <img style="margin-bottom: 5px;" src="{{ asset('assets/images/sanofi.png') }}" height="25"> --}}
                <img src="{{ asset('assets/images/allegra.png') }}" height="40" type="button" name="source" style="margin-top: 1.5rem">
            </div>
            <div class="form-group pb-3">
                <img src="{{ asset('assets/images/boton.png') }}" height="150" type="button" name="source" id="webcam" value="webcam" style="opacity: 0.5; pointer-events: none;">
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
                <img id="fondo-1" src="{{ asset('assets/images/thumbnail/mini2.png') }}">
                <img id="fondo-2" src="{{ asset('assets/images/thumbnail/mini3.png') }}">
                <img id="fondo-3" src="{{ asset('assets/images/thumbnail/mini1.png') }}">
                <img id="fondo-4" src="{{ asset('assets/images/thumbnail/mini4.png') }}">
            </div>
            
            <div class="logos">
                <img style="margin-bottom: 5px;" src="{{ asset('assets/images/sanofi.png') }}" height="25">
                <img src="{{ asset('assets/images/allegra.png') }}" height="25" type="button" name="source">
            </div>
        </div>
    @endif
</div>
  