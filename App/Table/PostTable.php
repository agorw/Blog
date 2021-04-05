<?php

namespace Agorw\Table;

use Core\Table\Table;

class PostTable extends Table
{
    protected $table = 'articles';

    public function last()
    {
        return $this->query("
                SELECT * FROM articles as a 
                    LEFT JOIN categories on categories.categories_id = a.categories_id 
                    ORDER BY a.date DESC");
    }

    public function lastByCategory($categorie_id)
    {
        return $this->query('SELECT * FROM articles as a 
                    LEFT JOIN categories on  a.categories_id = categories.categories_id
                    where a.categories_id = ?
                    ORDER BY a.date DESC', [$categorie_id]);
    }

    public function find($categorie_id)
    {
        return $this->query('SELECT * FROM articles as a 
                    LEFT JOIN categories on categories.categories_id = a.categories_id 
                    where a.id = ?
                    ORDER BY a.date DESC', [$categorie_id], true);
    }
}
