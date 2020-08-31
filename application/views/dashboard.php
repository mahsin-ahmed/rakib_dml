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
    </div>
</div>