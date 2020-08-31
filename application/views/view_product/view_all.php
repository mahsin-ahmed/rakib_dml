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
                            ALL ORDER
                        </div>
                        <div class="panel-content">
                            <table id="courier_name_list" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Order Number</th>
                                        <th>Customer Name</th>
                                        <th>Contact</th>
                                        <th>District</th>
                                        <th>Oeder Date</th>
                                        <th>Delivery Date</th>
                                        <th>Status</th>
                                        <th>Change Status</th>
                                        <th>View Details</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    foreach ($all_order as $row) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row->id; ?></td>
                                            <td><?php echo $row->order_number; ?></td>
                                            <td><?php echo $row->customer_name; ?></td>
                                            <td><?php echo $row->customer_contact; ?></td>
                                            <td><?php $r = $this->shop_model->get_district_name($row->district_id);
                                                echo $r[0]->name;
                                                ?></td>
                                            <td><?php echo $row->order_date; ?></td>
                                            <td><?php echo $row->delivery_date; ?></td>
                                            <td><?php $st = $row->status;
                                                if ($st == 0) {
                                                    echo "Pending";
                                                } else if ($st == 1) {
                                                    echo "Shipped";
                                                } else if ($st == 2) {
                                                    echo "Delivered";
                                                } else {
                                                    echo "Canceled";
                                                }
                                                ?></td>
                                            <td>
                                                <select id="shop-name" name="status">
                                                    <option value="">--select--</option>
                                                    <option value="">Pending</option>
                                                    <option value="">Shipped</option>
                                                    <option value="">Delivered</option>
                                                    <option value="">Cancel</option>

                                                </select>
                                            </td>
                                            <td>
                                            <a href="<?php echo base_url();?>view-details?order_id=<?php echo $row->order_number; ?>" target="blank"><button type="button">View</button></a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>