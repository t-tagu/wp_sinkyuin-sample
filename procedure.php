<?php
/*
Template Name: 空想鍼灸院 〜施術についてページ〜
*/
/*↑ワードプレスにこのページは固定ページということを認識させるための記述 Homeはテンプレート名*/
?>

  <?php get_header(); ?>

    <!-- ヘッダーメニュー部分 -->
    <?php get_template_part('header','menu'); ?>

    <!-- メインコンテンツ -->
    <div id="main">
      <h2 class="page-title">施術について</h2>
      <section class="treatment-flow-section">
        <div class="section-content-wrapper site-width">
          <h3>施術の流れ</h3>
          <div class="list-box">
            <ul class="procedure-list">
              <li class="procedure-item">
                <div class="step-container">
                  <div class="order">
                    1
                  </div>
                </div>
                <div class="description-container">
                  <h4>お電話にてお問い合わせ・ご予約ください</h4>
                  <div class="text-container">
                    <p>まずはお電話などでお気軽にお問い合わせ・ご予約ください。</p>
                    <p>いきなり来院された場合でも精一杯対応させていただきますが、ご予約の方が優先となりますので、
                      お待ちいただく可能性が非常に高くなります。</p>
                    <p>ですので、初診の場合は特にお電話で予約されることをオススメしております。</p>
                  </div>
                </div>
                <div class="item_connector"></div>
              </li>
              <li class="procedure-item">
                <div class="step-container">
                  <div class="order">
                    2
                  </div>
                </div>
                <div class="description-container">
                  <h4>まずは予診・問診を行います</h4>
                  <div class="text-container">
                    <p>まずは予診・問診を行います。</p>
                    <p>予診・問診を行うことである程度、
                      患者様の身体で起こっていることの予測が立てられます。</p>
                  </div>
                </div>
                <div class="item_connector"></div>
              </li>
              <li class="procedure-item">
                <div class="step-container">
                  <div class="order">
                    3
                  </div>
                </div>
                <div class="description-container">
                  <h4>患部となる箇所の緊張を緩和してみます</h4>
                  <div class="text-container">
                    <p>予診・問診及びその後の動作を確認し、解剖・生理学に基づいて、患部(原因となっているところ)を特定し、
                      その箇所の緊張を一時的に緩和してみます。</p>
                  </div>
                </div>
                <div class="item_connector"></div>
              </li>
              <li class="procedure-item">
                <div class="step-container">
                  <div class="order">
                    4
                  </div>
                </div>
                <div class="description-container">
                  <h4>一時的ですが、症状が一気に緩和します</h4>
                  <div class="text-container">
                    <p>患部と予測される箇所を緩和することで、一時的にですが、
                      患者様の訴えていた症状がたちどころに緩和します。</p>
                    <p>これで患部を特定したことと考えます。</p>
                  </div>
                </div>
                <div class="item_connector"></div>
              </li>
              <li class="procedure-item">
                <div class="step-container">
                  <div class="order">
                    5
                  </div>
                </div>
                <div class="description-container">
                  <h4>ここまでの状況を踏まえて施術を行います</h4>
                  <div class="text-container">
                    <p>原因が特定できましたら、その患部に起こっている現象・・・たとえば緊張しているのなら、
                      緊張を弛緩(ほぐす)させ、炎症しているのなら消炎処置を施していきます。</p>
                    <p>その他、起こっている症状に応じた施術を施していきます。</p>
                  </div>
                </div>
                <div class="item_connector"></div>
              </li>
              <li class="procedure-item">
                <div class="step-container">
                  <div class="order">
                    6
                  </div>
                </div>
                <div class="description-container">
                  <h4>お支払い及び次回のご予約など</h4>
                  <div class="text-container">
                    <p>施術が終わりましたら、精算をお願いいたします。</p>
                    <p>また、その時に次回の予約も可能です。ご遠慮なくお話しください 。</p>
                  </div>
                </div>
                <div class="item_connector" style="display:none"></div>
              </li>
            </ul>
          </div>
        </div>
      </section>
    </div>

    <?php get_footer(); ?>
