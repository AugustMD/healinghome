function houseInfo(pid) {
    window.open("house.php?pid=" + pid, "_blank");
}

function search() {
    if ($("#region").val() == "") {
        $("#region").focus();
    } else if ($("#address").val() == "") {
        $("#address").focus();
    } else if ($("#datepicker1").val() == "") {
        $("#datepicker1").focus();
    } else if ($("#datepicker2").val() == "") {
        $("#datepicker2").focus();
    } else {
        location.href = "search.php?region=" + $("#region").val() + "&address=" + $("#address").val() + "&checkin=" + $("#datepicker1").val() + "&checkout=" + $("#datepicker2").val() + "&number=" + $("#number option:selected").val();
    }
}

function simpleSearch() {
    if ($("#query").val() == "") {
        $("#query").focus();
    } else {
        location.href = "search.php?query=" + $("#query").val();
    }
}

function regionSearch(regionName) {
    location.href = "search.php?regionName=" + regionName;
}
