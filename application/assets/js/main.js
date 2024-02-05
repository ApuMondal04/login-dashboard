$(document).ready(function () {
  $(".heading").click(function () {
    $("header #nav-menu").toggleClass("is-active");
  }),
    $(".nav_items a").click(function (e) {
      e.preventDefault();
      e = $(this).text();
      $(".heading h5").text(e),
        $("header #nav-menu").removeClass("is-active"),
        (window.location.href = $(this).attr("href"));
    }),
    $(".close").click(function (e) {
      $("header #nav-menu").removeClass("is-active");
    });
}),
  $(document).ready(function () {
    $(".marquee").hover(
      function () {
        $(this).find(".marquee-content").css("animation-play-state", "paused");
      },
      function () {
        $(this).find(".marquee-content").css("animation-play-state", "running");
      }
    );
  }),
  $(document).ready(function () {
    $("#looking_for").on("click", function () {
      var e = $(this).index();
      $(".list_items").eq(e).toggle("500"),
        $(this).find(".fa-angle-down").toggleClass("active"),
        $(".fa-angle-down")
          .not($(this).find(".fa-angle-down"))
          .removeClass("active"),
        $(".list_items").not($(".list_items").eq(e)).hide();
    }),
      $(document).on("click", function (e) {
        $(e.target).closest(".details, .list_items").length ||
          ($(" .list_items").hide(), $(".fa-angle-down").removeClass("active"));
      }),
      $(".loc").on("click", function () {
        $(".list_items").hide();
        var e = $(this).html();
        $("#looking_for .selection_type").html(e),
          $("#looking_for .selection_type").css("color", "#fff"),
          $(".fa-angle-down").removeClass("active"),
          $(".fa-angle-down").css("color", "#fff"),
          ("Services" === e
            ? ($("#serviceInput").removeClass("d-none"), $("#otherInput"))
            : "Other things" === e
            ? ($("#otherInput").removeClass("d-none"), $("#serviceInput"))
            : ($("#serviceInput").addClass("d-none"), $("#otherInput"))
          ).addClass("d-none");
      });
  }),
  $(document).ready(function () {
    $(".btn").click(function () {
      $(this).siblings(".invisible_content").toggle("400"),
        $(".more_less").toggleClass("d-none"),
        $(this).siblings(".apply_now").toggleClass("d-none");
    });
  }),
  $(document).ready(function () {
    function e() {
      $(".slider").slick({ slidesToShow: 1, slidesToScroll: 1, arrows: !1 });
    }
    $(window).width() < 768 && e(),
      $(window).on("resize", function () {
        $(window).width() < 768
          ? $(".slider").hasClass("slick-initialized") || e()
          : $(".slider").hasClass("slick-initialized") &&
            $(".slider").slick("unslick");
      });
  }),
  $(document).ready(function () {
    function e() {
      $(".slickslider").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: !1,
      });
    }
    $(window).width() < 768 && e(),
      $(window).on("resize", function () {
        $(window).width() < 768
          ? $(".slickslider").hasClass("slick-initialized") || e()
          : $(".slickslider").hasClass("slick-initialized") &&
            $(".slickslider").slick("unslick");
      });
  }),
  $(document).ready(function () {
    768 <= window.innerWidth &&
      $(".leaders").hover(
        function () {
          $(this).find(".hover-zoom").animate({ width: "200px" }, 300);
        },
        function () {
          $(this).find(".hover-zoom").animate({ width: "60px" }, 300);
        }
      );
  }),
  $(document).ready(function () {
    $(".cultureslider").slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      arrows: !1,
      autoplay: !0,
      autoplaySpeed: 1e3,
      responsive: [
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: !0,
            autoplaySpeed: 1e3,
          },
        },
      ],
    });
  }),
  $(document).ready(function () {
    $(".team_recharge_slider").slick({
      slidesToShow: 2,
      slidesToScroll: 1,
      arrows: !1,
      autoplay: !0,
      autoplaySpeed: 1e3,
      responsive: [
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: !0,
            autoplaySpeed: 1e3,
          },
        },
      ],
    });
  });
