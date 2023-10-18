/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/search.js ***!
  \********************************/
$(function () {
  $("a#filter-button").click(function () {
    var form = $("form.filter-form").serialize();
    $.ajax({
      method: "GET",
      url: "/search",
      data: form
    }).done(function (response) {
      console.log(response);
      $("#car-wrapper").empty();
      $("#number").empty();
      $.each(response.data, function (index, car) {
        var html = "<tr>" + "<td>" + car.id + "</td>" + "<td>" + car.name + "</td>" + "<td>" + car.model + "</td>" + "<td>" + car.fuelTypeTranslated + "</td>" + "<td>" + car.yearOfProduction + "</td>" + "<td>" + car.transmission + "</td>" + "<td>" + car.driveType + "</td>" + "<td>" + car.addInfo + "</td>" + "<td>" + car.price + "</td>" + "<td>" + '<a href="/cars/show/' + car.id + '">' + '<button title="' + displayButton + '" class="btn btn-primary btn-sm"> <i class="fa-regular fa-address-card"></i> </button>' + "</a>" + '<a href="/cars/edit/' + car.id + '">' + '<button title="' + editButton + '" class="btn btn-success btn-sm"> <i class="fa-regular fa-pen-to-square"></i> </button>' + "</a>" + '<button title="' + removeButton + '" class="btn btn-danger btn-sm delete" data-id="' + car.id + '"> <i class="fa-solid fa-trash"></i> </button>' + "</td>" + "</tr>";
        $("tbody#car-wrapper").append(html);
      });
      var number = response.data.length;
      $("#number").append(number);
    }).fail(function (data) {
      alert("error");
    });
  });
});
/******/ })()
;