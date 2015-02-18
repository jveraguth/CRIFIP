<?php
if (isset($_POST['submitSummary'])) {
    $summaryHead = $_POST['SummaryHead'];
    update_option('summary_head', $summaryHead);

    $summary_align = $_POST['SummaryAlign'];
    update_option('summary_align',$summary_align);

    $summaryListType = $_POST['SummaryType'];
    update_option('summary_listtype',$summaryListType);

    if (isset($_POST['SummaryShowLink'])) {
        update_option('summary_showlink','true');
    } else {
        update_option('summary_showlink','false');
    }
}

$summaryShowLink =  get_option( 'summary_showlink' );
$summaryHead = get_option('summary_head');
$summaryListType = get_option('summary_listtype');
$summaryAlign = get_option('summary_align');
?>
<div class="wrap">
    <?php echo '<h2>' . __( 'General Settings', 'wp-summary' ) . '</h2>'; ?>

	<form method="post">
		<em><?php _e( 'Hint: you can use <strong>[summary]</strong> anywhere in your post if you don\'t want to display it at the beginning', 'wp-summary' ) ?>)</em><br />
		<br />

		<?php _e('Text to display before the summary :','wp-summary') ?><br />
		<input type="text" name="SummaryHead" value="<?php echo $summaryHead; ?>" /><br />
		<br />
		<input type="radio" name="SummaryType" value="1" <?php if ($summaryListType == 1) echo 'checked '; ?>/> <?php _e('Unordered List','wp-summary') ?> (UL)<br />
		<input type="radio" name="SummaryType" value="2" <?php if ($summaryListType == 2) echo 'checked '; ?>/> <?php _e('Ordered List','wp-summary') ?> (OL)<br />
		<br />
                <?php _e('Align :','wp-summary') ?><br />
                <input type="radio" name="SummaryAlign" value="left" <?php if ($summaryAlign == 'left') echo 'checked '; ?>/> <?php _e('Float Left','wp-summary') ?><br />
		<input type="radio" name="SummaryAlign" value="right" <?php if ($summaryAlign == 'right') echo 'checked '; ?>/> <?php _e('Float Right','wp-summary') ?><br />
                <input type="radio" name="SummaryAlign" value="none" <?php if ($summaryAlign == 'none') echo 'checked '; ?>/> <?php _e('None','wp-summary') ?><br />
                <br />
        	
		<input type="submit" class="button-primary" name="submitSummary" value="<?php _e('Save Changes','wp-summary') ?>" />
	</form>
        
    <h2><?php _e('New : use your theme stylesheet to customize your summary !','wp-summary') ?></h2>
    <?php _e('Some CSS classes have been added on html elements. You can use classes like div.summary, li.summary_ol_[N], li.summary_ul_[N], li.summary_li_[N]... <br />(with [N] = 2 for H2, 3 for H3...)','wp-summary') ?><br />
    <?php _e('You can edit your theme\'s stylesheet and add your own css rules.','wp-summary') ?>
</div>
