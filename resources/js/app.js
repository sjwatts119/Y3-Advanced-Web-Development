import './bootstrap';
import 'flowbite';
import GLightbox from "glightbox";
import DateRangePicker from 'flowbite-datepicker/DateRangePicker'

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const lightbox = GLightbox({
    touchNavigation: true,
    loop: true,
    autoplayVideos: true,
    selector: '.glightbox'
});

const dateRangePickerEl = document.getElementById('bookingDateRangePicker');
if (dateRangePickerEl) {
    new DateRangePicker(dateRangePickerEl, {
        todayHighlight: true,
        minDate : new Date(),
        format: 'dd/mm/yyyy',
        orientation: 'bottom',
    });
}


