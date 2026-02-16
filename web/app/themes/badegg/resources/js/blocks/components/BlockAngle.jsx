import { select } from '@wordpress/data';

/**
 * BlockAngle
 *
 * This component is used to display a background image for a block based on its attributes.
 *
 * @param {object} props.attributes
 * @param {string} props.position top | bottom
 * @returns {*} React JSX
 */
export default function BlockAngle({
  attributes,
  position
}) {
  if(!attributes['angle_' + position]) return;

  let colourClass = '';

  const colour = attributes['angle_' + position + '_colour'];
  const tint = attributes['angle_' + position + '_tint'];
  const direction = attributes['angle_' + position + '_direction'];

  if(colour) colourClass = 'bg-' + colour;
  if(tint != '0') colourClass += '-' + tint;

  if(colour) {
    return (
      <div className={ `section-angle section-angle-${ position }-${ direction } ${ colourClass }` }></div>
    );
  }

}
