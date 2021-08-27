var miniCartProductItem = `<div class="product-card %MiniCart:not-exist%" product-id="%MiniCart:ProductID%">
                                    <div class="img-box">
                                        <a href="%MiniCart:ProductLink%" target="_blank">
                                            <span class="overlay"></span>
                                            <img class="product-img" src="%MiniCart:ProductImage%" alt="%MiniCart:ProductTitle%">
                                        </a>
                                        <span class="font-icon gift-icon"></span>
                                        <button class="remove" onclick="deleteMiniCartItem(%MiniCart:ProductID%)"></button>
                                    </div>
                                    <div class="content-box">
                                        <h3 class="logo">%MiniCart:ProductBrand%</h3>
                                        <a href="%MiniCart:ProductLink%" target="_blank"><h4 class="name">%MiniCart:ProductTitle%</h4></a>
                                        <div class="details">
                                            <div><span>سایز: </span><span>%MiniCart:ProductSize%</span></div>
                                            <div><span>تعداد: </span><span>%MiniCart:ProductQuantity%</span></div>
                                            <div><span>رنگ: </span><span>%MiniCart:ProductColor%</span></div>
                                        </div>
                                        <div class="price">
                                            <div>
                                                <span>%MiniCart:ProductTotalPrice%</span>
                                                <span> تومان </span>
                                            </div>
                                            %MiniCart:ProductDiscountPrice%
                                        </div>
                                        <div class="not-exist-miniCart">ناموجود</div>
                                    </div>
                                <p class="error">
                                    <span></span>
                                </p>
                            </div>`;


const properties = {
    "email": checkNested(customer, 'user', 'email') ? customer.user.email : ' ',
    "FIRSTNAME": checkNested(customer, 'user', 'firstname') ? customer.user.firstname : ' ',
    "LASTNAME": checkNested(customer, 'user', 'lastname') ? customer.user.lastname : ' '
}

function getMiniCart() {
    clearMiniCart();
    if (checkNested(window.customer, 'token')) {
        axios.get('v1/cart', {
            baseURL: baseUriAPI,
            headers: {
                'Authorization': 'Bearer ' + window.customer.token,
                'platform': 'desktop'
            }
        }).then(function(response) {
            if (response.data.status_code == 200) {
                var cartQty = getCartQuantity(response.data.data.data);
                if (cartQty > 0) {
                    var productItems = renderMiniCartItems(response.data.data.data);
                    $(".cart-btn").append('<span class="cart-btn-count">' + cartQty + '</span>');
                    $("#cartMenu .cart-products").html(productItems);
                    $("#price-value-amount").html(numberWithCommas(response.data.data.meta[0].factor.final_basket_price));
                    $(".header-submenu-container").show();
                    $(".empty-cart").hide();
                } else {
                    $(".header-submenu-container").hide();
                    $(".empty-cart").show();
                }
            }
            getProfile();
        }).catch(function() {
            logout()
            window.location.reload()
        });
    }
}

function getCartQuantity(productData) {

    var totalQty = 0;
    $(productData).each(function(index, product) {
        totalQty += parseInt(product.quantity);
    });
    return totalQty;
}

function renderMiniCartItems(productData) {

    var miniCartTemplate = "";


    $(productData).each(function(index, product) {
        var exist = ''
        if (product.error) {
            exist = "not-exist"
        }
        var findParams = ['%MiniCart:not-exist%', '%MiniCart:ProductID%', '%MiniCart:ProductTitle%', '%MiniCart:ProductImage%', '%MiniCart:ProductBrand%', '%MiniCart:ProductSize%', '%MiniCart:ProductColor%', '%MiniCart:ProductQuantity%', '%MiniCart:ProductDiscountPrice%', '%MiniCart:ProductTotalPrice%', '%MiniCart:ProductLink%'];
        var dataPatams = [exist, product.id_product_attribute, product.name, product.image_thickbox, product.manufacturer, product.size_name, product.color_name, product.quantity, (product.discount > 0) ? '<div class="discount active">' + numberWithCommas(product.display_price) + ' تومان</div>' : "", numberWithCommas(product.final_price), product.link];

        miniCartTemplate += miniCartProductItem.replaceArray(findParams, dataPatams);

    });
    return miniCartTemplate;
}

function clearMiniCart() {
    $(".cart-btn-count ").remove();
}
$(document).on('click', '.cart-add-wishlist', function() {
    if ($('body').attr('id') !== 'order') {
        var productId = $(this).parents('.remove-cart-item').attr('data-product-id');
        confirmDeleteMiniCartItem(productId)
        axios.post('v1/wishlist/', {
            'product_attribute_id': productId,
        }, {
            baseURL: baseUriAPI,
            headers: {
                'Authorization': 'Bearer ' + window.customer.token,
                'platform': 'desktop'
            }
        }).then(function(response) {
            $("#cart-container").LoadingOverlay("hide");
            $("#miniCartRemoveProduct").modal('hide')
        }).catch(function(error) {
            $("#cart-container").LoadingOverlay("hide");
            $("#miniCartRemoveProduct").modal('hide')
        });
    }
});

function deleteMiniCartItem(productId) {
    if (window.customer !== undefined && window.customer.type == "signin" && window.customer.token != undefined && window.customer.token != '') {
        $('#miniCartRemoveProduct .cart-add-wishlist').css('display', 'block');
    } else {
        $('#miniCartRemoveProduct .cart-add-wishlist').css('display', 'none');
    }
    $("#miniCartRemoveProduct").modal("show");
    $("#miniCartRemoveProduct").attr('data-product-id', productId)
    $("#miniCartRemoveProduct .remove").click(function() {
        confirmDeleteMiniCartItem(productId);
    });

    $("#miniCartRemoveProduct .cancel-modal").click(function() {
        $("#miniCartRemoveProduct").modal("hide");
    });
}
// sendinblue 
function sendinblueCartUpdat(cartData, cartMeta) {
    var items = []
    cartData.forEach(function(item) {
        var obj = {
            "name": item.name,
            "price": item.final_price,
            "quantity": item.quantity,
            "url": item.link,
            "image": item.image_thickbox
        }
        items.push(obj)
    })
    var track_event = {
        "id": cartData[0].id_cart,
        "data": {
            "total": cartMeta[0].factor.final_basket_price,
            "currency": "IRR",
            "url": baseUri + "order?step=0",
            "items": items
        }
    }
    sendinblue.track("cart_updated", properties, track_event)
}

function confirmDeleteMiniCartItem(productId) {
    $(".header-submenu").LoadingOverlay("show", {
        image: tplUri + "assets/images/spinner-loading.svg",
    });
    axios.delete('v1/cart/' + productId, {
        baseURL: baseUriAPI,
        headers: {
            'Authorization': 'Bearer ' + window.customer.token,
            'platform': 'desktop'
        }
    }).then(function(response) {
        if (response.data.status_code == 200) {
            getMiniCart();
            if (window.customer.user.email !== "" || window.customer.user.email !== null) {
                if (response.data.data.data.length > 0) {
                    sendinblueCartUpdat(response.data.data.data, response.data.data.meta)
                } else {
                    sendinblue.track("cart_deleted", properties)
                }
            }
        }
    }).then(function() {
        getMiniCart();
        var url = window.location.href
        $(".header-submenu").LoadingOverlay("hide");
        if (!(url.includes('/order?step='))) {
            // window.location.href= window.location.origin+'/order?step=0'
            $(".profile").removeClass("active")
            $("#cartMenu").toggleClass("active")
        }

        /* $(".header-submenu").addClass("active"); */

    });
}
$(document).ready(function() {
    getMiniCart();
});