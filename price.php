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
      <h2 class="page-title">施術内容・料金</h2>
      <section class="treatment-manner">
        <div class="section-content-wrapper site-width">
          <h3>当院の施術内容</h3>
          <p class="">診察に当たってはまず問診である程度、患者様に起こっていることの予測を立てます。<br>
            それからいくつかの動作をとってもらい、それを観察し、
            どの動作で痛みや不具合が出るのかを見極めます。<br><br>
            それから患部を特定しましたら、その箇所の緊張を一時的に緩和してみます。<br>
            そうしますと、もちろん一時的にですが、患者様の訴えておられる症状がたちどころに緩和します。<br><br>
            あとはその患部に起こっている現象に対して処置を施していきます。<br>
            当院では以上のような流れで治療を施していきます。</p>
        </div>
      </section>
      <section class="price">
        <div class="section-content-wrapper site-width">
        <h3>施術メニュー・料金表</h3>
          <div class="price-table-wrapper">
            <table class="price-table">
              <tr>
                <th>施術内容</th>
                <th>料金</th>
              </tr>
              <tr>
                <td class="plan">初回施術料</td>
                <td>7,000円</td>
              </tr>
              <tr>
                <td class="plan">一般施術料</td>
                <td>5,000円</td>
              </tr>
              <tr>
                <td class="plan">通常施術回数券　6回券(有効期限3ヶ月)</td>
                <td>27,000円</td>
              </tr>
              <tr>
                <td class="plan">10回券(有効期限6ヶ月)</td>
                <td>42,000円</td>
              </tr>
              <tr>
                <td class="plan">12回券(有効期限6ヶ月)</td>
                <td>50,000円</td>
              </tr>
            </table>
          </div>
        </div>
      </section>
    </div>

    <?php get_footer(); ?>
