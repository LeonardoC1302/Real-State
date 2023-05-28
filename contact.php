<?php
    include 'includes/templates/header.php';
?>

    <main class="container section">
        <h1>Contact</h1>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada3.jpg" alt="Contact Image">
        </picture>

        <h2>Fill The Contact Form</h2>

        <form class="form">
            <fieldset>
                <legend>Personal Information</legend>
                <label for="name">Name</label>
                <input type="text" placeholder="Your Name" id="name">

                <label for="email">E-Mail</label>
                <input type="email" placeholder="Your E-Mail" id="email">

                <label for="name">Name</label>
                <input type="text" placeholder="Your Name" id="name">

                <label for="phone">Phone Number</label>
                <input type="tel" placeholder="Your Phone Number" id="phone">

                <label for="msg">Message</label>
                <textarea id="msg"></textarea>
            </fieldset>

            <fieldset>
                <legend>Property Information</legend>
                <label for="options">Buy Or Sell: </label>
                <select id="options">
                    <option value="" disabled selected>-- Select --</option>
                    <option value="Buy">Buy</option>
                    <option value="Sell">Sell</option>
                </select>

                <label for="price">Price or Budget</label>
                <input type="number" placeholder="Your Price or Budget" id="price" min="0">
            </fieldset>

            <fieldset>
                <legend>Contact</legend>
                <p>How do you want to be contacted?</p>
                <div class="contact-option">
                    <label for="phone-contact">Phone</label>
                    <input name="contact" type="radio" value="phone" id="phone-contact">

                    <label for="email-contact">E-Mail</label>
                    <input name="contact" type="radio" value="email" id="email-contact">
                </div>

                <p>If you chose phone, select a date and time</p>
                <label for="date">Date: </label>
                <input type="date" id="date">

                <label for="time">Time: </label>
                <input type="time" id="time" min="09:00" max="18:00">
            </fieldset>
            <input type="submit" value="Send" class="green-button">
        </form>
    </main>

    
<?php
    include 'includes/templates/footer.php';
?>