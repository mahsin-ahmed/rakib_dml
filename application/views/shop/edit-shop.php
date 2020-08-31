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
                            Shop List
                        </div>
                        <div class="panel-content">
                            <table id="shop_name_view" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Shop Name</th>
                                        <th>Shop Mobile</th>
                                        <th>Shop Logo</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                    foreach($data as $row){?>
                                    <tr>
                                        <td><?php echo $row->id; ?></td>
                                        <td><?php echo $row->shop_name; ?></td>
                                        <td><?php echo $row->shop_mobile; ?></td>
                                        <td>
                                            <img src="<?php echo $row->shop_logo; ?>" alt="logo" class="logo">
                                        </td>
                                        <td><?php echo "Edit" ?></td>
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