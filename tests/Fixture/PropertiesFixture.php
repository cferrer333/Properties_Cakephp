<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PropertiesFixture
 */
class PropertiesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'Bdr' => 1,
                'Baths' => 1,
                'SqFt' => 1,
                'Photo' => 'Lorem ipsum dolor sit amet',
                'Price' => 1,
                'Address' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
