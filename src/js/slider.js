import Swiper from 'swiper';
import { Navigation } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';

// Inicializar Swiper con Navigation
const swiper = new Swiper('.swiper', {
    modules: [Navigation], // Habilitar el módulo Navigation
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});

document.addEventListener('DOMContentLoaded', function(){
    if(document.querySelector('.slider')){
      const opciones = {
        slidesPerView: 3,
        spaceBetween: 15,
        freeMode: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        },
        breakpoints:{
            768:{
              slidesPerView:2,
            },
            1024:{
                slidesPerView: 3,

            },
            1200:{
                 slidesPerView: 4
            }

        }
      }

        Swiper.use([Navigation])
        new Swiper('.slider', opciones)
    }
})