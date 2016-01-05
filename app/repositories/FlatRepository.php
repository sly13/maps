<?php
namespace app\repositories;

use app\models\Flat;

class FlatRepository extends ActiveRepository
{
    /**
     * @param $data array
     * @param $mapId integer
     */
    public function create($data, $mapId)
    {
        $flat = new Flat();
        $flat->attributes = $data;
        $flat->mapId = $mapId;

        $this->saveOrFail($flat);
    }
}