"use strict";
// const camera = icon({ prefix: 'fas', iconName: 'camera' })
/* jshint esversion: 6, browser: true */
$ = jQuery;

function initStickyHeader() {
  var header = $(".site-header");
  var headerH = header.find(".site-header-content").innerHeight();
  if (header.hasClass("is-sticky")) {
    header.css({ height: headerH + "px" });
  }
}

$(document).ready(function() {
  initStickyHeader();

  $(".navbar-toggler").on("click", function() {
    $(".hamburger-icon").toggleClass("open");
  });
});
