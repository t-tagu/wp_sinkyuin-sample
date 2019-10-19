<?php if(have_posts()):?>
<?php while(have_posts()):the_post();?>
  <div class="article-wrapper">
    <article class="blog-article">
      <div class="contents-wrapper">
        <div class="img-wrapper">
          <a href="<?php the_permalink(); ?>">
            <div class="img-trim">
              <!--サムネイルを表示-->
              <?php if(has_post_thumbnail()): ?>
                <?php the_post_thumbnail();?>
              <?php else: ?>
                <img src="<?php echo get_template_directory_uri();?>/img/book.png" class="article-img">
              <?php endif; ?>
            </div>
          </a>
        </div>
        <div class="sentense-wrapper">
          <div class="text-wrapper">
            <h3><a href=""><?php the_title(); ?></a></h3>
            <time><?php the_time("Y.m.j");?></time>
            <p class="category">
              <?php the_category('<span></span>');?><!-- <span></span>を入れるとカテゴリーの文字リンクのみを表示してくれる-->
            </p>
            <div class="sentense-box">
              <p class="article-text">
                <?php $content  = get_the_content();
                      echo $text = strip_tags(strip_shortcodes($content));?>
              </p>
            </div>
            <div class="continue-box">
              <a class="continue" href="<?php the_permalink(); ?>">続きを読む</a>
            </div>
          </div>
        </div>
      </div>
    </article>
  </div>
<?php endwhile; //end while have_post ?>
<?php endif; //end have_post ?>
