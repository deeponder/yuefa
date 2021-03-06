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
  <script type="text/javascript" src="/yuefa/Public/yuefa/js/iscroll.js"></script>
  <script type="text/javascript">
  
</script>
</head>
<body>
  <!-- 顶部下拉多选框   -->
  <header class="am-topbar-fixed-top">
    <div class="am-g"> 
      <div class="am-u-sm-6 am-u-md-6 am-u-lg-6 mult-select">
        <form class="am-form">
          <fieldset>
            <div class="am-form-group">
              <select id="hairstyle-select-1" style="text-align:center;">
                <option value="option1">不限</option>
                <option value="option2">男生</option>
                <option value="option3">女生</option>
              </select>
              <span class="am-form-caret"></span>
            </div>
          </fieldset>
        </form>
      </div>
      <div class="am-u-sm-6 am-u-md-6 am-u-lg-6 mult-select">
        <form class="am-form">
          <fieldset>
            <div class="am-form-group">
              <select id="hairstyle-select-2" style="text-align:center;">
                <option value="option1">所有</option>
              </select>
              <span class="am-form-caret"></span>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </header>
  <!-- 中间瀑布流效果 -->
  <div id="main-content">
    <div id="js-container">
     <?php if(is_array($hlist)): $i = 0; $__LIST__ = $hlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="box">
        <div class="am-thumbnail">
          <a class="hairstyle-img" href="http://127.0.0.1/yuefa/index.php/Home/Yuefa/barber?bid=<?php echo ($vo['belong']); ?>">
            <img src="/yuefa/Public/yuefa/i/hairs/<?php echo ($vo['id']); ?>.jpg" alt=""/>
            <div class="hairstyle-title"><span><?php echo ($vo['title']); ?></span></div>
          </a>
          <div class="hairstyle-img-inf"><!-- class="am-thumbnail-caption" -->
            <div class="barber-inf"><img src="/yuefa/Public/yuefa/i/barbers/<?php echo ($vo['belong']); ?>.jpg" alt=""><span><?php echo ($vo['bname']); ?></span></div>
            <div class="admire-cnt"><img id="<?php echo ($vo['id']); ?>" src="/yuefa/Public/yuefa/i/4.png" alt=""><span><?php echo ($vo['likes']); ?></span></div>
          </div>
        </div>
      </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>         
  </div>
  <div id="load-more"><button class="am-btn am-btn-default">载入更多</button></div>
  
  <!-- 底部导航栏 -->
  <div class="toolbar">
    <a href="#top" data-am-smooth-scroll><img src="/yuefa/Public/yuefa/i/arrow-up.png" alt=""></a>
  </div>
  <footer class="am-topbar-fixed-bottom">
    <nav>
      <ul class="am-nav am-nav-pills am-nav-justify">
        <li><a href="/yuefa/index.php?s=/Home/Yuefa/index" id="find-hairstyle"><img src="/yuefa/Public/yuefa/i/find1.png"></a></li>
        <li ><a href="http://m.wsq.qq.com/264309324" id="show-hairstyle"><img src="/yuefa/Public/yuefa/i/show.png"></a></li>
      </ul>
    </nav>
  </footer>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<!-- <script src="/yuefa/Public/yuefa/js/masonry.pkgd.min.js"></script> -->
<script type="text/javascript" src="/yuefa/Public/yuefa/js/app.js"></script>
<!--[if (gte IE 9)|!(IE)]><!-->
<script src="/yuefa/Public/yuefa/js/jquery.min.js"></script>
<!--<![endif]-->
<!--[if lte IE 8 ]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<![endif]-->

