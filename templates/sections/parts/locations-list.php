<section class="locations">
	<?php if(!is_front_page()): ?>
		<h1>Locaties</h1>
	<?php endif; ?>
	<?php $args = array('post_type' => 'location', 'orderby' => 'title', 'order' => 'ASC', 'meta_key' => 'location_type', 'meta_value'	=> 'location'); ?>
	<?php $current_post_ID = $post->ID;?>
	<?php $query = new wp_query( $args ); ?>
	<?php if($query->have_posts()): ?>

		<?php while( $query->have_posts() ) : ?>

		<?php $query->the_post(); ?>
		<?php $current = ($current_post_ID == $post->ID) ? 'btn-primary':'btn-secondary'; ?>

			<a class="btn  <?= $current ?> text-script mb-2" href="<?= get_post_permalink(); ?>"><i><? the_title(); ?></i></a>

		<?php endwhile; ?>

		<?php wp_reset_postdata(); ?>
		<?php wp_reset_query(); ?>
	<?php endif; ?>
</section>
