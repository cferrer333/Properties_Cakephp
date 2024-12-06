<?php
use Migrations\AbstractMigration;
use Cake\ORM\TableRegistry;

class AddAssociations extends AbstractMigration
{
    public function change()
    {
        // Add associations for PropertyDetails
        $this->table('property_details')
            ->addColumn('property_id', 'integer', ['null' => false])
            ->addForeignKey('property_id', 'properties', 'id', ['delete'=> 'CASCADE', 'update'=> 'CASCADE'])
            ->update();

        // Add associations for Photos
        $this->table('photos')
            ->addColumn('property_id', 'integer', ['null' => false])
            ->addForeignKey('property_id', 'properties', 'id', ['delete'=> 'CASCADE', 'update'=> 'CASCADE'])
            ->update();
    }
}
