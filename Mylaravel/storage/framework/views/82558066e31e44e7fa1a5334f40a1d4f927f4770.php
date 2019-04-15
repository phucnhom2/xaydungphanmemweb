<?php echo $__env->make('container', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
<!--================Cart Table Area =================-->
<section class="cart_table_area p_100">

    <div class="container">
        <div class="table-responsive">
            <?php if(Session::has('cart')): ?>
            <?php $__currentLoopData = $product_cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Preview</th>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <img height="120px" width="132px" src="source/image/product/<?php echo e($product['item']['image']); ?>" alt="">
                        </td>
                        <td><?php echo e($product['item']['name']); ?></td>
                        <td><?php echo e($product['item']['unit_price']); ?></td>
                        <td>
                            <?php echo e($product['qty']); ?>

                        </td>
                        <td><?php echo e(number_format($product['qty']*$product['item']['unit_price'])); ?> VND</td>
                        <td ><a href="<?php echo e(route('xoagiohang',$product['item']['id'])); ?>" title="">X</a></td>
                    </tr>
                    <tr>
                        <td>
                            <form class="form-inline">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Coupon code">
                                </div>
                                <button type="submit" class="btn">Apply Coupon</button>
                            </form>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>


                    </tr>
                </tbody>
            </table>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
        <div class="row cart_total_inner">
            <div class="col-lg-7"></div>
            <div class="col-lg-5">
                <div class="cart_total_text">
                    <div class="cart_head">
                        Cart Total
                    </div>
                    <div class="sub_total">
                        <h5>Sub Total <span><?php echo e(number_format(Session('cart')->totalPrice)); ?></span></h5>
                    </div>
                    <div class="total">
                        <h4>Total <span>
                           <?php echo e(number_format(Session('cart')->totalPrice)); ?>

                       </h4>

                   </div>
                   <div class="cart_footer">
                    <a class="pest_btn" href="<?php echo e(route('dathang')); ?>">Proceed to Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>