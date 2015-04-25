<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="一个约发的微信公众号">
  <meta name="keywords" content="约发">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>约发</title>

  <!-- Set render engine for 360 browser -->
  <meta name="renderer" content="webkit">

  <!-- No Baidu Siteapp-->
  <meta http-equiv="Cache-Control" content="no-siteapp"/>

  <link rel="icon" type="image/jpg" href="/yuefa/Public/yuefa/i/hair.jpg">

  <!-- Add to homescreen for Chrome on Android -->
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="icon" sizes="192x192" href="/yuefa/Public/yuefa/i/app-icon72x72@2x.png">

  <!-- Add to homescreen for Safari on iOS -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="约发"/>
  <link rel="apple-touch-icon-precomposed" href="/yuefa/Public/yuefa/i/app-icon72x72@2x.png">

  <!-- Tile icon for Win8 (144x144 + tile color) -->
  <meta name="msapplication-TileImage" content="/yuefa/Public/yuefa/i/app-icon72x72@2x.png">
  <meta name="msapplication-TileColor" content="#0e90d2">

  <link rel="stylesheet" href="/yuefa/Public/yuefa/css/amazeui.min.css">
  <link rel="stylesheet" href="/yuefa/Public/yuefa/css/app.css">
</head>
<body>
  <header class="shadow">
    <div class="pf-photo">
      <div class="photo-wrap">
        <a class="js-modal-toggle" href="#"><img class="photo" src="/yuefa/Public/yuefa/i/barbers/<?php echo ($barber[0]['headurl']); ?>.jpg" alt=""></a>
        <!-- <button class="am-btn am-btn-danger js-modal-toggle">Toggle Modal</button> -->
        <div class="am-modal am-modal-no-btn" tabindex="-1" id="barber-modal">
          <div class="am-modal-dialog">
            <div class="am-modal-hd">
              <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
            </div>
            <div class="am-modal-bd">
              <img id="picture-box" class=".am-img-responsive" src="i/1.jpg">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="barber-name"><?php echo ($barber[0]['name']); ?></div>
    <div id="barber-skill">高级发型师，擅长剪发，烫发。</div>
  </header>
  
  <section>
    <div class="barbershop-inf">
      <div id="phone-number"><?php echo ($barber[0]['mobile']); ?></div>
      <div id="shop-position"><?php echo ($barber[0]['location']); ?></div>
    </div>
    <div class="price-list">
      <div class="price-header">
        价格表    
      </div>
      <!-- <h5>价格表</h5> -->
      <div class="hairstyle-item">
        <ul>
          <li><span>剪发：15元</span></li>
          <li><span>洗剪吹：35元</span></li>
          <li><span>烫染：80-180元</span></li>
        </ul>    
      </div>  
    </div>
  </section>
  <!-- 中间瀑布流效果 -->
  <div class="barberInf-content">
    <div id="js-container">
    <?php if(is_array($hlist)): $i = 0; $__LIST__ = $hlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="box">
        <div class="am-thumbnail">
          <a class="hairstyle-img js-modal-toggle" href="javascript:void(0);">
            <img src="/yuefa/Public/yuefa/i/hairs/<?php echo ($vo['id']); ?>.jpg" alt=""/>
            <div class="hairstyle-title"><?php echo ($vo['title']); ?></div>
          </a>
          <div class="hairstyle-img-inf"><!-- class="am-thumbnail-caption" -->
            <div class="barber-inf"><img src="/yuefa/Public/yuefa/i/barbers/<?php echo ($vo['belong']); ?>.jpg" alt=""><span><?php echo ($vo['bname']); ?></span></div>
            <div class="admire-cnt"><img src="/yuefa/Public/yuefa/i/4.png" alt=""><span><?php echo ($vo['likes']); ?></span></div>
          </div>
        </div>
      </div><?php endforeach; endif; else: echo "" ;endif; ?>
            
    </div>
    
  <script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
  </div>
  <div id="load-more"><button class="am-btn am-btn-default">载入更多</button></div>
  <!-- 底部导航栏 -->
  <footer class="am-topbar-fixed-bottom">
    <nav>
      <ul class="am-nav am-nav-pills am-nav-justify">
        <li><a href="/yuefa/index.php?s=/Home/Yuefa/index" id="find-hairstyle"><img src="/yuefa/Public/yuefa/i/find1.png"></a></li>
        <li ><a href="http://m.wsq.qq.com/264309324" id="show-hairstyle"><img src="/yuefa/Public/yuefa/i/show.png"></a></li>
      </ul>
    </nav>
  </footer>
  <!-- <div class="amp-toolbar" id="amp-toolbar" style="right: 119.5px; "><a href="#top" title="回到顶部"     class="am-icon-btn am-icon-arrow-up am-active" id="amp-go-top"></a>
  </div> -->
<script type="text/javascript" src="/yuefa/Public/yuefa/js/app.js"></script>
<!--[if (gte IE 9)|!(IE)]><!-->
<script src="/yuefa/Public/yuefa/js/jquery.min.js"></script>
<!--<![endif]-->
<!--[if lte IE 8 ]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<![endif]-->
<script type="text/javascript" src="/yuefa/Public/yuefa/js/amazeui.min.js"></script>
<script type="text/javascript">
  $(function() {

    // 理发师个人中心点击图片，弹出大图
    var $modal = $('#barber-modal');
    $('.js-modal-toggle').on('click', function(e) {
      var $target = $(e.target);
      // console.log($target);
      var $src = $target.attr('src');
      console.log($src);
       var $pbox = $('#picture-box');
      // console.log($picture-box);
      $pbox.attr('src', $src);
      if (($target).hasClass('js-modal-open')) {
        $modal.modal();
      } else if (($target).hasClass('js-modal-close')) {
        $modal.modal('close');
      } else {
        $modal.modal('toggle');
      }
    });

    // 点赞功能
    var $image = $('.admire-cnt>img');
    $image.on('click', function(e) {
       var $target = e.target;
       $($target).attr('src', '/yuefa/Public/yuefa/i/5.png');
       var $text = $($target).siblings('span');
       var $count = (parseInt($text.html()) + 1).toString();
       $text.html($count);
       $($target).unbind('click');
       $imgID = $($target).attr('id');
         var url = '/yuefa/index.php?s=/Home/Yuefa/dolike';
        $.getJSON(url,{id:$imgID},function(re){
        });
    });
  });  
</script>

</body>
</html>