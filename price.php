<?php
/*
Template Name: 空想鍼灸院 〜施術内容・料金ページ〜
*/
/*↑ワードプレスにこのページは固定ページということを認識させるための記述 Homeはテンプレート名*/
?>

  <?php get_header(); ?>

    <!-- ヘッダーメニュー部分 -->
    <?php get_template_part('header','menu'); ?>


    <!-- メインコンテンツ -->
    <div id="main">
      <h2 class="page-title"><?php echo get_the_title(); ?></h2>
      <section class="treatment-manner">
        <div class="section-content-wrapper site-width">
          <h3><?php echo get_post_meta($post->ID, 'price-subtitle', true);?></h3>
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
      </section>
      <section class="price">
        <div class="section-content-wrapper site-width">
        <h3>メニュー・料金表</h3>
          <div class="price-table-wrapper">
            <table class="price-table">
              <tr>
                <th>内容</th>
                <th>料金</th>
              </tr>

              <?php for($i=1; $i<=10; $i++){
              if(!empty(get_post_meta($post->ID,'menu-title'.$i,true)) &&  !empty(get_post_meta($post->ID,'menu-price'.$i,true)) ) { ?>
                  <tr>
                    <td class="plan"><?php echo get_post_meta($post->ID, 'menu-title'.$i ,true);?></th>
                    <td><?php echo get_post_meta($post->ID, 'menu-price'.$i ,true);?></th>
                  </tr>
              <?php }} ?>
            </table>
          </div>
        </div>
      </section>
    </div>

    <?php get_footer(); ?>
