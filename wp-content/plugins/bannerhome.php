<?php
/*
Plugin Name: Nail Service Floating Ad
Description: Hiển thị quảng cáo dịch vụ làm nail lấp lánh ở góc phải dưới cùng.
Version: 1.0
Author: ChatGPT
*/

if (!defined('ABSPATH')) exit;

add_action('wp_footer', function(){ ?>
<style>
#nail-floating-ad{position:fixed;right:20px;bottom:20px;z-index:99999;width:320px;max-width:90vw;background:linear-gradient(135deg,#ff5fa2,#ff9ad5,#ffd6ec);border-radius:18px;box-shadow:0 12px 35px rgba(0,0,0,.25);padding:16px;color:#fff;font-family:Arial,sans-serif;animation:floatIn .8s ease;overflow:hidden}
#nail-floating-ad:before{content:'';position:absolute;inset:0;background:radial-gradient(circle at 20% 20%,rgba(255,255,255,.45),transparent 30%),radial-gradient(circle at 80% 30%,rgba(255,255,255,.35),transparent 25%),radial-gradient(circle at 50% 80%,rgba(255,255,255,.25),transparent 20%);pointer-events:none}
#nail-floating-ad h3{margin:0 0 8px;font-size:22px;line-height:1.2}
#nail-floating-ad p{margin:0 0 12px;font-size:14px}
#nail-floating-ad a.btn{display:inline-block;background:#fff;color:#ff2c87;text-decoration:none;padding:10px 16px;border-radius:999px;font-weight:700}
#nail-floating-ad .close{position:absolute;top:8px;right:10px;cursor:pointer;font-size:18px;font-weight:bold}
.sparkle{position:absolute;font-size:16px;animation:twinkle 1.8s infinite alternate}
.s1{top:10px;left:12px}.s2{top:40px;right:30px}.s3{bottom:14px;left:22px}
@keyframes twinkle{from{transform:scale(.8);opacity:.6}to{transform:scale(1.3);opacity:1}}
@keyframes floatIn{from{transform:translateY(40px);opacity:0}to{transform:translateY(0);opacity:1}}
@media(max-width:480px){#nail-floating-ad{right:10px;bottom:10px;width:280px}}
</style>
<div id='nail-floating-ad'>
<div class='close' onclick="document.getElementById('nail-floating-ad').style.display='none'">×</div>
<div class='sparkle s1'>✨</div><div class='sparkle s2'>💎</div><div class='sparkle s3'>✨</div>
<h3>Nail Xinh Lấp Lánh ✨</h3>
<p>Sơn gel • Đắp bột • Đính đá • Thiết kế theo yêu cầu</p>
<a class='btn' href='tel:0123456789'>Đặt lịch ngay</a>
</div>
<?php });