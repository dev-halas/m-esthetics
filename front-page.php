<?php get_header(); ?>

    <main style="overflow: hidden">
        <div class="line l-left"></div>
        <div class="line l-right"></div>
        <?php 
            get_template_part('/components/home/hero');
            get_template_part('/components/home/about');
            get_template_part('/components/home/people');
            get_template_part('/components/home/offer');
        ?>
    </main>

<?php get_footer(); ?>