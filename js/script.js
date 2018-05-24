/*//////////////////////////////////////////////////
//////////////////// POPUP ADD /////////////////////
//////////////////////////////////////////////////*/


/*//////////////////////////////////////////////////
////////////// EDIT BOX DETAIL PAGE ////////////////
//////////////////////////////////////////////////*/

/******* EDIT BOX PRODUCT OPGEGETEN *******/

    //get edit box eat
    var editBoxEat = $(".editBox__eat");

    //when click on eat icon, show edit box
    $(".productInformation__actions__eat").on("click", function(e){
        editBoxEat.css('display', 'block');

        e.preventDefault();
    });

    //get cancel btn
    var cancelEditBoxEat = $(".editBox__eat__content__cancel");

    //when click on cancel, close edit box
    $(cancelEditBoxEat).on("click", function(){
        editBoxEat.css("display", "none");
    });

/******* EDIT BOX PRODUCT WEGGOOIEN *******/


    //get edit box delete
    var editBoxDelete = $(".editBox__delete");

    //when click on delete icon, show edit box
    $(".productInformation__actions__delete").on("click", function(e){
        editBoxDelete.css('display', 'block');

        e.preventDefault();
    });

    //get cancel btn
    var cancelEditBoxDelete = $(".editBox__delete__content__cancel");

    //when click on cancel, close edit box
    $(cancelEditBoxDelete).on("click", function(){
        editBoxDelete.css("display", "none");
    });

    
/******* POPUP TOEVOEGEN *******/

//get popup 
var popup = $(".popup");

// Get the <span> element that closes the popup
var close = $('.footer__detail .close');

// when click on add btn, show popup
$('.productInformation__actions__add').on('click', function(e){
    popup.css("display", "block");

    e.preventDefault();
});

//when click on cross, close popup
$(close).on("click", function(){
    popup.css("display", "none");
});

/*//////////////////////////////////////////////////
/////////////// CONFIRMATION MESSAGE ///////////////
//////////////////////////////////////////////////*/

    //when item added to list, show confirmation message
    /*$('.popup-addBtn').on("click", function(e){
        
        $('.confirmationBox').fadeIn('slow', function(){
            $('.confirmationBox').delay(4000).fadeOut(); 
         });
        
    });*/


/*//////////////////////////////////////////////////
//////////////////// BACK BTN //////////////////////
//////////////////////////////////////////////////*/

$(".goBack__btn").on("click", function(e){
    window.history.back(); 
});








