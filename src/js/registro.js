import Swal from 'sweetalert2'
(function(){
let eventos = [];

const resumen = document.querySelector('#registro-resumen')
if(resumen){
const eventosBoton = document.querySelectorAll('.evento__agregar');
eventosBoton.forEach(boton => boton.addEventListener('click', seleccionarEvento));

const formularioRegisro = document.querySelector('#registro');
formularioRegisro.addEventListener('submit', submitFormulario);
mostrarEventos();

function seleccionarEvento(e){

if(eventos.length < 5){
   
    //Deshabilitar el evento
e.target.disabled = true;
eventos = [...eventos,{
    id: e.target.dataset.id,
    titulo:  e.target.parentElement.querySelector('.evento__nombre').textContent.trim()
}]
mostrarEventos();
} else {
    Swal.fire({
    title: 'Error',
    text: 'You can add up to 5 events',
    icon: 'error',
    confirmButtonText: 'Ok'
    })
    
}
}
function mostrarEventos(){
    //limpiar el html
   limpiarEventos();

    if(eventos.length > 0){
        eventos.forEach(evento => {
            const eventoDOM = document.createElement('DIV')
            eventoDOM.classList.add('registro__evento')

            const titulo = document.createElement('H3')
            titulo.classList.add('registro__nombre')
            titulo.textContent = evento.titulo

            const botonEliminar = document.createElement('BUTTON')
            botonEliminar.classList.add('registro__eliminar')
            botonEliminar.innerHTML = `<i class="fa-solid fa-trash"></i>`
            botonEliminar.onclick = function(){
                eliminarEvento(evento.id)
            }

            //renderizar el resumen
            eventoDOM.appendChild(titulo)
            eventoDOM.appendChild(botonEliminar)
            resumen.appendChild(eventoDOM)
        })
    } else{
        const noRegistro = document.createElement('P')
        noRegistro.textContent = 'There are no events, add up to 5 events from the left side'
        noRegistro.classList.add('registro__texto')
        resumen.appendChild(noRegistro)
    }
}
function eliminarEvento(id){
eventos = eventos.filter(evento=> evento.id !== id);
const botonAgregar = document.querySelector(`[data-id="${id}"]`)
botonAgregar.disabled = false
mostrarEventos();
}
function limpiarEventos(){
    while(resumen.firstChild){
        resumen.removeChild(resumen.firstChild);
    }
}
async function submitFormulario(e){
    e.preventDefault();
    const regaloId = document.querySelector('#regalo').value
    const eventosId = eventos.map(evento => evento.id)
    
    if(eventosId.length === 0 || regaloId === ''){
        Swal.fire({
            title: 'Error',
            text: 'Choose at least one gift and one event',
            icon: 'error',
            confirmButtonText: 'Ok'
    })
    return;
    }
    //objeto de formdata
    const datos = new FormData();
    datos.append('eventos', eventosId)
    datos.append('regalo_id', regaloId)


    const url = '/finalizar-registro/conferencias'
    const respuesta = await fetch(url, {
        method: 'POST',
        body: datos,
    })
    const resultado = await respuesta.json();

    if(resultado.resultado){
        Swal.fire(
            'Successfull Submit',
            'Your conferences have been stored and your submit successfull, we are looking forward for you in DevWebCamp',
            'success'
        ).then( ( ) => location.href =`/boleto?id=${resultado.token}`)
    } else{
        Swal.fire({
            title: 'Error',
            text: 'Something went wrong',
            icon: 'error',
            confirmButtonText: 'Ok'
    }).then(() => location.reload())
}
    }

}})();