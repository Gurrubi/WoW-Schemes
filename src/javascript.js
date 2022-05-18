var select;
var opciones;
var caja

window.onload = function (){
    opciones = document.getElementsByClassName('opciones');
    caja = document.getElementById('cajaOpciones');
    select = document.getElementById('idiomas');
    select.addEventListener('click',desplegar);
}


function desplegar(){
    caja.style.opacity = 1;
    caja.style.width = 140 +'px'

    for(var i = 0; i < opciones.length; i++){
        opciones[i].style.height = 40+'px';
        opciones[i].style.opacity = 1;
    }
}


function cambiarIdioma(){
    select.removeEventListener('click',desplegar);
    quitarCaja();
}

function quitarCaja(){
    for(var i = 0; i < opciones.length; i++){
        opciones[i].style.opacity = 0;
        opciones[i].style.height = 0 + 'px';
    }
    
    caja.style.width = 0 + 'px';
    setTimeout(aniadirEvento,1000);
}

function aniadirEvento(){
    select.addEventListener('click',desplegar);
}
/*
SACAR PARA LOS PRESTAMOS QUE TENEMOS EL LIBRO Y EL EL USUARIO*/