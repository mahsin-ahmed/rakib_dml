<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!isset($_SESSION['user_data'])) {
    redirect(base_url());
}
?>

<div class="wrapper">
    <!-- Sidebar Holder -->
    <?php
    $this->load->view('include/menu_sidebar.php');
    ?>

    <!-- Page Content Holder -->
    <div id="content">
        <div class="container">
            <div class="row">
                <?php if ($this->session->flashdata('success')) { ?>
                    <script>
                        alert("insert success !!!!");
                    </script>
                <?php } ?>
                <?php if ($this->session->flashdata('error')) { ?>
                    <script>
                        alert("Something wrong, please try again.");
                    </script>
                <?php } ?>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            VIEW DETAILS OF Order Number: <?php echo $view_details['0']->order_number; ?>
                        </div>
                        <div class="panel-content">
                            <div class="row heading">
                                <span>INVOICE</span>
                            </div>
                            <div class="row invoice">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-3">Customer</div>
                                        <div class="col-md-8">: <?php echo $view_details['0']->customer_name; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">Contact</div>
                                        <div class="col-md-8">: <?php echo $view_details['0']->customer_contact; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">District</div>
                                        <div class="col-md-8">: <?php echo $view_details['0']->district_id; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">Shop Name</div>
                                        <div class="col-md-8">: <?php echo $view_details['0']->shop_id; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">Courier Name</div>
                                        <div class="col-md-8">: <?php echo $view_details['0']->couriar_id; ?></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-5">Order No.</div>
                                        <div class="col-md-7">: <?php echo $view_details['0']->order_number; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">Order Date</div>
                                        <div class="col-md-7">: </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">Delivery Date</div>
                                        <div class="col-md-7">: <?php echo $view_details['0']->delivery_date; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">Status</div>
                                        <div class="col-md-7">: <?php echo $view_details['0']->status; ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row product_details_heading">
                                <div class="col-md-1">Serial</div>
                                <div class="col-md-5">Product Name</div>
                                <div class="col-md-2">Quantity</div>
                                <div class="col-md-2">Unit Price</div>
                                <div class="col-md-1">Total</div>
                            </div>
                            <?php

                            $view_product_summery = $this->View_Order_Model->view_product_summery($view_details['0']->order_number);
                            $sl = 1;
                            foreach ($view_product_summery as $row) {
                            ?>
                                <div class="row all_product">
                                    <div class="col-md-1"><?php echo $sl; ?></div>
                                    <div class="col-md-5"><?php echo $row->product_name; ?></div>
                                    <div class="col-md-2"><?php echo $row->product_quantity; ?></div>
                                    <div class="col-md-2"><?php echo $row->unit_price; ?></div>
                                    <div class="col-md-1"><?php echo $row->total; ?></div>
                                </div>
                            <?php
                                $sl++;
                            }
                            ?>
                            <div class="row summery">
                                <div class="col-md-8"></div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-6">Sub Total</div>
                                        <div class="col-md-6"><?php echo $view_details['0']->subtotal; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">Discount</div>
                                        <div class="col-md-6"><?php echo $view_details['0']->discount; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">Delivery Charge</div>
                                        <div class="col-md-6"><?php echo $view_details['0']->delivary_chrge; ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6" id="grTotal">Grand Total</div>
                                        <div class="col-md-6" id="grTotalAmount"><?php echo $view_details['0']->grand_total; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>