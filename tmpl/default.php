<?php
/*
 * Facebook Feed module - layout
 * (c) 2012 Benjamin Booth
 */

// No direct access.
defined('_JEXEC') or die;

?>

<div class="fbfeed<?php echo $class_sfx;?>">
	<div style="overflow: auto;">
		<a href="<?=$profile->link?>" target=_blank"><img src="https://graph.facebook.com/<?=$profile_id?>/picture" border="0" style="float: left; margin: 0 10px 10px 0;" /></a>
		<p style="margin: 0 0 0.5em;"><a href="<?=$profile->link?>" target=_blank"><?=$profile->name?></a></p>
		<div class="fb-like" data-href="https://www.facebook.com/AngusMarksAustralia" data-send="false" data-layout="button_count" data-width="90" data-show-faces="false"></div>
	</div>
	<ul>
	<?php foreach($feed->data as $item) : ?>
	<li>
		<?php echo "<small>".date("F j \a\\t g:ia", strtotime($item->created_time))."</small><br />"; ?>
		<?php if (isset($item->message)) {
				echo $item->message;
				if ($item->type == "photo" || $item->type == "link") echo "<br />";
			} ?>
	    <?php switch ($item->type) {
				case "photo":
					echo "<a href='".$item->link."' target='_blank'><img src='".$item->picture."' border='0' /></a>";
					break;
				case "link":
					echo ($item->picture != "") ? "<a href='".$item->link."' target='_blank'><img src='".$item->picture."' border='0' /></a><br />" : "";
					echo "<strong><a href='".$item->link."' target='_blank'>".$item->name."</a></strong><br />";
					echo "<small><a href='http://".$item->caption."' target='_blank'>".$item->caption."</a></small><br />";
					echo "<em>".$item->description."</em>";
					break;
				default:
			} ?>
	</li>
	<?php endforeach; ?>
	</ul>
</div>
