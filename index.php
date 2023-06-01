<?php
    require './includes/functions.php';
    includeTemplate('header', true);
?>

    <main class="container section">
        <h1>More About Us</h1>
        <div class="our-icons">
            <div class="icon">
                <img src="build/img/icono1.svg" alt="Security Icon" loading="lazy">
                <h3>Security</h3>
                <p>Sunt officia ea esse do tempor laboris ea in eu excepteur mollit pariatur. Mollit laborum laboris fugiat incididunt do veniam adipisicing. Nostrud consectetur aliqua non non ex.</p>
            </div> <!-- .icon -->
            <div class="icon">
                <img src="build/img/icono2.svg" alt="Price Icon" loading="lazy">
                <h3>Precio</h3>
                <p>Sunt officia ea esse do tempor laboris ea in eu excepteur mollit pariatur. Mollit laborum laboris fugiat incididunt do veniam adipisicing. Nostrud consectetur aliqua non non ex.</p>
            </div> <!-- .icon -->
            <div class="icon">
                <img src="build/img/icono3.svg" alt="Time Icon" loading="lazy">
                <h3>On Time</h3>
                <p>Sunt officia ea esse do tempor laboris ea in eu excepteur mollit pariatur. Mollit laborum laboris fugiat incididunt do veniam adipisicing. Nostrud consectetur aliqua non non ex.</p>
            </div> <!-- .icon -->
        </div>
    </main>
    
    <section class="section container">
        <h2>Houses and Departments On Sale</h2>
        <?php
            $limit = 3;
            include 'includes/templates/announcements.php';
        ?>
        <div class="align-right">
            <a href="announcements.php" class="green-button">See All Properties</a>
        </div>
    </section>

    <section class="img-contact">
        <h2>Find the house of your dreams</h2>
        <p>Fill the contact form and an advisor will contact you shortly</p>
        <a href="contact.php" class="yellow-button">Contact Us</a>
    </section>

    <div class="container section inferior-section">
        <section class="blog">
            <h3>Our Blog</h3>
            <article class="blog-entry">
                <div class="img">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="Blog Image">
                    </picture>
                </div>
                <div class="entry-text">
                    <a href="entry.php">
                        <h4>Terrace on the roof of your house</h4>
                        <p class="info-meta">Written on: <span>10/20/2022</span> by <span>admin</span></p>
                        <p>Advices for building a terrace on the roof of your house with the best materials and saving money</p>
                    </a>
                </div>
            </article> <!-- .blog-entry -->
            <article class="blog-entry">
                <div class="img">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog2.jpg" alt="Blog Image">
                    </picture>
                </div>
                <div class="entry-text">
                    <a href="entry.php">
                        <h4>Guide for decorating your home</h4>
                        <p class="info-meta">Written on: <span>10/20/2022</span> by <span>admin</span></p>
                        <p>Maximize the space on your home with with guide, learn to combine furniture and colors to bring life to your home</p>
                    </a>
                </div>
            </article> <!-- .blog-entry -->
        </section>
        <section class="testimonials">
            <h3>Testimonials</h3>
            <div class="testimony">
                <blockquote>
                    The staff behave in a very professional manner, very good attention and the house I bought with them is wonderful.
                </blockquote>
                <p>~ Leonardo Céspedes T.</p>
            </div>
        </section>
    </div>

<?php
    includeTemplate('footer');
?>