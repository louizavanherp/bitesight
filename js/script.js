/*//////////////////////////////////////////////////
//////////////////// POPUP ADD /////////////////////
//////////////////////////////////////////////////*/

//get de products
var products = $(".product__item");

//make it to an array
productsArray = jQuery.makeArray(poup);

//get popup 
var popup = $(".popup");

// Get the <span> element that closes the popup
var close = $('.close');

//get add btn
var btn = $(".product__add");

//loop over products
for (let i = 0; i < productsArray.length; i++) {

    //get link 
    var btn = $(".product__add");

    //when click on btn of current element, show popup
    $(btn[i]).on('click', function(e){
        //show popup
        popup.css("display", "block");
        e.preventDefault();
    });

    // When the user clicks on <span> (x), close the popup
    $(close).on('click', function(){
        popup.css('display', "none");
    });

    // When the user clicks anywhere outside of the popup, close it
    $(window).on('click', function(event){
        var target = $(event.target);
        if (target.is(popup) ) {
            popup.css('display', "none");
        }
    });

}

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

// when click on add btn, show popup
$('.productInformation__actions__add').on('click', function(e){
    popup.css("display", "block");

    //add title to popup
    popupTxt.html($('.productInformation__details__title'));

    e.preventDefault();
});

//when click on cross, close popup
$(".close").on("click", function(){
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








