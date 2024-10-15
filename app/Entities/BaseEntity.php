<?php
/**
 * @project     bookle
 * @email       m397.dev@gmail.com
 * @date        10/16/2024
 * @time        3:39 AM
 */

namespace App\Entities;

use App\Entities\Cast\Base64;
use App\Entities\Cast\Decimal;
use App\Models\BaseModel;
use CodeIgniter\Entity\Entity;
use ReflectionClass;
use ReflectionException;

/**
 * Class BaseEntity.
 *
 * This class override the \CodeIgniter\Entity\Entity class.
 * Extend this class in any new entity:
 *
 * ```
 * class User extends Entity
 * {
 *      protected $dates = ['created_at', 'updated_at'];
 * }
 * ```
 */
class BaseEntity extends Entity
{
    /**
     * @var list<string> Custom convert handlers
     */
    protected $castHandlers = [
        'base64'  => Base64::class,
        'decimal' => Decimal::class,
    ];

    /**
     * This is used in one-to-one relationships.
     *
     * Example:
     *
     * ```
     * class Product extends Entity {
     *     public function getCategory() {
     *         return $this->hasOne(CategoryModel::class, $this->category_id);
     *     }
     * }
     * ```
     *
     * @throws ReflectionException
     */
    protected function hasOne(string $modelName, int $primaryKey): mixed
    {
        /**
         * @var BaseModel $model
         */
        $model = new ReflectionClass($modelName);

        return $model->find($primaryKey);
    }

    /**
     * This is used in one-to-many relationships.
     *
     * Example:
     *
     * ```
     * class Category extends Entity {
     *     public function getProducts() {
     *         return $this->hasMany(ProductModel::class, "category_id");
     *     }
     * }
     * ```
     *
     * @throws ReflectionException
     */
    protected function hasMany(string $modelName, string $foreignKey): mixed
    {
        /**
         * @var BaseModel $model
         */
        $model = new ReflectionClass($modelName);

        return $model->where($foreignKey, $this->attributes['id'])->findAll();
    }
}
