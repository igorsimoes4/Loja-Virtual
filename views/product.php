<div class="row">
	<div class="col-sm-5">
		<div class="mainphoto">
			<img src="<?php echo BASE_URL; ?>media/products/<?php echo $product_images[0]['url'] ?>" />
		</div>
		<div class="gallery">
			<?php foreach($product_images as $img): ?>
				<div class="photo_item">
					<img src="<?php echo BASE_URL; ?>media/products/<?php echo $img['url'] ?>" />
				</div>
			<?php endforeach; ?>
		</div>
	</div>
	<div class="col-sm-7">
		<h2><?php echo $product_info['name']; ?></h2>
		<small><?php echo $product_info['brand_name']; ?></small></br>
		<?php if($product_info['rating'] != 0): ?>
	
			<?php for($q=0;$q<intval($product_info['rating']);$q++): ?>
				<img src="<?php echo BASE_URL; ?>assets/images/star.png" height="15" border="0" />
			<?php endfor; ?>

		<?php endif; ?>
		<hr/>
		<strike>
			De: <span class="price_from"><?php $this->lang->get('COIN'); ?> <?php echo number_format($product_info['price_from'], 2, ',', '.'); ?></span>
		</strike><br/>
		Por: <span class="coin_original_price"><?php $this->lang->get('COIN'); ?></span> <span class="original_price"> <?php echo number_format($product_info['price'], 2, ',', '.'); ?></span>
		<form class="add_to_cart_form" method="POST" action="<?php echo BASE_URL; ?>cart/add">
			<input type="hidden" name="qt_product" value="1" />
			<input type="hidden" name="id_product" value="<?php echo $product_info['id']; ?>" />
			<input type="hidden" name="price" class="price" value="<?php echo $product_info['price']; ?>" />
			<button data-action="decrease">-</button><input class="add_to_cart_qt" disabled type="text" name="qt" value="1" /><button data-action="increase">+</button>
			<input class="add_to_cart_submit" type="submit" value="<?php $this->lang->get('ADD_TO_CART'); ?>">
		</form>
		<br/>
		<hr/>
		<strong><?php $this->lang->get('PRODUCT_DESCRIPITION'); ?></strong> </br>
		<p>
			<?php echo utf8_encode($product_info['description']); ?>
		</p>
	</div>
</div>
<hr/>
<div class="row">
	<div class="col-sm-6">
		<h3><?php $this->lang->get('PRODUCT_SPECIFICATIONS'); ?></h3>
		<?php foreach($product_options as $po): ?>
           <table class="table table-sm">
           		<tbody>
           			<td style="text-aling:center">
           				<strong><?php echo $po['name']; ?> :</strong>
           			</td>
           			<td style="text-aling:center">
           				<?php echo $po['value']; ?>
           			</td>
           		</tbody>
           </table>	
		<?php endforeach; ?>
	</div>
	<div class="col-sm-6">
		<h3><?php $this->lang->get('PRODUCT_REVIEWS'); ?></h3>
		<hr/>
		<?php foreach($product_rates as $rate): ?>
			<strong><?php echo $rate['user_name']; ?></strong> - 
			<?php for($q=0;$q<intval($rate['points']);$q++): ?> 
				<img src="<?php echo BASE_URL; ?>assets/images/star.png" style="line-height:24px;" height="15" border="0" />
			<?php endfor; ?>
			<br/>
			"<?php echo utf8_encode($rate['comment']); ?>"
			<hr/> 
		<?php endforeach; ?>
	</div>
</div>