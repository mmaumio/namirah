(function ($) {
    "use strict"
    $(document).ready(function () {
        $("body").off("click",".widgetuploader");
        $("body").on("click",".widgetuploader", function () {
            var that = this;

            var file_frame = wp.media.frames.file_frame = wp.media({
                frame: 'post',
                state: 'insert',
                multiple: false
            });

            file_frame.on('insert', function () {

                var data = file_frame.state().get('selection');
                var jdata = data.toJSON();
                var selected_ids = _.pluck(jdata, "id");
                var container = $(that).siblings("p.imgpreview");

                if (selected_ids.length > 0) {
                    $(that).css("marginTop", "10px");
                    $(that).val("Change Image");
                }
                $(that).prev('input').val(selected_ids.join(","));
                container.html("");

                data.map(function (attachment) {
                    if (attachment.attributes.subtype == "png" || attachment.attributes.subtype == "jpeg" || attachment.attributes.subtype == "jpg") {
                        try {
                            console.log(attachment.attributes.sizes);
                            container.append("<img src='" + attachment.attributes.sizes.medium.url + "'/>");
                        } catch (e) {
                        }
                    }
                });
            });

            file_frame.on('open', function () {
                var selection = file_frame.state().get('selection');
                var ats = $(that).prev("input").val().split(",");

                for (var i = 0; i < ats.length; i++) {
                    if (ats[i] > 0)
                        selection.add(wp.media.attachment(ats[i]));
                }
            });

            file_frame.open();
        });

    });
})(jQuery);