var fullname_reg = /^[a-zA-Z]+ [a-zA-Z]+$/,
  mobile_reg = /^[1-9]{1}[0-9]{9}$/,
  email_reg = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/,
  email_reg =
    ($("#check_eligibility").click(function (e) {
      e.preventDefault(),
        "" != $("#fullname").val() &&
        "" != $("#email").val() &&
        "" != $("#phone").val() &&
        "Select the type" !==
          $("#looking_for .list_item.selection_type").text().trim()
          ? ($("#fullname_error").html(""),
            $("#email_error").html(""),
            $("#phone_error").html(""),
            $("#lokking_for_error").html(""))
          : ("" == $("#fullname").val()
              ? $("#fullname_error").html("Please enter your full name.")
              : $("#fullname_error").html(""),
            "" == $("#email").val()
              ? $("#email_error").html("Please enter your email.")
              : $("#email").val().match(email_reg)
              ? $("#email_error").html("")
              : $("#email_error").html("Please enter valid email id."),
            "" == $("#phone").val()
              ? $("#phone_error").html("Please enter your phone number.")
              : $("#phone").val().match(mobile_reg)
              ? $("#phone_error").html("")
              : $("#phone_error").html("Please enter valid phone number."),
            "Select the type" ===
            $("#looking_for .list_item.selection_type").text().trim()
              ? $("#lokking_for_error").html("Please select an option.")
              : $("#lokking_for_error").html(""));
    }),
    $("#fullname").blur(function () {
      "" != $("#fullname").val() && $("#fullname").val().match(fullname_reg)
        ? $("#fullname_error").html("")
        : $("#fullname_error").html("Please enter your full name.");
    }),
    $("#email").blur(function () {
      "" == $("#email").val()
        ? $("#email_error").html("Please enter your email.")
        : $("#email").val().match(email_reg)
        ? $("#email_error").html("")
        : $("#email_error").html("Please enter valid email id.");
    }),
    $("#phone").blur(function () {
      "" == $("#phone").val()
        ? $("#phone_error").html("Please enter your phone number.")
        : $("#phone").val().match(mobile_reg)
        ? $("#phone_error").html("")
        : $("#phone_error").html("Please enter valid phone number.");
    }),
    $(document).ready(function () {
      $("#phone").on("input", function () {
        var e = $(this).val();
        10 < e.length && $(this).val(e.slice(0, 10));
      }),
        $("#fullname").on("input", function () {
          var e = (e = $(this).val()).replace(/[0-9]/g, "");
          $(this).val(e);
        });
    }),
    $(document).ready(function () {
      var i = $(".slider_new");
      $(".slider-pagination a").remove(),
        $(".slider-wrapper")
          .find(".slide")
          .each(function (e) {
            $(".slider-pagination").append("<a>" + (e + 1) + "</a>");
          }),
        $(".current").removeClass("current"),
        $(".slide").removeClass("active"),
        i
          .find(".slider-wrapper > .slide:first-child")
          .addClass("active")
          .show(),
        i.find(".nav-md > .slider-pagination a").first().addClass("current"),
        $(".slider-pagination a").click(function () {
          $(".current").removeClass("current"), $(this).addClass("current");
          var e = $(this).index();
          i
            .find(".slider-wrapper > .slide.active")
            .removeClass("active")
            .hide(),
            i
              .find(".slider-wrapper > .slide")
              .eq(e)
              .fadeIn(250)
              .addClass("active");
        }),
        $(".slider_new").each(function () {
          var e = $(".slider-pagination").children("a"),
            i = $(".slider-pagination").children("a").length;
          5 < e.length
            ? $(this).find(".slider-pagination").children("a").slice(5).hide()
            : $(this).find(".slider-pagination").children("a").slice(i).show();
        });
    }),
    $(document).ready(function () {
      var e,
        i = $(".slider_new").find(".slider-pagination a"),
        l = i.last().index(),
        n = $(".slider_new");
      function a(e) {
        i.removeClass("current"),
          i.eq(e).addClass("current"),
          n
            .find(".slider-wrapper > .slide.active")
            .hide()
            .removeClass("active"),
          n
            .find(".slider-wrapper > .slide")
            .eq(e)
            .fadeIn(250)
            .addClass("active");
      }
      $(".slider-next").on("click", function () {
        (l = i.length - 1),
          (e = n.find(".slider-pagination a.current").index()) === l
            ? (e = 0)
            : (e += 1),
          i.eq(e).addClass("current").show(),
          4 < e && i.eq(e - 5).hide(),
          0 == e &&
            (n.find(".slider-pagination").children("a").show(),
            n.find(".slider-pagination a").slice(5).hide()),
          a(e);
      }),
        $(".slider-previous").on("click", function () {
          (l = i.length - 1),
            (0 === (e = n.find(".slider-pagination a.current").index())
              ? ((e = l), i.eq(l))
              : ((e -= 1), i.eq(e))
            )
              .addClass("current")
              .show(),
            e < i.length - 5 && i.eq(e + 5).hide(),
            e == l &&
              (n.find(".slider-pagination").children("a").show(),
              n.find(".slider-pagination a").slice(0, -5).hide()),
            a(e);
        });
    }),
    /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
$("#Subscribe_btn").click(function (e) {
  e.preventDefault(),
    "" != $("#email").val() && $("#email").val().match(email_reg)
      ? $("#email_error").html("")
      : "" == $("#email").val()
      ? $("#email_error").html("Please enter your email.")
      : $("#email").val().match(email_reg)
      ? $("#email_error").html("")
      : $("#email_error").html("Please enter valid email id.");
}),
  $("#email").blur(function () {
    "" == $("#email").val()
      ? $("#email_error").html("Please enter your email.")
      : $("#email").val().match(email_reg)
      ? $("#email_error").html("")
      : $("#email_error").html("Please enter valid email id.");
  });

function toggleInputSection() {
  var selectedValue = document.getElementById("looking_for_select").value;
  var serviceInput = document.getElementById("serviceInput");
  var otherInput = document.getElementById("otherInput");

  // Hide all input sections
  serviceInput.classList.add("d-none");
  otherInput.classList.add("d-none");

  // Show the selected input section
  if (selectedValue === "services") {
    serviceInput.classList.remove("d-none");
  } else if (selectedValue === "other") {
    otherInput.classList.remove("d-none");
  }
}

// word counter
// function limitTextarea() {
//   var textarea = document.getElementById("myTextarea");
//   var charCount = document.getElementById("charCount");
//   var maxLength = 160;
//   // Remove spaces from the value before counting characters
//   var valueWithoutSpaces = textarea.value.replace(/\s/g, "");
//   var currentLength = valueWithoutSpaces.length;
//   // Truncate the value if it exceeds the character limit
//   if (currentLength > maxLength) {
//     textarea.value = textarea.value.slice(
//       0,
//       maxLength + textarea.value.length - valueWithoutSpaces.length
//     );
//     currentLength = maxLength;
//   }
//   var charsLeft = maxLength - currentLength;
//   charCount.innerText = "Char left: " + charsLeft + "/160";
// }

function limitTextarea() {
  var textarea = document.getElementById("myTextarea");
  var charCount = document.getElementById("charCount");
  var maxLength = 160;
  // Remove spaces from the value before counting characters
  var valueWithoutSpaces = textarea.value.replace(/\s/g, "");
  var currentLength = valueWithoutSpaces.length;
  // Truncate the value if it exceeds the character limit
  if (currentLength > maxLength) {
    textarea.value = textarea.value.slice(
      0,
      maxLength + textarea.value.length - valueWithoutSpaces.length
    );
    currentLength = maxLength;
  }
  var charsLeft = maxLength - currentLength;
  charCount.innerText = "Char left: " + charsLeft + "/160";
}
