<?php
    // Check if user is logged in

    use App\Property;
    use App\Seller;

    require '../includes/app.php';
    isAuth();

    // Obtain the properties from the database
    $properties =  Property::all();
    $sellers = Seller::all();

    // Write the query
    $query = "SELECT * FROM properties";
    // Run the query
    $resultProperties = mysqli_query($db, $query);
 
    // Show created announcements message
    $result = $_GET['result'] ?? null; // If there is no result, set it to null

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if($id) {
            $property = Property::find($id);
            $property->delete();
        }
    }

    includeTemplate('header');
?>

    <main class="container section">
        <h1>Real State Administrator</h1>
        <?php if($result == 1): ?>
            <p class='alert success'>Announcement Created Successfully</p>
        <?php elseif($result == 2): ?>
            <p class='alert success'>Announcement Updated Successfully</p>
        <?php elseif($result == 3): ?>
            <p class='alert success'>Announcement Deleted Successfully</p>
        <?php endif;
        ?>
        <a href="/admin/properties/create.php" class="button green-button">New Property</a>

        <h2>Properties</h2>

        <table class="properties">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach( $properties as $property): ?>
                <tr>
                    <td> <?php echo $property->id; ?> </td>
                    <td> <?php echo $property->title; ?> </td>
                    <td><img src="/images/<?php echo $property->image; ?> " alt="Table Image" class="table-image"></td>
                    <td>$ <?php echo $property->price; ?> </td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $property->id ?>">
                            <input type="submit" class="red-button-block" value="Delete">
                        </form>
                        <a href="/admin/properties/update.php?id=<?php echo $property->id; ?>" class="yellow-button-block">Update</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2>Sellers</h2>
        <table class="properties">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach( $sellers as $seller): ?>
                <tr>
                    <td> <?php echo $seller->id; ?> </td>
                    <td> <?php echo $seller->name . " " . $seller->lastName; ?> </td>
                    <td> <?php echo $seller->phone; ?> </td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $property->id ?>">
                            <input type="submit" class="red-button-block" value="Delete">
                        </form>
                        <a href="/admin/sellers/update.php?id=<?php echo $property->id; ?>" class="yellow-button-block">Update</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </main>

    
<?php

    includeTemplate('footer');
?>