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
              <div class="pagenation">
                <ul>
                  <li class="active">1</li>
                  <li><a href="">2</a></li>
                  <li><a href="">3</a></li>
                  <li><a href="">4</a></li>
                  <li><a href="">5</a></li>
                </ul>
              </div>
            </div>
          </section>
          <?php get_sidebar();?>
        </div>
      </div>

    <?php get_footer() ;?>
