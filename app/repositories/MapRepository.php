<?php
namespace app\repositories;

use app\models\Map;

class MapRepository extends ActiveRepository
{
    /**
     * @param $data array
     * @return Map
     */
    public function create($data)
    {
        $map = new Map();
        $map->setAttributes($data);
        $this->saveOrFail($map);

        return $map;
    }
}