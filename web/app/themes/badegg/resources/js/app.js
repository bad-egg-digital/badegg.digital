import.meta.glob([
  '../images/**',
  '../fonts/**',
]);

import Header from '../views/sections/header/header.js';
import MenuMobile from './components/MenuMobile.js';
import LazyLoad from './lib/Lazy.js';
import { bgSrcset } from './lib/bgSrcset.js';
import BadEggLightbox from './lib/BadEggLightbox';

Header();
MenuMobile();
bgSrcset();
LazyLoad();
BadEggLightbox();
