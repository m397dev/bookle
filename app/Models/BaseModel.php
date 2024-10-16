<?php
/**
 * @project     bookle
 * @email       m397.dev@gmail.com
 * @date        10/16/2024
 * @time        3:44 AM
 */

namespace App\Models;

use CodeIgniter\Model;
use Override;

/**
 * Class BaseModel.
 *
 * This class override the \CodeIgniter\Model class.
 * Extend this class in any new models:
 *
 * ```
 * class UserModel extends Model
 * {
 *      protected $table = "user";
 * }
 * ```
 */
abstract class BaseModel extends Model
{
    /**
     * Called during initialization.
     */
    #[Override]
    protected function initialize(): void
    {
        $this->getTable();
        $this->getReturnType();
        $this->setCallback([
            'beforeInsert'      => 'beforeInsert',
            'afterInsert'       => 'afterInsert',
            'beforeUpdate'      => 'beforeUpdate',
            'afterUpdate'       => 'afterUpdate',
            'beforeUpdateBatch' => 'beforeUpdateBatch',
            'afterUpdateBatch'  => 'afterUpdateBatch',
            'beforeFind'        => 'beforeFind',
            'afterFind'         => 'afterFind',
            'beforeDelete'      => 'beforeDelete',
            'afterDelete'       => 'afterDelete',
        ]);
    }

    /**
     * Get table.
     */
    private function getTable(): void
    {
        $table       = static::class;
        $table       = explode('\\', $table);
        $table       = end($table);
        $table       = str_replace('Model', '', $table);
        $table       = preg_replace('([A-Z])', ' $0', $table);
        $table       = str_replace(' ', '_', $table);
        $table       = ltrim($table, '_');
        $this->table = strtolower($table);
    }

    /**
     * Get Return type.
     */
    private function getReturnType(): void
    {
        $returnType       = static::class;
        $returnType       = str_replace('Models', 'Entities', $returnType);
        $returnType       = str_replace('Model', '', $returnType);
        $this->returnType = $returnType;
    }

    /**
     * Set default callback functions.
     */
    private function setCallback(array $callback = []): void
    {
        if (! empty($callback)) {
            foreach ($callback as $key => $value) {
                $this->{$key} = method_exists($this, $value) ? [$value] : [];
            }
        }
    }
}
