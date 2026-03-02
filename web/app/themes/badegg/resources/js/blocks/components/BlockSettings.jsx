/**
 * BlockSettings
 *
 * Bundles the <InspectorControls> used for several blocks
 * *
 * @param {object} props
 * @param {number} props.attributes the data
 * @param {string} props.setAttributes the state
 * @returns {*} React JSX
 */

import { __ } from '@wordpress/i18n';
import { select } from '@wordpress/data';
import { useState, useEffect } from '@wordpress/element';
import apiFetch from '@wordpress/api-fetch';

import {
	PanelBody,
	PanelRow,
	SelectControl,
	ToggleControl,
	RangeControl,
	ColorPalette,
  FocalPointPicker,
	Button,
	Spinner,
} from '@wordpress/components';

import {
	MediaUpload,
	MediaUploadCheck,
} from '@wordpress/block-editor';

export default function BlockSettings({ attributes, setAttributes }) {
	const [ configOptions, setConfigOptions ] = useState([]);
	const [ isLoading, setIsLoading ] = useState(true);

  useEffect( () => {
		let isMounted = true;

		apiFetch( { path: '/badegg/v1/blocks/config' } )
			.then( ( data ) => {
				if ( isMounted ) {
					setConfigOptions( data );
					setIsLoading( false );
				}
			} )
			.catch( () => {
				if ( isMounted ) {
					setConfigOptions( null );
					setIsLoading( false );
				}
			} );

		return () => {
			isMounted = false;
		};
	}, [] );

  if ( isLoading ) {
		return (
			<>
        <PanelBody>
          <Spinner />
        </PanelBody>
      </>
		);
	}

	if ( ! configOptions ) {
		return null;
	}

  const {
		container_width,
		padding_top,
		padding_bottom,
    background_colour,
		background_hex,
		background_tint,
		background_image,
    background_url,
    background_lazy,
    background_position,
		background_opacity,
		background_contrast,
		background_fixed,
    background_filter,
		background_gradient,
    angle_top,
    angle_top_direction,
    angle_top_colour,
    angle_top_hex,
    angle_top_tint,
    angle_bottom,
    angle_bottom_direction,
    angle_bottom_colour,
    angle_bottom_hex,
    angle_bottom_tint
	} = attributes;

	return (
    <>
      <PanelBody title={ __("Spacing", "badegg") }>
        <SelectControl
          label={ __("Container Width", "badegg") }
          value={ container_width }
          options={ configOptions.container }
          onChange={ (value) => setAttributes({ container_width: value }) }
          __next40pxDefaultSize={ true }
          __nextHasNoMarginBottom={ true }
        />
        <ToggleControl
          label={ __('Top padding', 'badegg') }
          checked={ padding_top }
          onChange={(value) => setAttributes({ padding_top: value }) }
          __nextHasNoMarginBottom
        />
        <ToggleControl
          label={ __('Bottom padding', 'badegg') }
          checked={ padding_bottom }
          onChange={(value) => setAttributes({ padding_bottom: value }) }
          __nextHasNoMarginBottom
        />
        <ToggleControl
          label={ __('Top Angle', 'badegg') }
          checked={ angle_top }
          onChange={(value) => setAttributes({ angle_top: value }) }
          __nextHasNoMarginBottom
        />
        <ToggleControl
          label={ __('Bottom angle', 'badegg') }
          checked={ angle_bottom }
          onChange={(value) => setAttributes({ angle_bottom: value }) }
          __nextHasNoMarginBottom
        />
      </PanelBody>

      { angle_top && (
        <PanelBody title={ __("Top Angle", "badegg") }>
          <p style={{ textTransform: 'uppercase', fontSize: '11px' }} className="components-truncate components-text components-input-control__label">
            { __('Colour', 'badegg') }
          </p>

          <ColorPalette
            colors={ configOptions.colours }
            value={ angle_top_hex }
            clearable={ false }
            disableCustomColors={ true }
            style={{ marginBottom: '16px' }}
            onChange={ ( value ) => {
              let slug, hex, selected = '';

              if(value) {
                selected = configOptions.colours.find(
                  ( c ) => c.color === value
                );

                hex = value;
              }

              if(selected) {
                slug = selected.slug;
              }

              let colourAttributes = {
                angle_top_colour: slug,
                angle_top_hex: hex,
              };

              if(!slug || [0, '0', 'white', 'black'].includes(slug)) {
                colourAttributes.angle_top_tint = '0';
              }

              setAttributes( colourAttributes );

            } }
          />

          { 'angle_top_colour' in attributes && attributes.angle_top_colour && ![0, '0', 'white', 'black'].includes(attributes.angle_top_colour) ? (
            <SelectControl
              label={ __("Tint", "badegg") }
              value={ angle_top_tint }
              options={ configOptions.tints }
              onChange={ (value) => setAttributes({ angle_top_tint: value }) }
              __next40pxDefaultSize={ true }
              __nextHasNoMarginBottom={ true }
            />
          ) : null }

          { angle_top_colour && (
            <SelectControl
              label={ __("Direction", "badegg") }
              value={ angle_top_direction }
              options={[
                { "label": "Left", "value": "left" },
                { "label": "Right", "value": "right" },
              ]}
              onChange={ (value) => setAttributes({ angle_top_direction: value }) }
              __next40pxDefaultSize={ true }
              __nextHasNoMarginBottom={ true }
            />
          )}
        </PanelBody>
      )}

      { angle_bottom && (
        <PanelBody title={ __("Bottom Angle", "badegg") }>
          <p style={{ textTransform: 'uppercase', fontSize: '11px' }} className="components-truncate components-text components-input-control__label">
            { __('Colour', 'badegg') }
          </p>

          <ColorPalette
            colors={ configOptions.colours }
            value={ angle_bottom_hex }
            clearable={ false }
            disableCustomColors={ true }
            style={{ marginBottom: '16px' }}
            onChange={ ( value ) => {
              let slug, hex, selected = '';

              if(value) {
                selected = configOptions.colours.find(
                  ( c ) => c.color === value
                );

                hex = value;
              }

              if(selected) {
                slug = selected.slug;
              }

              let colourAttributes = {
                angle_bottom_colour: slug,
                angle_bottom_hex: hex,
              };

              if(!slug || [0, '0', 'white', 'black'].includes(slug)) {
                colourAttributes.angle_bottom_tint = '0';
              }

              setAttributes( colourAttributes );

            } }
          />

          { 'angle_bottom_colour' in attributes && attributes.angle_bottom_colour && ![0, '0', 'white', 'black'].includes(attributes.angle_bottom_colour) ? (
            <SelectControl
              label={ __("Tint", "badegg") }
              value={ angle_bottom_tint }
              options={ configOptions.tints }
              onChange={ (value) => setAttributes({ angle_bottom_tint: value }) }
              __next40pxDefaultSize={ true }
              __nextHasNoMarginBottom={ true }
            />
          ) : null }

          { angle_bottom_colour && (
            <SelectControl
              label={ __("Direction", "badegg") }
              value={ angle_bottom_direction }
              options={[
                { "label": "Left", "value": "left" },
                { "label": "Right", "value": "right" },
              ]}
              onChange={ (value) => setAttributes({ angle_bottom_direction: value }) }
              __next40pxDefaultSize={ true }
              __nextHasNoMarginBottom={ true }
            />
          )}
        </PanelBody>
      )}

      <PanelBody title={ __("Background", "badegg") }>
        <p style={{ textTransform: 'uppercase', fontSize: '11px' }} className="components-truncate components-text components-input-control__label">
          { __('Colour', 'badegg') }
        </p>
        <ColorPalette
          colors={ configOptions.colours }
          value={ background_hex }
          clearable={ false }
          disableCustomColors={ true }
          style={{ marginBottom: '16px' }}
          onChange={ ( value ) => {
            let slug, hex, selected = '';

            if(value) {
              selected = configOptions.colours.find(
                ( c ) => c.color === value
              );

              hex = value;
            }

            if(selected) {
              slug = selected.slug;
            }

            let colourAttributes = {
              background_colour: slug,
              background_hex: hex,
            };

            if(!slug || [0, '0', 'white', 'black'].includes(slug)) {
              colourAttributes.background_tint = '0';
            }

            setAttributes( colourAttributes );

          } }
        />

        { 'background_colour' in attributes && attributes.background_colour && ![0, '0', 'white', 'black'].includes(attributes.background_colour) ? (
          <>
            <SelectControl
              label={ __("Tint", "badegg") }
              value={ background_tint }
              options={ configOptions.tints }
              onChange={ (value) => setAttributes({ background_tint: value }) }
              __next40pxDefaultSize={ true }
              __nextHasNoMarginBottom={ true }
            />
          </>
        ) : null }

        { 'background_colour' in attributes && attributes.background_colour && ![0, '0', 'white'].includes(attributes.background_colour) ? (
          <ToggleControl
            label={ __('Gradient', 'badegg') }
            checked={ background_gradient }
            onChange={(value) => setAttributes({ background_gradient: value }) }
            __nextHasNoMarginBottom
          />
        ) : null }

        <ToggleControl
          label={ __('Text Contrast', 'badegg') }
          checked={ background_contrast }
          onChange={(value) => setAttributes({ background_contrast: value }) }
          __nextHasNoMarginBottom
        />

        { background_image != 0 && (
          <>
            <ToggleControl
              label={ __('Fixed Position', 'badegg') }
              checked={ background_fixed }
              onChange={(value) => setAttributes({ background_fixed: value }) }
              __nextHasNoMarginBottom
            />
            <ToggleControl
              label={ __('Filter Image', 'badegg') }
              checked={ background_filter }
              onChange={(value) => setAttributes({ background_filter: value }) }
              __nextHasNoMarginBottom
            />
            <ToggleControl
              label={ __('Lazy Loaded', 'badegg') }
              checked={ background_lazy }
              onChange={(value) => setAttributes({ background_lazy: value }) }
              __nextHasNoMarginBottom
            />
            <FocalPointPicker
              url={ background_url }
              value={ background_position }
              onDragStart={ (value) => setAttributes({ background_position: value }) }
              onDrag={ (value) => setAttributes({ background_position: value }) }
              onChange={ (value) => setAttributes({ background_position: value }) }
              __nextHasNoMarginBottom
            />
            <RangeControl
              __next40pxDefaultSize
              __nextHasNoMarginBottom
              label={ __("Opacity", "badegg") }
              value={ background_opacity }
              onChange={ ( value ) => setAttributes({ background_opacity: value }) }
              min={ 5 }
              max={ 100 }
            />
          </>
        )}

        <PanelRow>
          <MediaUploadCheck>
            <MediaUpload
              onSelect={ (media) => setAttributes({
                background_image: media.id,
                background_url: media.sizes.hero.url,
                background_url_lazy: media.sizes.lazy.url,
              })}
              allowedTypes={ ['image'] }
              value={ background_image }
              render={ ({ open }) => (
                <Button
                  onClick={ open }
                  variant="primary"
                >
                  { background_image ?  __("Replace image", "badegg") :  __("Choose image", "badegg") }
                </Button>
              )}
            />
          </MediaUploadCheck>

          { background_image != 0 && (
            <Button
              onClick={ () => setAttributes({
                  background_image: 0,
                  background_url: '',
                  background_url_lazy: '',
              }) }
              isDestructive
              variant="secondary"
            >
              { __("Remove image", "badegg") }
            </Button>
          )}
        </PanelRow>

      </PanelBody>
    </>
	);
}
