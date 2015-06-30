# pico-headerlvmod
Pico Plugin:各記事において、Markdown記法によって出力されるヘッダのレベルを変更する

Markdown記法により出力される&lt;h1&gt;や&lt;h2&gt;などのヘッダのレベルを変更し、&lt;h4&gt;や&lt;h5&gt;等にします。ページの他のパーツと整合性を取りたいとき用。

## テンプレートに追加する値
なし
 
##  追加するTwig変数
なし

##  コンフィグオプション
 * $config["headerlv"]["level"]:記法上のヘッダレベルに加算する数値。初期値3(&lt;h1&gt;が&lt;h4&gt;になる)
