<?php
if (!defined('_GNUBOARD_')) exit;
?>
<div class="board-wrap">
  <div class="vusa-view-head">
    <h2><?php echo cut_str(get_text($view['wr_subject']), 255) ?></h2>
    <div class="meta">
      <?php echo $view['wr_datetime'] ?>
      &nbsp;·&nbsp; <?php echo vusa_t('조회','Views') ?> <?php echo number_format($view['wr_hit']) ?>
    </div>
  </div>

  <?php if ($view['file']['count']) { ?>
  <div class="vusa-files">
    <?php for ($i=0; $i<count($view['file']); $i++) {
      if (!isset($view['file'][$i]['source']) || !$view['file'][$i]['source']) continue; ?>
      <a href="<?php echo $view['file'][$i]['href'] ?>"><?php echo $view['file'][$i]['source'] ?></a>
      <span style="color:#8b8880">(<?php echo $view['file'][$i]['size'] ?>)</span><br>
    <?php } ?>
  </div>
  <?php } ?>

  <div class="vusa-view-body"><?php echo $view['content'] ?></div>

  <div class="vusa-actions">
    <?php if ($prev_href) { ?><a class="vusa-btn" href="<?php echo $prev_href ?>"><?php echo vusa_t('이전글','Previous') ?></a><?php } ?>
    <?php if ($next_href) { ?><a class="vusa-btn" href="<?php echo $next_href ?>"><?php echo vusa_t('다음글','Next') ?></a><?php } ?>
    <?php if ($update_href) { ?><a class="vusa-btn" href="<?php echo $update_href ?>"><?php echo vusa_t('수정','Edit') ?></a><?php } ?>
    <?php if ($delete_href) { ?><a class="vusa-btn" href="<?php echo $delete_href ?>" onclick="return confirm('<?php echo vusa_t('정말 삭제하시겠습니까?','Delete this post?') ?>');"><?php echo vusa_t('삭제','Delete') ?></a><?php } ?>
    <a class="vusa-btn primary" href="<?php echo $list_href ?>"><?php echo vusa_t('목록','List') ?></a>
  </div>
</div>
