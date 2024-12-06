<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Properties Model
 *
 * @method \App\Model\Entity\Property newEmptyEntity()
 * @method \App\Model\Entity\Property newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Property> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Property get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Property findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Property patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Property> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Property|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Property saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Property>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Property>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Property>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Property> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Property>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Property>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Property>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Property> deleteManyOrFail(iterable $entities, array $options = [])
 */
class PropertiesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        // Define the association with the properties table
        $this->setTable('properties'); // Set the table name to associate with

        // Define the association with the property_details table
        $this->hasOne('Bdr', [
            'className' => 'PropertyDetails',
            'foreignKey' => 'property_id',
        ]);

        $this->hasOne('Baths', [
            'className' => 'PropertyDetails',
            'foreignKey' => 'property_id',
        ]); 

        $this->hasOne('SqFt', [
            'className' => 'PropertyDetails',
            'foreignKey' => 'property_id',
        ]);

        $this->hasOne('Address', [
            'className' => 'PropertyDetails',
            'foreignKey' => 'property_id',
        ]);

        $this->hasOne('Price', [
            'className' => 'PropertyDetails',
            'foreignKey' => 'property_id',
        ]);

        $this->hasOne('Photos', [
            'foreignKey' => 'property_id',
        ]);

    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
        ->integer('Bdr')
        ->notEmptyString('Bdr', 'Please enter a valid number of bedrooms')
        ->greaterThanOrEqual('Bdr', 0, 'Number of bedrooms must be a positive integer');

    $validator
        ->integer('Baths')
        ->notEmptyString('Baths', 'Please enter a valid number of bathrooms')
        ->greaterThanOrEqual('Baths', 0, 'Number of bathrooms must be a positive integer');

    $validator
        ->integer('SqFt')
        ->notEmptyString('SqFt', 'Please enter a valid square footage')
        ->greaterThanOrEqual('SqFt', 0, 'Square footage must be a positive integer');

    $validator
        ->notEmptyString('Photo', 'Please upload a property photo');

    // Add validation rules for the photo
    $validator
        -> allowEmptyFile('Photo', 'Please upload a property photo')
        -> add('Photo', [
            'mimeType' => [
                'rule' => ['mimeType', ['image/jpeg', 'image/png', 'image/gif', 'image/webp']],
                'message' => 'Please upload a valid image file',
            ],
            'fileSize' => [
                'rule' => ['fileSize', '<=', '5MB'],
                'message' => 'File size should not exceed 5MB',
            ],

        ]);

    $validator
        ->integer('Price')
        ->notEmptyString('Price', 'Please enter a valid price')
        ->greaterThanOrEqual('Price', 0, 'Price must be a positive integer');

    $validator
        ->scalar('Address')
        ->maxLength('Address', 300, 'Address must not exceed 300 characters')
        ->notEmptyString('Address', 'Please enter a valid address');

    return $validator;
    }
}
