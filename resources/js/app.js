import './bootstrap';
import 'flowbite';
import GLightbox from "glightbox";

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const lightbox = GLightbox({
    touchNavigation: true,
    loop: true,
    autoplayVideos: true,
    selector: '.glightbox'
});

