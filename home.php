<?php
/*
Template Name: 空想鍼灸院 〜トップページ〜
*/
/*↑ワードプレスにこのページは固定ページということを認識させるための記述 Homeはテンプレート名*/
?>

  <?php get_header(); ?>

    <!-- ヘッダーメニュー部分 -->
    <?php get_template_part('header','menu'); ?>

    <!-- メインコンテンツ -->
    <div id="main">
      <!-- トップバナー -->
      <div class="slide-container">
        <img id="top-banar" src="<?php echo get_post_meta($post->ID, 'img-top', true);?>">
      </div>
      <section id="recommend">
        <div class="site-width">
          <div class="section-content-wrapper">
            <section class="panel">
              <div class="panel-content-wrapper title-panel">
                <h2>Recommend</h2>
                <p><?php echo get_post_meta($post->ID, 'top-recommend', true);?></p>
              </div>
            </section>
            <?php dynamic_sidebar('レコメンドエリア');?>
          </div>
        </div>
      </section>
      <section id="merit">
        <div class="site-width">
          <div class="section-content-wrapper">
            <section class="panel">
              <div class="panel-content-wrapper title-panel">
                <h2>Merit</h2>
                <p><?php echo get_post_meta($post->ID, 'top-merit', true);?></p>
              </div>
            </section>
            <?php dynamic_sidebar('メリットエリア');?>
          </div>
        </div>
      </section>
      <section id="voice" class="site-width">
        <div class="section-content-wrapper">
          <section class="panel">
            <div class="panel-content-wrapper  title-panel">
              <div class="item-title-wrapper voice-item">
                <h2>Voice</h2>
              </div>
              <p><?php echo get_post_meta($post->ID, 'top-voice', true);?></p>
            </div>
          </section>
          <?php dynamic_sidebar('ボイスエリア');?>
        </div>
      </section>
    </div>

    <?php get_footer(); ?>
