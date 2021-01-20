let author;
let author2;
let author3;

function populateSources() {
    author.empty();

    author.css('border', '3px solid red');

    const url = 'api/countries/get.php';

// Populate list
    /*$.getJSON(url, function (data) {
        $.each(data, function (key, entry) {
            author.append($('<option>').attr({'dataid': entry._id, value: entry.name+", "+entry.government+", HoS: "+entry.headOfState+", HoG: "+entry.headOfGovernment, id: "datalistcountry"}));
        })
    });*/

    $.getJSON(url, function (data) {
        $.each(data, function (key, entry) {
            author.append($('<option>').attr({'data-id': key, value: entry._id}));
        })
    });
}

function populateSources2() {
    author2.empty();

    author2.css('border', '3px solid red');

    const url = 'api/sources/get.php';

// Populate list
    $.getJSON(url, function (data2) {
        $.each(data2, function (key2, entry2) {
            author2.append($('<option>').attr({'data-id': key2, value: entry2._id}));
        })
    });
}

function populateSources3() {
    author3.empty();

    author3.css('border', '3px solid red');

    const url = 'api/source/get.php';

// Populate list
    $.getJSON(url, function (data3) {
        $.each(data3, function (key3, entry3) {
            author3.append($('<option>').attr({'data-id': key3, value: entry3.name}));
        })
    });
}

window.onload = function() {
    author = $("#country_list");
    author2 = $("#sources_list");
    //author3 = $("#source_list");

    populateSources();
    populateSources2();
    //populateSources3();
}
