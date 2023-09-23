// Use This File to Customer Any Js


// Country => city relation
const country = $("#country_id"),
    cities = $("#city_id");

if (country.length) {
    let selectedCountry = null;

    const updateCities = function () {
        const newSelected = country.val();

        if (newSelected !== selectedCountry) {
            cities.empty();
            selectedCountry = newSelected;
            blockUi(cities.parent())
            fetch(
                `${window.location.origin}/admin/ajax/get-cities?country_id=${selectedCountry}`
            )
                .then((response) => response.json())
                .then((data) => {
                    for (let city of data) {
                        let opt = $("<option>").val(city.id).text(city.translatedName);
                        cities.append(opt);
                    }
                    cities.select2({
                        dropdownParent: $(this).parent()
                    });
                    stopBlockUi(cities.parent())
                });
        }
    }

    country.on("select2:select", updateCities);
}


// Property Page
// --------------------------------------------------------------------
// for Custom checked
window.Helpers.initCustomOptionCheck();

// Select2
// --------------------------------------------------------------------
$(function () {
    const select2 = $('.select2');
    if (select2.length) {
        select2.each(function () {
            var $this = $(this);
            $this.select2({
                dropdownParent: $this.parent()
            });
        });
    }
});
// Block Ui
// --------------------------------------------------------------------
function blockUi(section_block) {
    $(section_block).block({
        message: '<div class="spinner-border" style="color: #4EC89E" role="status"></div>',
        css: {
            backgroundColor: 'transparent',
            border: '0'
        },
        overlayCSS: {
            backgroundColor: '#fff',
            opacity: 0.8
        }
    });
}

function stopBlockUi(section_block) {
    $(section_block).unblock();
}

// countdown
// --------------------------------------------------------------------
function countdown(elementIds) {
    const elements = Object.entries(elementIds).reduce((acc, [key, value]) => {
        acc[key] = document.getElementById(value);
        return acc;
    }, {});

    let {hour, month, minute, day, second} = elements;

    let h = parseInt(hour.innerHTML);
    let mon = parseInt(month.innerHTML);
    let min = parseInt(minute.innerHTML);
    let d = parseInt(day.innerHTML);
    let s = parseInt(second.innerHTML);

    const interval = setInterval(() => {
        if (s === 0) { // Sec.
            min--;
            s = 59; // reset sec

            if (min === 0) { // Mins
                h--;

                if (h === 0) { // Hours
                    d--;

                    if (d === 0) { // days
                        mon--;

                        if (mon === 0) { // Months
                            clearInterval(interval); // stop interval
                        }
                    }
                    h = 23; // reset hours
                }
                min = 59; // reset mins
            }
        }

        second.innerHTML = s;
        minute.innerHTML = min;
        hour.innerHTML = h;
        day.innerHTML = d;
        month.innerHTML = mon;

        s--;
    }, 1000);
}

// CkEditor
//----------------------------------------
function changeToCkEditor(editor) {
    let toolbar = [
        'Heading',
        '|',
        'Bold', 'Italic', 'Link', 'BlockQuote',
        '|',
        'bulletedList',
        'numberedList',
        '|',
        'insertTable',
        '|',
        'undo',
        'redo',
    ];
    ClassicEditor.create(editor, {
        language: {
            ui: $(editor).attr('name').indexOf('ar') !== -1 ? 'ar' : 'en',
            content: $(editor).attr('name').indexOf('ar') !== -1 ? 'ar' : 'en',
        },
        toolbar: toolbar,
    }).then(editor => {
        //
    }).catch(error => {
        console.error(error);
    });
}

$(document).ready(function () {
    // Datatable
    $('.datatable-js').each(function () {
        $(this).DataTable();
    });


    $('.modal').on('hidden.bs.modal', function () {
        $('.modal').find('form').trigger('reset');
    });

    // Change All .editor To CkEditor
    $('.editor').each(function () {
        changeToCkEditor(this);
    });


    // Roles Page
//----------------------------------------
// Select all with target
    const selectWithTarget = document.querySelectorAll(".select_with_target");
    if (selectWithTarget) {
        selectWithTarget.forEach((el) => {
            el.addEventListener("change", (t) => {
                const target = el.getAttribute("data-target");
                document.querySelectorAll(`input.${target}`).forEach((e) => {
                    e.checked = t.target.checked;
                });
            });
        });
    }

    document.querySelectorAll(".select_with_target").forEach((select) => {
        const target = select.getAttribute("data-target");
        const sectionCheckboxes = document.querySelectorAll(`input.${target}`);
        select.parentElement.querySelector("input[type='checkbox']").checked = Array.from(sectionCheckboxes).every((checkbox) => checkbox.checked);
    });

    const selectAll = document.querySelector(".select_all");
    if (selectAll) {
        const checkboxList = document.querySelectorAll('[type="checkbox"]');
        selectAll.addEventListener('change', (t) => {
            checkboxList.forEach((e) => {
                e.checked = t.target.checked;
            });
        });
        selectAll.checked = Array.from(selectWithTarget).every((checkbox) => checkbox.checked);
    }

});



