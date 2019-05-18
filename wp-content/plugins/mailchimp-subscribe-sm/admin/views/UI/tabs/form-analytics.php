<?php if ( ! defined( 'ABSPATH' ) ) exit;
include(SMFB_PLUGIN_PATH.'admin/views/UI/tabs/form-analytics-function.php');

if (function_exists('ulpb_RenderAnalytics')) {
    echo ulpb_RenderAnalytics($post->ID, true);
}
?>
<div id="resetAnalyticsBtn" class="resetAnalyticsBtn"> Reset Analytics </div>

<p class="analyticsDeleted"></p>