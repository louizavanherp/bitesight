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

            //add productid to data attribute popup-header
            $('.popup-header').attr('data-productid', res.product);
            //fill in href with id 
            $(".popup-addBtnHome").attr("href", `?addHome=${res.product}`);
        }
    });
});
/*//////////////////////////////////////////////////
/////////////// ADD BOX HOME PAGE //////////////////
//////////////////////////////////////////////////*/

//change value when click on min
$(".calc__min--home").on("click", function(e){
    var quantity = $(".calc__quantity--home").html();

    
    if(quantity > 1){
        //change value
        quantity = --quantity;

        //put new value in html 
        $(".calc__quantity--home").html(quantity);
    }
});

//change value when click on plus
$(".calc__plus--home").on("click", function(e){
    var quantity = $(".calc__quantity--home").html();

    //change value
    quantity = ++quantity;

    //put new value in html 
    $(".calc__quantity--home").html(quantity);
});


$(".popup-addBtnHome").on("click", function(e){
    var quantity = $(".calc__quantity--home").html();
    var productid = $(this).parent().find(".popup-header").data("productid");

    $.ajax({
        method: "POST",
        url: "ajax/addToList.ajax.php",
        data: {quantity: quantity,
                productid : productid,
              }
    })

    .done(function(res){
        if(res.status = "success"){
            //close popup 
            popup.css("display", "none");
        }
    });


    e.preventDefault();
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
        
        $('.confirmationBox__list').fadeIn('slow', function(){
            $('.confirmationBox__list').delay(4000).fadeOut(); 
         });
        
    });*/

/*//////////////////////////////////////////////////
////////////// ADD BOX DETAIL PAGE ////////////////
//////////////////////////////////////////////////*/

//change value when click on min
$(".calc__min--detail").on("click", function(e){
    var quantity = $(".calc__quantity--detail").html();

    
    if(quantity > 1){
        //change value
        quantity = --quantity;

        //put new value in html 
        $(".calc__quantity--detail").html(quantity);
    }
});

//change value when click on plus
$(".calc__plus--detail").on("click", function(e){
    var quantity = $(".calc__quantity--detail").html();

    //change value
    quantity = ++quantity;

    //put new value in html 
    $(".calc__quantity--detail").html(quantity);
});


$(".popup-addBtn--detail").on("click", function(e){
    var quantity = $(".calc__quantity--detail").html();
    var productid = $(".popup-txt").data("productid");

    $.ajax({
        method: "POST",
        url: "ajax/addToList.ajax.php",
        data: {quantity: quantity,
                productid : productid,
              }
    })

    .done(function(res){
        if(res.status = "success"){
            //close popup 
            popup.css("display", "none");
        }
    });

    e.preventDefault();
});

/*//////////////////////////////////////////////////
//////////////////////// LIST //////////////////////
//////////////////////////////////////////////////*/

//when click on min  
$(".calc__min--list").on("click", function(e){
    //get productid
    var productId = $(this).data("productid");
    //get quantity 
    var quantity = $(this).parent().find(".calc__quantity--list").html();
    //get id 
    var listId = $(this).data("id");
    
    $.ajax({
        method: "POST",
        url: "ajax/listminus.ajax.php",
        data: {quantity: quantity,
                listId : listId,
                productId : productId,
              }
    })

    .done(function(res){
        if(res.status = "success"){
            $("#q"+res.listId).html(res.quantity);
        }
    });
});



//when click on plus 
$(".calc__plus--list").on("click", function(e){
    //get product id 
    var productId = $(this).data("productid");
    console.log(productId);
    //get quantity 
    var quantity = $(this).parent().find(".calc__quantity--list").html();
    //get list id 
    var listId = $(this).data("id");
    
    $.ajax({
        method: "POST",
        url: "ajax/listplus.ajax.php",
        data: {quantity: quantity,
                listId : listId,
                productId : productId,
              }
    })

    .done(function(res){
        if(res.status = "success"){
            $("#q"+res.listId).html(res.quantity);
        }
    });
});


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
                    if(res.products[i]['stock']==1){
                        var product = `<li class="search__results__listItem"><a href="detail.php?id=${res.products[i]['id']}"><img src="${res.products[i]['image']} ?>" alt="${res.products[i]['title']}"> <div class="search__results__txt"><p class="search__results__txt__title"> ${res.products[i]['title']} </p> <p class="search__results__txt__stock">Momenteel op voorraad</p></div></a></li>`;
                    }
                    else
                    {
                        var product = `<li class="search__results__listItem"><a href="detail.php?id=${res.products[i]['id']}&newProduct=1"><img src="${res.products[i]['image']} ?>" alt="${res.products[i]['title']}"> <div class="search__results__txt"><p class="search__results__txt__title"> ${res.products[i]['title']} </p> <p class="search__results__txt__stock">Niet op voorraad</p></div></a></li>`;
                    }
                    $(".search__results ul").append(product);
                }
        });
    
});


