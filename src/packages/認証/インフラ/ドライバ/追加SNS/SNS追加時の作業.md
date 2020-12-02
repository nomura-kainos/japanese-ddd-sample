# SNS追加時の作業

Socialiteに対応していないSNSログイン機能を
追加拡張する際に以下の作業を行う。

##app.phpに追加

src/config/app.php

```php
/*
 * SNSログインプロバイダ
 */
Amazonサービスプロバイダ::class,
```

