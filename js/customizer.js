/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );


	//Nav Hamburger bg color
	wp.customize( 'portfolioo[nav_color]', function( value ) {
        value.bind( function( to ) {
            $( '.menu-toggle' ).css( 'background', to );
        } );
    });

    // site title color
    wp.customize( 'portfolioo[site_title_color]', function( value ) {
        value.bind( function( to ) {
            $( '.site-title a' ).css( 'color', to );
        } );
    });


    //Nav Hamburger icon color
    wp.customize( 'portfolioo[nav_icon_color]', function( value ) {
        value.bind( function( to ) {
            $( '.menu-toggle i.fa.fa-bars' ).css( 'color', to );
        } );
    });

    //header bg color
	wp.customize( 'portfolioo[nav_background]', function( value ) {
        value.bind( function( to ) {
            $( '#masthead' ).css( 'background-color', to );
        } );
    });

    //site title  color
	wp.customize( 'portfolioo[site_title_color]', function( value ) {
        value.bind( function( to ) {
            $( '.site-title a' ).css( 'color', to );
        } );
    });


    //menu close color
	wp.customize( 'portfolioo[sidr_close_color]', function( value ) {
        value.bind( function( to ) {
            $( '.pad_menutitle i.fa.fa-times' ).css( 'background-color', to );
        } );
    });




    //site font family
     wp.customize( 'portfolioo[body_font_family]', function( value ) {
        value.bind( function( to ) {            
            $( 'body' ).css('font-family', to );            
        } );
    });  

     //Site Line height
     wp.customize( 'portfolioo[body_line_height]', function( value ) {
        value.bind( function( to ) {             
            $( 'body' ).css( 'line-height', to + 'em' );            
        } );
    });

    //Site Font Size
     wp.customize( 'portfolioo[body_font_size]', function( value ) {
        value.bind( function( to ) {             
            $( 'body' ).css( 'font-size', to + 'px' );            
        } );
    });  

    /*posts page*/
    wp.customize( 'portfolioo[post_site_titlecol]', function( value ) {
        value.bind( function( to ) {
            $( '.single-post .site-title a' ).css( 'color', to );
        } );
    });

    wp.customize( 'portfolioo[post_header_bgcol]', function( value ) {
        value.bind( function( to ) {
            $( '.single-post #masthead, .post-entry-meta' ).css( 'background-color', to );
        } );
    });

    wp.customize( 'portfolioo[post_header_metalinkcol]', function( value ) {
        value.bind( function( to ) {
            $( '.post-entry-meta a' ).css( 'color', to );
        } );
    });

    wp.customize( 'portfolioo[post_header_metatxtcol]', function( value ) {
        value.bind( function( to ) {
            $( '.post-entry-meta' ).css( 'color', to );
        } );
    });

    wp.customize( 'portfolioo[post_bgcol]', function( value ) {
        value.bind( function( to ) {
            $( '.post_wrap' ).css( 'background-color', to );
        } );
    });

    wp.customize( 'portfolioo[post_txtcol]', function( value ) {
        value.bind( function( to ) {
            $( '.entry-content' ).css( 'color', to );
        } );
    });

    wp.customize( 'portfolioo[post_txt_bgcol]', function( value ) {
        value.bind( function( to ) {
            $( '.post_wrap .post_others' ).css( 'background-color', to );
        } );
    });




     //colophon text1
     wp.customize( 'colophon_txt1', function( value ) {
		value.bind( function( to ) {
			$( '#colophon .footdiv h3' ).text( to );
		} );
	} );

     //colophon text2
     wp.customize( 'colophon_txt2', function( value ) {
		value.bind( function( to ) {
			$( '.fone h4' ).text( to );
		} );
	} );

     //colophon text3
     wp.customize( 'colophon_txt3', function( value ) {
		value.bind( function( to ) {
			$( '.fone p' ).text( to );
		} );
	} );

     //colophon text4
     wp.customize( 'colophon_txt4', function( value ) {
		value.bind( function( to ) {
			$( '.ftwo h4' ).text( to );
		} );
	} );

     //colophon text5
     wp.customize( 'colophon_txt5', function( value ) {
		value.bind( function( to ) {
			$( '.ftwo p' ).text( to );
		} );
	} );

     //colophon text6
     wp.customize( 'colophon_txt6', function( value ) {
		value.bind( function( to ) {
			$( '.fthree h4' ).text( to );
		} );
	} );

     //colophon text7
     wp.customize( 'colophon_txt7', function( value ) {
		value.bind( function( to ) {
			$( '.fthree p' ).text( to );
		} );
	} );


    //colophon text color
	wp.customize( 'portfolioo[colophon_txt_color]', function( value ) {
        value.bind( function( to ) {
            $( '#colophon .footdiv h3, #colophon .footdiv .main h4, #colophon .footdiv .main p' ).css( 'color', to );
        } );
    });


    //footer icon1
    wp.customize( 'footer_icon1', function( value ) {
        value.bind( function( to ) {
            $( '.footer_icon_one span' ).attr('class','');
            $( '.footer_icon_one span').addClass('fa '+ to +'');                    
        } );
    } );


    //footer icon2
    wp.customize( 'footer_icon2', function( value ) {
        value.bind( function( to ) {
            $( '.footer_icon_two span' ).attr('class','');
            $( '.footer_icon_two span').addClass('fa '+ to +'');                    
        } );
    } );


    //footer icon3
    wp.customize( 'footer_icon3', function( value ) {
        value.bind( function( to ) {
            $( '.footer_icon_three span' ).attr('class','');
            $( '.footer_icon_three span').addClass('fa '+ to +'');                    
        } );
    } );


    //colophon icon color
	wp.customize( 'portfolioo[colophon_icon_color]', function( value ) {
        value.bind( function( to ) {
            $( '#colophon .footdiv .main .fa' ).css( 'color', to );
        } );
    });


    //colophon bg color
	wp.customize( 'portfolioo[footer_bg_color]', function( value ) {
        value.bind( function( to ) {
            $( '#colophon .footdiv' ).css( 'background-color', to );
        } );
    });



    // hide credit
    wp.customize( 'portfolioo[hide_credit]', function( value ) {
    value.bind( function( to ) {
        if ( true === to) {
            $( '.site-info' ).show();
          } else {
            $( '.site-info' ).hide();
          }
        } );
    } );




} )( jQuery );