/********** click on search field  ********/

$(".search__field__part1").on("click", function(){

    //move search field
    $(".search__field").animate({"padding-left": "2em"}, "fast");

    //background-color white 
    $(".search__field").css("background-color", "white");
    $(".search__field__input").css("background-color", "white");

    //add closing cross
    $(".search__field__cross").css("display", "block");

});

    /*cross click close*/
    $(".search__field__cross").on("click", function(e){
        //move search field
        $(".search__field").animate({"padding-left": "0em"}, "fast");

        //background-color grey 
        $(".search__field").css("background-color", "#F7F7F7");
        $(".search__field__input").css("background-color", "#F7F7F7");

        //hide cross
        $(".search__field__cross").css("display", "none");

        //remove content input field
        $(".search__field__input").val('');

        //remove searched items 
        $(".search__results ul").remove();
    });

/*//////////////////////////////////////////////////
///////////////////// ACCOUNT //////////////////////
//////////////////////////////////////////////////*/

/**** new member *****/
$(".account__household__newMember__submit__link").on("click", function(e){
    var email = $(".account__household__newMember__submit__input").val();

    $.ajax({
        method: "POST",
        url: "ajax/account.ajax.php",
        data: {email: email}
    })

    .done(function (res){
        if(res.status == "success"){
            if(res.email != ""){
                //make new li item with email 
                var newMember = `<div style='display:none' class="account__household__member">
                <li>${res.email}</li>
                <a class='account__household__member__close' href="#"><img src="images/icon/cross.svg" alt="close"></a>
                </div>`;
                //prepend list item to ul 
                $(".account__household__members").prepend(newMember);
                //use animation 
                $('.account__household__member').first().slideDown();
                //empty value in input 
                $('.account__household__newMember__submit__input').val('');

                $(".account__household__member__close").on("click", function(e){
                    $(this).parent().remove();
                });
            }
        }
    });

    e.preventDefault();
});

/****** delete member ******/
$(".account__household__member__close").on("click", function(e){
    console.log("geklikt");
    e.preventDefault();
});

/****** invitation sent ******/
$(".account__invitation").on("click", function(e){

    if($(".account__household__member").length >0){
        //show confirmationBox
        $('.confirmationBox__invitation').fadeIn('slow', function(){
        $('.confirmationBox__invitation').delay(2000).fadeOut(); 
        });

        //empty value in input 
        $('.account__household__newMember__submit__input').val('');

        //remove emails 
        $(".account__household__member").remove();
    }
    e.preventDefault();
});


/*//////////////////////////////////////////////////
/////////////////////// EDIT ///////////////////////
//////////////////////////////////////////////////*/

$(".edit__save").on("click", function(e){
    var name = $(".edit__username__txt__input").val();
    var email = $(".edit__email__txt__input").val()

    $.ajax({
        method: "POST",
        url: "ajax/edit.ajax.php",
        data: {email: email,
               name: name,
              }
    })

    .done(function (res){
        if(res.status == "success"){
            window.location = "account.php";
        }
    });

    e.preventDefault();
});

/*//////////////////////////////////////////////////
///////////////////// PASSWORD /////////////////////
//////////////////////////////////////////////////*/

$(".password__save").on("click", function(e){
    var password = $(".password__currentPw").val();
    var newPassword = $(".password__newPw").val()
    var newPasswordConfirmation = $(".password__confirmPw").val();

    $.ajax({
        method: "POST",
        url: "ajax/password.ajax.php",
        data: {password: password,
               newPassword: newPassword,
               newPasswordConfirmation: newPasswordConfirmation,
              }
    })

    .done(function (res){
        if(res.status == "success"){
                window.location = "account.php";
        }
        else{
            $(".passwordInput").css("border-bottom", "1px solid red");
            $(".passwordInput").val('');
        }
    });

    e.preventDefault();
});








