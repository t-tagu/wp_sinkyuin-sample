<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="<?php bloginfo('charset'); ?>"> <!-- ワードプレス管理画面から文字コードを設定する-->
    <title><?php wp_title(); ?></title> <!-- 管理画面からワードプレスのサイトタイトルを設定-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/reset.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri();?>" type="text/css">
    <?php if(is_page_template('home.php')): ?>
      <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/home.css" type="text/css" />
    <?php elseif(is_page_template('greet.php')): ?>
      <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/greet.css" type="text/css" />
    <?php elseif(is_page_template('procedure.php')): ?>
      <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/procedure.css" type="text/css" />
    <?php elseif(is_page_template('price.php')): ?>
      <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/price.css" type="text/css" />
    <?php elseif(is_page_template('faq.php')): ?>
      <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/faq.css" type="text/css" />
    <?php elseif(is_page_template('access.php')): ?>
      <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/access.css" type="text/css" />
    <?php elseif(is_page_template('contact.php')): ?>
      <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/contact.css" type="text/css" />
    <?php elseif(is_category() || is_archive()): ?>
      <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/blog.css" type="text/css" />
      <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/sidebar.css" type="text/css" />
      <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/pagenation.css" type="text/css" />
    <?php elseif(is_single()): ?>
      <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/blog_page.css" type="text/css" />
      <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/sidebar.css" type="text/css" />
      <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/pagenation.css" type="text/css" />
    <?php endif; ?>
    <!-- WordPress管理画面などから設定した内容が反映される -->
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>> <!-- bodyタグの中にワードプレスで使うクラス属性をつける-->
