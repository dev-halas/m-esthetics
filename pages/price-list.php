<?php  

    /* Template Name: Price list Page */

    get_header();

?>
    <main>
        <section id="price-list">
        <?php if( have_rows('price') ): ?>
            <div class="price-list-container">
                <?php while ( have_rows('price') ) : the_row(); ?>

                    <?php 
                    if( get_row_layout() == 'price_title' ): 
                        $priceTitle = get_sub_field('price_title_text');
                    ?>
                        <div data-aos="fade-up" data-aos-delay="150">
                            <h2 class="price-list-header c-gold"><?php echo $priceTitle; ?></h2>
                        </div>
                    <?php endif; ?>

                    <?php 
                    if( get_row_layout() == 'price_first_lvl' ): 
                        $firstTitle = get_sub_field('price_first_lvl_title');
                        $firstPrice = get_sub_field('price_first_lvl_price');
                    ?>
                        <div class="price-list-text" data-aos="fade-up" data-aos-delay="150">
                            <p><?php echo $firstTitle; ?></p>
                            <p><?php echo $firstPrice; ?></p>
                        </div>
                    <?php endif; ?>

                    <?php 
                    if( get_row_layout() == 'price_second_lvl' ): 
                        $secondTitle = get_sub_field('price_second_lvl_title');
                        $secondPrice = get_sub_field('price_second_lvl_price');
                    ?>
                        <div class="price-list-text second-level" data-aos="fade-up" data-aos-delay="150">
                            <p><?php echo $secondTitle; ?></p>
                            <p><?php echo $secondPrice; ?></p>
                        </div>
                    <?php endif; ?>

                <?php endwhile; ?>
            </div>
        <?php endif; ?>
            
        </section>
        <section id="price-list-big-image">
            <div class="price-list-image" data-aos="zoom-out" data-aos-delay="150">
                <img src="<?php echo THEME_URL; ?>_dev/img/plant-on-table.jpg" alt="wazon z rośliną">
            </div>
        </section>
    </main>

<?php get_footer(); ?>