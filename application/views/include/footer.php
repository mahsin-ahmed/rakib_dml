<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!isset($_SESSION)) {
    redirect(base_url());
}
?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
<script src="<?php echo base_url(); ?>assets/rakib/js/r-main.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
    });

    $("#courier-name").change(function() {
        var courier_id = $(this).find(":selected").val();

        if (courier_id != null) {
            $(".loading-img").css("display", "block");
            $.ajax({
                url: "get_courier_charge",
                method: "POST",
                data: {
                    courier_id: courier_id
                },
                success: function(result) {
                    $(".loading-img").css("display", "none");
                    $("#courier_charge").val(result);
                    delivary_charge(result);
                }

            });
        }
    });

    $("#courier_charge").change(function() {
        var d_charge = $(this).val();
        delivary_charge(d_charge);
        grandTotal();
    })


    function delivary_charge(x) {
        var c = parseInt(x);
        $("#delivary_charge").val(c);
        grandTotal();
    }


    function updateTotal(event) {
        var quantity = $(event.target).closest("tr").find(".quantity").val();
        var unitPrice = $(event.target).closest("tr").find(".unit_price").val();

        total_price(quantity, unitPrice);
        subTotal();
        grandTotal();
    }

    function total_price(x, y) {
        var x = x;
        var y = y;
        var total = x * y;

        $(event.target).closest("tr").find(".total").val(total);
    }



    function subTotal() {
        var subTotal = parseInt(0);

        $("#itemList > tr").each(function(key, val) {
            var tPrice = $(val).find(".total").val();

            subTotal = subTotal + parseFloat(tPrice);

            $("#subtotal").val(subTotal);
        })
    }

    function grandTotal() {
        var subTotal = $("#subtotal").val();
        var delivaryCharge = $("#delivary_charge").val();
        var discount = $("#discount").val();

        var gt = parseInt(delivaryCharge) + parseInt(subTotal);
        if(parseInt(discount) > 0){
            gt = gt - parseInt(discount);
        }

        // var gt = parseInt(subTotal) + parseInt(delivary_charge) + parseInt(discount);

        $("#grand_total").val(gt);
    }

    $("#add_new_product").click(function() {
        var ser = serial() + 1;

        $("#itemList").append('<tr><td class="ser"><span>' + ser + '</span></td><td><input class="product_name" type="text"  name="product_name[]" required></td><td><input class="quantity" type="text" min="1" name="product_quantity[]" onkeyup="updateTotal(event)" value="0" required></td><td><input class="unit_price" type="text" min="1"  name="unit_price[]" onkeyup="updateTotal(event)" value="0" required></td><td><input type="text" class="total" name="total[]" min="1"> </td><td><span class="remove_product" style="cursor:pointer; background: red; color:white" onclick="remove_product(event)">REMOVE</span></td></tr>');
    })

    function remove_product(event) {
        var id = $(event.target).closest("tr").find(".ser").text();
        $(event.target).closest("tr").remove();
        var srl = 1;

        $("#itemList > tr").each(function(key, val) {
            $(val).find(".ser > span").text(srl);
            srl++;
        });
        subTotal();
        grandTotal();
    }

    $("#discount").change(function(){        
        grandTotal();
    })

    function serial() {
        var ser = $("#itemList > tr:last").find(".ser > span").text();
        if (ser == "") {
            return 0;
        } else {
            return parseInt(ser);
        }
    }

    function firstItem() {
        var ser = serial() + 1;

        $("#itemList").append('<tr><td class="ser"><span>' + ser + '</span></td><td><input class="product_name" type="text"  name="product_name[]" required></td><td><input class="quantity" type="text" min="1" name="product_quantity[]" onkeyup="updateTotal(event)" onkeypress="updateTotal(event)" value="" required></td><td><input class="unit_price" type="text" min="1"  name="unit_price[]" onkeyup="updateTotal(event)"  onkeypress="updateTotal(event)" value="" required></td><td><input type="text" class="total" name="total[]" min="1"> </td><td><span class="remove_product" style="cursor:pointer; background: red; color:white" onclick="remove_product(event)">REMOVE</span></td></tr>');
    }

    $("#order_submit").on("submit", function(event) {
        event.preventDefault();

        var product_submit = $("#order_submit").serialize();
        console.log(product_submit);

        var con = confirm("Are You Sure?");
        if (con == true) {						
        $(".loading-img").css("display", "block");
            $.ajax({
                url: "submit_order",
                method: "POST",
                data: product_submit,
                success: function (invoiceNo) {
        			$(".loading-img").css("display", "none");
                    // window.open("/print_invoice.php?id=" + invoiceNo);	
                    location.reload();
                }
            })
        }

    });

    
</script>

<!-- start: FOOTER -->
<div class="row">
    <div class="col-sm-12">
        <div class="footer">
            <p class="copyright-text">Copyright &copy; 2020 All Rights Reserved by
                <a href="#">VIT Solution</a>.
            </p>
        </div>
    </div>
</div>

</div>
</body>

</html>