<?php

$background = function($has_post_thumbnail){

  if( !is_home() and !is_archive() ):

    if( get_field('header_image') ):

      $url = get_field('header_image');

      $min_height = (is_page('contact'))?'250px':'160px';

      return 'style="background-image: url('.$url.');min-height:'.$min_height.';"';

    else:
      if($has_post_thumbnail ):

        $url = get_the_post_thumbnail_url();

        $min_height = (is_page('contact'))?'250px':'160px';

        return 'style="background-image: url('.$url.');min-height:'.$min_height.';"';

      endif;
    endif;
  endif;

  return;
};

// Bedoeling is dat je op elke pagina een Jumbotron kan plaatsen.
$jumbotron = get_field('jumbotron');

?>

<section class="jumbotron jumbotron-fluid m-0 p-0" <?= $background( has_post_thumbnail() ); ?>>

  <?php if( $jumbotron['title'] or $jumbotron['lead'] or $jumbotron['cta']): ?>

    <div class="container-fluid">

      <div class="row py-5">

        <div class="col-12 py-5">

          <?php if( $jumbotron['title'] ): ?>

            <h1 class="jumbotron-heading display-1 text-white">
              <?= $jumbotron['title']; ?>
            </h1>

          <?php endif; ?>

          <?php if( $jumbotron['lead'] ): ?>

            <div class="lead text-white">
              <?= $jumbotron['lead'];?>
            </div>

          <?php endif; ?>

          <?php if( $jumbotron['cta'] ): ?>

            <div>
              <?php foreach($jumbotron["cta"] as $cta ) :?>

                <?php $color = ($cta['color']) ? "btn-" . $cta['color'] : "btn-primary"; ?>

                <a href="<?= $cta['url']; ?>" class="btn btn-radius <?= $color; ?>"><?= $cta['label'] ?></a>

              <?php endforeach; ?>
            </div>

          <?php endif; ?>

        </div>

      <?php elseif( is_front_page() ): ?>

        <?php get_template_part('templates/sections/parts/jumbotron','form'); ?>

      <?php endif; ?>

    </div>

  </div>

</section>
