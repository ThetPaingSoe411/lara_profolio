$(document).ready(function(){
    $("#btn-check").click(function(){
    $parentNode=$(this).parents("tr");
    $price=Number($parentNode.find("#price").text().replace("kyats",""));
    $qty=Number($parentNode.find("#qty").val());
    $total=$price*$qty;
    $parentNode.find("#total").html($total + " kyats");
    summaryCalculation();
    })


    $(".btn-remove").click(function(){
    $parentNode=$(this).parents("tr");
    $parentNode.remove();
    summaryCalculation();
    })


    function summaryCalculation(){
        $totalPrice=0;
    $("#dataTable tr").each(function(index,row){
    $totalPrice += Number($(row).find("#total").text().replace("kyats",""));
    })
    $("#subTotalPrice").html(`${$totalPrice} kyats`)
    $("#finalPrice").html(`${$totalPrice+3500} kyats`)
    }
    })
