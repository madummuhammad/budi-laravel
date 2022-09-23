(function ($) {
    "use strict"

    // single select box
    $(".single-select").select2();
})(jQuery);

jQuery(document).ready(function () {
    $(".sinopsis").summernote({
        height: 190,
        minHeight: null,
        maxHeight: null,
        focus: !1
    }), $(".inline-editor").summernote({
        airMode: !0
    })
}), window.edit = function () {
    $(".click2edit").summernote()
}, window.save = function () {
    $(".click2edit").summernote("destroy")
};


jQuery(document).ready(function () {
    $(".blog").summernote({
        height: 190,
        minHeight: null,
        maxHeight: null,
        focus: !1
    }), $(".inline-editor").summernote({
        airMode: !0
    })
}), window.edit = function () {
    $(".click2edit").summernote()
}, window.save = function () {
    $(".click2edit").summernote("destroy")
};


// The DOM element you wish to replace with Tagify
var input = document.querySelector('input[name=tags]');

// initialize Tagify on the above input node reference
new Tagify(input);

(function ($) {
    "use strict"
    var audio_book = $('#audiobook').DataTable({
        createdRow: function (row, data, index) {
            $(row).addClass('selected')
        }
    });


    audio_book.on('click', 'tbody tr', function () {
        var $row = audio_book.row(this).nodes().to$();
        var hasClass = $row.hasClass('selected');
        if (hasClass) {
            $row.removeClass('selected')
        } else {
            $row.addClass('selected')
        }
    })

    audio_book.rows().every(function () {
        this.nodes().to$().removeClass('selected')
    });

    var botm = $('.book_of_the_month').DataTable({
        createdRow: function (row, data, index) {
            $(row).addClass('selected')
        }
    });


    botm.on('click', 'tbody tr', function () {
        var $row = botm.row(this).nodes().to$();
        var hasClass = $row.hasClass('selected');
        if (hasClass) {
            $row.removeClass('selected')
        } else {
            $row.addClass('selected')
        }
    })

    botm.rows().every(function () {
        this.nodes().to$().removeClass('selected')
    });

    var table = $('.table-table').DataTable({
        createdRow: function (row, data, index) {
            $(row).addClass('selected')
        }
    });

    table.on('click', 'tbody tr', function () {
        var $row = table.row(this).nodes().to$();
        var hasClass = $row.hasClass('selected');
        if (hasClass) {
            $row.removeClass('selected')
        } else {
            $row.addClass('selected')
        }
    })

    table.rows().every(function () {
        this.nodes().to$().removeClass('selected')
    });
})(jQuery);




