<fieldset>
    <legend>General Information</legend>
    <label for="title">Title:</label>
    <input type="text" id="title" name="property[title]" placeholder="Property Title" value="<?php echo s($property->title) ?>">

    <label for="price">Price:</label>
    <input type="number" id="price" name="property[price]" placeholder="Property Price" min=1 value="<?php echo s($property->price) ?>">

    <label for="image">Image:</label>
    <input type="file" id="image" name="property[image]" accept="image/jpeg, image/png">

    <?php if($property->image) : ?>
        <img src="/images/<?php echo $property->image; ?>" class="image-small">
    <?php endif; ?>

    <label for="description">Description:</label>
    <textarea id="description" name="property[description]"><?php echo s($property->description) ?></textarea>
</fieldset>

<fieldset>
    <legend>Property Information</legend>
    <label for="rooms">Rooms:</label>
    <input type="number" id="rooms" name="property[rooms]" placeholder="Eg. 3" min=1 max=9 value="<?php echo s($property->rooms) ?>">

    <label for="wc">Bathrooms:</label>
    <input type="number" id="wc" name="property[wc]" placeholder="Eg. 3" min=1 max=9 value="<?php echo s($property->wc) ?>">

    <label for="parking">Parking:</label>
    <input type="number" id="parking" name="property[parking]" placeholder="Eg. 3" min=1 max=9 value="<?php echo s($property->parking) ?>">
</fieldset>

<fieldset>
    <legend>Seller</legend>
    <!-- <select name="seller_id">
        <option value="" disabled selected>-- Select a Seller --</option>
        <?php //while( $seller = mysqli_fetch_assoc($result) ):?>
            <option <?php //echo $seller_id === $seller['id'] ? 'selected' : ''; ?> value="<?php //echo $seller['id']; ?>"><?php //echo $seller['name'] . " " . $seller['lastName']; ?> </option>
        <?php //endwhile; ?>
    </select> -->
</fieldset>