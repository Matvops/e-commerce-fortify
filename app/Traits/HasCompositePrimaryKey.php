<?php

namespace App\Traits;

trait HasCompositePrimaryKey
{
    public function getKeyName()
    {
        return $this->primaryKey;
    }

    public function getKeyForSaveQuery()
    {
        return $this->getCompositeKeyQuery();
    }

    public function setKeysForSaveQuery($query)
    {
        foreach ($this->getPrimaryKey() as $key) {
            $query->where($key, $this->getAttribute($key));
        }

        return $query;
    }

    protected function getCompositeKeyQuery()
    {
        $query = $this->newQueryWithoutScopes();

        foreach ($this->getPrimaryKey() as $key) {
            $query->where($key, $this->getAttribute($key));
        }

        return $query;
    }

    public function getPrimaryKey()
    {
        return is_array($this->primaryKey) ? $this->primaryKey : [$this->primaryKey];
    }
}
