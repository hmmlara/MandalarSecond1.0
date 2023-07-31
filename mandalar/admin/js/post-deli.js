$(document).ready(function() {
    console.log('hello');

    $('#post, #city').on('change', function() {
        if ($('#post').val() == "all" || $('#post').val() == 'none' || $('#post').val() == "seller_waiting" || $('#city').val() == "all") {
            console.log('hell');
            $('#save-btn-container').css('display', 'none');
            $('.check').toggleClass('block') // Corrected 'vision' to 'visibility'
        } else {
            $('#save-btn-container').css('display', 'flex');
            $('.check').toggleClass('block')// Corrected 'vision' to 'visibility'
        }
    });
});
