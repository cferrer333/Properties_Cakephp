<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Property Entity
 *
 * @property int $Bdr
 * @property int $Baths
 * @property int $SqFt
 * @property string|resource $Photo
 * @property int $Price
 * @property string $Address
 */
class Property extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */

     // Define fields for the Property entity
    protected array $_accessible = [
        'Bdr' => true,
        'Baths' => true,
        'SqFt' => true,
        'Photo' => true,
        'Price' => true,
        'Address' => true,
    ];
}
