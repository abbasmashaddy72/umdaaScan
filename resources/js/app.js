import "../css/app.css";

import Alpine from "alpinejs";
import focus from "@alpinejs/focus";
import flatpickr from "flatpickr";
import * as FilePond from "filepond";
import { createPopper } from "@popperjs/core";

window.flatpickr = flatpickr;
window.FilePond = FilePond;
window.createPopper = createPopper;

window.Alpine = Alpine;
Alpine.plugin(focus);

import "./../../vendor/power-components/livewire-powergrid/dist/powergrid";
import "./../../vendor/power-components/livewire-powergrid/dist/powergrid.css";

Alpine.start();

import lightbox from "lightbox2";
window.lightbox = lightbox;

/*
 |--------------------------------------------------------------------------
 | Midone Built-in Components
 |--------------------------------------------------------------------------
 |
 | Import Midone built-in components.
 |
 */
import "./bootstrap";
import "@left4code/tw-starter/dist/js/svg-loader";
import "@left4code/tw-starter/dist/js/accordion";
import "@left4code/tw-starter/dist/js/alert";
import "@left4code/tw-starter/dist/js/dropdown";
import "@left4code/tw-starter/dist/js/modal";
import "@left4code/tw-starter/dist/js/tab";

/*
 |--------------------------------------------------------------------------
 | 3rd Party Libraries
 |--------------------------------------------------------------------------
 |
 | Import 3rd party library JS files.
 |
 */
import "./components/feather";
import "./components/datepicker";

/*
 |--------------------------------------------------------------------------
 | Custom Components
 |--------------------------------------------------------------------------
 |
 | Import JS custom components.
 |
 */
import "./components/show-modal";
import "./components/show-slide-over";
import "./components/show-dropdown";
import "./components/side-menu";
import "./components/mobile-menu";
import "./components/side-menu-tooltip";
import "./components/new-dark-mode-switcher";

// import "../../../vendor/wire-elements/modal/resources/js/modal";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";

window.ClassicEditor = ClassicEditor;
