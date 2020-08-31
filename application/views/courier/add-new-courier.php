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
                            Create New Courier
                        </div>
                        <div class="panel-content">
                            <form action="add-courier" method="POST">
                                <div class="form-group">
                                    <label class="required" for="courier-name">Courier Name</span></label>
                                    <input type="text" class="form-control" id="courier-name" name="courier-name" required>
                                </div>
                                <div class="form-group">
                                    <label class="required" for="courier-charge">Courier Charge</label>
                                    <input type="text" class="form-control" id="courier-charge" name="courier-charge" required>
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
                            Courier List
                        </div>
                        <div class="panel-content">
                            <table id="courier_name_list" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Charge</th>
                                        <th>Cretae Date</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                    foreach($data as $row){?>
                                    <tr>
                                        <td><?php echo $row->id; ?></td>
                                        <td><?php echo $row->c_name; ?></td>
                                        <td><?php echo $row->c_charge; ?></td>
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