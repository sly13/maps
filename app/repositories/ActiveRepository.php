<?php
namespace app\repositories;

use yii\base\InvalidValueException;
use yii\db\ActiveRecordInterface;

/**
 * Class ActiveRepository
 * @package app\repositories
 */
abstract class ActiveRepository
{
    /**
     * @param ActiveRecordInterface $record
     * @param boolean $runValidation
     * @param array $attributeNames
     */
    protected function saveOrFail(ActiveRecordInterface $record, $runValidation = true, $attributeNames = null)
    {
        if ( ! $record->save($runValidation, $attributeNames)) {
            throw new InvalidValueException('Failed to save record into database.');
        }
    }

    /**
     * @param ActiveRecordInterface $record
     */
    protected function deleteOrFail(ActiveRecordInterface $record)
    {
        if ( ! $record->delete()) {
            throw new InvalidValueException('No records were deleted from database.');
        }
    }
}