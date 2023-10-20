$('.show-detail').click(function(){
    $('.fullname-modal').textContent = '';
    $('.gender-modal').textContent = '';
    $('.email-modal').textContent = '';
    $('.tell-modal').textContent = '';
    $('.address-modal').textContent = '';
    $('.building-modal').textContent = '';
    $('.category-modal').textContent = '';
    $('.detail-modal').textContent = '';

    var contact_id = $(this).attr('id');

    var fullname = $('.fullname_get'+contact_id).text();
    var gender = $('.gender_get'+contact_id).text();
    var email = $('.email_get'+contact_id).text();
    var tell = $('.tell_get'+contact_id).text();
    var address = $('.address_get'+contact_id).text();
    var building = $('.building_get'+contact_id).text();
    var category = $('.category_get'+contact_id).text();
    var detail = $('.detail_get'+contact_id).text();

    $('.fullname-modal').textContent = fullname;
    $('.gender-modal').textContent = gender;
    $('.email-modal').textContent = email;
    $('.tell-modal').textContent = tell;
    $('.address-modal').textContent = address;
    $('.building-modal').textContent = building;
    $('.category-modal').textContent = category;
    $('.detail-modal').textContent = detail;

    $('.modal').css({'display':'block'});
})

$('.close-button').click(function(){
    $('.modal').css({'display':'none'});
})

/*

    */