<?php get_header(); ?>

    <main>
        <?php 
            get_template_part('/components/home/about');
            get_template_part('/components/home/people');
            get_template_part('/components/home/offer');
        ?>
    </main>

<?php get_footer(); ?>