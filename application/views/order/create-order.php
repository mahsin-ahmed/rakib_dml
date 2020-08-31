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
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            CREATE NEW ORDER
                        </div>
                        <div class="loading-img">
                            <img src="<?php echo base_url(); ?>/assets/loading_img/loading.gif" alt="Please wait">
                        </div>
                        <div class="panel-content">
                            <form action="#" method="post" id="order_submit">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="shop-name" class="required">Shop Name:</label>
                                                    <select class="form-control" id="shop-name" name="shop-name" required>
                                                        <option value="">--select--</option>
                                                        <?php
                                                        foreach ($shops as $row) {
                                                        ?>
                                                            <option value="<?php echo $row->id; ?>"><?php echo $row->shop_name; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="customer-name" class="required">Customer Name:</label>
                                                    <input type="text" class="form-control" id="customer-name" name="customer-name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="customer-contact" class="required">Customer contact:</label>
                                                    <input type="text" class="form-control" id="customer-contact" name="customer-contact" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="district" class="required">District:</label>
                                                    <select class="form-control" id="district" name="district" required>
                                                        <option value="">--select--</option>
                                                        <?php
                                                        // $district = $this->shop_model->get_district();
                                                        foreach ($districts as $row) {
                                                        ?>
                                                            <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="courier-name" class="required">Courier Name:</label>
                                                    <select class="form-control" id="courier-name" name="courier_name" required>
                                                        <option value="">--select--</option>
                                                        <?php
                                                        // $courier = $this->courier_model->view_courier();
                                                        foreach ($couriers as $row) {
                                                        ?>
                                                            <option value="<?php echo $row->id; ?>"><?php echo $row->c_name; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="courier-charge" class="required">Charge:</label>
                                                    <input type="text" class="form-control" id="courier_charge" value="" name="courier_charge" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="row invoice_body">
                                            <div class="col-md-12">
                                                <div class="row product_list">
                                                    <div class="col-md-4">
                                                        <span></span>
                                                    </div>
                                                    <div class="col-md-4 order_list_heading">
                                                        <span>ORDER LIST</span>
                                                    </div>
                                                    <div class="col-md-4 order_number">
                                                        Order No.: <span id="order_number"><?php
                                                                                            if ($order_number != null) {
                                                                                                foreach ($order_number as $row) {
                                                                                                    $on = $row->id;
                                                                                                }
                                                                                            } else {
                                                                                                $on = 0;
                                                                                            }
                                                                                            echo sprintf('%05d', $on + 1);
                                                                                            ?></span>
                                                        <input type="hidden" value="<?php echo sprintf('%05d', $on + 1); ?>" name="order_number">
                                                    </div>
                                                </div>
                                                <div class="row product_list">
                                                    <div class="col-md 12 table-responsive">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th id="h_serial">serial</th>
                                                                    <th id="h_product_name">Product Name</th>
                                                                    <th id="h_quantity">Quantity</th>
                                                                    <th id="h_unit_price">Unit Price</th>
                                                                    <th id="h_subtotal">Total</th>
                                                                    <th id="h_action">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="itemList" id="itemList">

                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td colspan="4">Sub Total</td>
                                                                    <td>
                                                                        <input id="subtotal" type="text" name="subtotal" value="0">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="4">Discount (optional)</td>
                                                                    <td>
                                                                        <input id="discount" type="text" name="discount" value="0">
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="4" class="required">Delivary Charge</td>
                                                                    <td>
                                                                        <input id="delivary_charge" type="text" name="delivary_charge" value="0" required>
                                                                    </td>
                                                                </tr>
                                                                <tr class="grand_total">
                                                                    <td colspan="4">Grand Total</td>
                                                                    <td>
                                                                        <input id="grand_total" type="text" name="grand_total" value="0">
                                                                    </td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row footer_invoice">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-5" id="ex_date">Delivery Date:
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class='input-group date' id='datetimepicker1'>
                                                                    <input type='date' class="form-control" name="delivery_date" id="delivery_date" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <span class="btn btn-block" id="add_new_product">Add Product</span>
                                                </div>
                                                <div class="col-md-3">
                                                    <button type="submit" class="btn btn-block">Submit</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>