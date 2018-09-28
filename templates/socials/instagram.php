<?php
/**
 * Latest IG Posts
 */
?>

<section class="instagram">
    <div class="container">
        <h3 class="ofs-lead">Suivez Flynt sur Instagram <a href="https://www.instagram.com/flyntmc/" target="_blank">@flyntmc</a></h3>

        <div class="slider" data-slider='{"margin" : 0, "mouseDrag" : false, "dots" : false, "nav" : true, "type" : "responsive"}'>
            <?php
                $instagram = new Instagram([
                    'client_id' => '30160c5738184b7eac0a0ca5f19f7c04', // sebisart
                    'access_token' => '2948366394.30160c5.9a10f5217c1545299c6e3dda3ae69d6a' // sebisart
                ]);

                $instagram_post = $instagram->getTheLastPost(2948366394); // @user_id >  sebisart
                
                $instagram_posts = $instagram_post->data;
                foreach ($instagram_posts as $key => $ig):
                if($ig->type === 'image'):
            ?>
                <div class="instagram--post slider-item">
                    <a href="<?= $ig->link ?>" target="_blank" style="background-image:url(<?= $ig->images->standard_resolution->url; ?>)">
                        <!-- <img src="<?//= $ig->images->standard_resolution->url; ?>" alt=""> -->
                    </a>
                </div>
            <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>

</section>