<nav id="sidebar">
        <ul class="list-unstyled components">
            
            <li>
                <a href="<?php echo base_url();?>/new-order" aria-expanded="false">CREATE ORDER</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>all-order" aria-expanded="false">Find All</a>
            </li>
            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">View Order</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li><a href="#">Order Pending</a></li>
                    <li><a href="#">Order Shipped</a></li>
                    <li><a href="#">Order Delivered</a></li>
                    <li><a href="#">Order Cancelled</a></li>
                </ul>
            </li>
            <li>
                <a href="#createShopSubmenu" data-toggle="collapse" aria-expanded="false">Shop Management</a>
                <ul class="collapse list-unstyled" id="createShopSubmenu">
                    <li><a href="add-new-shop">Create Shop</a></li>
                    <li><a href="edit-shop">Edit Shop</a></li>
                    <li><a href="view-shop">View Shop</a></li>
                </ul>
            </li>
            <li>
                <a href="#createCourierSubmenu" data-toggle="collapse" aria-expanded="false">Courier Management</a>
                <ul class="collapse list-unstyled" id="createCourierSubmenu">
                    <li><a href="add-new-courier">Create Courier</a></li>
                    <li><a href="edit-courier">Edit Courier</a></li>
                    <li><a href="view-courier">View Courier</a></li>
                </ul>
            </li>

            <li>
                <a href="#printSubmenu" data-toggle="collapse" aria-expanded="false">Printing</a>
                <ul class="collapse list-unstyled" id="printSubmenu">
                    <li><a href="#">Print Order</a></li>
                    <li><a href="#">Print Product List</a></li>
                </ul>
            </li>
        </ul>
    </nav>