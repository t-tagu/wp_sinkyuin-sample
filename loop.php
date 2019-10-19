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
                <?php the_post_thumbnail('medium');?>
              <?php else: ?>
                <img src="<?php echo get_template_directory_uri();?>/img/photo1.jpeg" class="article-img">
              <?php endif; ?>
            </div>
          </a>
        </div>
        <div class="sentense-wrapper">
          <div class="text-wrapper">
            <h3><a href=""><?php the_title(); ?></a></h3>
            <time><?php the_time("Y.m.j");?></time>
            <p class="category">
              <a href=""><?php single_cat_title('');?></a>
            </p>
            <p class="article-text"><?php the_content();?><a href="<?php the_permalink(); ?>">...続きを読む</a></p>
          </div>
        </div>
      </div>
    </article>
  </div>
<?php endwhile; //end while have_post ?>

<?php endif; //end have_post ?>
