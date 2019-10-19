<?php
/*
Template Name: 空想鍼灸院 〜よくある質問ページ〜
*/
?>

  <?php get_header(); ?>

    <!-- ヘッダーメニュー部分 -->
    <?php get_template_part('header','menu'); ?>

    <!-- メインコンテンツ -->
    <div id="main">
      <?php for($m=1; $m<=5; $m++){
      if(!empty(get_post_meta($post->ID,'question-category'.$m,true))) { ?>
        <section class="page-sec">
          <div class="section-content-wrapper site-width">
              <h3><?php echo get_post_meta($post->ID,'question-category'.$m,true);?></h3>
              <div class="all-qa-wrapper">
                <?php for($n=1; $n<=10; $n++){
                if(!empty(get_post_meta($post->ID,'question-title'.$m.$n,true)) && !empty(get_post_meta($post->ID,'question-detail'.$m.$n,true))) { ?>
                <div class="qa-box">
                  <article class="qa-wrapper">
                    <div class="qa-title-box">
                      <button class="toggle-icon"><i class="fas fa-plus-circle"></i></button>
                      <h4><?php echo get_post_meta($post->ID,'question-title'.$m.$n,true);?></h4>
                    </div>
                    <div class="qa-content-box">
                      <p><?php echo get_post_meta($post->ID,'question-detail'.$m.$n,true);?></p>
                    </div>
                  </article>
                </div>
              <?php }} ?>
              </div>
          </div>
        </section>
      <?php }} ?>
    </div>

    <?php get_footer(); ?>
