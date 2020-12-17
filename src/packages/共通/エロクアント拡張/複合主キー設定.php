<?php

declare(strict_types=1);

namespace 共通\エロクアント拡張;

use Illuminate\Database\Eloquent\Builder;

/*
 * エロクアントに複合主キーを条件に更新できるように機能を追加する
 * https://github.com/laravel/framework/issues/5355#issuecomment-161376267
 */
trait 複合主キー設定
{
    /**
     * 更新クエリのキーを設定します。
     */
    protected function setKeysForSaveQuery(Builder $query)
    {
        $keys = $this->getKeyName();
        if (!is_array($keys)) {
            return parent::setKeysForSaveQuery($query);
        }

        foreach ($keys as $keyName) {
            $query->where($keyName, '=', $this->getKeyForSaveQuery($keyName));
        }

        return $query;
    }

    /**
     * クエリの主キー値を取得します。
     */
    protected function getKeyForSaveQuery($keyName = null)
    {
        if (is_null($keyName)) {
            $keyName = $this->getKeyName();
        }

        if (isset($this->original[$keyName])) {
            return $this->original[$keyName];
        }

        return $this->getAttribute($keyName);
    }
}
