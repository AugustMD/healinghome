//===========
// Your code
//===========
$(document).ready(function() {
    $slider = $('#mySlider');
    $slider.slider().on('slide', function() {
        $('span').text($slider.data('slider').getValue());
    });
    $('span').text($slider.data('slider').getValue());

    $btn = $('#changeSliderMax');
    $btn.click(function() {

        // should be:
        // var value = $slider.slider('getValue');
        // but this doesn't work
        var value = $slider.data('slider').getValue();

        $slider.data('slider').max = 100;
        $slider.slider('setValue', value);
    });
});
