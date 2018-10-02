<?php if( !is_front_page() ) { ?>
<div class="page-breadcrumb">
    <div class="container">
        <div class="row">
        	<?php if ( is_search() ) { ?>
	        	<div class="col-md-12">
	                <span class="search-title">Search Result For:</span>
	                <h2 class="search-topic"><?php the_search_query(); ?></h2>
	            </div>
        	<?php } else { ?>    
            <div class="col-md-5">
            	<?php if( is_archive() ) { ?>
					<h2 class="page-title">
					<?php
						if ( is_category() ) :
							single_cat_title();

						elseif ( is_tag() ) :
							single_tag_title();

						elseif ( is_author() ) :
							printf( __( 'Author: %s', 'namirah' ), '<span class="vcard">' . get_the_author() . '</span>' );

						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'namirah' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'namirah' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'namirah' ) ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'namirah' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'namirah' ) ) . '</span>' );

						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'namirah' );

						elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
							_e( 'Galleries', 'namirah' );

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'namirah' );

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'namirah' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'namirah' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'namirah' );

						elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
							_e( 'Statuses', 'namirah' );

						elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
							_e( 'Audios', 'namirah' );

						elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
							_e( 'Chats', 'namirah' );

						else :
							_e( 'Archives', 'namirah' );

						endif;
					?>
					</h2>
				<?php } else { ?>
                	<h2 class="page-title"><?php the_title(); ?></h2>
                <?php } ?>
            </div>
            <div class="col-md-7">
            	<?php nm_breadcrumb(); ?>    
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php } ?>