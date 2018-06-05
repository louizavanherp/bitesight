/*//////////////////////////////////////////////////
//////////////////// POPUP ADD /////////////////////
//////////////////////////////////////////////////*/
$(".product__add").on("click", function(e){
    var product = $(this).data("product");
    console.log(product);

    $.ajax({
        method: "POST",
        url: "ajax/popup.ajax.php",
        data: {product: product}
    })
    .done(function(res){
        if(res.status == "success"){
            $(".popupHome").css("display", "block");
            //first delete previous content
            $(".popup-header h1").remove();
            //add title to popup 
            $title = `<h1 class="popup-txt">${res.title}</h1>`;
            $(".popup-header").append($title);
            //fill in href with id 
            $(".popup-addBtnHome").attr("href", `?addHome=${res.product}`);
        }
    });
});

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
var close = $('.close');

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

/*//////////////////////////////////////////////////
///////////////////// SEARCH ///////////////////////
//////////////////////////////////////////////////*/

$(".search__field__input").keyup(function() {
    var search = $(".search__field__input").val();

    if(search != ""){
        $.ajax({
            method: "POST",
            url: "ajax/search.ajax.php",
            data: {search: search}
        })

        .done(function (res){
            //delete previous results
            $(".search__results ul").remove();

            //add items
            $(".search__results").append(`<ul></ul>`);
            for (let i = 0; i < res.products.length; i++){
                var product = `<li><img src="${res.products[i]['image']} ?>" alt="${res.products[i]['title']}"></li>`;
                $(".search__results ul").append(product);
            }   

            });
    }
    
});








