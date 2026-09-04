#!/usr/bin/env bash
# React 정적 사이트 + 그누보드 + 우리 테마를 deploy/ 한 덩어리로 조립합니다.
# 사용법:  ./scripts/build-deploy.sh [base]      예) ./scripts/build-deploy.sh /new/
set -euo pipefail
cd "$(dirname "$0")/.."

BASE="${1:-/}"
OUT="deploy"

[ -d gnuboard ] || { echo "✗ gnuboard/ 가 없습니다. 그누보드를 먼저 내려받으세요."; exit 1; }

echo "▸ React 빌드 (base=$BASE)"
VUSA_BASE="$BASE" pnpm exec vite build --config vite.deploy.config.ts

echo "▸ 조립"
rm -rf "$OUT"
mkdir -p "$OUT"
cp -R gnuboard/. "$OUT"/                       # 그누보드 코어
rm -rf "$OUT"/install                          # 설치 폴더는 서버에 올리지 않음
rm -rf "$OUT"/theme/vusa
mkdir -p "$OUT"/theme/vusa
cp -R gnuboard-theme/. "$OUT"/theme/vusa/      # 우리 테마
cp -R dist-deploy/. "$OUT"/                    # React (index.html, assets/, logos/ ...)

# 그누보드 index.php 보다 우리 index.html 이 먼저 잡히도록
cat > "$OUT"/.htaccess <<'HT'
DirectoryIndex index.html index.php
HT

echo "▸ 완료: $OUT/  ($(find "$OUT" -type f | wc -l | tr -d ' ') 파일)"
echo "  이 폴더 내용을 FTP로 웹루트에 올리세요."
