<?php
    require './includes/app.php';
    includeTemplate('header');
?>

    <main class="container section centered-content">
        <h1>Our Blog</h1>

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
                    <p>Written on: <span>10/20/2022</span> by <span>admin</span></p>
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
                    <h4>Guide for decorating your house</h4>
                    <p>Written on: <span>10/20/2022</span> by <span>admin</span></p>
                    <p>Maximize the space on your home with with guide, learn to combine furniture and colors to bring life to your home</p>
                </a>
            </div>
        </article> <!-- .blog-entry -->
        <article class="blog-entry">
            <div class="img">
                <picture>
                    <source srcset="build/img/blog3.webp" type="image/webp">
                    <source srcset="build/img/blog3.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog3.jpg" alt="Blog Image">
                </picture>
            </div>
            <div class="entry-text">
                <a href="entry.php">
                    <h4>Terrace on the roof of your house</h4>
                    <p>Written on: <span>10/20/2022</span> by <span>admin</span></p>
                    <p>Advices for building a terrace on the roof of your house with the best materials and saving money</p>
                </a>
            </div>
        </article> <!-- .blog-entry -->
        <article class="blog-entry">
            <div class="img">
                <picture>
                    <source srcset="build/img/blog4.webp" type="image/webp">
                    <source srcset="build/img/blog4.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog4.jpg" alt="Blog Image">
                </picture>
            </div>
            <div class="entry-text">
                <a href="entry.php">
                    <h4>Guide for decorating your house</h4>
                    <p>Written on: <span>10/20/2022</span> by <span>admin</span></p>
                    <p>Maximize the space on your home with with guide, learn to combine furniture and colors to bring life to your home</p>
                </a>
            </div>
        </article> <!-- .blog-entry -->
    </main>

    
<?php
    includeTemplate('footer');
?>