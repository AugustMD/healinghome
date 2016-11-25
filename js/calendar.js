$(function() {
    $("#datepicker1").datepicker({
        dateFormat: 'yy-mm-dd',
        monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
        monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
        dayNames: ['일', '월', '화', '수', '목', '금', '토'],
        dayNamesShort: ['일', '월', '화', '수', '목', '금', '토'],
        dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
        showMonthAfterYear: true,
        yearSuffix: '년',
        maxDate: "+2M",
        minDate: 0,
        //beforeShowDay: disableAllTheseDays,
        onSelect: moveFocusing
    });
    $("#datepicker2").datepicker({
        dateFormat: 'yy-mm-dd',
        monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
        monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
        dayNames: ['일', '월', '화', '수', '목', '금', '토'],
        dayNamesShort: ['일', '월', '화', '수', '목', '금', '토'],
        dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
        showMonthAfterYear: true,
        yearSuffix: '년',
        maxDate: "+2M 1D",
        minDate: 1
    });
    $("#bookingCalendar").datepicker({
        dateFormat: 'yy-mm-dd',
        monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
        monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
        dayNames: ['일', '월', '화', '수', '목', '금', '토'],
        dayNamesShort: ['일', '월', '화', '수', '목', '금', '토'],
        dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
        showMonthAfterYear: true,
        yearSuffix: '년',
        maxDate: "+2M",
        minDate: 0,
        beforeShowDay: disableAllTheseDays
    });

});

function moveFocusing() {
    var date = new Date($("#datepicker1").val());
    date.setDate(date.getDate() + 1);
    $("#datepicker2").datepicker("option", "minDate", date);
}


var disabledDays = new Array;

// 특정일 선택막기
function disableAllTheseDays(date) {
    var m = date.getMonth(),
        d = date.getDate(),
        y = date.getFullYear();
    for (i = 0; i < disabledDays.length; i++) {
        if ($.inArray(y + '-' + (m + 1) + '-' + d, disabledDays) != -1) {
            return [false];
        }
    }
    return [true];
}
