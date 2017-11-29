$(document).ready(function () {

  $(".button-collapse").sideNav();
  $('select').material_select();
  $('.modal').modal();
  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year,
    today: 'Today',
    clear: 'Clear',
    closeOnSelect: true, // Close upon selecting a date,
    format: 'd mmmm yyyy',
  });
});