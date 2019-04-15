<section class="pricing-packages">
  <div class="inner-wrap">
    <h2><?php the_field('pricing_header', 'option'); ?></h2>
    <hr>
    <div class="packages online-membership non-list">
      <?php
        // check if the repeater field has rows of data
        if( have_rows('community_pricing_options', 'option') ):
          // loop through the rows of data
          while ( have_rows('community_pricing_options', 'option') ) : the_row();
            // display a sub field value
            ?>
            <div class="package">
              <span class="package-name"><?php the_sub_field('package_name'); ?></span>
              <span class="package-price" style="color: #<?php the_sub_field('color'); ?>"><?php the_sub_field('package_price'); ?></span>
              <span class="package-caption"><?php the_sub_field('price_caption'); ?></span>
              <!--<a href="<?php the_sub_field('button_link'); ?>"><span class="button" style="border-color: #<?php the_sub_field('color'); ?>; color: #<?php the_sub_field('color'); ?>; font-weight:bold;"><?php the_sub_field('button_text'); ?></span></a>-->
            </div>
            <?php
          endwhile;
        else :
          // no rows found
        endif;
      ?>
    </div>

    <div class="packages coworking">
      <?php
        // check if the repeater field has rows of data
        if( have_rows('coworking_pricing_options', 'option') ):
          // loop through the rows of data
          while ( have_rows('coworking_pricing_options', 'option') ) : the_row();
            // display a sub field value
            ?>
            <div class="package">
              <span class="package-name"><?php the_sub_field('package_name'); ?></span>
              <span class="package-price" style="color: #<?php the_sub_field('color'); ?>"><?php the_sub_field('package_price'); ?></span>
              <span class="package-caption">
                <strong><?php the_sub_field('price_caption'); ?></strong><br/>
                <?php the_sub_field('days_included'); ?>

              </span>
              <span class="package-description"></span>
            </div>

            <hr>
            <?php
          endwhile;
        else :
          // no rows found
        endif;
      ?>
      <a class="right" href="<?php the_field('apply_now_button_url', 'option'); ?>"><span class="button"><?php the_field('apply_now_button_text', 'option'); ?></span></a>
    </div>

    <div class="packages non-list">
      <?php
        // check if the repeater field has rows of data
        if( have_rows('drop_in_pricing', 'option') ):
          // loop through the rows of data
          while ( have_rows('drop_in_pricing', 'option') ) : the_row();
            // display a sub field value
            ?>
            <div class="package">
              <span class="package-name"><?php the_sub_field('package_name'); ?></span>
              <span class="package-price" style="color: #<?php the_sub_field('color'); ?>"><?php the_sub_field('package_price'); ?></span>
              <span class="package-caption"><?php the_sub_field('price_caption'); ?></span>
              <a class="right" href="<?php the_sub_field('button_link'); ?>"><span class="button" style="border-color: #<?php the_sub_field('color'); ?>; color: #<?php the_sub_field('color'); ?>; font-weight:bold;"><?php the_sub_field('button_text'); ?></span></a>
            </div>
            <?php
          endwhile;
        else :
          // no rows found
        endif;
      ?>
    </div>

    <div class="packages nights">
      <?php
        // check if the repeater field has rows of data
        if( have_rows('nights_pricing_options', 'option') ):
          // loop through the rows of data
          while ( have_rows('nights_pricing_options', 'option') ) : the_row();
            // display a sub field value
            ?>
            <div class="package">
              <span class="package-name"><?php the_sub_field('package_name'); ?></span>
              <span class="package-price" style="color: #<?php the_sub_field('color'); ?>"><?php the_sub_field('package_price'); ?></span>
              <span class="package-caption"><?php the_sub_field('price_caption'); ?></span>
              <a class="right" href="<?php the_sub_field('button_link'); ?>"><span class="button" style="border-color: #<?php the_sub_field('color'); ?>; color: #<?php the_sub_field('color'); ?>; font-weight:bold;"><?php the_sub_field('button_text'); ?></span></a>
            </div>

            <hr>
            <?php
          endwhile;
        else :
          // no rows found
        endif;
      ?>
    </div>

  </div>
</section>