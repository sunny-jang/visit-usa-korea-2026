<?php
if (!defined('_GNUBOARD_')) exit;
$vusa_total = isset($total_count) ? (int)$total_count : count($list);
?>
<section class="detail-hero">
  <div class="detail-hero-image" style="background-image:linear-gradient(90deg,#06172baa,transparent),url('https://images.unsplash.com/photo-1444723121867-7a241cacace9?auto=format&fit=crop&w=1800&q=88')"></div>
  <div class="detail-hero-copy">
    <div class="detail-number">04<span>NEWSROOM</span></div>
    <!-- 히어로 문구는 확정 원고를 받기 전까지 게시판 이름을 그대로 쓴다. -->
    <h1><?php echo get_text($board['bo_subject']) ?></h1>
  </div>
</section>

<div class="board-wrap">
  <div class="board-head">
    <h2><?php echo get_text($board['bo_subject']) ?></h2>
    <span class="board-count"><?php echo vusa_t('총', 'Total') ?> <?php echo number_format($vusa_total) ?><?php echo vusa_t('건', '') ?></span>
  </div>

  <?php if ($list) { ?>
  <ul class="vusa-list">
    <?php for ($i=0; $i<count($list); $i++) { ?>
    <li>
      <a href="<?php echo $list[$i]['href'] ?>">
        <span class="num"><?php echo $list[$i]['is_notice'] ? vusa_t('공지','NOTICE') : $list[$i]['num'] ?></span>
        <span class="subj"><?php echo $list[$i]['subject'] ?>
          <?php echo $list[$i]['icon_new'] ?><?php echo $list[$i]['icon_file'] ?></span>
        <span class="meta"><?php echo $list[$i]['datetime2'] ?></span>
      </a>
    </li>
    <?php } ?>
  </ul>
  <?php } else { ?>
  <p class="vusa-empty"><?php echo vusa_t('등록된 게시물이 없습니다.', 'No posts yet.') ?></p>
  <?php } ?>

  <?php if ($write_href) { ?>
  <div class="vusa-actions">
    <a class="vusa-btn primary" href="<?php echo $write_href ?>"><?php echo vusa_t('글쓰기','Write') ?></a>
  </div>
  <?php } ?>

  <div class="vusa-paging"><?php echo $write_pages ?></div>

  <form name="fsearch" method="get" class="vusa-search">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <select name="sfl">
      <?php echo get_board_sfl_select_options($sfl); ?>
    </select>
    <input type="text" name="stx" value="<?php echo $stx ?>" required
           placeholder="<?php echo vusa_t('검색어','Search') ?>">
    <button type="submit"><?php echo vusa_t('검색','Search') ?></button>
  </form>
</div>
