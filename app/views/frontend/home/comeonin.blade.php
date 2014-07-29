@extends('frontend.layouts.masterfull')

@section('title')
Come on in - 
@parent
@stop

@section('head-script')
@stop


@section('content')

<div class="container comeon">
  <div class="row">
    <div class="col-xs-12 text-center">
      <div class="comeon-logo">
        <img src="/assets/images/logo_graphic.png" alt="DudeDB">
        <h1>DudeDB</h1>
        <p>ไม่ว่าคุณเกิดยุคไหน ผู้ชายต้องรู้เยอะ ความเชื่อนี้ยิ่งโคตรจริงในยุคนี้ ยุคที่ข้อมูลว่อนเน็ท ชีวิตมีอะไรให้ทำก็เยอะ ดู๊ดดีบีเลยอ่านมาให้ก่อน แล้วสรุปสิ่งที่ควรรู้จริงๆ แล้วรวมรวมมาให้คุณผู้ชายได้เสพย์แล้วเอาเวลาไปทำอย่างอื่น</p>
        <h5>ผู้ชาย..ต้องรู้เยอะ</h5>
        </div>
      <div class="cta">
        <a href="#" class="btn btn-primary btn-lg">เข้ามา เข้ามา</a>
        <p class="remark-button">เราใช้ Facebook เพื่อให้สะดวกและง่ายขึ้น ไม่เคยคิดจะโพสอะไรแน่นอน</p>
        </div>
      </div>
    </div>

  </div>

@stop

@section('footer-script')

<!--
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=351786284971642&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
-->
@stop