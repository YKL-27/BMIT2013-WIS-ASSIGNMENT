$(document).ready(function () { //filter price range
    let minInput = $("#min-price");
    let maxInput = $("#max-price");

    minInput.on("input", function () {
        let minValue = parseInt($(this).val()) || 0;
        let maxValue = parseInt(maxInput.val()) || 10000;

        if (minValue > maxValue) {
            $(this).val(maxValue);
        }
    });

    maxInput.on("input", function () {
        let minValue = parseInt(minInput.val()) || 0;
        let maxValue = parseInt($(this).val()) || 10000;

        if (maxValue < minValue) {
            $(this).val(minValue);
        }
    });

    //filter checkbox
    checkboxes.on("change", function () {
        $("form").submit();
    });

    $(".add-to-cart").on("click", function () {
        var productID = $(this).data("id"); // 获取按钮的 data-id 值
        window.location.href = BASE_URL + "page/products/cart.php?add=" + productID;
    });

});
