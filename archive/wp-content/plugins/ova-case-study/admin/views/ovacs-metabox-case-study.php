<?php

if( !defined( 'ABSPATH' ) ) exit();

global $post;

?>
<div class="ovacs_metabox">

</div>

<?php wp_nonce_field( 'ovacs_nonce', 'ovacs_nonce' ); ?>