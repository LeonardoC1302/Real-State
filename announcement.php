<?php
    require './includes/functions.php';
    includeTemplate('header');
?>

    <main class="container section centered-content">
        <h1>House On Sale In Front of the Forest</h1>
        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada.jpg" alt="Property Image">
        </picture>
        <div class="property-info">
            <p class="price">$3,000,000</p>
            <ul class="icons-stats">
                <li>
                    <img class="icon" loading="lazy" src="build/img/icono_wc.svg" alt="wc icon">
                    <p>3</p>
                </li>
                <li>
                    <img class="icon" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="parking icon">
                    <p>3</p>
                </li>
                <li>
                    <img class="icon" loading="lazy" src="build/img/icono_dormitorio.svg" alt="room icon">
                    <p>4</p>
                </li>
            </ul>
            <p>Ullamco do nisi ex cupidatat labore cupidatat excepteur. Sit fugiat anim tempor magna mollit Lorem velit nulla irure elit dolor laboris occaecat ullamco. Enim aliquip est occaecat aute laboris excepteur deserunt consequat. Eiusmod culpa id consectetur ullamco reprehenderit esse dolor adipisicing aliqua anim cupidatat cillum. Incididunt proident aute sit consectetur est labore eu reprehenderit amet. Consequat sunt sunt id qui id Lorem est eu id. Consequat dolor non Lorem esse ad ad nostrud occaecat qui dolore minim nisi ea ex.</p>
            <p>Tempor sit ut dolor amet fugiat proident culpa officia adipisicing exercitation adipisicing adipisicing do. Tempor consectetur ullamco fugiat aute commodo minim. Deserunt est anim laborum laboris ut ut esse do adipisicing ad laboris ad excepteur. Cupidatat sint consectetur enim quis labore reprehenderit. Occaecat est dolore labore deserunt nulla nostrud ad ut esse. Aliquip exercitation pariatur sit anim Lorem adipisicing deserunt do do ad. Nulla ad culpa quis eiusmod eiusmod nisi aliqua.</p>
        </div>
    </main>

    
<?php
    includeTemplate('footer');
?>