<!-- Add Property Form -->
<h1>Add Property</h1>
<?= $this->Form->create($property, ['type' => 'file']) ?> <!-- Add 'type' => 'file' for file uploads -->
<?= $this->Form->create($property) ?>
<?= $this->Form->control('Address') ?>
<?= $this->Form->control('Bdr') ?>
<?= $this->Form->control('Baths') ?>
<?= $this->Form->control('SqFt') ?>
<?= $this->Form->control('Price') ?>
<?= $this->Form->control('photo_file', ['type' => 'file']) ?>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>