<?php
/*
Template Name: 空想鍼灸院 〜トップページ〜
*/
/*↑ワードプレスにこのページは固定ページということを認識させるための記述 Homeはテンプレート名*/
?>

  <?php get_header(); ?>

    <!-- ヘッダーメニュー部分 -->
    <?php get_template_part('header','menu'); ?>

    <!-- メインコンテンツ -->
    <div id="main">
      <!-- トップバナー -->
      <div class="slide-container">
        <img id="top-banar" src="<?php echo get_post_meta($post->ID, 'img-top', true);?>">
      </div>
      <section id="recommend">
        <div class="site-width">
          <div class="section-content-wrapper">
            <section class="panel">
              <div class="panel-content-wrapper title-panel">
                <h2>Recommend</h2>
                <p>空想鍼灸院はこんな症状がみられる方にオススメです。
                このような症状にお悩みの方は一度ご相談ください。</p>
              </div>
            </section>
            <section class="panel">
              <div class="panel-content-wrapper item-panel recommend-panel">
                <div class="panel-bg-color item-panel">
                  <img class="panel-image" src="img/shoulder.png"></img>
                  <h3>肩こり</h3>
                  <div class="sentense-container">
                    <p class="recommend-sentense">「マッサージで体が楽になるのはそのときだけのこと」と
                      思っている方もいるかもしれません。
                      当院のマッサージは深部の凝りや痛みを取り除くもの。
                      今までマッサージに効果を感じなかった人ほど、
                      当院のマッサージにご満足いただけるでしょう。</p>
                  </div>
                  <div class="link-box">
                    <a href="#">詳しくはコチラ</a>
                  </div>
                </div>
              </div>
            </section>
            <section class="panel">
              <div class="panel-content-wrapper item-panel recommend-panel">
                <div class="panel-bg-color item-panel">
                  <img class="panel-image" src="img/neck.png"></img>
                  <h3>首こり</h3>
                  <div class="sentense-container">
                    <p class="recommend-sentense">「マッサージで体が楽になるのはそのときだけのこと」と思っている方もいるかもしれません。
                    当院のマッサージは深部の凝りや痛みを取り除くもの。
                    今までマッサージに効果を感じなかった人ほど、
                    当院のマッサージにご満足いただけるでしょう。</p>
                  </div>
                  <div class="link-box">
                    <a href="#">詳しくはコチラ</a>
                  </div>
                </div>
              </div>
            </section>
            <section class="panel">
              <div class="panel-content-wrapper item-panel recommend-panel">
                <div class="panel-bg-color item-panel">
                  <img class="panel-image" src="img/waist.png"></img>
                  <h3>腰痛</h3>
                  <div class="sentense-container">
                    <p class="recommend-sentense">ここはウィジェットエリアです。
                       wordpress管理画面のウィジェットエリア「オススメ」より、
                       「３セクション用ウィジェット」をお選び頂くことで、
                       簡単にオススメしたいコンテンツを登録することができます。</p>
                  </div>
                  <div class="link-box">
                    <a href="#">詳しくはコチラ</a>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
      </section>
      <section id="merit">
        <div class="site-width">
          <div class="section-content-wrapper">
            <section class="panel">
              <div class="panel-content-wrapper title-panel">
                <h2>Merit</h2>
                <p>当院の強みはこれまでの診断力を基盤にした
                適切な治療です。</p>
              </div>
            </section>
            <section class="panel merit-item">
              <div class="panel-content-wrapper item-panel merit-panel use-awesome">
                <div class="panel-bg-color item-panel merit-panel">
                  <div class="item-title-wrapper merit-item">
                    <h2 class="merit-item-title">診断力</h2>
                  </div>
                    <p>診察に当たって、私どもは、まずは予診、問診である程度、患者様であるあなたに起こっていることの予測を立てます。
                      それからいくつかの動作をとってもらい、それをつぶさに観察し、どの動作で痛みや不具合が出るのかを見極めます。</p>
                </div>
              </div>
            </section>
            <section class="panel merit-item">
              <div class="panel-content-wrapper item-panel  merit-panel use-awesome">
                <div class="panel-bg-color item-panel merit-panel">
                  <div class="item-title-wrapper merit-item">
                    <h2 class="merit-item-title">徹底した患部治療</h2>
                  </div>
                  <p>診断に基づき患部(原因となっているところ)を特定しましたら、その箇所の緊張を一時的に緩和してみます。
                  そうしますと、もちろん一時的にですが、患者様（あなた）の訴えておられる症状がたちどころに緩和します。</p>
                </div>
              </div>
            </section>
            <section class="panel merit-item">
              <div class="panel-content-wrapper item-panel merit-panel use-awesome">
                <div class="panel-bg-color item-panel merit-panel">
                  <div class="item-title-wrapper merit-item">
                    <h2 class="merit-item-title">安心する説明</h2>
                  </div>
                    <p>診察後に伴い患部とその不具合が起こった原因をわかりやすく
                      説明して治療させてもらうことで安心して安心して治療を受けていただけます。</p>
                </div>
              </div>
            </section>
          </div>
        </div>
      </section>
      <section id="voice" class="site-width">
        <div class="section-content-wrapper">
          <section class="panel">
            <div class="panel-content-wrapper  title-panel">
              <div class="item-title-wrapper voice-item">
                <h2>Voice</h2>
              </div>
              <p>ここでは実際に当院に来てくださったお客様の感想を掲載しています。
              実際に当院に来ていただくとどんな風になるのかお分かりになって頂けると
              思います。</p>
            </div>
          </section>
          <section class="panel">
            <div class="panel-content-wrapper item-panel voice-panel use-awesome">
              <div class="panel-bg-color item-panel voice-panel">
                <div class="item-title-wrapper voice-item">
                  <h2 class="voice-item-title">24歳女性</h2>
                </div>
                <div class="sentense-container">
                  <p class="voice-sentense">私は10代の頃より、首、肩、腰のコリに悩み、長年、定期的に鍼灸院やクイックマッサージなどに通っていました。
                    今まで多くの方に診て治療していただいた中で、こだわりを持つようになったことがあります。それは、触れる手・押す指の圧とポイントです。
                    私の場合、広範囲にガチガチにコッた部位のどこを押してもだいたい気持ちよく感じるのですが、それだけではコリがほぐれはしても解けないのです。
                  </p>
                </div>
                <div class="link-box">
                  <a href="#">詳しくはコチラ</a>
                </div>
              </div>
            </div>
          </section>
          <section class="panel">
            <div class="panel-content-wrapper item-panel voice-panel use-awesome">
              <div class="panel-bg-color item-panel voice-panel">
                <div class="item-title-wrapper voice-item">
                  <h2 class="voice-item-title">48歳男性</h2>
                </div>
                <div class="sentense-container">
                  <p class="voice-sentense">もともと肩首の凝りがひどく、いろいろな整体院を試しましたが一時的には楽になってもすぐに元の木阿弥に。
                    辛い揉み返しもあり整体への期待は薄れつつありました。 ところが先生の施術を受けて私の中の整体のイメージが大きく変わりました。
                  </p>
                </div>
                <div class="link-box">
                  <a href="#">詳しくはコチラ</a>
                </div>
              </div>
            </div>
          </section>
          <section class="panel">
            <div class="panel-content-wrapper item-panel voice-panel use-awesome">
              <div class="panel-bg-color item-panel voice-panel">
                <div class="item-title-wrapper voice-item">
                  <h2 class="voice-item-title">32歳女性</h2>
                </div>
                <div class="sentense-container">
                  <p class="voice-sentense">ここにお客様の声本文が入ります。
                    wordpress管理画面にカスタム投稿メニュー「お客様の声」が用意されていますので、
                    そちらから投稿して頂ければ、簡単にページが作成出来ます。</p>
                </div>
                <div class="link-box">
                  <a href="#">詳しくはコチラ</a>
                </div>
              </div>
            </div>
          </section>
        </div>
      </section>
    </div>

    <?php get_footer(); ?>
