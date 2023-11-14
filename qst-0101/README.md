# 1-1. URLの抽出(一覧表示)
付属の`eyemovic.txt`からファイルの内容を読み取り、URLを抽出するプログラムを作成してください。

本文の解答には`ans-0101`というディレクトリを作成し、その中でディレクトリやファイルを作成してください。

## 目次
- [1-1. URLの抽出(一覧表示)](#1-1-urlの抽出一覧表示)
  - [目次](#目次)
  - [要件](#要件)
  - [プログラムの実行](#プログラムの実行)
  - [実行と出力の例](#実行と出力の例)

## 要件
- `eyemovic.txt`はUTF-8でエンコードされていて、改行コードはLF(`\n`)です
- 抽出の対象となるURLは以下の2つをすべて満たすものです
  1. `http://`または`https://`から始まっている
  2. 半角のシングルクォーテーション(`'`)または半角のダブルクォーテーション(`"`)で囲まれている
- URLの抽出には正規表現を使用してください
    - [JavaScriptの正規表現](https://developer.mozilla.org/ja/docs/Web/JavaScript/Guide/Regular_expressions)
    - [PHPの正規表現](https://www.php.net/manual/ja/book.pcre.php)
- URLの順番をアルファベットの昇順でソートして標準出力に出力してください
- 抽出したURLは重複を除いて出力してください
- 先頭と末尾にある半角のシングルクォーテーション(`'`)または半角のダブルクォーテーション(`"`)は出力する際には含まないようにしてください
- 実装の際はその言語に付属する標準ライブラリのみを使用してください
- 実装は1ファイルで行ってください
  - Node.jsの場合は`main.js`というファイル名にしてください
  - PHPの場合は`main.php`というファイル名にしてください

## プログラムの実行
プログラムは以下の形式で実行します。

```
${execution} ${filepath}
```

- `${execution}`はファイルを指定してプログラムを呼び出す箇所です
    - Node.jsの場合は`node main.js`となります
    - PHPの場合は`php -f main.php`となります
- `${filepath}`はURLを抽出するファイルのパスです


## 実行と出力の例
Node.jsでの実行例を以下に示します。`$`はシェルのプロンプトを表します。

```
$ node main.js eyemovic.txt
http://www.w3.org/2000/svg
https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js
https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js
(中略)
https://www.googletagmanager.com/ns.html?id=GTM-NSGB2V8
https://www.instagram.com/eyemovic.inc/
```