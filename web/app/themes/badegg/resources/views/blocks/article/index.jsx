// block.json's editorScript, loaded only in the block editor

import metadata from './block.json';
import { __ } from '@wordpress/i18n';
import { registerBlockType } from '@wordpress/blocks';

import {
  useBlockProps,
  InnerBlocks,
  InspectorControls,
  BlockControls,
  AlignmentToolbar,
} from '@wordpress/block-editor';

import {
	Panel,
	PanelBody,
	ToggleControl,
} from '@wordpress/components';

import allowedBlocks from '../../../json/block-core-whitelist.json';
import { containerClassNames, sectionClassNames } from '../../../js/blocks/lib/classNames';
import BackgroundImage from '../../../js/blocks/components/BackgroundImage';
import BlockSettings from '../../../js/blocks/components/BlockSettings';
import BlockAngle from '../../../js/blocks/components/BlockAngle';

registerBlockType(metadata.name, {
  edit({ attributes, setAttributes, clientId }) {
    const blockProps = useBlockProps();

    const {
      alignment,
      sidebar,
    } = attributes;

    blockProps.className += ' wysiwyg';

    return (
      <div className={ sectionClassNames(attributes, 'wp-block-badegg-article').join(' ') }>
        <BlockControls>
          <AlignmentToolbar
            value={ alignment }
            onChange={(value) => setAttributes({alignment: value})}
          />
        </BlockControls>
        <InspectorControls>
          <Panel className="badegg-components-panel">
            <PanelBody title={ __("Hello", "badegg") }>
              <ToggleControl
                label={ __('Show Sidebar', 'badegg') }
                checked={ sidebar }
                onChange={(value) => setAttributes({ sidebar: value }) }
                __nextHasNoMarginBottom
              />
            </PanelBody>

            <BlockSettings
              attributes={ attributes }
              setAttributes={ setAttributes }
            />

          </Panel>
        </InspectorControls>

        <button
          className="badegg-article-select-parent"
          onClick={() => {
            wp.data.dispatch('core/block-editor').selectBlock(clientId);
          }}
        >
          <span className="visually-hidden">Select Block</span>
        </button>

        <div className={ containerClassNames(attributes, [ 'wysiwyg' ]).join(' ') }>
          <div { ...blockProps }>
            <InnerBlocks
              allowedBlocks={ allowedBlocks }
              defaultBlock={
                {
                  name: "core/paragraph",
                  attributes: {
                    placeholder: "start typing",
                  }
                }
              }
            />
          </div>
          { sidebar ? (
            <div className="article-sidebar"></div>
          ) : null }
        </div>


        <BackgroundImage { ...attributes } />
        <BlockAngle attributes={ attributes } position="top" />
        <BlockAngle attributes={ attributes } position="bottom" />
      </div>
    );
  },
  save({ attributes }) {
    const blockProps = useBlockProps.save();

    blockProps.className += ' wysiwyg';

    return (
      <div className={ sectionClassNames(attributes, 'wp-block-badegg-article').join(' ') }>
        <div className={ containerClassNames(attributes).join(' ') } >
          <div { ...blockProps }>
            <InnerBlocks.Content />
          </div>
          { attributes.sidebar ? (
            <div className="article-sidebar"></div>
          ) : null }
        </div>

        <BackgroundImage { ...attributes } />
        <BlockAngle attributes={ attributes } position="top" />
        <BlockAngle attributes={ attributes } position="bottom" />

      </div>
    )
  }
});
