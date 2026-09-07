<?php
if (!defined('_GNUBOARD_')) exit;

// 반응형 한 벌로 처리하므로 모바일 전용 레이아웃을 쓰지 않는다.
if(! defined('G5_THEME_DEVICE')) define('G5_THEME_DEVICE', 'pc');
if(! defined('G5_COMMUNITY_USE')) define('G5_COMMUNITY_USE', true);

// 언어. React 사이트에서 ?lang=en 을 달고 넘어오면 유지한다.
$vusa_lang = 'ko';
if (isset($_GET['lang'])) {
    $vusa_lang = ($_GET['lang'] === 'en') ? 'en' : 'ko';
    setcookie('vusa_lang', $vusa_lang, time() + 31536000, '/');
} elseif (!empty($_COOKIE['vusa_lang'])) {
    $vusa_lang = ($_COOKIE['vusa_lang'] === 'en') ? 'en' : 'ko';
}
define('VUSA_EN', $vusa_lang === 'en');
function vusa_t($ko, $en) { return VUSA_EN ? $en : $ko; }

// 현재 주소를 유지한 채 언어만 바꾼 링크
function vusa_lang_url($lang) {
    $q = $_GET;
    $q['lang'] = $lang;
    return '?' . http_build_query($q);
}

// 메뉴 — React 쪽 nav 배열과 같은 순서/문구
function vusa_nav() {
    $site = rtrim(G5_URL, '/') . '/';
    return array(
        array('미국방문위원회 (Visit USA) 소개', 'Visit USA About',    $site.'#/sh_page/page51.php'),
        array('회원사 소개',                     'Our Members',        $site.'#/sh_page/page52.php'),
        array('가입 안내 및 혜택',               'Membership & Benefits', $site.'#/sh_page/page54.php'),
        array('뉴스룸',                          'Newsroom',           G5_BBS_URL.'/board.php?bo_table=news'),
        array('Contact Us',                      'Contact Us',         $site.'#/bbs/board.php?bo_table=table56'),
    );
}

$theme_config = array(
    'set_default_skin'          => true,
    'preview_board_skin'        => 'vusa',
    'preview_mobile_board_skin' => 'vusa',
    'cf_new_skin'               => 'basic',
    'cf_search_skin'            => 'basic',
    'cf_member_skin'            => 'basic',
    'bo_image_width'            => 1000,
);
