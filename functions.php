<?php


//================================
// ログ
//================================
//ログを取るか
ini_set('log_errors','on');
//ログの出力ファイルを指定
ini_set('error_log','php.log');

//カスタムヘッダー画像の設置 これを書くと外観にヘッダーという項目が現れてカスタムヘッダーを設定できるようにな
// $custom_header_defaults = array(
//   'default-image' => get_bloginfo('template_url').'/images/headers/logo.png',
//   'header-text' => false,
// );
//カスタムヘッダー機能を有効にする 第一引数はcustom-headerと入れる。第二引数は作成した変数をいれる
//add_theme_support('custom-header',$custom_header_defaults);

//カスタムメニューを使用するための設定
//register_nav_menu('mainmenu', '鍼灸院メニュー'); //メニューの位置の管理から表示するメニューを指定

//サムネイル設定
function twpp_setup_theme() {
  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size(250,130,false );
}
add_action('after_setup_theme', 'twpp_setup_theme' );

//ページネーション $pagesはブログ記事一覧の全ページ数の引数
function pagination($pages='', $range=2){

  $showitems = ($range*2)+1; //表示するページネーションの数

  global $paged; //現在のページ
  if(empty($paged)) $paged = 1; //デフォルトのページ

  if($pages == ''){
    global $wp_query;
    $pages = $wp_query->max_num_pages; //全ページ数を取得する
    if(!$pages){
      $pages = 1;
    }
  }

  if($pages != 1) { //全ページ数が1じゃない場合はページネーションを表示
    echo "<div class=\"pagenation\">\n"; //"はそのままだと表示できないので、＼を前につけている
    echo "<ul>\n";
    //Prev : 現在のページ値が１より大きい場合は表示
    //if($paged > 1) echo "<li class=\"prev\"><a href='".get_pagenum_link($paged-1)."'>Prev</a></li>\n";
    for($i=1; $i <= $pages; $i++){
      if($pages!=1 &&(!($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showtimes)){
        //三項演算子での条件分岐
        echo ($paged == $i)? "<li class=\"active\">".$i."</li>\n" :
         "<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>\n";
      }
    }
    //Next: 総ページ数より現在のページ値が小さい場合は表示
    //if($paged < $pages) echo "<li class=\"next\"><a href=\"".get_pagenum_link($paged+1)."\">Next</a></li>\n";
    echo "</ul>\n";
    echo "</div>\n";
  }
}

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
  add_meta_box('tel_number_id','電話番号入力欄','tel_number','page','normal');
  add_meta_box('address_id','住所入力欄','address','page','normal');
  add_meta_box('top_description_id','トップページ説明','top_description','page','normal');
  add_meta_box('map_id','MAP入力欄','custom_map','page','normal');
  add_meta_box('access_shop_name_id','アクセスページ店名入力欄','access_shop_name','page','normal');
  add_meta_box('greet_subtitle_id','挨拶ページサブタイトル','greet_subtitle','page','normal');
  add_meta_box('reception_time_id','受付時間入力欄','reception_time','page','normal');
  add_meta_box('price_subtitle_id','料金ページサブタイトル','price_subtitle','page','normal');
  add_meta_box('menu_id','メニュータイトル・料金入力欄','menu_price','page','normal');
  add_meta_box('procedure_subtitle_id','施術の流れサブタイトル','procedure_subtitle','page','normal');
  add_meta_box('procedure_detail_id','施術の流れ','procedure_detail','page','normal');
  add_meta_box('question_id','よくある質問','question','page','normal');
}

function custom_topbanar(){
  global $post;
  echo 'トップバナー画像URL: <input type="text" name="img-top" value="'.get_post_meta($post->ID,'img-top',true).'">';
}

function top_description(){
  global $post;
  echo 'トップページ<br>';
  echo 'レコメンド説明: <textarea name="top-recommend" rows="5" cols="50">'.get_post_meta($post->ID,'top-recommend',true).'</textarea><br>';
  echo 'メリット説明: <textarea name="top-merit" rows="5" cols="50">'.get_post_meta($post->ID,'top-merit',true).'</textarea><br>';
  echo 'お客様の声説明: <textarea name="top-voice" rows="5" cols="50">'.get_post_meta($post->ID,'top-voice',true).'</textarea>';
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
  echo '挨拶ページサブタイトル: <input type="text" name="greet-subtitle" value="'.get_post_meta($post->ID,'greet-subtitle',true).'">';
}

