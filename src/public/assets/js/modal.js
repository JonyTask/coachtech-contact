$('.show-detail').click(function(){
    $('.fullname-modal').text('');
    $('.gender-modal').text('');
    $('.email-modal').text('');
    $('.tell-modal').text('');
    $('.address-modal').text('');
    $('.building-modal').text('');
    $('.category-modal').text('');
    $('.detail-modal').text('');

    var contact_id = $(this).attr('id');

    var fullname = $('.fullname_get'+contact_id).text();
    var gender = $('.gender_get'+contact_id).text();
    var email = $('.email_get'+contact_id).text();
    var tell = $('.tell_get'+contact_id).text();
    var address = $('.address_get'+contact_id).text();
    var building = $('.building_get'+contact_id).text();
    var category = $('.category_get'+contact_id).text();
    var detail = $('.detail_get'+contact_id).text();

    $('.fullname-modal').text(fullname);
    $('.gender-modal').text(gender);
    $('.email-modal').text(email);
    $('.tell-modal').text(tell);
    $('.address-modal').text(address);
    $('.building-modal').text(building);
    $('.category-modal').text(category);
    $('.detail-modal').text(detail);

    $('.modal').css({'display':'block'});
})

$('.close-button').click(function(){
    $('.modal').css({'display':'none'});
})