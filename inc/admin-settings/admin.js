/***
*** Fix Image preview/remove funtionality on image upload fields. ***
*** This is an issue with Carbon Fields specifically with SVG uplaods ***
***/

jQuery(document).ready(function ($) {
    // get the SVG field
    const _svg = jQuery('input[value*=".svg"]');

    // since we may have more than 1, run a loop
    _svg.each(function (_idx) {
        // get the elements value
        const _val = jQuery(this).val();

        // the filename
        const _filename = _val.split('/').pop();

        // build a container
        const _container =
            `<div class="cf-file__content" data-id="` +
            _filename +
            _idx +
            `">
            <div class="cf-file__preview">
                <img src="` +
            _val +
            `" class="cf-file__image" />
                <button onclick="rmv_Image('` +
            _filename +
            _idx +
            `');return false;" type="button" class="cf-file__remove dashicons-before dashicons-no-alt"></button>
            </div>
            <span class="cf-file__name" title="` +
            _filename +
            `">` +
            _filename +
            `</span>
        </div>`;

        // inject it right after the field
        jQuery(this).after(_container);
    });
});

function rmv_Image(_which) {
    // remove the element
    jQuery('[data-id="' + _which + '"]').remove();
}

// Limit core/embed variations available in Gutenberg

setTimeout(function () {
    const allowedEmbedBlocks = [
        'vimeo',
        'youtube',
    ];
    wp.blocks.getBlockVariations('core/embed').forEach(function (blockVariation) {
        if (-1 === allowedEmbedBlocks.indexOf(blockVariation.name)) {
            wp.blocks.unregisterBlockVariation('core/embed', blockVariation.name);
        }
    });
}, 3000);