function tel_number(){
  global $post;
  echo '電話番号: <input type="text" name="tel-number" value="'.get_post_meta($post->ID,'tel-number',true).'">';
}

function address(){
  global $post;
  echo '住所: <input type="text" name="address" value="'.get_post_meta($post->ID,'address',true).'">';
}

function reception_time(){
  global $post;
  echo '受付時間: <input type="text" name="reception-time" value="'.get_post_meta($post->ID,'reception-time',true).'">';
}

function price_subtitle(){
  global $post;
  echo '料金ページサブタイトル: <input type="text" name="price-subtitle" value="'.get_post_meta($post->ID,'price-subtitle',true).'">';
}

function menu_price(){ //10個まで追加可能

  global $post;
  echo '<table>';
  for($i=1; $i<=10; $i++){
    echo '<tr>
            <td>メニュータイトル: <input type="text" name="menu-title'.$i.'" value="'.get_post_meta($post->ID,'menu-title'.$i,true).'"></td>
            <td>料金: <input type="text" name="menu-price'.$i.'" value="'.get_post_meta($post->ID,'menu-price'.$i,true).'"></td>
          </tr>';
    }
  echo '</table>';
}

function procedure_subtitle(){
  global $post;
  echo '施術の流れサブタイトル: <input type="text" name="procedure-subtitle" value="'.get_post_meta($post->ID,'procedure-subtitle',true).'">';
}

function procedure_detail(){ //10個まで追加可能
  global $post;
  var_dump(get_post_meta($post->ID,"procedure-title1",true));
  echo '<table>';
  for($i=1; $i<=10; $i++){
    echo '<tr>
            <td>手順タイトル: <input type="text" name="procedure-title'.$i.'" value="'.get_post_meta($post->ID,'procedure-title'.$i,true).'"></td>
            <td>手順の内容:<textarea name="procedure-content'.$i.'" rows="5" cols="50">'.get_post_meta($post->ID,'procedure-content'.$i,true).'</textarea></td>
          </tr>';
    }
  echo '</table>';
}

//よくある質問
function question(){
  global $post;
  echo '<table>';
  for($m=1; $m<=5; $m++){
    echo '<tr>
            <td>質問カテゴリー: <input type="text" name="question-category'.$m.'" value="'.get_post_meta($post->ID,'question-category'.$m,true).'"></td>';
            echo '<table>';
            for($n=1; $n<=10; $n++){
              echo '<tr>
                      <td>質問タイトル: <input type="text" name="question-title'.$m.$n.'" value="'.get_post_meta($post->ID,'question-title'.$m.$n,true).'"></td>
                      <td>質問内容: <textarea name="question-detail'.$m.$n.'" rows="5" cols="50">'.get_post_meta($post->ID,'question-detail'.$m.$n,true).'</textarea></td>
                    </tr>';
            }
            echo '</table>';
    echo  '</tr>';
    }
  echo '</table>';
}

