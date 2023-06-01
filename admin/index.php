<?php
    // Import the connection
    require '../includes/config/database.php';
    $db = connect_db();
    // Write the query
    $query = "SELECT * FROM properties";
    // Run the query
    $resultProperties = mysqli_query($db, $query);

    // Show created announcements message
    $result = $_GET['result'] ?? null; // If there is no result, set it to null
    require '../includes/functions.php';
    includeTemplate('header');
?>

    <main class="container section">
        <h1>Real State Administrator</h1>
        <?php if($result == 1): ?>
            <p class='alert success'>Announcement Created Successfully</p>
        <?php elseif($result == 2): ?>
            <p class='alert success'>Announcement Updated Successfully</p>
        <?php endif;
        ?>
        <a href="/admin/properties/create.php" class="button green-button">New Property</a>

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
                <?php while($property = mysqli_fetch_assoc($resultProperties)): ?>
                <tr>
                    <td> <?php echo $property['id']; ?> </td>
                    <td> <?php echo $property['title']; ?> </td>
                    <td><img src="/images/<?php echo $property['image']; ?> " alt="Table Image" class="table-image"></td>
                    <td>$ <?php echo $property['price']; ?> </td>
                    <td>
                        <a href="#" class="red-button-block">Delete</a>
                        <a href="/admin/properties/update.php?id=<?php echo $property['id']; ?>" class="yellow-button-block">Update</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

    </main>

    
<?php
    // Close the connection
    mysqli_close($db);

    includeTemplate('footer');
?>