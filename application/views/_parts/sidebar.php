<?php
$tab = setting_lang('tab_menu_member');
$tab = explode(",", $tab);
?>
<ul class="nav nav-tabs nav-stacked">
	<li><a href='<?php echo site_url('member');?>'><?php echo $tab[0];?></a></li>
	<li><a href='<?php echo site_url('member/icon');?>'><?php echo $tab[1];?></a></li>
	<li><a href='<?php echo site_url('member/profile');?>'><?php echo $tab[2];?></a></li>
</ul>