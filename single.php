<?php get_header(); ?>

  <!-- ヘッダーメニュー部分 -->
  <?php get_template_part('header','menu'); ?>

    <div id="main">

      <h2 class="page-title">
        <?php if(have_posts()):
          the_title(); ?>
        <?php else: ?>
          記事が見つかりませんでした
        <?php endif; ?>
      </h2>
        <div class="section-content-wrapper site-width">
          <?php if(have_posts()) : ?>
            <?php while(have_posts()) : the_post(); ?>
              <section class="page">
                <div class="post-wrap">
                  <article>
                    <header>
                      <div class="time"><i class="far fa-calendar"></i><?php the_time("y.m.j");?></div>
                      <p class="author"><i class="fas fa-user"></i><?php the_author_nickname();?></p>
                    </header>
                    <div class="entry-content">
                      <?php if(has_post_thumbnail()): ?>
                        <?php the_post_thumbnail(array(780,780));?>
                      <?php else: ?>
                        <img src="<?php echo get_template_directory_uri();?>/img/book.png" class="article-img">
                      <?php endif; ?>
                      <p class="text-content">
                        <?php the_content(); ?>
                      </p>
                    </div>
                  </article>
                </div>
              <?php endwhile; ?>
              <div class="pagenation">
                <ul class="single-page-list">
                  <li class="prev single-page-list-item"><?php previous_post_link('%link','&lt;&nbsp;前の投稿');?></li>
                  <li class="next single-page-list-item"><?php next_post_link('%link','次の投稿&nbsp;&gt;');?></li>
                </ul>
              </div>
            </section>
          <?php endif; ?>

        <!-- サイドバー元々の位置 -->
        <?php get_sidebar();?>
      </div>
    </div>

<?php get_footer() ;?>
