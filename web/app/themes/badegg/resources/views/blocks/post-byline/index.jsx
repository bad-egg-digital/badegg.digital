// block.json's editorScript, loaded only in the block editor

import metadata from './block.json';
import { __ } from '@wordpress/i18n';
import { registerBlockType } from '@wordpress/blocks';

import { useBlockProps } from '@wordpress/block-editor';
import { useState, useEffect } from '@wordpress/element';
import { useSelect } from '@wordpress/data';

registerBlockType(metadata.name, {
  edit({ attributes, setAttributes }) {
    const blockProps = useBlockProps();

    const {
      category,
      author,
	  } = attributes;

    const currentUser = useSelect((select) =>
      select('core').getCurrentUser()
    );

    const categoryIds = useSelect((select) =>
      select('core/editor').getEditedPostAttribute('categories')
    );

    const firstCategory = useSelect((select) =>
      categoryIds && categoryIds.length
        ? select('core').getEntityRecord('taxonomy', 'category', categoryIds[0])
        : null
    );

    const firstCategoryName = firstCategory ? firstCategory.name : '';

    useEffect( () => setAttributes({
      category: firstCategoryName,
      author: currentUser.name,
    }));

    return (
      <div { ...blockProps }>
        <p className="entry-meta subtitle"> { category } { __('by', 'badegg') } { author }</p>
      </div>
    );
  },
  save({ attributes }) {
    const blockProps = useBlockProps.save();

    const {
      category,
      author,
	  } = attributes;

    return (
      <div { ...blockProps }>
        <p className="entry-meta subtitle"> { category } { __('by', 'badegg') } { author }</p>
      </div>
    )
  }
});
