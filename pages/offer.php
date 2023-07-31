<?php  

    /* Template Name: Offer Page */

    get_header();

?>
    
    <section class="offer-gradient-bg">
        <div class="offerHeader">
            <div class="container">
                <div class="offerHeader--wrapper" data-aos="zoom-in" data-aos-delay="150">
                    <div class="offerHeader--title">
                        <h1><?php the_title(); ?></h1>
                        <a href="#offer" class="button">Zobacz</a>
                    </div>
                    <?php if( have_rows('offer_links') ): ?>
                        <div class="offerHeader--links">
                            <ul>
                                <?php while( have_rows('offer_links') ) : the_row(); 
                                    $link = get_sub_field('offer_links_id');
                                ?>
                                    <li><a href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a></li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <main class="offer" id="offer">
        <?php 
            if( have_rows('offer') ):
                while ( have_rows('offer') ) : the_row();
        ?>

            <?php 
            if( get_row_layout() == 'offer_4_cols' ): 
                $offer_bg = get_sub_field('offer_with_bg');
                $offer_title_gold = get_sub_field('offer_4_cols_title_gold');
                $offer_title = get_sub_field('offer_4_cols_title');
                $offer_text = get_sub_field('offer_4_cols_text');
                $offer_link = get_sub_field('offer_4_cols_link');
                $offer_cols = get_sub_field();
            ?>
            
            <section id="<?php echo str_replace(' ', '_', $offer_title_gold) .'_'. str_replace(' ', '_', $offer_title) ?>" class="offer-content <?php if($offer_bg): echo 'offer-gradient-bg'; endif; ?>">
                <div class="container-big offer-page-container gridCols4" data-aos="fade-up" data-aos-delay="150">
                    <h2 class="offer-page-header">
                        <span class="c-gold"><?php echo $offer_title_gold ?></span><br/>
                        <?php echo $offer_title ?>
                    </h2>
                    <div class="offer-page-text">
                        <?php echo $offer_text ?>
                    </div>
                    <div class="offer-page-link-container">
                        <a class="offer-page-link" href="<?php echo $offer_link ?>">
                            Zobacz efekty
                        </a>
                    </div>
                </div>

                <?php 
                if( have_rows('offer_4_cols_col') ): ?>
                    <div class="container-big offer-page-container-list gridCols4" data-aos="fade-up" data-aos-delay="150">
                        <?php while( have_rows('offer_4_cols_col') ) : the_row(); 
                            $offer_col_img = get_sub_field('offer_4_cols_col_icon');
                            $offer_col_title = get_sub_field('offer_4_cols_col_title');
                            $offer_col_text = get_sub_field('offer_4_cols_col_text');
                        ?>
                    
                        <div class="offer-page-container-list-icon">
                            <div class="offer-icon-with-text">
                                <img src="<?php echo $offer_col_img['url']; ?>" role="presentation">
                                <h3 class="h3"><?php echo $offer_col_title; ?></h3>
                            </div>
                            <div class="offer-page-list">
                                <?php echo $offer_col_text; ?>
                            </div>
                        </div>

                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </section>

            

            <?php 
            elseif( get_row_layout() == 'offer_full_image' ): 
                $fullImage = get_sub_field('offer_full_image_img');
            ?>

                <section id="offer-page-big-image-one" data-aos="zoom-out" data-aos-delay="150">
                    <div class="offer-page-image">
                        <img src="<?php echo $fullImage['url']; ?>" alt="">
                    </div>
                </section>

            <?php endif; ?>

        <?php endwhile; endif; ?>

    </main>

<?php get_footer(); ?>