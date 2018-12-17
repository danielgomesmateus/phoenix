<?php
    if(count($banners) >= 1) {
?>
<div class="carousel fade-carousel slide" data-ride="carousel" data-interval="4000" id="bs-carousel">
    <div class="overlay"></div>
    <ol class="carousel-indicators">
        <?php
            for($i = 0; $i < count($banners); $i ++) {
        ?>
        <li data-target="#bs-carousel" data-slide-to="<?php echo $i; ?>" <?php if($i == 0) { ?>class="active"<?php } ?>></li>
        <?php } ?>
    </ol>
    <div class="carousel-inner">
        <?php
            $j = 0;

            foreach($banners as $banner) {
        ?>
        <div class="item slides <?php if($j == 0) { ?>active<?php } ?>">
            <?php echo $this->Html->image($banner->image); ?>
            <div class="hero">
                <hgroup>
                    <h1>
                        <?php echo $banner->title; ?>
                    </h1>
                    <h3>
                        <?php echo $banner->description; ?>
                    </h3>
                </hgroup>
            </div>
        </div>
        <?php $j ++; } ?>
    </div>
</div>
<?php
    }
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