$(function() {

 new WOW().init();

 openPopup();

 customSelect();

 formSend();

 formSend2();

});

var formsOnPage = $('.form'), thisForm;
var formSend = function() {

  $.each(formsOnPage, function(index, thisForm) {
    $(".openform__btn").on('click',function(){
      var errors = $(this).parent().find("label[id*='erorr']");
      $(this).after(errors);
    });
    $(thisForm).validate({
      rules: {
        phone: {
          required: true,
          minlength: 4
        },
        email: {
          required: true,
          email: true,
          minlength: 4
        },
      },
      messages: {
        phone: {
          required: "<i class='fa fa-hand-o-up' aria-hidden='true'></i> You have not entered a phone number",
          minlength: "<i class='fa fa-hand-o-up' aria-hidden='true'></i> The phone can not be less than 4 digits"
        },
        email: {
          required: "<i class='fa fa-hand-o-up' aria-hidden='true'></i> You did not enter mail",
          email: "<i class='fa fa-hand-o-up' aria-hidden='true'></i> Invalid email"
        }
      },
      errorClass: "input_errorcustom",
      submitHandler: function() {

        var th = $(thisForm);
        // Лендинг (например: корончатые сверла)
        var landingName = $('#landing-name').html();
        // Название сайта (например: karnaschline.ru)
        var landingSite = $('#landing-site').html();

        var btn = $(thisForm).find('button[type=submit]');
        //Блокируем кнопку от повторного нажатия
        btn.attr('disabled','disabled');
        // Сохраняем текст в переменную
        var textBtn = btn.text();
        btn.text('Wait...');

        // Дополнительные поля
        var additionalFields = "&landing_name=" + landingName + "&site=" + landingSite;
        $.ajax({
          type: "POST",
          url: "/php-libs/mail.php",
          data: th.serialize() + additionalFields
        }).done(function( data ) {
          if ( data == "done" ) {
            $.magnificPopup.open({
             items: {
               src: '#thankyou',
             },
             removalDelay: 300,
             mainClass: 'my-mfp-slide-bottom',

             fixedContentPos: true,
             fixedBgPos: true,

             tClose: 'Закрыть',
           });


            th.trigger("reset");

            //Разблокируем кнопку
            btn.removeAttr('disabled');

            //Вставляем прошлый текст на кнопку
            btn.text(textBtn);

            // Очищаем дополнительные поля
            additionalFields = '';
          } else {
            alert("Error! Try again...");
          }          
        });
      }
    });
  });
}

var formsOnPage2 = $('.subscribe-block__form'), thisForm2;
var formSend2 = function() {
  $.each(formsOnPage2, function(index, thisForm2) {
    $(thisForm2).validate({
      rules: {
        phone: {
          required: true,
          minlength: 4
        },
        email: {
          required: true,
          email: true,
          minlength: 4
        },
      },
      messages: {
        phone: {
          required: "<i class='fa fa-hand-o-up' aria-hidden='true'></i> You have not entered a phone number",
          minlength: "<i class='fa fa-hand-o-up' aria-hidden='true'></i> The phone can not be less than 4 digits"
        },
        email: {
          required: "<i class='fa fa-hand-o-up' aria-hidden='true'></i> You did not enter mail",
          email: "<i class='fa fa-hand-o-up' aria-hidden='true'></i> Invalid email"
        }
      },
      submitHandler: function() {

        var th = $(thisForm2);
        // Лендинг (например: корончатые сверла)
        var landingName = $('#landing-name').html();
        // Название сайта (например: karnaschline.ru)
        var landingSite = $('#landing-site').html();

        var btn = $(thisForm2).find('button[type=submit]');
        //Блокируем кнопку от повторного нажатия
        btn.attr('disabled','disabled');
        // Сохраняем текст в переменную
        var textBtn = btn.text();
        btn.text('Wait...');

        // Дополнительные поля
        var additionalFields = "&landing_name=" + landingName + "&site=" + landingSite;
        $.ajax({
          type: "POST",
          url: "/php-libs/mail.php",
          data: th.serialize() + additionalFields
        }).done(function( data ) {
          if ( data == "done" ) {
            console.log("qdqdqdq");
            var title = $('.subscribe-block__form-title');
            var field= $('.subscribe-block__form-field');
            $(title).text("Thank you for your interest in Olynk!");
            $(title).after("<p class='subscribe-block__form-text'>Get notified about launching</p>");
            $(field).addClass("hidden");
            $(btn).addClass("hidden");
            // Очищаем дополнительные поля

          } else {
            alert("Error! Try again...");
          }          
        });
      }
    });
  });
}

function customSelect(){
  var x, i, j, selElmnt, a, b, c;
  /* Look for any elements with the class "custom-select": */
  x = document.getElementsByClassName("custom-select");
  for (i = 0; i < x.length; i++) {
    selElmnt = x[i].getElementsByTagName("select")[0];
    /* For each element, create a new DIV that will act as the selected item: */
    a = document.createElement("DIV");
    a.setAttribute("class", "select-selected");
    a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
    x[i].appendChild(a);
    /* For each element, create a new DIV that will contain the option list: */
    b = document.createElement("DIV");
    b.setAttribute("class", "select-items select-hide");
    for (j = 1; j < selElmnt.length; j++) {
    /* For each option in the original select element,
    create a new DIV that will act as an option item: */
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /* When an item is clicked, update the original select box,
        and the selected item: */
        var y, i, k, s, h;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        h = this.parentNode.previousSibling;
        for (i = 0; i < s.length; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            for (k = 0; k < y.length; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
      });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
    /* When the select box is clicked, close any other select boxes,
    and open/close the current select box: */
    e.stopPropagation();
    closeAllSelect(this);
    this.nextSibling.classList.toggle("select-hide");
    this.classList.toggle("select-arrow-active");
  });
}

function closeAllSelect(elmnt) {
  /* A function that will close all select boxes in the document,
  except the current select box: */
  var x, y, i, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  for (i = 0; i < y.length; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < x.length; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}

/* If the user clicks anywhere outside the select box,
then close all select boxes: */
document.addEventListener("click", closeAllSelect);
}

function dropdown(){
  if (screen.width>1200) {
    $('ul.top-menu li.dropdown').mouseenter(function() {
      $('.dropdown-menu').removeClass('show');
      $(this).find('.dropdown-menu').addClass('show');
    });
    $(document).mouseup(function (e){ 
      var div = $("ul.top-menu li.dropdown");
      if (!div.is(e.target)
        && div.has(e.target).length === 0) {
        $(this).find('.dropdown-menu').removeClass('show');
    }
  });
  }
}


function openPopup(){
 $('.popup-btn').magnificPopup({
   removalDelay: 300,
   mainClass: 'mfp-fade'
 });
}
