<div class="top-bar">
  <div class="site-width"><span class="info">ご予約・お問い合わせ：TEL　<a chref="tel"><?php echo get_post_meta($post->ID, 'tel-number', true);?></a></div>
</div>

<header>
  <div class="branding">
    <div class="branding-content site-width">
      <!-- echo home_url();でトップページのurlを取得できる -->
      <h1><a href="<?php echo home_url('top');?>">空想鍼灸院<p class="eng-title">Kuso Acupuncture & moxibustion Clinic</p></a></h1>
      <div class="info">
        <span><?php echo get_post_meta($post->ID, 'address', true);?> <a href="tel"><?php echo get_post_meta($post->ID, 'tel-number', true);?></a></span>
      </div>
    </div>
  </div>
  <div class="nav-wrapper">
    <nav class="header-nav site-width">
      <?php wp_nav_menu(array( //wp_nav_menuというワードプレス関数
        'theme_location'=>'mainmenu',
        'container'=>'', //囲うhtmlの設定
        'menu_class'=>'header-nav-menu'));
      ?>
    </nav>
  </div>
</header>
