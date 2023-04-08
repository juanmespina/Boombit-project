import * as bootstrap from "bootstrap";

document.addEventListener('DOMContentLoaded', function() {

  function BoombitTheme() {
    const _self = this;
    console.log("Loading");
    _self.changeNavbarBgOnScroll();
  }
  
  BoombitTheme.prototype.changeNavbarBgOnScroll = function () {
    const nav = document.querySelector(".navbar.fixed-top");
    window.addEventListener('scroll', function() {
      if (window.pageYOffset >= nav.offsetHeight) {
        nav.classList.add("navbar-light", "bg-light", "opacity-75");
        document.querySelector(".navbar-brand img").setAttribute(
          "src",
          "https://boombit.agency/wp-content/uploads/2021/08/boombit-logo-dark.svg"
        );
      } else {
        nav.classList.remove("navbar-light", "bg-light", "opacity-75");
        document.querySelector(".navbar-brand img").setAttribute(
          "src",
          "https://boombit.agency/wp-content/uploads/2021/08/boombit-logo-light.svg"
        );
      }
    });
  };

  new BoombitTheme();

});