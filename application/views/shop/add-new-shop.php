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
                <?php if ($this->session->flashdata('success')) { 
                    echo ($this->session->flashdata('success'));
                 } ?>
                <?php if ($this->session->flashdata('error')) { 
                    echo ($this->session->flashdata('error'));
                    } ?>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Create New Shop
                        </div>
                        <div class="panel-content">
                            <form action="add-shop" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="required" for="shop-name">Shop Name</span></label>
                                    <input type="text" class="form-control" id="shop-name" name="shop-name" required>
                                </div>
                                <div class="form-group">
                                    <label class="required" for="shop-mobile">Shop Mobile</label>
                                    <input type="text" class="form-control" id="shop-mobile" name="shop-mobile" required>
                                </div>
                                <div class="form-group">
                                    <label class="required" for="shop-logo">Shop logo</label>
                                    <input type="file" class="form-control" id="shop-logo" name="shop-logo" required>
                                    <span class="important">!importanat: only jpg,png or gif allowed, max size is 2MB and dimension is 1024*786</span>
                                </div>
                                <button type="submit" class="btn btn-block">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>   
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Shop List
                        </div>
                        <div class="panel-content">
                            <table id="shop_name_list" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Shop Name</th>
                                        <th>Shop Mobile</th>
                                        <th>Shop Logo</th>
                                        <th>Create Date</th>
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
                                        <td><?php echo $row->date; ?></td>
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