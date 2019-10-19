  <?php get_header(); ?>

    <!-- ヘッダーメニュー部分 -->
    <?php get_template_part('header','menu'); ?>


    <div id="main">
      <h2 class="page-title">ブログ</h2>
        <div class="section-content-wrapper site-width">
          <section class="blog_list">
            <div class="blog_list-content">
            <!-- 記事のループ-->
            <?php get_template_part('loop'); ?>
            <!--ページング表示のための処理 関数ファイルで指定した関数名をかく-->
            <?php if(function_exists("pagination")) pagination($wp_query->max_num_pages); ?>
            </div>
          </section>
          <?php get_sidebar();?>
        </div>
      </div>

    <?php get_footer() ;?>
