    <?php
    if ( strpos( $_SERVER[ 'REQUEST_URI' ], "page" ) === false ) {
      the_archive_description();
    } else {
      echo '<h1>' . get_the_archive_title() . '</h1>';
    }
    ?>
