<!-- Link to the search form-->
<a href="/HouseJet_sample/sample/properties/search">Search Properties</a>
<!-- Loop through the properties data and display them -->

<h1>List of Properties</h1>
<table>
    <tr>
        <th>Address</th>
        <th>Bdr</th>
        <th>Baths</th>
        <th>SqFt</th>
        <th>Price</th>
        <th>Photo</th>
    </tr>
    <?php foreach ($properties as $property): ?>
    <tr>
        <td><?= $property->Address ?></td>
        <td><?= $property->Bdr ?></td>
        <td><?= $property->Baths ?></td>
        <td><?= $property->SqFt ?></td>
        <td><?= $property->Price ?></td>
        <td><?= @$this->Html->image($property->Photo) ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<!-- Add button to navigate to property creation page -->
<a href="/HouseJet_sample/sample/properties/add" class="button">Add Property</a>