<?php
if (!defined('_GNUBOARD_')) exit;
?>
<div class="board-wrap">
  <div class="board-head">
    <h2><?php echo get_text($board['bo_subject']) ?> <?php echo $w == 'u' ? vusa_t('수정','Edit') : vusa_t('글쓰기','New post') ?></h2>
  </div>

  <form name="fwrite" id="fwrite" action="<?php echo $action_url ?>" onsubmit="return fwrite_submit(this);"
        method="post" enctype="multipart/form-data" autocomplete="off" class="vusa-form">
    <input type="hidden" name="uid" value="<?php echo get_uniqid(); ?>">
    <input type="hidden" name="w" value="<?php echo $w ?>">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="wr_id" value="<?php echo $wr_id ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <?php echo $option_hidden ?>

    <?php if ($is_category) { ?>
    <div class="row">
      <label for="ca_name"><?php echo vusa_t('분류','Category') ?></label>
      <select name="ca_name" id="ca_name" required>
        <option value=""><?php echo vusa_t('선택','Select') ?></option>
        <?php echo $category_option ?>
      </select>
    </div>
    <?php } ?>

    <?php if ($is_name) { ?>
    <div class="row">
      <label for="wr_name"><?php echo vusa_t('이름','Name') ?></label>
      <input type="text" name="wr_name" id="wr_name" required value="<?php echo isset($write['wr_name']) ? $write['wr_name'] : '' ?>">
    </div>
    <?php } ?>

    <?php if ($is_password) { ?>
    <div class="row">
      <label for="wr_password"><?php echo vusa_t('비밀번호','Password') ?></label>
      <input type="password" name="wr_password" id="wr_password" <?php echo $password_required ?>>
    </div>
    <?php } ?>

    <div class="row">
      <label for="wr_subject"><?php echo vusa_t('제목','Title') ?></label>
      <input type="text" name="wr_subject" id="wr_subject" required
             value="<?php echo isset($write['wr_subject']) ? $write['wr_subject'] : '' ?>">
    </div>

    <div class="row">
      <label for="wr_content"><?php echo vusa_t('내용','Content') ?></label>
      <div>
        <?php if ($is_dhtml_editor) { echo $editor_html; } else { ?>
        <textarea id="wr_content" name="wr_content" required><?php echo isset($write['wr_content']) ? $write['wr_content'] : '' ?></textarea>
        <?php } ?>
      </div>
    </div>

    <?php for ($i=0; $i<$file_count; $i++) { ?>
    <div class="row">
      <label for="bf_file_<?php echo $i ?>"><?php echo vusa_t('첨부파일','Attachment') ?> <?php echo $i+1 ?></label>
      <div>
        <input type="file" name="bf_file[]" id="bf_file_<?php echo $i ?>">
        <?php if ($w == 'u' && !empty($file[$i]['source'])) { ?>
          <div style="font-size:13px;margin-top:8px;color:#8b8880">
            <?php echo $file[$i]['source'] ?>
            <label><input type="checkbox" name="bf_file_del[<?php echo $i ?>]" value="1"> <?php echo vusa_t('삭제','delete') ?></label>
          </div>
        <?php } ?>
      </div>
    </div>
    <?php } ?>

    <?php if ($is_use_captcha) { ?>
    <div class="row"><label><?php echo vusa_t('자동등록방지','Captcha') ?></label><div><?php echo $captcha_html ?></div></div>
    <?php } ?>

    <div class="vusa-actions">
      <a class="vusa-btn" href="<?php echo get_pretty_url($bo_table) ?>"><?php echo vusa_t('취소','Cancel') ?></a>
      <button type="submit" id="btn_submit" class="vusa-btn primary"><?php echo vusa_t('저장','Save') ?></button>
    </div>
  </form>
</div>

<script>
function fwrite_submit(f) {
  <?php echo $editor_js; // 에디터 내용을 폼필드로 옮기고 입력 여부를 검사 ?>
  if (!f.wr_subject.value.replace(/\s/g,'')) {
    alert('<?php echo vusa_t('제목을 입력하세요.','Please enter a title.') ?>');
    f.wr_subject.focus(); return false;
  }
  document.getElementById('btn_submit').disabled = true;
  return true;
}
</script>
