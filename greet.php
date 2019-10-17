<?php
/*
Template Name: 空想鍼灸院 〜初めてのかたへページ〜
*/
?>

  <?php get_header(); ?>

    <!-- ヘッダーメニュー部分 -->
    <?php get_template_part('header','menu'); ?>

    <!-- メインコンテンツ -->
    <div id="main">
      <h2 class="page-title"><?php echo get_the_title(); ?></h2>
      <section class="greet">
        <div class="section-content-wrapper site-width">
          <h3><?php echo get_post_meta($post->ID, 'greet-subtitle', true);?></h3>
          <?php if(have_posts()) : //WordPressループ お決まりパターン
            while(have_posts()) : the_post(); //繰り返し処理 ?>
            <!-- ワードプレスの関数を使って固定ページのidを出力、クラス属性を管理画面から追加できる-->
              <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <!--投稿した固定ページの本文を出力している-->
                <?php the_content(); ?>
              </div>
            <?php endwhile; //繰り返し処理
            else : //ここから記事が見つからなかった場合の処理 特になくても問題ない ?>
              <div class="post">
                <h2>記事はありません</h2>
                <p>お探しの記事は見つかりませんでした。</p>
              </div>
          <?php endif; ?>
        </div>
    </section>

    <?php get_footer(); ?>
