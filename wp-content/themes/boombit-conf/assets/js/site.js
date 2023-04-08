import * as bootstrap from "bootstrap";

jQuery(document).ready(function ($) {
  function BoombitTheme() {
    const _self = this;
    console.log("Loading");
    _self.changeNavbarBgOnScroll();
  }
  BoombitTheme.prototype.changeNavbarBgOnScroll = function () {
    $(document).scroll(function () {
      const $nav = $(".navbar.fixed-top");
      if ( $(this).scrollTop() > $nav.height()) {
        $nav.addClass("navbar-light bg-light opacity-75");
        $(".navbar-brand img").attr("src","https://boombit.agency/wp-content/uploads/2021/08/boombit-logo-dark.svg");
      }else{
        $nav.removeClass("navbar-white bg-white opacity-75");
        $(".navbar-brand img").attr("src","https://boombit.agency/wp-content/uploads/2021/08/boombit-logo-light.svg");
      }
    });
  };
  new BoombitTheme();
});
