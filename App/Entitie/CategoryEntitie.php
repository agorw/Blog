<?php

namespace Agorw\Entitie;

use Core\Entitie\Entitie;

class CategoryEntitie extends Entitie
{

    public function getUrl()
    {
        return 'index.php?p=posts.category&id=' . $this->categories_id;
    }
}
