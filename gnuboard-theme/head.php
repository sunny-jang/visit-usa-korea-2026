<?php
if (!defined('_GNUBOARD_')) exit;
include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
$vusa_nav = vusa_nav();
$vusa_site = rtrim(G5_URL, '/').'/';
?>
<div class="site" id="top">
<header>
  <a class="logo" href="<?php echo $vusa_site ?>">
    <img class="brand-logo" src="<?php echo $vusa_site ?>logo.png" alt="Visit USA Committee Korea">
  </a>
  <nav>
    <?php foreach ($vusa_nav as $n) { ?>
      <a href="<?php echo $n[2] ?>"><?php echo VUSA_EN ? $n[1] : $n[0] ?></a>
    <?php } ?>
  </nav>
  <div class="header-tools">
    <button type="button" onclick="location.href='<?php echo vusa_lang_url(VUSA_EN ? 'ko' : 'en') ?>'">
      <span class="<?php echo VUSA_EN ? '' : 'active' ?>">KO</span><span class="<?php echo VUSA_EN ? 'active' : '' ?>">EN</span>
    </button>
    <button type="button" class="hamburger" id="vusa_burger" aria-label="menu">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18M3 12h18M3 18h18"/></svg>
    </button>
  </div>
</header>
<div class="mobile-nav" id="vusa_mnav" hidden>
  <?php foreach ($vusa_nav as $n) { ?>
    <a href="<?php echo $n[2] ?>"><?php echo VUSA_EN ? $n[1] : $n[0] ?>
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a>
  <?php } ?>
</div>
<main class="detail-page">
