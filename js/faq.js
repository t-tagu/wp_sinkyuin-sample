$(function(){

  console.log('jsファイル読み込み');

  if($('.page-sec').length % 2 === 0){
    $('.footer-container').css('border-top', '1px solid rgba(103,107,109,0.15)');
  }

  $('button').on('click',function(){
    var $that = $(this);
    if($that.children('i').hasClass("fa-plus-circle")){
      $that.children('i').removeClass("fa-plus-circle");
      $that.children('i').addClass("fa-minus-circle");
      $that.parent('.qa-title-box').siblings('.qa-content-box').show();
    }else{
      $that.children('i').removeClass("fa-minus-circle");
      $that.children('i').addClass("fa-plus-circle");
      $that.parent('.qa-title-box').siblings('.qa-content-box').hide();
    }
  });

});