<script type="text/javascript">
  
  $(function() {
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
       // console.log($imgID);
        var url = '/yuefa/index.php?s=/Home/Yuefa/dolike';
        $.getJSON(url,{id:$imgID},function(re){
        });
    });

    // 下拉框筛选功能
    $('#hairstyle-select-1').change(function() {
      var $text = $("#hairstyle-select-1").find("option:selected").text();
      // console.log(typeof $text);
      $("#hairstyle-select-2").empty();
      var option;
      var select1, select2;
      if ($text == "男生") {
        $select1 = "1"; 
        $select2 = "所有";
        var hairstyle = ["所有","男生短发", "男生长发", "日韩风格", "欧美系列"];
        for (var i = 0; i < 5; i++) {
          option = $("<option>").val("option"+i).text(hairstyle[i]);
          $("#hairstyle-select-2").append(option);
        }
      } else if ($text == "女生") {
        $select1 = "0"; 
        $select2 = "所有";
        var hairstyle = ["所有","女生短发", "女生长发", "少女风格", "熟女系列"];
        var option;
        for (var i = 0; i < 4; i++) {
          option = $("<option>").val("option"+i).text(hairstyle[i]);
          $("#hairstyle-select-2").append(option);
        } 
      } else if ($text == "不限"){
  
        $select1 = "2"; 
        $select2 = "所有";
        option = $("<option>").val("option1").text("所有");
        $("#hairstyle-select-2").append(option);
      }
      console.log($select1);
      var url = "/yuefa/index.php?s=/Home/Yuefa/cate";
      $.getJSON(url,{select1:$select1,select2:$select2},function(vo){
        // console.log("temp");
        // if(vo == null){
        //   alert('已加载全部内容');
        //   return ;
        // }
        // console.log(vo);
        if (vo.length > 0)
          $('#js-container').empty();
        for(var i=0;i<vo.length;i++){
          console.log(vo[i]['title']);
          var str = '<div class="box">'
                      +'<div class="am-thumbnail">'
                        +'<a class="hairstyle-img" href="http://127.0.0.1/yuefa/index.php/Home/Yuefa/barber?bid='+vo[i]['belong']+'">'
                          +'<img src="/yuefa/Public/yuefa/i/hairs/'+vo[i]['id']+'.jpg" alt=""/>'
                          +'<div class="hairstyle-title">'+vo[i]['title']+'</div>'
                        +'</a>'
                        +'<div class="hairstyle-img-inf">'
                          +'<div class="barber-inf"><img src="/yuefa/Public/yuefa/i/barbers/'+vo[i]['belong']+'.jpg" alt="">'+'<span>'+vo[i]['bname']+'</span></div>'
                          +'<div class="admire-cnt">'+'<img id="'+vo[i]['id']+'" src="/yuefa/Public/yuefa/i/4.png" alt="">'+'<span>'+vo[i]['likes']+'</span></div>'
                        +'</div>'
                      +'</div>'
          $('#js-container').append(str);
        }
        var $image = $('.admire-cnt>img');
        $image.on('click', function(e) {
           var $target = e.target;
           $($target).attr('src', '/yuefa/Public/yuefa/i/5.png');
           var $text = $($target).siblings('span');
           var $count = (parseInt($text.html()) + 1).toString();
           $text.html($count);
           $($target).unbind('click');
           $imgID = $($target).attr('id');
           // console.log($imgID);
            var url = '/yuefa/index.php?s=/Home/Yuefa/dolike';
            $.getJSON(url,{id:$imgID},function(re){
            });
        });
        // $('#load-more').hide();
        });
    });

    // 监听第二个下拉框
    $('#hairstyle-select-2').change(function(){
      var $select1 = $("#hairstyle-select-1").find("option:selected").text();
      var $select2 = $("#hairstyle-select-2").find("option:selected").text();
      var url = "/yuefa/index.php?s=/Home/Yuefa/cate";
      $.getJSON(url,{select1:$select1,select2:$select2},function(vo){
        // if(vo == null){
        //   alert('已加载全部内容');
        //   return ;
        // }
          
        if (vo.length > 0) {
          $('#js-container').empty();
        }
        for(var i=0;i<vo.length;i++){
        // alert(vo[i]['title']);
        var str = '<div class="box">'
                    +'<div class="am-thumbnail">'
                      +'<a class="hairstyle-img" href="http://127.0.0.1/yuefa/index.php/Home/Yuefa/barber?bid='+vo[i]['belong']+'">'
                        +'<img src="/yuefa/Public/yuefa/i/hairs/'+vo[i]['id']+'.jpg" alt=""/>'
                        +'<div class="hairstyle-title">'+vo[i]['title']+'</div>'
                      +'</a>'
                      +'<div class="hairstyle-img-inf">'
                        +'<div class="barber-inf"><img src="/yuefa/Public/yuefa/i/barbers/'+vo[i]['belong']+'.jpg" alt="">'+'<span>'+vo[i]['bname']+'</span></div>'
                        +'<div class="admire-cnt">'+'<img id="'+vo[i]['id']+'" src="/yuefa/Public/yuefa/i/4.png" alt="">'+'<span>'+vo[i]['likes']+'</span></div>'
                      +'</div>'
                    +'</div>'
                  +'</div>';
        $('#js-container').append(str);
        }
        $('#load-more').hide();
        });
    });

  //ajax 动态加载更多
  var page = 1;
  // var data = new Array();
  $('#load-more').click(function(){
      // alert('dfd');
    var url = '/yuefa/index.php?s=/Home/Yuefa/getmore';
  
    $.getJSON(url,{page:page},function(vo){
      if(vo == null){
        alert('已加载全部内容');
        return ;
      }
      for(var i=0;i<vo.length;i++){
        // alert(vo[i]['title']);
        var str = '<div class="box"> <div class="am-thumbnail"><a class="hairstyle-img" href="http://127.0.0.1/yuefa/index.php/Home/Yuefa/barber?bid='+vo[i]['belong']+'"><img src="/yuefa/Public/yuefa/i/hairs/'+vo[i]['id']+'.jpg" alt=""/><div class="hairstyle-title">'+vo[i]['title']+'</div></a><div class="hairstyle-img-inf"><div class="barber-inf"><img src="/yuefa/Public/yuefa/i/barbers/'+vo[i]['belong']+'.jpg" alt=""><span>'+vo[i]['bname']+'</span></div><div class="admire-cnt"><img id="'+vo[i]['id']+'" src="/yuefa/Public/yuefa/i/4.png" alt=""><span>'+vo[i]['likes']+'</span></div></div></div></div>';
        $('#js-container').append(str);
      }
      var $image = $('.admire-cnt>img');
      $image.on('click', function(e) {
         var $target = e.target;
         $($target).attr('src', '/yuefa/Public/yuefa/i/5.png');
         var $text = $($target).siblings('span');
         var $count = (parseInt($text.html()) + 1).toString();
         $text.html($count);
         $($target).unbind('click');
         $imgID = $($target).attr('id');
         // console.log($imgID);
          var url = '/yuefa/index.php?s=/Home/Yuefa/dolike';
          $.getJSON(url,{id:$imgID},function(re){
          });
      });
      page++;
    }); 
  });
});  
</script>

</body>
</html>