@if ($errors->any())<!-- preguntamos por los errores -->
<div class="toast bg-danger"  style="position: absolute; top: 0; right: 0;">
    <div class="toast-header">
        <button type="button" class="close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body">
        <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>        
                @endforeach
        </ul>   
    </div>
    
</div>
@endif        
<!--Este codigo hace una pregunta a la funcion si se tiene un mensaje que poner 
en el caso de que se tenga se muestra el mensaje-->
@if ($status ?? '')
<div class="toast bg-success"  style="position: absolute; top: 0; right: 0;">
    <div class="toast-header">
        <button type="button" class="close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body">
        <li>{{ $status ?? '' }}</li>        
    </div>
</div>  
@endif