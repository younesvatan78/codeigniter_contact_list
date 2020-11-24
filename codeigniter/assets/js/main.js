(function($) {

    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    let navbarItems = $('#sidebar ul li');
    navbarItems.on('click', function() {
        navbarItems.removeClass('active');
        $(this).addClass('active');
    })



})(jQuery);


function display_contact() {
    document.getElementById('list-contact').style.display = 'block';
    document.getElementById('add_content').style.display = 'none';

}

function add_contact() {
    document.getElementById('add_content').style.display = 'block';
    document.getElementById('list-contact').style.display = 'none';

}

function update_contact() {
    document.getElementById('update-contact').style.display = 'block';
}