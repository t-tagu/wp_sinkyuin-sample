<?php

//カスタムヘッダー画像の設置 これを書くと外観にヘッダーという項目が現れてカスタムヘッダーを設定できるようにな
// $custom_header_defaults = array(
//   'default-image' => get_bloginfo('template_url').'/images/headers/logo.png',
//   'header-text' => false,
// );
//カスタムヘッダー機能を有効にする 第一引数はcustom-headerと入れる。第二引数は作成した変数をいれる
//add_theme_support('custom-header',$custom_header_defaults);

//カスタムメニューを使用するための設定
//register_nav_menu('mainmenu', '鍼灸院メニュー'); //メニューの位置の管理から表示するメニューを指定


/*=====================
カスタムフィールド
*=====================*/
/*投稿ページへ表示するカスタムボックスを定義する*/
//第一引数は'admin_menu'、第二引数はカスタムフィールドの設定情報を定義するための関数
add_action('admin_menu', 'add_custom_inputbox'); //add_action関数を使ってこれから作っていく関数を登録する
/*追加した表示項目のデータを更新・保存のためのアクションフック*/
add_action('save_post', 'save_custom_postdata');

function add_custom_inputbox(){ //これから作るカスタムフィールドの設定情報を入力
  //第一引数: 編集画面のhtmlに挿入されるid属性名
  //第二引数: 管理画面に表示されるカスタムフィールド名
  //第三引数: メタボックスの中に出力される関数名
  //第四引数: 管理画面に表示するカスタムフィールドの場所(postなら投稿、pageなら固定ページ)
  //第五引数: 配置される順序
  add_meta_box('top_img_id','トップバナー画像URL入力欄','custom_topbanar','page','normal');
  add_meta_box('map_id','MAP入力欄','custom_map','page','normal');
  add_meta_box('access_shop_name_id','アクセスページ店名入力欄','access_shop_name','page','normal');
  add_meta_box('greet_subtitle_id','挨拶ページサブタイトル','greet_subtitle','page','normal');
}

function custom_topbanar(){
  global $post;
  echo 'トップバナー画像URL: <input type="text" name="img-top" value="'.get_post_meta($post->ID,'img-top',true).'">';
}

function custom_map(){
  global $post;
  echo 'MAP入力: <textarea name="map" rows="5" cols="50">'.get_post_meta($post->ID,'map',true).'</textarea><br>';
}

function access_shop_name(){
  global $post;
  echo '店名入力: <input type="text" name="access-shop-name" value="'.get_post_meta($post->ID,'access-shop-name',true).'">';
}

function greet_subtitle(){
  global $post;
  echo '挨拶ページサブタイトル: <input type="text" name="greet-subtitle" value="'.get_post_meta($post->ID,'greet_subtitle',true).'">';
}

//カスタムフィールドから入力された情報をDBへ保存する関数 引数は固定ページのid
function save_custom_postdata($post_id){

    $img_top = '';
    $map_data = '';
    $access_shop_name = '';
    $greet_subtitle = '';

    //トップバナー
    if(isset($_POST['img-top'])){
      $img_top = $_POST['img-top'];
    }
    if($img_top != get_post_meta($post_id, 'img-top', true)){
      update_post_meta($post_id, 'img-top', $img_top);
    }elseif($img_top == ''){
      delete_post_meta($post_id, 'img-top', get_post_meta($post_id, 'img-top', true));
    }

    //マップ
    if(isset($_POST['map'])){
      $map_data  = $_POST['map'];
    }
    if($map_data != get_post_meta($post_id, 'map', true)){
      update_post_meta($post_id, 'map', $map_data);
    }elseif($map_data == ''){
      delete_post_meta($post_id, 'map', get_post_meta($post_id, 'map', true));
    }

    //アクセスページのショップネーム
    if(isset($_POST['access-shop-name'])){
      $access_shop_name = $_POST['access-shop-name'];
    }
    if($access_shop_name != get_post_meta($post_id, 'access-shop-name', true)){
      update_post_meta($post_id, 'access-shop-name', $access_shop_name);
    }elseif($access_shop_name == ''){
      delete_post_meta($post_id, 'access-shop-name', get_post_meta($post_id, 'access-shop-name', true));
    }

    //挨拶ページのサブタイトル
    if(isset($_POST['greet-subtitle'])){
      $greet_subtitle = $_POST['greet-subtitle'];
    }
    if($greet_subtitle != get_post_meta($post_id, 'greet-subtitle', true)){
      update_post_meta($post_id, 'greet-subtitle', $greet_subtitle);
    }elseif($greet_subtitle == ''){
      delete_post_meta($post_id, 'greet-subtitle', get_post_meta($post_id, 'greet-subtitle', true));
    }

  }


?>
