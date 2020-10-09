#! /bin/bash

cd web/match

# 手動でアップしたり変更したファイルをなかったことに
# GitHubとのズレを許容しない
git reset --hard

git pull

# どのコミットまで適用されたかを表示
echo "----------------------------------------"
git log -1
echo "----------------------------------------"

# デプロイスクリプトの実行権限を付与
chmod 755 ./deploy-lolipop.sh

./deploy-lolipop.sh
