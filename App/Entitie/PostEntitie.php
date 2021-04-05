<?php

namespace Agorw\Entitie;

use Core\Entitie\Entitie;

class PostEntitie extends Entitie
{

    public function getUrl()
    {
        return 'index.php?p=posts.show&id=' . $this->id;
    }

    public function getExtrait()
    {
        $html = '<p>' . substr(strip_tags($this->content), 0, 200) . '....</p>';
        return $html;
    }
}
