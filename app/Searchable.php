<?php

namespace App;

use App\Observers\PostObserver;

trait Searchable
{
    public function getSearchIndex()
    {
        // Usa o nome da tabela como inde
        return $this->getTable();
    }

    public function getSearchType()
    {
        // Caso queira customizar o type para indexar
        if (property_exists($this, 'useSearchType')) {
            return $this->useSearchType;
        }

        return $this->getTable();
    }

    public function toSearchArray()
    {
        // aqui da para customizar os dados que serão enviados ao ElasticSearch
        return $this->toArray();
    }
}