//カスタムフィールドから入力された情報をDBへ保存する関数 引数は固定ページのid
function save_custom_postdata($post_id){

    $img_top = ''; //トップバナー
    $top_recommend = ''; //recommend文
    $top_merit = ''; //merit文
    $top_voice = ''; //voice文
    $greet_subtitle = ''; //挨拶ページサブタイトル
    $procedure_subtitle = ''; //手順ページサブタイトル
    $procedure_title = ''; //それぞれの手順のタイトル
    $procedure_content = ''; //それぞれの手順の詳細
    $map_data = '';
    $access_shop_name = '';
    $tel_number = '';
    $address = '';
    $reception_time = '';
    $price_subtitle = '';
    $menu_title = '';
    $menu_price = '';
    $question_category = '';
    $question_title = '';
    $question_detail = '';

    //トップバナー
    if(isset($_POST['img-top'])){
      $img_top = $_POST['img-top'];
    }
    if($img_top != get_post_meta($post_id, 'img-top', true)){
      update_post_meta($post_id, 'img-top', $img_top);
    }elseif($img_top == ''){
      delete_post_meta($post_id, 'img-top', get_post_meta($post_id, 'img-top', true));
    }

    //トップページのレコメンド、メリット、ボイス
    if(isset($_POST['top-recommend'])){
      $top_recommend = $_POST['top-recommend'];
    }
    if($top_recommend != get_post_meta($post_id, 'top-recommend', true)){
      update_post_meta($post_id, 'top-recommend', $top_recommend);
    }elseif($top_recommend == ''){
      delete_post_meta($post_id, 'top-recommend', get_post_meta($post_id, 'top-recommend', true));
    }
    if(isset($_POST['top-merit'])){
      $top_merit = $_POST['top-merit'];
    }
    if($top_merit != get_post_meta($post_id, 'top-merit', true)){
      update_post_meta($post_id, 'top-merit', $top_merit);
    }elseif($top_merit == ''){
      delete_post_meta($post_id, 'top-merit', get_post_meta($post_id, 'top-merit', true));
    }
    if(isset($_POST['top-voice'])){
      $top_voice = $_POST['top-voice'];
    }
    if($top_voice != get_post_meta($post_id, 'top-voice', true)){
      update_post_meta($post_id, 'top-voice', $top_voice);
    }elseif($top_voice == ''){
      delete_post_meta($post_id, 'top-voice', get_post_meta($post_id, 'top-voice', true));
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

    //電話番号
    if(isset($_POST['tel-number'])){
      $tel_number = $_POST['tel-number'];
    }
    if($tel_number != get_post_meta($post_id, 'tel-number', true)){
      update_post_meta($post_id, 'tel-number', $tel_number);
    }elseif($tel_number == ''){
      delete_post_meta($post_id, 'tel-number', get_post_meta($post_id, 'tel-number', true));
    }

    //電話番号
    if(isset($_POST['address'])){
      $address = $_POST['address'];
    }
    if($address != get_post_meta($post_id, 'address', true)){
      update_post_meta($post_id, 'address', $address);
    }elseif($address == ''){
      delete_post_meta($post_id, 'address', get_post_meta($post_id, 'address', true));
    }

    //受付時間
    if(isset($_POST['reception-time'])){
      $reception_time = $_POST['reception-time'];
    }
    if($reception_time != get_post_meta($post_id, 'reception-time', true)){
      update_post_meta($post_id, 'reception-time', $reception_time);
    }elseif($reception_time == ''){
      delete_post_meta($post_id, 'reception-time', get_post_meta($post_id, 'reception-time', true));
    }

    //料金ページのサブタイトル
    if(isset($_POST['price-subtitle'])){
      $price_subtitle = $_POST['price-subtitle'];
    }
    if($price_subtitle != get_post_meta($post_id, 'price-subtitle', true)){
      update_post_meta($post_id, 'price-subtitle', $price_subtitle);
    }elseif($price_subtitle == ''){
      delete_post_meta($post_id, 'price-subtitle', get_post_meta($post_id, 'price-subtitle', true));
    }

    //メニュータイトル、メニュー料金
    for($i=1;$i<=10;$i++){
      if(isset($_POST['menu-title'.$i])){
        $menu_title = $_POST['menu-title'.$i];
      }
      if(isset($_POST['menu-price'.$i])){
        $menu_price = $_POST['menu-price'.$i];
      }
      if($menu_title != get_post_meta($post_id, 'menu-title'.$i, true)){
        update_post_meta($post_id, 'menu-title'.$i, $menu_title);
      }elseif($menu_title == ''){
        delete_post_meta($post_id, 'menu-title'.$i, get_post_meta($post_id, 'menu-title'.$i, true));
      }
      if($menu_price != get_post_meta($post_id, 'menu-price'.$i, true)){
        update_post_meta($post_id, 'menu-price'.$i, $menu_price);
      }elseif($menu_price == ''){
        delete_post_meta($post_id, 'menu-price'.$i, get_post_meta($post_id, 'menu-price'.$i, true));
      }
    }

    //施術の流れページのサブタイトル
    if(isset($_POST['procedure-subtitle'])){
      $procedure_subtitle = $_POST['procedure-subtitle'];
    }
    if($procedure_subtitle != get_post_meta($post_id, 'procedure-subtitle', true)){
      update_post_meta($post_id, 'procedure-subtitle', $procedure_subtitle);
    }elseif($procedure_subtitle == ''){
      delete_post_meta($post_id, 'procedure-subtitle', get_post_meta($post_id, 'procedure-subtitle', true));
    }

    //施術の流れ
    for($i=1;$i<=10;$i++){
      if(isset($_POST['procedure-title'.$i])){
        $procedure_title = $_POST['procedure-title'.$i];
      }
      if(isset($_POST['procedure-content'.$i])){
        $procedure_content = $_POST['procedure-content'.$i];
      }
      if($procedure_title != get_post_meta($post_id, 'procedure-title'.$i, true)){
        update_post_meta($post_id, 'procedure-title'.$i, $procedure_title);
      }elseif($procedure_title == ''){
        delete_post_meta($post_id, 'procedure-title'.$i, get_post_meta($post_id, 'procedure-title'.$i, true));
      }
      if($procedure_content != get_post_meta($post_id, 'procedure-content'.$i, true)){
        update_post_meta($post_id, 'procedure-content'.$i, $procedure_content);
      }elseif($procedure_content == ''){
        delete_post_meta($post_id, 'procedure-content'.$i, get_post_meta($post_id, 'procedure-content'.$i, true));
      }
    }

    //よくある質問タイトル、詳細
    for($m=1;$m<=5;$m++){
      if(isset($_POST['question-category'.$m])){
        $question_category = $_POST['question-category'.$m];
      }
      if($question_category != get_post_meta($post_id, 'question-category'.$m, true)){
        update_post_meta($post_id, 'question-category'.$m, $question_category);
      }elseif($question_category == ''){
        delete_post_meta($post_id, 'question-category'.$m, get_post_meta($post_id, 'question-category'.$m, true));
      }
      for($n=1;$n<=10;$n++){
        if(isset($_POST['question-title'.$m.$n])){
          $question_title = $_POST['question-title'.$m.$n];
        }
        if(isset($_POST['question-detail'.$m.$n])){
          $question_detail = $_POST['question-detail'.$m.$n];
        }
        if($question_title != get_post_meta($post_id, 'question-title'.$m.$n, true)){
          update_post_meta($post_id, 'question-title'.$m.$n, $question_title);
        }elseif($question_title == ''){
          delete_post_meta($post_id, 'question-title'.$m.$n, get_post_meta($post_id, 'question-title'.$m.$n, true));
        }
        if($question_detail != get_post_meta($post_id, 'question-detail'.$m.$n, true)){
          update_post_meta($post_id, 'question-detail'.$m.$n, $question_detail);
        }elseif($question_detail == ''){
          delete_post_meta($post_id, 'question-detail'.$m.$n, get_post_meta($post_id, 'question-detail'.$m.$n, true));
        }
      }
    }

  }

  /*=================================
  カスタムウィジェット
  ===================================*/
  //ウィジェットエリアを作成する関数がどれなのかを登録する
  add_action('widgets_init', 'my_widgets_area');
  //ウィジェット自体の作成するクラスがどれなのかを登録する
  add_action('widgets_init', function(){register_widget('my_widgets_recommend');});
  add_action('widgets_init', function(){register_widget('my_widgets_merit');});
  add_action('widgets_init', function(){register_widget('my_widgets_voice');});

  //ウィジェットエリアを作成する
  function my_widgets_area(){

     register_sidebar(array(
         'name' => 'レコメンドエリア',
         'id' => 'widget_recommend',
         'before_widget'=>'<div>', //管理画面のウィジェットエリアを囲むタグ
         'after_widget'=>'</div>'
     ));

     register_sidebar(array(
         'name' => 'メリットエリア',
         'id' => 'widget_merit',
         'before_widget'=>'<div>', //管理画面のウィジェットエリアを囲むタグ
         'after_widget'=>'</div>'
     ));

     register_sidebar(array(
         'name' => 'ボイスエリア',
         'id' => 'widget_voice',
         'before_widget'=>'<div>', //管理画面のウィジェットエリアを囲むタグ
         'after_widget'=>'</div>'
     ));

     register_sidebar(array(
         'name' => 'right_sidebar',
         'id' => 'my_sidebar', //dynamic_sidebarに渡す引数はnameでもidでもどちらでも大丈夫
         'before_widget'=>'<div class="sidebar-item">', //管理画面のウィジェットエリアを囲むタグ
         'after_widget'=>'</div>',
         'before_title'=>'<h3>',
         'after_title'=>'</h3>'
     ));

  }

  //ウィジェット自体を作成する
  class my_widgets_recommend extends WP_Widget {

    //初期化(管理画面で表示するウィジェットの名前を設定する) コンストラクタの作成
    function my_widgets_recommend(){
      parent::WP_Widget(false, $name = 'レコメンドウィジェット'); //第二引数は管理面に表示するウィジェットの名前を指定
    }

    //ウィジェットの入力項目を作成する処理
    function form($instance){ //メソッド名は必ずformにする 引数はワードプレスから入力された情報が入る
      //esc_attrでサニタイズして変数へ格納 htmlタグを取り除く
      $img = esc_attr($instance['img']);
      $title = esc_attr($instance['title']);
      $body = esc_attr($instance['body']);
    ?>

      <p>
          <label for="<?php echo $this->get_field_id('img'); ?>">
              <?php echo '画像'; ?>
          </label>
          <input class="widefat" id="<?php echo $this->get_field_id('img'); ?>"
          name="<?php echo $this->get_field_name('img');?>" type="text" value="<?php echo $img; ?>"/>
      </p>
      <p>
          <label for="<?php echo $this->get_field_id('title'); ?>">
              <?php echo 'タイトル'; ?>
          </label>
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
          name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo $title; ?>"/>
      </p>
      <p>
          <label for="<?php echo $this->get_field_id('body'); ?>">
              <?php echo '内容:'; ?>
          </label>
          <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('body');?>"
            name="<?php echo $this->get_field_name('body');?>"><?php echo $body; ?></textarea>
      </p>
      <?php
    }

    //ウィジェットに入力された情報を保存する処理
    function update($new_instance, $old_instance){ //引数は新しく入力された情報とDBに保存されている情報が渡ってくる
      $instance = $old_instance;
      $instance['img'] = trim($new_instance['img']);
      $instance['title'] = strip_tags($new_instance['title']); //サニタイズ html、phpのタグを取り除く
      $instance['body'] = trim($new_instance['body']);//サニタイズ 空白を取り除くのみ

      return $instance;
    }

    //管理画面から入力されたウィジェットを画面に表示する処理
    function widget($args, $instance){ //第一引数はウィジェットエリア自体の情報が入る(配列)、第二引数はDBへ保存された情報が渡ってくる
      //配列を変数に展開 ただし今回はこの情報は使っていない
      extract($args);

      //ウィジェットから入力された情婦おを取得
      $img = apply_filters('widget_img',$instance['img']);
      $title = apply_filters('widget_title',$instance['title']); //widget_titleという関数で何か処理をして変数に格納したい場合はこうやって書く
      $body = apply_filters('widget_body',$instance['body']);

      //ウィジェットから入力された情報がある場合、以下のhtmlを生成する(今回はパネルのhtml)
      if($title){
  ?>
        <section class="panel">
          <div class="panel-content-wrapper item-panel recommend-panel">
            <div class="panel-bg-color item-panel">
              <img class="panel-image" src="<?php echo $img; ?>"></img>
              <h3><?php echo $title; ?></h3>
              <div class="sentense-container">
                <p class="recommend-sentense">
                  <?php echo $body; ?>
                </p>
              </div>
              <div class="link-box">
                <a href="#">詳しくはコチラ</a>
              </div>
            </div>
          </div>
        </section>
  <?php
      }
    }
  }

  //メリットウィジェット自体を作成する
  class my_widgets_merit extends WP_Widget {

    //初期化(管理画面で表示するウィジェットの名前を設定する) コンストラクタの作成
    function my_widgets_merit(){
      parent::WP_Widget(false, $name = 'メリットウィジェット'); //第二引数は管理面に表示するウィジェットの名前を指定
    }

    //ウィジェットの入力項目を作成する処理
    function form($instance){ //メソッド名は必ずformにする 引数はワードプレスから入力された情報が入る
      //esc_attrでサニタイズして変数へ格納 htmlタグを取り除く
      $title = esc_attr($instance['title']);
      $body = esc_attr($instance['body']);
    ?>

      <p>
          <label for="<?php echo $this->get_field_id('title'); ?>">
              <?php echo 'タイトル'; ?>
          </label>
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
          name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo $title; ?>"/>
      </p>
      <p>
          <label for="<?php echo $this->get_field_id('body'); ?>">
              <?php echo '内容:'; ?>
          </label>
          <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('body');?>"
            name="<?php echo $this->get_field_name('body');?>"><?php echo $body; ?></textarea>
      </p>
      <?php
    }

    //ウィジェットに入力された情報を保存する処理
    function update($new_instance, $old_instance){ //引数は新しく入力された情報とDBに保存されている情報が渡ってくる
      $instance = $old_instance;
      $instance['title'] = strip_tags($new_instance['title']); //サニタイズ html、phpのタグを取り除く
      $instance['body'] = trim($new_instance['body']);//サニタイズ 空白を取り除くのみ

      return $instance;
    }

    //管理画面から入力されたウィジェットを画面に表示する処理
    function widget($args, $instance){ //第一引数はウィジェットエリア自体の情報が入る(配列)、第二引数はDBへ保存された情報が渡ってくる
      //配列を変数に展開 ただし今回はこの情報は使っていない
      extract($args);

      //ウィジェットから入力された情婦おを取得
      $title = apply_filters('widget_title',$instance['title']); //widget_titleという関数で何か処理をして変数に格納したい場合はこうやって書く
      $body = apply_filters('widget_body',$instance['body']);

      //ウィジェットから入力された情報がある場合、以下のhtmlを生成する(今回はパネルのhtml)
      if($title){
  ?>
        <section class="panel merit-item">
          <div class="panel-content-wrapper item-panel  merit-panel use-awesome">
            <div class="panel-bg-color item-panel merit-panel">
              <div class="item-title-wrapper merit-item">
                <h2 class="merit-item-title"><?php echo $title; ?></h2>
              </div>
              <p>
                <?php echo $body; ?>
              </p>
            </div>
          </div>
        </section>
  <?php
      }
    }
  }

  //ボイスウィジェット自体を作成する
  class my_widgets_voice extends WP_Widget {

    //初期化(管理画面で表示するウィジェットの名前を設定する) コンストラクタの作成
    function my_widgets_voice(){
      parent::WP_Widget(false, $name = 'ボイスウィジェット'); //第二引数は管理面に表示するウィジェットの名前を指定
    }

    //ウィジェットの入力項目を作成する処理
    function form($instance){ //メソッド名は必ずformにする 引数はワードプレスから入力された情報が入る
      //esc_attrでサニタイズして変数へ格納 htmlタグを取り除く
      $title = esc_attr($instance['title']);
      $body = esc_attr($instance['body']);
    ?>

      <p>
          <label for="<?php echo $this->get_field_id('title'); ?>">
              <?php echo 'タイトル'; ?>
          </label>
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
          name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo $title; ?>"/>
      </p>
      <p>
          <label for="<?php echo $this->get_field_id('body'); ?>">
              <?php echo '内容:'; ?>
          </label>
          <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('body');?>"
            name="<?php echo $this->get_field_name('body');?>"><?php echo $body; ?></textarea>
      </p>
      <?php
    }

    //ウィジェットに入力された情報を保存する処理
    function update($new_instance, $old_instance){ //引数は新しく入力された情報とDBに保存されている情報が渡ってくる
      $instance = $old_instance;
      $instance['title'] = strip_tags($new_instance['title']); //サニタイズ html、phpのタグを取り除く
      $instance['body'] = trim($new_instance['body']);//サニタイズ 空白を取り除くのみ

      return $instance;
    }

    //管理画面から入力されたウィジェットを画面に表示する処理
    function widget($args, $instance){ //第一引数はウィジェットエリア自体の情報が入る(配列)、第二引数はDBへ保存された情報が渡ってくる
      //配列を変数に展開 ただし今回はこの情報は使っていない
      extract($args);

      //ウィジェットから入力された情婦おを取得
      $title = apply_filters('widget_title',$instance['title']); //widget_titleという関数で何か処理をして変数に格納したい場合はこうやって書く
      $body = apply_filters('widget_body',$instance['body']);

      //ウィジェットから入力された情報がある場合、以下のhtmlを生成する(今回はパネルのhtml)
      if($title){
  ?>
        <section class="panel">
          <div class="panel-content-wrapper item-panel voice-panel use-awesome">
            <div class="panel-bg-color item-panel voice-panel">
              <div class="item-title-wrapper voice-item">
                <h2 class="voice-item-title"><?php echo $title; ?></h2>
              </div>
              <div class="sentense-container">
                <p class="voice-sentense">
                  <?php echo $body; ?>
                </p>
              </div>
              <div class="link-box">
                <a href="#">詳しくはコチラ</a>
              </div>
            </div>
          </div>
        </section>
  <?php
      }
    }
  }
