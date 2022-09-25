$('#owl-carousel-1').owlCarousel({
    loop: false,
    margin: 40,
    nav: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000: {
            items: 5
        }
    }
});

$('#owl-carousel-2').owlCarousel({
    loop: true,
    margin: 40,
    nav: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000: {
            items: 4
        }
    }
});

$('#owl-carousel-3').owlCarousel({
    loop: true,
    margin: 40,
    nav: true,
    responsive: {
        0: {
            items: 2
        },
        600: {
            items: 3
        },
        1000: {
            items: 5
        }
    }
});

var numberPage = $(".pagination .pagination-link").length;


function showPage(pagination) {
    console.log(pagination)
    if (pagination < 0 || pagination >= numberPage) return;
    $("#pagin li").removeClass("active").eq(pagination).addClass("active");
    if (pagination == 2) {
        $("#pagin li").eq(0).addClass("d-none");
        $("#pagin li").eq(2).removeClass("d-none");
    }

    if (pagination == 3) {
        $("#pagin li").eq(1).addClass("d-none");
        $("#pagin li").eq(3).removeClass("d-none");
    }

    if (pagination > 2) {
        var pagin = $("#pagin li");
        for (let i = 0; i < pagination - 1; i++) {
            $(pagin[i]).addClass("d-none");
            $("#pagin li").eq(pagination).removeClass("d-none");
        }
    }
}
$(".prev").click(function () {
    $("[name=page-link]").val($("#pagin ul .active").index() - 1)
    showPage($("#pagin ul .active").index() - 1);
});

// Go to Right
$(".next").click(function () {
    $("[name=page-link]").val($("#pagin ul .active").index() + 1)
    showPage($("#pagin ul .active").index() + 1);
});

$("#pagin ul a").click(function (e) {
    e.preventDefault();
    showPage($(this).parent().index());
});

showPage(0);

// let a = window.location.href;
// let query = a;
// console.log(query);

// data = {
//     'asdfsadf': {
//         'id': 'd'
//     }
// };

// console.log(data);

$(document).ready(function () {
    var book = $("#show_book").data('book');
    $(function () {
        var bookOptions = {
            height: 500,
            width: 800,
            maxHeight: 600,
            centeredWhenClosed: true,
            hardcovers: true,
            pageNumbers: false,
            toolbar: "lastLeft, left, right, lastRight, toc, zoomin, zoomout, slideshow, flipsound, fullscreen, thumbnails, download",
            thumbnailsPosition: 'left',
            responsiveHandleWidth: 50,
            lightbox: "#show_book",
            lightboxColor: "#eee",
            toolbarPosition: "bottom",
            pdf: book

        };
        $('#book').wowBook(bookOptions);
    });
});

var star = $('.star');
function starFunction() {
    var className = $(this).attr('class');
    var dataStar = $(this).data('star');
    $("[name=star]").val(dataStar);
    for (let i = 0; i < dataStar; i++) {
        if (className == "star d-inline nonactive") {
            $(star[i]).html(`<i class="fa-solid fa-star fs-3"></i>`);
            $(star[i]).removeClass('nonactive');
            $(star[i]).addClass('active');
        } else {
            $(star[i]).html(`<i class="fa-regular fa-star fs-3"></i>`);
            $(star[i]).removeClass('active');
            $(star[i]).addClass('nonactive');
        }
    }
}


for (let i = 0; i < star.length; i++) {
    star[i].addEventListener('click', starFunction, false);
}

var jenjang_item = $("#home-tab-body #jenjang .dropdown-item");
var tema = $("#home-tab-body #tema .dropdown-item");
var bahasa = $("#home-tab-body #bahasa .dropdown-item");
var format = $("#home-tab-body #format .dropdown-item");


$("#jenjang button").on('click', function () {
    for (let s = 0; s < jenjang_item.length; s++) {
        jenjang_item[s].addEventListener('click', function () {
            $("#jenjang button").html("<p>" + $(this).html() + "</p>");
            $("[name=jenjang]").val($(this).data('value'));
        });
    }
})
$("#tema button").on('click', function () {
    for (let s = 0; s < tema.length; s++) {
        tema[s].addEventListener('click', function () {
            $("#tema button").html("<p>" + $(this).html() + "</p>");
            $("[name=tema]").val($(this).data('value'));
        });
    }
})
$("#bahasa button").on('click', function () {
    for (let s = 0; s < bahasa.length; s++) {
        bahasa[s].addEventListener('click', function () {
            $("#bahasa button").html("<p>" + $(this).html() + "</p>");
            $("[name=bahasa]").val($(this).data('value'));
        });
    }
})
$("#format button").on('click', function () {
    for (let s = 0; s < format.length; s++) {
        format[s].addEventListener('click', function () {
            $("#format button").html("<p>" + $(this).html() + "</p>");
            $("[name=format]").val($(this).data('value'));
        });
    }
})
