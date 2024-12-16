<a href="/HouseJet_sample/sample/properties">Back to Properties</a>
<h1>Search Properties</h1>
<form method="get" action="/HouseJet_sample/sample/properties/search">
    <label for="bdr">Bedrooms:</label>
    <input type="number" id="bdr" name="bdr" min="1">

    <label for="baths">Bathrooms:</label>
    <input type="number" id="baths" name="baths" step="0.5" min="0.5">

    <label for="address">Address:</label>
    <input type="text" id="address" name="address">

    <label for="minPrice">Min Price:</label>
    <input type="number" id="minPrice" name="minPrice">

    <label for="maxPrice">Max Price:</label>
    <input type="number" id="maxPrice" name="maxPrice">

    <button type="submit">Search</button>
</form>

<table>
    <thead>
        <tr>
            <th>Address</th>
            <th>Bedrooms</th>
            <th>Bathrooms</th>
            <th>SqFt</th>
            <th>Price</th>
            <th>Photo</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($properties as $property): ?>
            <tr>
                <td><?php echo h($property->Address); ?></td>
                <td><?php echo h($property->Bdr); ?></td>
                <td><?php echo h($property->Baths); ?></td>
                <td><?php echo h($property->SqFt); ?></td>
                <td><?php echo h($property->Price); ?></td>
                <td><?= @$this->Html->image($property->Photo) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>