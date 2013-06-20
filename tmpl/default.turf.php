<?php
/*
 * Facebook Feed module - layout
 * © 2012 e-motion design
 * dev@e-motion.com.au
 * www.e-motion.com.au
 */

// No direct access.
defined('_JEXEC') or die;

// include the auto linker
require_once JPATH_BASE.DS.'includes'.DS.'linkify_urls.php';

?>

<div class="fbfeed<?php echo $class_sfx;?>">
	<ul class="fb_feed">
	<?php foreach($feed->data as $item) : ?>
	<li class="fb_item">
		<?php if ($item->type == "photo") : ?>
			<div class="fb_image"><a href='<?php echo $item->link; ?>' target='_blank'><img src='<?php echo $item->picture; ?>' border='0' /></a></div>
		<?php endif; ?>
		<?php
			if (isset($item->message)) {
				// auto link URLs
				$item->message = auto_link_text($item->message);
				echo "<div class='fb_post'>".trim($item->message)."</div>";
			}
			if ($item->type == "link") {
				echo "<div class='fb_link'><a href='".$item->link."' target='_blank'>".$item->name."</a></div>";
			}
			if ($item->type == "video") {
				echo "<div class='fb_video'><iframe width='247' src='".str_replace('&autoplay=1', '', $item->source)."' frameborder='0' autoplay='0' allowfullscreen></iframe></div>";
			}
		?>
		<div class="fb_info"><a href="<?php echo "https://www.facebook.com/".($item->status_type == "added_photos" ? $item->object_id : $item->id); ?>" target="_blank">
			<div class="fb_stats"><i class="icon icon_fb_likes"></i> <?php echo $item->likes ? $item->likes->count : '0' ; ?> <i class="icon icon_fb_comments"></i> <?php echo $item->comments ? $item->comments->count : '0'; ?>&nbsp;-&nbsp;</div>
			<div class="fb_date"><?php echo date("F j \a\\t g:ia", strtotime($item->created_time)); ?></div>
		</a></div>
	</li>
	<?php endforeach; ?>
	</ul>
</div>
