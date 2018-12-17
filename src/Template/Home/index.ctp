<div class="carousel fade-carousel slide" data-ride="carousel" data-interval="4000" id="bs-carousel">
    <div class="overlay"></div>
    <ol class="carousel-indicators">
        <li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
        <li data-target="#bs-carousel" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner">
        <div class="item slides active">
            <div class="slide-1"></div>
            <div class="hero">
            <hgroup>
                <h1>
                    Somos criativos
                </h1>
                <h3>
                    Iremos oferecer soluções práticas, objetivas e que auxilie o seu negócio.
                </h3>
            </hgroup>
            </div>
        </div>
        <div class="item slides">
            <div class="slide-2"></div>
            <div class="hero">
                <hgroup>
                    <h1>
                        Somos especialistas
                    </h1>
                    <h3>
                        Iremos utilizar tecnologia de ponta para criar o seu produto ou serviço.
                    </h3>
                </hgroup>
            </div>
        </div>
    </div>
</div>
<?php
    $j = 0;

    foreach($blocks as $block) {

        $class = $j % 2 == 0 ? 'content-color' : 'content';
?>
<div class="<?php echo $class; ?>">
    <div class="container">
        <div class="col-md-12 col-xs-12">
            <h1 class="title-content-color text-center">
                <?php echo $block['title']; ?>
            </h1>
            <?php echo $block['content']; ?>
        </div>
    </div>
</div>
<?php $j ++; } ?>