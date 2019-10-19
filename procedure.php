<?php
/*
Template Name: 空想鍼灸院 〜施術についてページ〜
*/
/*↑ワードプレスにこのページは固定ページということを認識させるための記述 Homeはテンプレート名*/
?>

  <?php get_header(); ?>

    <!-- ヘッダーメニュー部分 -->
    <?php get_template_part('header','menu'); ?>

    <!-- メインコンテンツ -->
    <div id="main">
      <h2 class="page-title"><?php echo get_the_title(); ?></h2>
      <section class="treatment-flow-section">
        <div class="section-content-wrapper site-width">
          <h3><?php echo get_post_meta($post->ID, 'procedure-subtitle', true);?></h3>
          <div class="list-box">
            <ul class="procedure-list">
              <?php for($i=1; $i<=10; $i++){
              if(!empty(get_post_meta($post->ID,'procedure-title'.$i,true)) && !empty(get_post_meta($post->ID,'procedure-content'.$i,true)) ) { ?>
                <li class="procedure-item">
                  <div class="step-container">
                    <div class="order">
                      <?php echo $i ;?>
                    </div>
                  </div>
                  <div class="description-container">
                    <h4><?php echo get_post_meta($post->ID,'procedure-title'.$i,true);?></h4>
                    <div class="text-container">
                      <?php echo get_post_meta($post->ID,'procedure-content'.$i,true);?>
                    </div>
                  </div>
                  <div class="item_connector"></div>
                </li>
              <?php }} ?>
            </ul>
          </div>
        </div>
      </section>
    </div>

    <?php get_footer(); ?>
