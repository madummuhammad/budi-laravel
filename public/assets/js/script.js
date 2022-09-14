var book_type = $('.book_type');

for (let i = 0; i < book_type.length; i++) {
    book_type[i].onclick = function () {
        if ($(this).val() == '9e30a937-0d60-49ad-9775-c19b97cfe864') {
            $("#file").html(`
            <div class="form-group">
            <label for="exampleInputEmail1">File Audio</label><br>
            <input type="file" class="form-control" id="content-buku" aria-describedby="emailHelp" hidden name="content">
            <label for="content-buku" class="label-upload-custom btn btn-secondary">Pilih File Audio</label>
            </div>
            <div class="form-group " id="versi-pdf">
            <div class="form-check mb-2">
                <input type="checkbox" class="form-check-input"
                    id="versi-pdf-check" value="1"
                    name="having_pdf">
                <label class="form-check-label" for="versi-pdf-check">Apakah memiliki versi pdf?</label>
                </div>
            </div>
            <div id="versi-pdf-container"></div>
            `
            );
            $("#versi-pdf-check").on('click', function () {
                if (this.checked) {
                    $("#versi-pdf-container").html(`
                    <div class="form-group">
                    <label for="exampleInputEmail1">Versi PDF</label><br>
                    <input type="file" class="form-control" id="content-versi-pdf" aria-describedby="emailHelp" hidden name="content-versi-pdf">
                    <label for="content-versi-pdf" class="label-upload-custom btn btn-secondary">Pilih File PDF</label>
                    </div>
                    `)
                } else {
                    $("#versi-pdf-container").html(`

                    `)
                }
            })
        }

        if ($(this).val() == 'bfe3060d-5f2e-4a1b-9615-40a9f936c6cc') {
            $("#file").html(`
            <div class="form-group">
            <label for="exampleInputEmail1">File Video</label><br>
            <input type="file" class="form-control" id="content-buku" aria-describedby="emailHelp" hidden name="content">
            <label for="content-buku" class="label-upload-custom btn btn-secondary">Pilih File Video</label>
            </div>

            <div class="form-group " id="versi-pdf">
            <div class="form-check mb-2">
                <input type="checkbox" class="form-check-input"
                    id="versi-pdf-check" value="1"
                    name="having_pdf">
                <label class="form-check-label" for="versi-pdf-check">Apakah memiliki versi pdf?</label>
                </div>
            </div>
            <div id="versi-pdf-container"></div>
            `
            );
            $("#versi-pdf-check").on('click', function () {
                if (this.checked) {
                    $("#versi-pdf-container").html(`
                    <div class="form-group">
                    <label for="exampleInputEmail1">Versi PDF</label><br>
                    <input type="file" class="form-control" id="content-versi-pdf" aria-describedby="emailHelp" hidden name="content-versi-pdf">
                    <label for="content-versi-pdf" class="label-upload-custom btn btn-secondary">Pilih File PDF</label>
                    </div>
                    `)
                } else {
                    $("#versi-pdf-container").html(`

                    `)
                }
            })
        }
    }
}

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
    //example 1
    // $("#audiobook").hide();
    var audio_book = $('#audiobook').DataTable({
        createdRow: function (row, data, index) {
            $(row).addClass('selected')
        }
    });

    // console.log(audio_book);

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
})(jQuery);
