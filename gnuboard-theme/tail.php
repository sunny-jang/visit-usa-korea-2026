<?php
if (!defined('_GNUBOARD_')) exit;
$vusa_nav = vusa_nav();
$vusa_site = rtrim(G5_URL, '/').'/';
?>
</main>
<footer>
  <a class="logo" href="<?php echo $vusa_site ?>"><img class="brand-logo" src="<?php echo $vusa_site ?>logo.png" alt="Visit USA Committee Korea"></a>
  <span>&copy; 2026 Visit USA Committee Korea. All Rights Reserved.</span>
  <div>
    <?php foreach (array(0,1,4) as $k => $i) { if ($k) echo '<i></i>'; ?>
      <a href="<?php echo $vusa_nav[$i][2] ?>"><?php echo VUSA_EN ? $vusa_nav[$i][1] : $vusa_nav[$i][0] ?></a>
    <?php } ?>
  </div>
</footer>
</div>
<script>
(function(){
  var b=document.getElementById('vusa_burger'), m=document.getElementById('vusa_mnav'), r=document.documentElement;
  if(!b||!m) return;
  b.addEventListener('click',function(){
    var open=m.hidden; m.hidden=!open; r.classList.toggle('nav-open',open);
  });
  addEventListener('resize',function(){ if(innerWidth>900){ m.hidden=true; r.classList.remove('nav-open'); } });
})();
</script>
<?php include_once(G5_THEME_PATH.'/tail.sub.php'); ?>
