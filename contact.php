<?php
/*
Template Name: 空想鍼灸院 〜お問い合わせページ〜
*/
?>

  <?php get_header(); ?>

    <!-- ヘッダーメニュー部分 -->
    <?php get_template_part('header','menu'); ?>

    <!-- メインコンテンツ -->
    <div id="main">
      <h2 class="page-title">お問い合わせ</h2>
      <section class="tel">
        <div class="section-content-wrapper site-width">
          <h3>お電話でのお問い合わせ</h3>
          <p class="consultation">ご予約・ご相談お気軽にご連絡ください。</p>
          <div class="tel-box">
            <a href="tel"><i class="fas fa-phone-square-alt tel-icon"></i>0120-012-0120</a>
            <p class="tel-time">受付時間 10:00〜18:00</p>
          </div>
          <p class="hosoku">※ 施術中でお受けすることができない場合もございます。<br>
            その際はお手数ですが、少し時間をおかけ直しをお願いいたします</p>
        </div>
      </section>
      <section class="email-form">
        <div class="section-content-wrapper site-width">
        <h3>お問い合わせフォーム</h3>
          <div class="contact-form-wrapper">
            <form>
              <table>
                <tr>
                  <th>お名前</th>
                  <td><input type="text" name="name" size="40" placeholder="例:田中　太郎"></td>
                </tr>
                <tr>
                  <th>メールアドレス</th>
                  <td><input type="text" name="email" size="40" placeholder="例:taro-tanaka@jmail.com"></td>
                </tr>
                <tr>
                  <th>ご相談内容</th>
                  <td><textarea cols="40" rows="10" placeholder="例:お悩みの症状など" name="comment"></textarea></td>
                </tr>
              </table>
              <input type="submit" name="submit" value="送信">
            </form>
          </div>
        </div>
      </section>
    </div>

    <?php get_footer(); ?>
