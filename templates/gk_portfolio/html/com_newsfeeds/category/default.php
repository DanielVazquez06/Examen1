<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_newsfeeds
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

$pageClass = $this->params->get('pageclass_sfx');
?>
<div class="newsfeeds newsfeed-category<?php echo $this->pageclass_sfx; ?>">
	<?php if ($this->params->get('show_page_heading')) : ?>
	<div class="content__header">
		<h1 class="content__header_title">
			<?php echo $this->escape($this->params->get('page_heading')); ?>
		</h1>
	</div>
	<?php endif; ?>
	
	<?php if ($this->params->get('show_category_title', 1)) : ?>
	<div class="content__header">
		<h2 class="content__header_title">	
			<?php echo JHtml::_('content.prepare', $this->category->title, '', 'com_newsfeeds.category.title'); ?>
		</h2>
	</div>
	<?php endif; ?>

	<?php if ($this->params->get('show_tags', 1) && !empty($this->category->tags->itemTags)) : ?>
		<?php $this->category->tagLayout = new JLayoutFile('joomla.content.tags'); ?>
		<?php echo $this->category->tagLayout->render($this->category->tags->itemTags); ?>
	<?php endif; ?>

	<?php if ($this->params->get('show_description', 1) || $this->params->def('show_description_image', 1)) : ?>
		<div class="category__desc clearfix">
			<?php if ($this->params->get('show_description_image') && $this->category->getParams()->get('image')) : ?>
				<img src="<?php echo $this->category->getParams()->get('image'); ?>"/>
			<?php endif; ?>
			<?php if ($this->params->get('show_description') && $this->category->description) : ?>
				<?php echo JHtml::_('content.prepare', $this->category->description, '', 'com_newsfeeds.category'); ?>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<?php echo $this->loadTemplate('items'); ?>

	<?php if (!empty($this->children[$this->category->id]) && $this->maxLevel != 0) : ?>
		<div class="category__children">
			<h3><?php echo JText::_('JGLOBAL_SUBCATEGORIES'); ?></h3>
			<?php echo $this->loadTemplate('children'); ?>
		</div>
	<?php endif; ?>
</div>
