/* Add a video in the popup - Example html also available */
jQuery('a.popup-video').on('click', function () {
    jQuery.dialog({
		theme: 'bootstrap',
        title: 'How to Measure for Your Cover',
        content: '<iframe class="video-frame" src="https://www.youtube.com/embed/Hi9rF5_joPc?rel=0&autoplay=1&showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>',
        animation: 'scale',
		type:'orange',
		columnClass: 'col-md-12',
		escapeKey: true,
    	backgroundDismiss: true,
    });
});

/* Add just an image in the popup */
jQuery('a.popup-howtocount').on('click', function () {
    jQuery.dialog({
		theme: 'bootstrap',
        title: '',
        content: '<img src="/wp-content/uploads/2020/04/how-to-choose-panel-connectors.png">',
        animation: 'scale',
		type:'orange',
		columnClass: 'col-md-6',
		escapeKey: true,
    	backgroundDismiss: true,
    });
});

/* Using modern theme in the popup that lazy loads an icon at the start */
jQuery('a.popup-howtomeasurev3').on('click', function () {
    jQuery.dialog({
		theme: 'modern',
		icon: 'fas fa-ruler',
        title: 'How To Measure',
        content: '<h4 style="color: red;">Width</h4><em><strong><span style="color:#000;">Measure the distance you want to cover...</span></strong></em><ul class="bulletlist"><li>Then add 5% to that dimension to give your curtain proper drape</li></ul>'+'<h4 style="color: red;">Height</h4><em><strong><span style="color:#000;">Measure the distance from the floor to the mounting point...</span></strong></em><ul class="bulletlist"><li>Then subtract 1” to account for the hardware to keep the curtain resting a few inches on the floor</li><li>If no hardware is needed then you do not need to subtract 1"</li><li>It is highly suggest to purchase the floor sweep on this form to engage the ground to keep air separated</li></ul>'+'<h4 style="color: red;">Note</h4><ul class="bulletlist"><li>After you place your order you will get a detailed order confirmation for you to approve and our experts will review it for accuracy</li></ul>',
        animation: 'scale',
		type: 'orange',
		columnClass: 'col-md-8',
		escapeKey: true,
    	backgroundDismiss: true,
    });
});

/* Using bootstrap theme in the popup - simple and versatile */
jQuery('a.popup-tip23').on('click', function () {
    jQuery.dialog({
		theme: 'bootstrap',
        title: 'About Delivery Options',
        content: '<div class="row">These PVC rolls are about 110lbs each. They will arrive on a pallet so if you do not have a forklift to unload the delivery truck then we need to make sure a liftgate is provided so the driver can properly unload the roll(s).</div>',
        animation: 'scale',
		type: 'orange',
		columnClass: 'col-md-8',
		escapeKey: true,
    	backgroundDismiss: true,
    });
});
