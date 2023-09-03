<fieldset>
    <legend>General Information</legend>

    <label for="name">Name:</label>
    <input type="text" id="name" name="seller[name]" placeholder="Seller Name" value="<?php echo s($seller->name) ?>">

    <label for="lastName">Last name:</label>
    <input type="text" id="lastName" name="seller[lastName]" placeholder="Seller Last Name" value="<?php echo s($seller->lastName) ?>">

</fieldset>

<fieldset>
    <legend>Additional Information</legend>

    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="seller[phone]" placeholder="Seller Phone" value="<?php echo s($seller->phone) ?>">

</fieldset>