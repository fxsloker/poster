function joms_init_postbox() {
    this.joms = this.joms || {}, this.joms.jst = this.joms.jst || {}, this.joms.jst["html/dropdown/event"] = function(a) {
            var b, c = "";
            _.escape;
            return c += '<div class="joms-postbox-dropdown event-dropdown"> <div style="clear:both"> <div class=event-time-column> <span>' + (null == (b = a.language.event.category) ? "" : b) + ' <span style="color:red">*</span></span> <select class="joms-event-category joms-select" style="width:100%"></select> </div> <div class=event-time-column> <span>' + (null == (b = a.language.event.location) ? "" : b) + ' <span style="color:red">*</span></span> <input type=text class=joms-input name=location placeholder="' + (null == (b = a.language.event.location_hint) ? "" : b) + '"> </div> </div> <div style="clear:both"> <div class=event-time-column> <span>' + (null == (b = a.language.event.start) ? "" : b) + ' <span style="color:red">*</span></span> <input type=text class="joms-input joms-pickadate-startdate" placeholder="' + (null == (b = a.language.event.start_date_hint) ? "" : b) + '" style="background-color:transparent;cursor:text"> <input type=text class="joms-input joms-pickadate-starttime" placeholder="' + (null == (b = a.language.event.start_time_hint) ? "" : b) + '" style="background-color:transparent;cursor:text"> <span class="event-all-day joms-event-allday" style="margin-left:0;visibility:hidden"> <span>All Day Event</span> <span style="position:relative"><i class=joms-icon-check-empty></i></span></span> </div> <div class=event-time-column> <span>' + (null == (b = a.language.event.end) ? "" : b) + ' <span style="color:red">*</span></span> <input type=text class="joms-input joms-pickadate-enddate" placeholder="' + (null == (b = a.language.event.end_date_hint) ? "" : b) + '" style="background-color:transparent;cursor:text"> <input type=text class="joms-input joms-pickadate-endtime" placeholder="' + (null == (b = a.language.event.end_time_hint) ? "" : b) + '" style="background-color:transparent;cursor:text"> </div> </div> <nav class="joms-postbox-tab selected"> <div class="joms-postbox-action event-action"> <button class=joms-postbox-done>' + (null == (b = a.language.event.done_button) ? "" : b) + "</button> </div> </nav> </div>"
        }, this.joms.jst["html/dropdown/location-list"] = function(a) {
            var b, c = "";
            _.escape, Array.prototype.join;
            if (a && a.items && a.items.length)
                for (var d = 0; d < a.items.length; d++) c += ' <li data-index="' + (null == (b = d) ? "" : b) + '"> <p style="margin:0">' + (null == (b = a.items[d].name) ? "" : b) + "</p> <span>" + (null == (b = a.items[d].vicinity || a.language.geolocation.near_here) ? "" : b) + "</span> </li> ";
            else c += " <li><em>" + (null == (b = a.language.geolocation.empty) ? "" : b) + "</em></li> ";
            return c
        }, this.joms.jst["html/dropdown/location"] = function(a) {
            var b, c = "";
            _.escape;
            return c += '<div class="joms-postbox-dropdown location-dropdown"> <div class=joms-postbox-map></div> <div class="joms-postbox-action joms-location-action"> <button class=joms-add-location><i class=joms-icon-map-marker></i>' + (null == (b = a.language.geolocation.select_button) ? "" : b) + "</button> <button class=joms-remove-location><i class=joms-icon-remove></i>" + (null == (b = a.language.geolocation.remove_button) ? "" : b) + '</button> </div> <input class="joms-postbox-keyword joms-input" type=text> <ul class=joms-postbox-locations></ul> </div>'
        }, this.joms.jst["html/dropdown/mood"] = function(a) {
            var b, c = "";
            _.escape, Array.prototype.join;
            if (c += '<div class="joms-postbox-dropdown mood-dropdown"> <ul class="joms-postbox-emoticon joms-list clearfix"> ', a && a.items && a.items.length)
                for (var d = 0; d < a.items.length; d++) c += ' <li data-mood="' + (null == (b = a.items[d][0]) ? "" : b) + '"> ', c += "undefined" != typeof a.items[d][2] ? ' <div><img class=joms-emoticon src="' + (null == (b = a.items[d][2]) ? "" : b) + '"><span>' + (null == (b = a.items[d][1]) ? "" : b) + "</span></div> " : ' <div><i class="joms-emoticon joms-emo-' + (null == (b = a.items[d][0]) ? "" : b) + '"></i><span>' + (null == (b = a.items[d][1]) ? "" : b) + "</span></div> ", c += " </li> ";
            return c += " <li class=joms-remove-button>" + (null == (b = a.language.status.remove_mood_button) ? "" : b) + "</li> </ul> </div>"
        }, this.joms.jst["html/dropdown/privacy"] = function(a) {
            var b, c = "";
            _.escape, Array.prototype.join;
            if (c += '<div class="joms-postbox-dropdown privacy-dropdown"> <ul class=joms-list> ', a && a.items && a.items.length)
                for (var d = 0; d < a.items.length; d++) c += ' <li data-priv="' + (null == (b = a.items[d][0]) ? "" : b) + '"> <p class=reset-gap><svg viewBox="0 0 16 18" class="joms-icon"><use xlink:href="#joms-icon-' + (null == (b = a.items[d][1]) ? "" : b) + '"></use></svg> ' + (null == (b = a.items[d][2]) ? "" : b) + "</p> <span>" + (null == (b = a.items[d][3]) ? "" : b) + "</span> </li> ";
            return c += " </ul> </div>"
        }, this.joms.jst["html/inputbox/eventdesc"] = function(a) {
            var b, c = "";
            _.escape;
            return c += '<div style="position:relative"> <div class="joms-postbox-input joms-inputbox"> <div class=inputbox> <div style="position:relative"> <div style="position:relative"><span class=input></span></div> <textarea class=input placeholder="' + (null == (b = a && a.placeholder || "") ? "" : b) + '" style="min-height:1.4em"></textarea> </div> </div> </div> <div class="charcount joms-postbox-charcount"></div> </div>'
        }, this.joms.jst["html/inputbox/eventtitle"] = function(a) {
            var b, c = "";
            _.escape;
            return c += '<div style="position:relative"> <div class="joms-postbox-input joms-inputbox" style="padding:0; border-bottom:0; min-height:0"> <div class=inputbox> <div style="position:relative"> <div style="position:relative"><span class=input></span></div> <textarea class=input placeholder="' + (null == (b = a && a.placeholder || "") ? "" : b) + '" style="min-height:1.4em"></textarea> </div> </div> </div> </div>'
        }, this.joms.jst["html/inputbox/photo"] = function(a) {
            var b, c = "";
            _.escape;
            return c += '<div style="position:relative"> <div class="joms-postbox-input joms-inputbox"> <div class=inputbox> <div style="position:relative"> <div style="position:relative"><span class=input></span></div> <div class=joms-textarea__wrapper><textarea class="input input-photo-desc" placeholder="' + (null == (b = a && a.placeholder || "") ? "" : b) + '" style="min-height:1.4em"></textarea></div> </div> </div> </div> <div class="charcount joms-postbox-charcount"></div> </div>'
        }, this.joms.jst["html/inputbox/status"] = function(a) {
            var b, c = "";
            _.escape;
            return c += '<div style="position:relative"> <div class="joms-postbox-input joms-inputbox"> <div class=inputbox> <div style="position:relative"> <div style="position:relative"><span class=input></span></div> <div class=joms-textarea__wrapper><textarea class="input input-status" placeholder="' + (null == (b = a && a.placeholder || "") ? "" : b) + '" style="min-height:1.4em"></textarea></div> </div> </div> </div> <div class="charcount joms-postbox-charcount"></div> </div>'
        }, this.joms.jst["html/inputbox/video"] = function(a) {
            var b, c = "";
            _.escape;
            return c += '<div style="position:relative"> <div class="joms-postbox-input joms-inputbox"> <div class=inputbox> <div style="position:relative"> <div style="position:relative"><span class=input></span></div> <div class=joms-textarea__wrapper><textarea class="input joms-postbox-video-description" placeholder="' + (null == (b = a && a.placeholder || "") ? "" : b) + '" style="min-height:1.4em"></textarea></div> </div> </div> </div> <div class="charcount joms-postbox-charcount"></div> </div>'
        }, this.joms.jst["html/inputbox/videourl"] = function(a) {
            var b, c = "";
            _.escape;
            return c += '<div style="position:relative"> <div class="joms-postbox-input joms-inputbox" style="padding:0; border-bottom:0; min-height:0"> <div class=inputbox> <div style="position:relative"> <div style="position:relative"><span class=input></span></div> <textarea class="input joms-postbox-video-url" placeholder="' + (null == (b = a && a.placeholder || "") ? "" : b) + '" style="min-height:1.4em"></textarea> </div> </div> </div> </div>'
        }, this.joms.jst["html/postbox/custom"] = function(a) {
            var b, c = "";
            _.escape, Array.prototype.join;
            if (c += '<div> <div class=joms-postbox-inner-panel> <div class=joms-postbox-double-panel> <ul class="joms-list clearfix"> <li class=joms-postbox-predefined-message><svg viewBox="0 0 16 18" class="joms-icon"><use xlink:href="#joms-icon-cog"></use></svg> ' + (null == (b = a.language.custom.predefined_button) ? "" : b) + '</li> <li class=joms-postbox-custom-message><svg viewBox="0 0 16 18" class="joms-icon"><use xlink:href="#joms-icon-pencil"></use></svg> ' + (null == (b = a.language.custom.custom_button) ? "" : b) + "</li> </ul> </div> </div> <div class=joms-postbox-custom> <div class=joms-postbox-custom-state-predefined> <div class=joms-postbox-inner-panel> <span>" + (null == (b = a.language.custom.predefined_label) ? "" : b) + '</span><br> <select name=predefined style="width: 100%"> ', a && a.messages && a.messages.length) {
                c += " ";
                for (var d = 0; d < a.messages.length; d++) c += ' <option value="' + (null == (b = a.messages[d][0]) ? "" : b) + '">' + (null == (b = a.messages[d][1]) ? "" : b) + "</option> ";
                c += " "
            }
            return c += " </select> </div> </div> <div class=joms-postbox-custom-state-custom> <div class=joms-postbox-inner-panel> <span>" + (null == (b = a.language.custom.custom_label) ? "" : b) + '</span><br> <textarea name=custom></textarea> </div> </div> <nav class="joms-postbox-tab selected"> <ul class="joms-list inline"> <li data-tab=privacy><svg viewBox="0 0 16 18" class="joms-icon"><use xlink:href="#joms-icon-earth"></use></svg> <span class=visible-desktop></span></li> </ul> <div class=joms-postbox-action> <button class=joms-postbox-cancel>' + (null == (b = a.language.postbox.cancel_button) ? "" : b) + "</button> <button class=joms-postbox-save>" + (null == (b = a.language.postbox.post_button) ? "" : b) + '</button> </div> <div class=joms-postbox-loading style="display:none;"> <img src="' + (null == (b = a.juri.root) ? "" : b) + 'components/com_community/assets/ajax-loader.gif" alt="loader"> <div </nav> <div class="joms-postbox-dropdown privacy-dropdown"></div> </div> </div>'
        }, this.joms.jst["html/postbox/event"] = function(a) {
            var b, c = "";
            _.escape;
            return c += '<div class=joms-postbox-event> <div class=joms-postbox-inner-panel> <div class=joms-postbox-title></div> <div class=joms-postbox-event-detail> <div class="joms-postbox-event-panel joms-postbox-event-label-category" style="display:none"> <div class=joms-postbox-event-title style="padding-bottom:0;padding-top:8px"> <div class=joms-input-field-name>' + (null == (b = a.language.event.category) ? "" : b) + '</div> <span class=joms-input-text style="display:inline-block"></span> </div> </div> <div class="joms-postbox-event-panel joms-postbox-event-label-location" style="display:none"> <div class=joms-postbox-event-title style="padding-bottom:0;padding-top:8px"> <div class=joms-input-field-name>' + (null == (b = a.language.event.location) ? "" : b) + '</div> <span class=joms-input-text style="display:inline-block"></span> </div> </div> <div class="joms-postbox-event-panel joms-postbox-event-label-date" style="display:none"> <div class=joms-postbox-event-title style="padding-bottom:0;padding-top:8px"> <div class=joms-input-field-name>' + (null == (b = a.language.event.date_and_time) ? "" : b) + '</div> <span class=joms-input-text style="display:inline-block"></span> </div> </div> </div> </div> <div class=joms-postbox-inputbox></div> <nav class="joms-postbox-tab selected"> <ul class="joms-list inline"> <li data-tab=event><svg viewBox="0 0 16 18" class="joms-icon"><use xlink:href="#joms-icon-cog"></use></svg> <span class=visible-desktop>' + (null == (b = a.language.event.event_detail) ? "" : b) + "</span></li> </ul> <div class=joms-postbox-action> <button class=joms-postbox-cancel>" + (null == (b = a.language.postbox.cancel_button) ? "" : b) + "</button> <button class=joms-postbox-save>" + (null == (b = a.language.postbox.post_button) ? "" : b) + '</button> </div> <div class=joms-postbox-loading style="display:none;"> <img src="' + (null == (b = a.juri.root) ? "" : b) + 'components/com_community/assets/ajax-loader.gif" alt="loader"> <div </nav> </div>'
        }, this.joms.jst["html/postbox/fetcher-video"] = function(a) {
            var b, c = "",
                d = _.escape;
            Array.prototype.join;
            return c += "<div class=joms-fetched-wrapper> ", a.image && (c += ' <div class=joms-fetched-images> <img src="' + (null == (b = a.image) ? "" : b) + '"> </div> '), c += ' <div class="joms-fetched-field joms-fetched-title"> <span style="font-weight:bold">' + (null == (b = a.title || a.titlePlaceholder) ? "" : b) + '</span> <input type=text class=joms-input value="' + (null == (b = d(a.title || "")) ? "" : b) + '" style="display:none;margin:0"> </div> <div class="joms-fetched-field joms-fetched-description"> <span>' + (null == (b = a.description || a.descPlaceholder) ? "" : b) + '</span> <textarea class=joms-textarea style="display:none;margin:0">' + (null == (b = a.description || "") ? "" : b) + "</textarea> </div> <div class=clearfix></div> <span class=joms-fetched-close ><i class=joms-icon-remove></i>" + (null == (b = a.lang.cancel) ? "" : b) + '</span> <div style="padding-top:10px"> <div class="joms-fetched-category joms-select" style="padding:3px 0"></div> </div> </div>'
        }, this.joms.jst["html/postbox/fetcher"] = function(a) {
            var b, c = "",
                d = _.escape;
            Array.prototype.join;
            if (c += '<div class=joms-postbox-inner-panel> <div style="position:relative"> <div class=joms-fetched-images> ', a.image && a.image.length) {
                c += ' <div style="height:120px"> ';
                for (var e = 0; e < a.image.length; e++) c += ' <img src="' + (null == (b = a.image[e]) ? "" : b) + '" style="width:100%;height:100%;' + (null == (b = e ? "display:none" : "") ? "" : b) + '"> ';
                c += " </div> ", a.image.length > 1 && (c += ' <div class=joms-fetched-nav style="text-align:center"> <span class=joms-fetched-previmg style="cursor:pointer">&laquo; ' + (null == (b = a.lang.prev) ? "" : b) + '</span> &nbsp;&nbsp; <span class=joms-fetched-nextimg style="cursor:pointer">' + (null == (b = a.lang.next) ? "" : b) + " &raquo;</span> </div> "), c += " "
            } else c += ' <div style="height:120px;width:120px;background-color:#F9F9F9;color:7F8C8D;text-align:center;vertical"> &nbsp;<br>&nbsp;<br>no<br>thumbnail </div> ';
            return c += ' </div> <div class="joms-fetched-field joms-fetched-title"> <span style="font-weight:bold">' + (null == (b = a.title || a.titlePlaceholder) ? "" : b) + '</span> <input type=text class=joms-input value="' + (null == (b = d(a.title || "")) ? "" : b) + '" style="display:none;margin:0"> </div> <div class="joms-fetched-field joms-fetched-description"> <span>' + (null == (b = a.description || a.descPlaceholder) ? "" : b) + '</span> <textarea class=joms-textarea style="display:none;margin:0">' + (null == (b = a.description || "") ? "" : b) + '</textarea> </div> <div class=clearfix></div> <span class=joms-fetched-close style="top:0"><i class=joms-icon-remove></i>' + (null == (b = a.lang.cancel) ? "" : b) + "</span> </div> </div>"
        }, this.joms.jst["html/postbox/photo-item"] = function(a) {
            var b, c = "";
            _.escape;
            return c += '<li id="' + (null == (b = a.id) ? "" : b) + '" class=joms-postbox-photo-item> <div class=img-wrapper> <img src="' + (null == (b = a.src) ? "" : b) + '" > </div> <div class=joms-postbox-photo-action style="display:none"> <span class=joms-postbox-photo-remove>×</span> </div> <div class=joms-postbox-photo-progressbar> <div class=joms-postbox-photo-progress></div> </div> </li>'
        }, this.joms.jst["html/postbox/photo-preview"] = function(a) {
            var b = "";
            _.escape;
            return b += '<div class=joms-postbox-photo-preview> <ul class="joms-list clearfix"></ul> <div class=joms-postbox-photo-form></div> </div>'
        }, this.joms.jst["html/postbox/photo"] = function(a) {
            var b, c = "";
            _.escape;
            return c += '<div> <div id=joms-postbox-photo-upload style="position:absolute;top:0;left:0;width:1px;height:1px;overflow:hidden"> <button id=joms-postbox-photo-upload-btn>Upload</button> </div> <div class=joms-postbox-inner-panel style="position:relative"> <div class=joms-postbox-photo-upload> <svg viewBox="0 0 16 18" class="joms-icon"><use xlink:href="#joms-icon-images"></use></svg> ' + (null == (b = a.language.photo.upload_button) ? "" : b) + ' </div> </div> <div class=joms-postbox-photo> <div class=joms-postbox-preview></div> <div class=joms-postbox-inputbox></div> <nav class="joms-postbox-tab selected"> <ul class="joms-list inline"> <li data-tab=upload data-bypass=1><svg viewBox="0 0 16 18" class="joms-icon"><use xlink:href="#joms-icon-images"></use></svg> <span class=visible-desktop>' + (null == (b = a.language.photo.upload_button_more) ? "" : b) + '</span></li> <li data-tab=mood><svg viewBox="0 0 16 18" class="joms-icon"><use xlink:href="#joms-icon-smiley"></use></svg> <span class=visible-desktop>' + (null == (b = a.language.status.mood) ? "" : b) + "</span></li> </ul> <div class=joms-postbox-action> <button class=joms-postbox-cancel>" + (null == (b = a.language.postbox.cancel_button) ? "" : b) + "</button> <button class=joms-postbox-save>" + (null == (b = a.language.postbox.post_button) ? "" : b) + '</button> </div> <div class=joms-postbox-loading style="display:none;"> <img src="' + (null == (b = a.juri.root) ? "" : b) + 'components/com_community/assets/ajax-loader.gif" alt="loader"> </div> </nav> </div> </div>'
        }, this.joms.jst["html/postbox/status"] = function(a) {
            var b, c = "";
            _.escape, Array.prototype.join;
            return c += '<div class=joms-postbox-status> <div class=joms-postbox-fetched></div> <div class=joms-postbox-inputbox></div> <nav class="joms-postbox-tab selected"> <ul class="joms-list inline"> <li data-tab=mood><svg viewBox="0 0 16 18" class="joms-icon"><use xlink:href="#joms-icon-smiley"></use></svg></li> <li data-tab=location><svg viewBox="0 0 16 18" class="joms-icon"><use xlink:href="#joms-icon-location"></use></svg></li> <li data-tab=privacy><svg viewBox="0 0 16 18" class="joms-icon"><use xlink:href="#joms-icon-earth"></use></svg> </li> ', a.enablephoto && (c += ' <li data-tab=photo data-bypass=1><svg viewBox="0 0 16 18" class="joms-icon"><use xlink:href="#joms-icon-camera"></use></svg></li> '), c += " ", a.enablevideo && (c += ' <li data-tab=video data-bypass=1><svg viewBox="0 0 16 18" class="joms-icon"><use xlink:href="#joms-icon-play"></use></svg></li> '), c += " </ul> <div class=joms-postbox-action> <button class=joms-postbox-cancel>" + (null == (b = a.language.postbox.cancel_button) ? "" : b) + "</button> <button class=joms-postbox-save>" + (null == (b = a.language.postbox.post_button) ? "" : b) + '</button> </div> <div class=joms-postbox-loading style="display:none;"> <img src="' + (null == (b = a.juri.root) ? "" : b) + 'components/com_community/assets/ajax-loader.gif" alt="loader"> <div> </nav> </div>'
        }, this.joms.jst["html/postbox/video-item"] = function(a) {
            var b, c = "";
            _.escape;
            return c += '<li class=joms-postbox-photo-item> <img width=128 height=128 src="' + (null == (b = a.src) ? "" : b) + '"> <div class=joms-postbox-photo-action> <span class=joms-postbox-photo-setting><i class=joms-icon-cog></i></span> <span class=joms-postbox-photo-remove><i class=joms-icon-remove></i></span> </div> </li>'
        }, this.joms.jst["html/postbox/video"] = function(a) {
            var b, c = "";
            _.escape, Array.prototype.join;
            return c += '<div> <div id=joms-postbox-video-upload style="position:absolute;top:0;left:0;width:1px;height:1px;overflow:hidden"> <button id=joms-postbox-video-upload-btn>Upload</button> </div> ', a && a.enable_upload && (c += ' <div class="joms-postbox-inner-panel joms-initial-panel"> <div class=joms-postbox-double-panel> <ul class="joms-list clearfix"> <li class=joms-postbox-video-url data-action=share><svg viewBox="0 0 16 18" class="joms-icon"><use xlink:href="#joms-icon-link"></use></svg> ' + (null == (b = a.language.video.share_button) ? "" : b) + '</li> <li class=joms-postbox-video-upload data-action=upload><svg viewBox="0 0 16 18" class="joms-icon"><use xlink:href="#joms-icon-box-add"></use></svg> ' + (null == (b = a.language.video.upload_button) ? "" : b) + " ", a && a.video_maxsize > 0 && (c += " <span>" + (null == (b = a.language.video.upload_maxsize) ? "" : b) + " " + (null == (b = a.video_maxsize) ? "" : b) + "mb</span> "), c += " </li> </ul> </div> </div> "), c += ' <div class=joms-postbox-video> <div class=joms-postbox-video-state-url style="display:none"> <div class=joms-postbox-inner-panel> <div class=joms-postbox-url></div> <div class=joms-postbox-fetched></div> </div> </div> ', a && a.enable_upload && (c += ' <div class=joms-postbox-video-state-upload style="display:none"> <div class=joms-postbox-inner-panel> <div class=joms-postbox-url></div> <div style="padding-top: 3px;"> <div class=joms-postbox-photo-progressbar style="position:relative;top:auto;bottom:auto;left:auto;right:auto;background-color:#eee;"> <div class=joms-postbox-photo-progress style="width:0"></div> </div> </div> <div style="padding-top: 10px;"> <div class="joms-fetched-category joms-select" style="padding:3px 0"></div> </div> </div> </div> '), c += ' <div class=joms-postbox-inputbox></div> <nav class="joms-postbox-tab selected"> <ul class="joms-list inline"> <li data-tab=mood><svg viewBox="0 0 16 18" class="joms-icon"><use xlink:href="#joms-icon-smiley"></use></svg> <span class=visible-desktop>' + (null == (b = a.language.status.mood) ? "" : b) + '</span></li> <li data-tab=location><svg viewBox="0 0 16 18" class="joms-icon"><use xlink:href="#joms-icon-location"></use></svg> <span class=visible-desktop>' + (null == (b = a.language.video.location) ? "" : b) + '</span></li> <li data-tab=privacy><svg viewBox="0 0 16 18" class="joms-icon"><use xlink:href="#joms-icon-earth"></use></svg> <span class=visible-desktop></span></li> </ul> <div class=joms-postbox-action> <button class=joms-postbox-cancel>' + (null == (b = a.language.postbox.cancel_button) ? "" : b) + "</button> <button class=joms-postbox-save>" + (null == (b = a.language.postbox.post_button) ? "" : b) + '</button> </div> <div class=joms-postbox-loading style="display:none;"> <img src="' + (null == (b = a.juri.root) ? "" : b) + 'components/com_community/assets/ajax-loader.gif" alt="loader"> <div> </nav> </div> </div>'
        }, this.joms.jst["html/widget/select-album"] = function(a) {
            var b, c = "";
            _.escape, Array.prototype.join;
            if (c += "<span>" + (null == (b = a.placeholder || "") ? "" : b) + '</span> <ul class=joms-list style="display:none;"> ', a.options && a.options.length)
                for (var d = 0; d < a.options.length; d++) c += ' <li data-value="' + (null == (b = a.options[d][0]) ? "" : b) + '"> <p style="margin:0">' + (null == (b = a.options[d] && a.options[d][1] || "-") ? "" : b) + '</p> <small><i class="joms-icon-' + (null == (b = a.options[d] && a.options[d][3] ? "" + a.options[d][3] : "globe") ? "" : b) + '"></i> ' + (null == (b = a.options[d] && a.options[d][2] ? "" + a.options[d][2] : "-") ? "" : b) + "</small> </li> ";
            return c += ' </ul><svg viewBox="0 0 16 18" class="joms-icon"><use xlink:href="#joms-icon-arrow-down"></use></svg>'
        }, this.joms.jst["html/widget/select-form"] = function(a) {
            var b, c = "";
            _.escape, Array.prototype.join;
            if (c += "<span>" + (null == (b = a.placeholder || "") ? "" : b) + '</span> <ul class=joms-list style="display:none;"> ', a.options && a.options.length)
                for (var d = 0; d < a.options.length; d++) c += ' <li data-value="' + (null == (b = a.options[d][0]) ? "" : b) + '">' + (null == (b = a.options[d][1]) ? "" : b) + "</li> ";
            return c += " </ul> <div>abc</div>"
        }, this.joms.jst["html/widget/select"] = function(a) {
            var b, c = "";
            _.escape, Array.prototype.join;
            if (c += "<span>" + (null == (b = a.placeholder || "") ? "" : b) + '</span> <ul class=joms-list style="display:none;"> ', a.options && a.options.length)
                for (var d = 0; d < a.options.length; d++) c += ' <li data-value="' + (null == (b = a.options[d][0]) ? "" : b) + '">' + (null == (b = a.options[d][1]) ? "" : b) + "</li> ";
            return c += ' </ul><svg viewBox="0 0 16 18" class="joms-icon"><use xlink:href="#joms-icon-arrow-down"></use></svg>'
        }, joms || (joms = {}), joms.map = {
            queue: [],
            execute: function(a) {
                return window.google && window.google.maps && window.google.maps.places ? void a() : joms.map.loading ? void joms.map.queue.push(a) : (joms.map.loading = !0, joms.map.queue.push(a), void joms.map.loadScript())
            },
            loadScript: function() {
                var a = document.createElement("script");
                a.type = "text/javascript", a.src = "//maps.googleapis.com/maps/api/js?libraries=places&sensor=false&callback=joms.map.loadScriptCallback", document.body.appendChild(a)
            },
            loadScriptCallback: function() {
                if (joms.map.queue && joms.map.queue.length)
                    for (; joms.map.queue.length;) joms.map.queue.shift()();
                joms.map.loading = !1
            }
        },
        function() {
            var requirejs, require, define;
            ! function(a) {
                function b(a, b) {
                    return r.call(a, b)
                }

                function c(a, b) {
                    var c, d, e, f, g, h, i, j, k, l, m, n = b && b.split("/"),
                        o = p.map,
                        q = o && o["*"] || {};
                    if (a && "." === a.charAt(0))
                        if (b) {
                            for (n = n.slice(0, n.length - 1), a = a.split("/"), g = a.length - 1, p.nodeIdCompat && t.test(a[g]) && (a[g] = a[g].replace(t, "")), a = n.concat(a), k = 0; k < a.length; k += 1)
                                if (m = a[k], "." === m) a.splice(k, 1), k -= 1;
                                else if (".." === m) {
                                if (1 === k && (".." === a[2] || ".." === a[0])) break;
                                k > 0 && (a.splice(k - 1, 2), k -= 2)
                            }
                            a = a.join("/")
                        } else 0 === a.indexOf("./") && (a = a.substring(2));
                    if ((n || q) && o) {
                        for (c = a.split("/"), k = c.length; k > 0; k -= 1) {
                            if (d = c.slice(0, k).join("/"), n)
                                for (l = n.length; l > 0; l -= 1)
                                    if (e = o[n.slice(0, l).join("/")], e && (e = e[d])) {
                                        f = e, h = k;
                                        break
                                    }
                            if (f) break;
                            !i && q && q[d] && (i = q[d], j = k)
                        }!f && i && (f = i, h = j), f && (c.splice(0, h, f), a = c.join("/"))
                    }
                    return a
                }

                function d(b, c) {
                    return function() {
                        return k.apply(a, s.call(arguments, 0).concat([b, c]))
                    }
                }

                function e(a) {
                    return function(b) {
                        return c(b, a)
                    }
                }

                function f(a) {
                    return function(b) {
                        n[a] = b
                    }
                }

                function g(c) {
                    if (b(o, c)) {
                        var d = o[c];
                        delete o[c], q[c] = !0, j.apply(a, d)
                    }
                    if (!b(n, c) && !b(q, c)) throw new Error("No " + c);
                    return n[c]
                }

                function h(a) {
                    var b, c = a ? a.indexOf("!") : -1;
                    return c > -1 && (b = a.substring(0, c), a = a.substring(c + 1, a.length)), [b, a]
                }

                function i(a) {
                    return function() {
                        return p && p.config && p.config[a] || {}
                    }
                }
                var j, k, l, m, n = {},
                    o = {},
                    p = {},
                    q = {},
                    r = Object.prototype.hasOwnProperty,
                    s = [].slice,
                    t = /\.js$/;
                l = function(a, b) {
                    var d, f = h(a),
                        i = f[0];
                    return a = f[1], i && (i = c(i, b), d = g(i)), i ? a = d && d.normalize ? d.normalize(a, e(b)) : c(a, b) : (a = c(a, b), f = h(a), i = f[0], a = f[1], i && (d = g(i))), {
                        f: i ? i + "!" + a : a,
                        n: a,
                        pr: i,
                        p: d
                    }
                }, m = {
                    require: function(a) {
                        return d(a)
                    },
                    exports: function(a) {
                        var b = n[a];
                        return "undefined" != typeof b ? b : n[a] = {}
                    },
                    module: function(a) {
                        return {
                            id: a,
                            uri: "",
                            exports: n[a],
                            config: i(a)
                        }
                    }
                }, j = function(c, e, h, i) {
                    var j, k, p, r, s, t, u = [],
                        v = typeof h;
                    if (i = i || c, "undefined" === v || "function" === v) {
                        for (e = !e.length && h.length ? ["require", "exports", "module"] : e, s = 0; s < e.length; s += 1)
                            if (r = l(e[s], i), k = r.f, "require" === k) u[s] = m.require(c);
                            else if ("exports" === k) u[s] = m.exports(c), t = !0;
                        else if ("module" === k) j = u[s] = m.module(c);
                        else if (b(n, k) || b(o, k) || b(q, k)) u[s] = g(k);
                        else {
                            if (!r.p) throw new Error(c + " missing " + k);
                            r.p.load(r.n, d(i, !0), f(k), {}), u[s] = n[k]
                        }
                        p = h ? h.apply(n[c], u) : void 0, c && (j && j.exports !== a && j.exports !== n[c] ? n[c] = j.exports : p === a && t || (n[c] = p))
                    } else c && (n[c] = h)
                }, requirejs = require = k = function(b, c, d, e, f) {
                    if ("string" == typeof b) return m[b] ? m[b](c) : g(l(b, c).f);
                    if (!b.splice) {
                        if (p = b, p.deps && k(p.deps, p.callback), !c) return;
                        c.splice ? (b = c, c = d, d = null) : b = a
                    }
                    return c = c || function() {}, "function" == typeof d && (d = e, e = f), e ? j(a, b, c, d) : setTimeout(function() {
                        j(a, b, c, d)
                    }, 4), k
                }, k.config = function(a) {
                    return k(a)
                }, requirejs._defined = n, define = function(a, c, d) {
                    c.splice || (d = c, c = []), b(n, a) || b(o, a) || (o[a] = [a, c, d])
                }, define.amd = {
                    jQuery: !0
                }
            }(), define("libs/almond", function() {}), define("sandbox", [], function() {
                function a(a, c) {
                    return b(a, c)
                }
                var b = window.joms.jQuery,
                    c = window.joms._,
                    d = window.joms.Backbone;
                d.$ = b, c.pick(c, ["each", "map", "filter", "union", "intersection", "without", "bind", "debounce", "defer", "keys", "extend", "pick", "omit", "isArray", "isNumber", "isString", "isUndefined", "uniqueId"]), c.extend(a, d.Events, c, {
                    mvc: {
                        Model: d.Model,
                        Models: d.Collection,
                        View: d.View
                    },
                    ajax: b.ajax,
                    param: b.param,
                    noop: function() {}
                }), a.__extend = a.extend, a._$extend = b.extend, a.extend = function() {
                    var b = arguments[0] === !0;
                    return a[b ? "_$extend" : "__extend"].apply(null, arguments)
                }, a.ua = navigator.userAgent;
                var e = a.ua.toLowerCase();
                return a.mobile = !!e.match(/android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i), a.webkit = !!e.match(/webkit/i), a.ie = !!e.match(/msie/i), a.ieVersion = a.ie && +e.match(/msie (\d+)\./i)[1], a.xpriment = !a.ie && 1, a(document.body).on("click", function(b) {
                    a.trigger("click", a(b.target))
                }), a
            }), define("views/base", ["sandbox"], function(a) {
                return a.mvc.View.extend({
                    assign: function(b, c) {
                        a.isArray(b) || (b = [
                            [b, c]
                        ]), a.each(b, function(a) {
                            a[1].setElement(a[0]).render()
                        })
                    },
                    show: function() {
                        this.isHidden() && (this.$el.show(), this.trigger("show"))
                    },
                    hide: function() {
                        this.isHidden() || (this.$el.hide(), this.trigger("hide"))
                    },
                    toggle: function() {
                        this.isHidden() ? this.show() : this.hide()
                    },
                    isHidden: function() {
                        return "none" === this.el.style.display
                    }
                })
            }), define("app", [], function() {
                var a;
                return a = window.joms_script_url || "", a = a.replace(/js\/$/, ""), {
                    staticUrl: a,
                    legacyUrl: a + "../../"
                }
            }), define("utils/ajax", ["sandbox"], function(a) {
                function b(b) {
                    return b = a.extend({}, d, b || {}), b.url = window.jax_live_site, b.data = c(b.fn, b.data), a.ajax(b)
                }

                function c(b, c) {
                    var d = {};
                    d.option = "community", d.no_html = 1, d.task = "azrul_ajax", d.func = b, d[window.jax_token_var] = 1, a.isArray(c) || (c = []);
                    for (var e, f = 0; f < c.length; f++) e = c[f], a.isString(e) && (e = e.replace(/"/g, "&quot;")), a.isArray(e) || (e = ["_d_", e]), d["arg" + (f + 2)] = JSON.stringify(e);
                    return d
                }
                var d = {
                    type: "post",
                    data: {},
                    dataType: "json",
                    error: a.noop,
                    success: a.noop,
                    complete: a.noop
                };
                return b
            }), define("utils/constants", ["sandbox"], function(a) {
                function b(b) {
                    if ("string" == typeof b && b.length) {
                        joms && joms.constants && (a.extend(!0, d, joms && joms.constants), delete joms.constants);
                        var c = d;
                        for (b = b.split("."); b.length;) c = c[b.shift()];
                        return c
                    }
                }

                function c(a, b) {
                    var c, e, f;
                    if ("string" == typeof a && a.length) {
                        for (c = d, e = a.split("."), f = a.length; e.length - 1;) a = e.shift(), c[a] || (c[a] = {}), c = c[a];
                        c[a] = b
                    }
                }
                var d = {};
                return {
                    get: b,
                    set: c
                }
            }), define("views/postbox/default", ["sandbox", "app", "views/base", "utils/ajax", "utils/constants"], function(a, b, c, d, e) {
                return c.extend({
                    subviews: {},
                    template: function() {
                        throw new Error("Method not implemented.")
                    },
                    events: {
                        "click li[data-tab]": "onToggleDropdown",
                        "click button.joms-postbox-cancel": "onCancel",
                        "click button.joms-postbox-save": "onPost"
                    },
                    initialize: function(a) {
                        a && a.single && (this.single = !0), this.subflags = {}, this.reset()
                    },
                    render: function() {
                        var a = this.getTemplate();
                        return this.$el.replaceWith(a), this.setElement(a), this.$tabs = this.$(".joms-postbox-tab"), this.$action = this.$(".joms-postbox-action").hide(), this.$loading = this.$(".joms-postbox-loading").hide(), this.$save = this.$(".joms-postbox-save").hide(), this
                    },
                    show: function() {
                        this.showInitialState(), c.prototype.show.apply(this)
                    },
                    showInitialState: function() {
                        this.reset(), this.$tabs.hide(), this.$action.hide(), this.$save.hide(), this.trigger("show:initial")
                    },
                    showMainState: function() {
                        this.$tabs.show(), this.$action.show(), this.trigger("show:main")
                    },
                    reset: function() {
                        this.data = {}, this.data.text = "", this.data.attachment = {};
                        for (var a in this.subflags) this.subviews[a].reset(), this.subviews[a].hide()
                    },
                    value: function(b) {
                        var c = a.extend({}, this.getStaticAttachment(), this.data.attachment);
                        return [this.data.text, b ? c : JSON.stringify(c)]
                    },
                    validate: a.noop,
                    onToggleDropdown: function(b) {
                        var c = a(b.currentTarget);
                        if (!c.data("bypass")) {
                            var d = c.data("tab");
                            if (this.subviews[d]) {
                                if (this.subflags[d] || this.initSubview(d), !this.subviews[d].isHidden()) return void this.subviews[d].hide();
                                for (var e in this.subflags) e !== d && this.subviews[e].hide();
                                this.subviews[d].show()
                            }
                        }
                    },
                    onCancel: function() {
                        b.postbox && b.postbox.value && (b.postbox.value = !1), this.saving || this.showInitialState()
                    },
                    onPost: function() {
                        if (!this.saving) {
                            var b = this.validate();
                            if (b) return void window.alert(b);
                            this.saving = !0, this.$loading.show();
                            var c = this,
                                e = this.value();
                            window.joms_filter_params && e.push(JSON.stringify(window.joms_filter_params)), d({
                                fn: "system,ajaxStreamAdd",
                                data: e,
                                success: a.bind(this.onPostSuccess, this),
                                complete: function() {
                                    c.$loading.hide(), c.saving = !1, c.showInitialState()
                                }
                            })
                        }
                    },
                    onPostSuccess: function(b) {
                        var c, d = this.parseResponse(b);
                        d && (c = a(".joms-stream__wrapper"), c.html(d), a.trigger("postbox:status"), window.joms && joms.view && joms.view.streams && joms.view.streams.start())
                    },
                    initSubview: function(a, b) {
                        var c = a.replace(/^./, function(a) {
                            return a.toUpperCase()
                        });
                        this.subflags[a] || (this.subviews[a] = new this.subviews[a](b), this.assign(this.getSubviewElement(), this.subviews[a]), this.listenTo(this.subviews[a], "init", this["on" + c + "Init"]), this.listenTo(this.subviews[a], "show", this["on" + c + "Show"]), this.listenTo(this.subviews[a], "hide", this["on" + c + "Hide"]), this.listenTo(this.subviews[a], "select", this["on" + c + "Select"]), this.listenTo(this.subviews[a], "remove", this["on" + c + "Remove"]), this.subflags[a] = !0)
                    },
                    getSubviewElement: function() {
                        var b = a("<div>").hide().appendTo(this.$el);
                        return b
                    },
                    parseResponse: function(b) {
                        var c, d, e = "activity-stream-container";
                        if (b.html) return b.html;
                        if (b && b.length)
                            for (var f = 0; f < b.length; f++) "__throwError" === b[f][1] && (d = b[f][3], window.alert(a.isArray(d) ? d.join(". ") : d)), c || b[f][1] !== e || (c = b[f][3]);
                        return c
                    },
                    getTemplate: function() {
                        var b = this.template({
                            juri: e.get("juri")
                        });
                        return a(b).hide()
                    },
                    getStaticAttachment: function() {
                        return this.staticAttachment ? this.staticAttachment : (this.staticAttachment = a.extend({}, e.get("postbox.attachment") || {}, {
                            type: ""
                        }), this.staticAttachment)
                    }
                })
            }), define("utils/image", [], function() {
                function a(a, b) {
                    this.images = [], this.loaded = [], this.processed = 0, this.callback = b, a && a.length || (a = []);
                    for (var c = /^(http:|https:)?\/\/([a-z0-9-]+\.)+[a-z]{2,7}\/.*$/i, d = 0; d < a.length; d++) a[d].match(c) && this.images.push(a[d])
                }

                function b(b, c) {
                    var d = new a(b, c);
                    d.load()
                }
                return a.prototype.load = function() {
                    if (!this.images || !this.images.length) return void this.callback([]);
                    for (var a, b = 0; b < this.images.length; b++) a = new Image, a.onload = this.onload, a.onerror = this.onerror, a.onabort = this.onabort, a.preloader = this, a.src = a._src = this.images[b]
                }, a.prototype.onload = function() {
                    this.preloader.loaded.push(this._src), this.preloader.oncomplete()
                }, a.prototype.onerror = function() {
                    this.preloader.oncomplete()
                }, a.prototype.onabort = function() {
                    this.preloader.oncomplete()
                }, a.prototype.oncomplete = function() {
                    var a, b = [];
                    if (this.processed++, this.processed >= this.images.length) {
                        for (a = 0; a < this.images.length; a++) this.loaded.indexOf(this.images[a]) > -1 && b.push(this.images[a]);
                        this.callback(b)
                    }
                }, {
                    preload: b
                }
            }), define("utils/language", ["sandbox"], function(a) {
                function b(b) {
                    if ("string" == typeof b && b.length) {
                        joms && joms.language && (a.extend(!0, c, joms && joms.language), delete joms.language);
                        var d = c;
                        for (b = b.split("."); b.length;) d = d[b.shift()];
                        return d
                    }
                }
                var c = {};
                return {
                    get: b
                }
            }), define("views/postbox/fetcher", ["sandbox", "views/base", "utils/ajax", "utils/image", "utils/language"], function(a, b, c, d, e) {
                return b.extend({
                    template: joms.jst["html/postbox/fetcher"],
                    events: {
                        "click .joms-fetched-close": "onClose",
                        "click .joms-fetched-field span": "onFocus",
                        "keyup .joms-fetched-field input": "onKeyup",
                        "keyup .joms-fetched-field textarea": "onKeyup",
                        "blur .joms-fetched-field input": "onBlur",
                        "blur .joms-fetched-field textarea": "onBlur",
                        "click .joms-fetched-previmg": "prevImage",
                        "click .joms-fetched-nextimg": "nextImage"
                    },
                    initialize: function() {
                        var a = e.get("fetch") || {};
                        this.titlePlaceholder = a.title_hint || "", this.descPlaceholder = a.description_hint || ""
                    },
                    fetch: function(b) {
                        var d = /^(|.*\s)((https?:\/\/|www\.)([a-z0-9-]+\.)+[a-z]{2,7}(:\d+)?(\/.*)?)(\s.*|)$/i,
                            e = b.match(d);
                        !this.fetching && e && (b = e[2], this.fetching = !0, this.fetched = !1, delete this.url, this.trigger("fetch:start"), c({
                            fn: "system,ajaxGetFetchUrl",
                            data: [b],
                            success: a.bind(this.render, this),
                            complete: a.noop
                        }))
                    },
                    render: function(b) {
                        b || (b = {}), this.fetched = !0, this.url = b.url || "";
                        var c = {
                            title: b.title || "",
                            titlePlaceholder: this.titlePlaceholder,
                            description: b.description || "",
                            descPlaceholder: this.descPlaceholder,
                            image: (b.image || []).concat(b["og:image"] || []),
                            lang: {
                                prev: (e.get("prev") || "").toLowerCase(),
                                next: (e.get("next") || "").toLowerCase(),
                                cancel: (e.get("cancel") || "").toLowerCase()
                            }
                        };
                        this.url.match(/^https?:\/\//i) || (this.url = "http://" + this.url);
                        for (var f = 0; f < c.image.length; f++) c.image[f].match(/^(http:|https:)?\/\//i) || (c.image[f] = "//" + c.image[f]);
                        d.preload(c.image, a.bind(function(a) {
                            c.image = a, this.$el.html(this.template(c)), this.$images = this.$(".joms-fetched-images").find("img"), this.$title = this.$(".joms-fetched-title").find("input"), this.$description = this.$(".joms-fetched-description").find("textarea"), this.fetching = !1, this.trigger("fetch:done")
                        }, this))
                    },
                    change: function(b) {
                        var c = a(b),
                            d = c.prev("span"),
                            e = c.val().replace(/^\s+|\s+$/g, "");
                        e || (e = c.parent().hasClass("joms-fetched-title") ? this.titlePlaceholder : this.descPlaceholder), c.hide(), d.text(e).show()
                    },
                    remove: function() {
                        delete this.url, b.prototype.remove.apply(this), this.trigger("remove")
                    },
                    prevImage: function() {
                        var a = this.$images.filter(":visible"),
                            b = a.prev();
                        b.length && (a.hide(), b.show())
                    },
                    nextImage: function() {
                        var a = this.$images.filter(":visible"),
                            b = a.next();
                        b.length && (a.hide(), b.show())
                    },
                    value: function() {
                        return !this.fetching && this.url ? [this.url, this.$images && this.$images.filter(":visible").attr("src"), this.$title && this.escapeValue(this.$title.val()), this.$description && this.escapeValue(this.$description.val())] : void 0
                    },
                    onClose: function() {
                        this.remove()
                    },
                    onFocus: function(b) {
                        var c = a(b.currentTarget),
                            d = c.next("input,textarea");
                        c.hide(), d.show(), setTimeout(function() {
                            d[0].focus()
                        }, 300)
                    },
                    onKeyup: function(a) {
                        13 === a.keyCode && this.change(a.currentTarget)
                    },
                    onBlur: function(a) {
                        this.change(a.currentTarget)
                    },
                    parseResponse: function(a) {
                        if (a = a && a[2] && a[2][3] && a[2][3][0] || !1) {
                            var b;
                            try {
                                b = JSON.parse(a)
                            } catch (c) {}
                            return b
                        }
                    },
                    escapeValue: function(a) {
                        return "string" != typeof a ? a : a.replace(/\\/g, "&#92;").replace(/\t/g, "\\t").replace(/\n/g, "\\n").replace(/&quot;/g, '"')
                    }
                })
            }), define("views/inputbox/base", ["sandbox", "views/base", "utils/constants"], function(a, b, c) {
                return b.extend({
                    events: {
                        "focus textarea": "onFocus",
                        "keydown textarea": "onKeydownProxy",
                        "input textarea": "onInput",
                        "paste textarea": "onPaste",
                        "blur textarea": "onBlur"
                    },
                    initialize: function(b) {
                        a.mobile || (this.onInput = this.onKeydown, this.onKeydownProxy = this.onKeydown, this.updateCharCounterProxy = this.updateCharCounter), b || (b = {}), this.flags = {}, this.flags.attachment = b.attachment, this.flags.charcount = b.charcount, this.listenTo(a, "postbox:tab:change", this.reset)
                    },
                    render: function() {
                        this.$mirror = this.$("span.input"), this.$textarea = this.$("textarea.input"), this.placeholder = this.$textarea.attr("placeholder"), this.flags.attachment && (this.$attachment = a("<span class=attachment>").insertAfter(this.$mirror)), this.reset()
                    },
                    set: function(a) {
                        this.$textarea.val(a), this.flags.attachment && this.updateAttachment(), this.flags.charcount && this.updateCharCounterProxy(), this.onKeydownProxy()
                    },
                    reset: function() {
                        this.$textarea.val(""), this.flags.attachment && this.updateAttachment(), this.flags.charcount && this.updateCharCounterProxy(), this.onKeydownProxy()
                    },
                    value: function() {
                        var a = this.$textarea[0],
                            b = a.joms_hidden ? a.joms_hidden.val() : a.value;
                        return b.replace(/\t/g, "\\t").replace(/%/g, "%25")
                    },
                    onFocus: function() {
                        this.trigger("focus")
                    },
                    onKeydown: function(b) {
                        "undefined" == typeof this.maxchar && (this.maxchar = +c.get("conf.statusmaxchar") || 0);
                        var d = this.value();
                        if (d.length >= this.maxchar && this.isPrintable(b)) return void b.preventDefault();
                        var e = this;
                        a.defer(function() {
                            e.updateInput(b)
                        })
                    },
                    onKeydownProxy: a.debounce(function(a) {
                        this.onKeydown(a)
                    }, 10),
                    onInput: function() {
                        this.onKeydownProxy()
                    },
                    onPaste: function() {
                        var a = this;
                        this.onKeydownProxy(function() {
                            a.trigger("paste", a.$textarea[0].value, 13)
                        })
                    },
                    onBlur: function() {
                        this.trigger("blur", this.$textarea[0].value, 13)
                    },
                    updateInput: function(a) {
                        var b = a && a.keyCode || !1,
                            d = this.$textarea[0],
                            e = d.value,
                            f = "" === e.replace(/^\s+|\s+$/g, "");
                        f && (d.value = e = ""), "undefined" == typeof this.maxchar && (this.maxchar = +c.get("conf.statusmaxchar") || 0), e.length > this.maxchar && (d.value = e = e.substr(0, this.maxchar)), this.$mirror.html(this.normalize(e) + "."), this.$textarea.css("height", this.$mirror.height()), this.flags.charcount && this.updateCharCounterProxy(), this.trigger("keydown", e, b), "function" == typeof a && a()
                    },
                    updateAttachment: a.noop,
                    updateCharCounterProxy: a.debounce(function() {
                        this.updateCharCounter()
                    }, 300),
                    updateCharCounter: function() {
                        return "undefined" == typeof this.maxchar && (this.maxchar = +c.get("conf.statusmaxchar") || 0), this.$charcount || (this.$charcount = this.$(".charcount")), !this.maxchar || this.maxchar <= 0 ? void this.$charcount.hide() : void this.$charcount.html(this.maxchar - this.$textarea[0].value.length).show()
                    },
                    isPrintable: function(a) {
                        if (!a) return !1;
                        if ((a.crtlKey || a.metaKey) && !a.altKey && !a.shiftKey) return !1;
                        var b = a && a.keyCode,
                            c = 13 === b || 32 === b || b > 47 && 58 > b || b > 64 && 91 > b || b > 95 && 112 > b || b > 185 && 193 > b || b > 218 && 223 > b;
                        return c
                    },
                    normalize: function(a) {
                        return a.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/\n/g, "<br>")
                    },
                    resetTextntags: function(b, c) {
                        try {
                            b = a(b), b.removeData("joms-tagging"), b.val(c).jomsTagging(), b.data("joms-tagging").initialize()
                        } catch (d) {}
                    }
                })
            }), define("views/inputbox/status", ["sandbox", "views/inputbox/base", "utils/constants", "utils/language"], function(a, b, c, d) {
                return b.extend({
                    template: joms.jst["html/inputbox/status"],
                    initialize: function() {
                        var a, d, e, f;
                        if (b.prototype.initialize.apply(this, arguments), this.moods = c.get("moods"), a = {}, this.moods && this.moods.length)
                            for (f = 0; f < this.moods.length; f++) e = this.moods[f].id, d = [e, this.moods[f].description], this.moods[f].custom && (d[2] = this.moods[f].image), a[e] = d;
                        this.moods = a
                    },
                    render: function() {
                        var a = this.getTemplate();
                        this.$el.replaceWith(a), this.setElement(a), b.prototype.render.apply(this, arguments)
                    },
                    set: function(a) {
                        this.resetTextntags(this.$textarea, a), this.flags.attachment && this.updateAttachment(!1, !1), this.flags.charcount && this.updateCharCounterProxy(), this.onKeydownProxy()
                    },
                    reset: function() {
                        this.resetTextntags(this.$textarea, ""), this.flags.attachment && this.updateAttachment(!1, !1), this.flags.charcount && this.updateCharCounterProxy(), this.onKeydownProxy()
                    },
                    value: function() {
                        var a = this.$textarea[0],
                            b = a.joms_hidden ? a.joms_hidden.val() : a.value;
                        return b.replace(/\t/g, "\\t").replace(/%/g, "%25")
                    },
                    updateInput: function() {
                        b.prototype.updateInput.apply(this, arguments)
                    },
                    updateAttachment: function(a, b) {
                        var c = [];
                        return this.mood = a || a === !1 ? a : this.mood, this.location = b || b === !1 ? b : this.location, this.location && this.location.name && c.push("<b>" + d.get("at") + " " + this.location.name + "</b>"), this.mood && this.moods[this.mood] && ("undefined" != typeof this.moods[this.mood][2] ? c.push('<img class="joms-emoticon" src="' + this.moods[this.mood][2] + '"> <b>' + this.moods[this.mood][1] + "</b>") : c.push('<i class="joms-emoticon joms-emo-' + this.mood + '"></i> <b>' + this.moods[this.mood][1] + "</b>")), c.length ? (this.$attachment.html(" &nbsp;&mdash; " + c.join(" and ") + "."), void this.$textarea.removeAttr("placeholder")) : (this.$attachment.html(""), void this.$textarea.attr("placeholder", this.placeholder))
                    },
                    getTemplate: function() {
                        var b = d.get("status.status_hint") || "",
                            c = this.template({
                                placeholder: b
                            });
                        return a(c)
                    }
                })
            }), define("views/dropdown/base", ["sandbox", "views/base"], function(a, b) {
                return b.extend({
                    initialize: function() {
                        this.listenTo(a, "click", this._onDocumentClick)
                    },
                    _onDocumentClick: function(a) {
                        a.closest(".joms-postbox").length || this.hide()
                    }
                })
            }), define("views/dropdown/mood", ["sandbox", "views/dropdown/base", "utils/constants", "utils/language"], function(a, b, c, d) {
                return b.extend({
                    template: joms.jst["html/dropdown/mood"],
                    events: {
                        "click li": "onSelect",
                        "click .joms-remove-button": "onRemove"
                    },
                    render: function() {
                        var b, e, f, g, h, i, j;
                        if (this.moods = c.get("moods"), b = [], e = {}, this.moods && this.moods.length)
                            for (j = 0; j < this.moods.length; j++) f = this.moods[j].id, g = [f, this.moods[j].title], this.moods[j].custom && (g[2] = this.moods[j].image), b.push(g), e[f] = g;
                        return this.moods = e, h = this.template({
                            items: b,
                            language: {
                                status: d.get("status") || {}
                            }
                        }), i = a(h).hide(), this.$el.replaceWith(i), this.setElement(i), this.$btnremove = this.$(".joms-remove-button").hide(), this
                    },
                    select: function(a) {
                        this.moods[a] && (this.$btnremove.show(), this.trigger("select", this.mood = a))
                    },
                    value: function() {
                        return this.mood
                    },
                    reset: function() {
                        this.mood = !1, this.$btnremove.hide(), this.trigger("reset")
                    },
                    onSelect: function(b) {
                        var c = a(b.currentTarget),
                            d = c.attr("data-mood");
                        this.select(d), this.hide()
                    },
                    onRemove: function() {
                        this.mood = !1, this.$btnremove.hide(), this.trigger("remove")
                    }
                })
            }), define("views/dropdown/location", ["sandbox", "views/dropdown/base", "utils/language"], function(a, b, c) {
                var d = c.get("geolocation") || {};
                return b.extend({
                    template: {
                        div: joms.jst["html/dropdown/location"],
                        list: joms.jst["html/dropdown/location-list"]
                    },
                    placeholders: {
                        loading: d.loading || "",
                        loaded: d.loaded || "",
                        error: d.error || ""
                    },
                    initialize: function() {
                        b.prototype.initialize.apply(this), this.location = !1, this.locations = {}, this.nearbyLocations = !1, this.listenTo(a, "postbox:tab:change", this.onRemove)
                    },
                    events: {
                        "keyup input.joms-postbox-keyword": "onKeyup",
                        "click li": "onSelect",
                        "click button.joms-add-location": "onAdd",
                        "click button.joms-remove-location": "onRemove"
                    },
                    render: function() {
                        this.$el.html(this.getTemplate()), this.$keyword = this.$(".joms-postbox-keyword"), this.$list = this.$(".joms-postbox-locations"), this.$map = this.$(".joms-postbox-map"), this.$btnadd = this.$(".joms-add-location").hide(), this.$btnremove = this.$(".joms-remove-location").hide(), this.$keyword.attr("placeholder", this.placeholders.loading);
                        var a = this;
                        return this.getService(function() {
                            a.setInitialLocation = !0, a.searchLocation()
                        }), this
                    },
                    show: function() {
                        this.$el.show(), this.trigger("show")
                    },
                    hide: function() {
                        this.$el.hide(), this.trigger("hide")
                    },
                    toggle: function() {
                        var a = "none" === this.el.style.display;
                        a ? this.show() : this.hide()
                    },
                    filter: function(a) {
                        return
                    },
                    draw: function(a) {
                        var b = this.template.list({
                            language: {
                                geolocation: c.get("geolocation")
                            },
                            items: a
                        });
                        this.filtered = a, this.$list.html(b).css({
                            height: "160px",
                            overflowY: "auto"
                        }), this.setInitialLocation && (this.setInitialLocation = !1, this.select(0))
                    },
                    select: function(a) {
                        var b = this.filtered[a];
                        b && (this.location = b, this.$map.show(), this.$keyword.val(b.name), this.map && this.marker && this.marker.setMap(this.map), this.showMap(b.latitude, b.longitude), this.$btnadd.show(), this.$btnremove.hide())
                    },
                    value: function() {
                        var a = [];
                        return this.location ? (a.push(this.location.name), a.push(this.location.latitude), a.push(this.location.longitude), a) : !1
                    },
                    reset: function() {
                        this.location = !1, this.marker && this.marker.setMap(null), this.$keyword.val(""), this.$btnadd.hide(), this.$btnremove.hide(), this.trigger("reset")
                    },
                    onKeyup: a.debounce(function() {
                        this.service && this.searchLocation()
                    }, 300),
                    onSelect: function(b) {
                        var c = a(b.currentTarget),
                            d = c.attr("data-index");
                        this.select(+d)
                    },
                    onAdd: function() {
                        this.location && (this.trigger("select", this.location), this.$btnadd.hide(), this.$btnremove.show(), this.hide())
                    },
                    onRemove: function() {
                        this.reset(), this.trigger("remove"), this.hide(), this.filter()
                    },
                    initMap: function(b, c) {
                        var d = a("<div>").prependTo(this.$map);
                        d.css("height", 110);
                        var e = {
                            center: new google.maps.LatLng(1, 1),
                            zoom: 14,
                            mapTypeId: google.maps.MapTypeId.ROADMAD,
                            mapTypeControl: !1,
                            disableDefaultUI: !0,
                            draggable: !1,
                            scaleControl: !1,
                            scrollwheel: !1,
                            navigationControl: !1,
                            streetViewControl: !1,
                            disableDoubleClickZoom: !0
                        };
                        this.map = new google.maps.Map(d[0], e), this.marker = new google.maps.Marker({
                            draggable: !1,
                            map: this.map
                        }), this.marker.setAnimation(null)
                    },
                    showMap: function(a, b) {
                        var c = new google.maps.LatLng(a, b);
                        this.marker.setPosition(c), this.map.panTo(c)
                    },
                    getService: function(a) {
                        var b;
                        "function" != typeof a && (a = function() {}), this.service ? a.call(this, this.service) : (b = this, joms.map.execute(function() {
                            b.initMap(), b.service = new google.maps.places.PlacesService(b.map), a.call(b, b.service)
                        }))
                    },
                    searchLocation: function() {
                        var a = this.$keyword.val().replace(/^\s+|\s+$/g, "");
                        this.$keyword.attr("placeholder", this.placeholders.loading), this.searchToken = (this.searchToken || 0) + 1, this[a ? "searchLocationQuery" : "searchLocationNearby"]({
                            query: a,
                            token: this.searchToken,
                            callback: this.searchLocationCallback
                        })
                    },
                    searchLocationQuery: function(b) {
                        var c;
                        return this.locations[b.query] ? void b.callback.apply(this, [this.locations[b.query], null, b]) : (c = this, void this.service.textSearch({
                            query: b.query
                        }, function(d, e) {
                            if (e !== google.maps.places.PlacesServiceStatus.OK) return void b.callback.apply(c, [null, c.placeholders.error, b]);
                            if (!a.isArray(d)) return void b.callback.apply(c, [null, c.placeholders.error, b]);
                            for (var f, g = 0, h = []; g < d.length; g++) f = d[g], h.push({
                                name: f.name,
                                latitude: f.geometry.location.lat(),
                                longitude: f.geometry.location.lng(),
                                vicinity: f.formatted_address
                            });
                            c.locations[b.query] = h, b.callback.apply(c, [c.locations[b.query], null, b])
                        }))
                    },
                    searchLocationNearby: function(a) {
                        var b = this;
                        navigator.geolocation.getCurrentPosition(function(c) {
                            b.detectLocationSuccess(c, a)
                        }, function() {
                            b.detectLocationFallback(a)
                        }, {
                            timeout: 1e4
                        })
                    },
                    searchLocationCallback: function(a, b, c) {
                        this.searchToken === c.token && (this.$keyword.attr("placeholder", this.placeholders.loaded), this.draw(a))
                    },
                    detectLocationSuccess: function(a, b) {
                        var c = a && a.coords || {},
                            d = c.latitude,
                            e = c.longitude;
                        d && e ? this.detectLocationNearby(d, e, b) : b.callback.apply(this, [null, this.placeholders.error, b])
                    },
                    detectLocationFallback: function(b) {
                        var c = !1,
                            d = this;
                        a.ajax({
                            url: "//freegeoip.net/json/",
                            dataType: "jsonp",
                            success: function(a) {
                                var e = a.latitude,
                                    f = a.longitude;
                                e && f && (c = !0, d.detectLocationNearby(e, f, b))
                            },
                            complete: function() {
                                c || b.callback.apply(d, [null, d.placeholders.error, b])
                            }
                        })
                    },
                    detectLocationNearby: function(b, c, d) {
                        var e, f, g;
                        return this.nearbyLocations ? void d.callback.apply(this, [this.nearbyLocations, null, d]) : (e = new google.maps.LatLng(b, c), f = {
                            location: e,
                            types: ["establishment"],
                            rankBy: google.maps.places.RankBy.DISTANCE
                        }, g = this, void this.service.nearbySearch(f, function(b, c) {
                            if (c !== google.maps.places.PlacesServiceStatus.OK) return void d.callback.apply(g, [null, g.placeholders.error, d]);
                            if (!a.isArray(b)) return void d.callback.apply(g, [null, g.placeholders.error, d]);
                            for (var e, f = 0, h = []; f < b.length; f++) e = b[f], h.push({
                                name: e.name,
                                latitude: e.geometry.location.lat(),
                                longitude: e.geometry.location.lng(),
                                vicinity: e.vicinity
                            });
                            g.nearbyLocations = h, d.callback.apply(g, [g.nearbyLocations, null, d])
                        }))
                    },
                    getTemplate: function() {
                        var a = this.template.div({
                            language: {
                                geolocation: c.get("geolocation") || {}
                            }
                        });
                        return a
                    }
                })
            }), define("views/dropdown/privacy", ["sandbox", "views/dropdown/base", "utils/language"], function(a, b, c) {
                return b.extend({
                    template: joms.jst["html/dropdown/privacy"],
                    events: {
                        "click li": "select"
                    },
                    privacies: {
                        "public": [10, "earth"],
                        site_members: [20, "users"],
                        friends: [30, "user"],
                        me: [40, "lock"]
                    },
                    privmaps: {
                        "public": "10",
                        site_members: "20",
                        friends: "30",
                        me: "40",
                        0: "public",
                        10: "public",
                        20: "site_members",
                        30: "friends",
                        40: "me"
                    },
                    initialize: function(d) {
                        b.prototype.initialize.apply(this), this.privkeys = a.keys(this.privacies), d && d.privacylist && d.privacylist.length && (this.privkeys = a.intersection(this.privkeys, d.privacylist));
                        var e = c.get("privacy") || {};
                        for (var f in this.privacies) this.privacies[f][2] = e[f] || f, this.privacies[f][3] = e[f + "_desc"] || f;
                        this.defaultPrivacy = this.privkeys[0], "undefined" != typeof d.defaultPrivacy && (d.defaultPrivacy = "" + d.defaultPrivacy, d.defaultPrivacy.match(/^\d+$/) && (d.defaultPrivacy = this.privmaps[d.defaultPrivacy] || this.defaultPrivacy), this.privkeys.indexOf(d.defaultPrivacy) >= 0 && (this.defaultPrivacy = d.defaultPrivacy))
                    },
                    render: function() {
                        for (var a, b = [], c = 0; c < this.privkeys.length; c++) a = this.privkeys[c], b[c] = [a, this.privacies[a][1], this.privacies[a][2], this.privacies[a][3]];
                        return this.$el.html(this.template({
                            items: b
                        })), this.setPrivacy(this.defaultPrivacy), this
                    },
                    select: function(b) {
                        var c = a(b.currentTarget),
                            d = c.attr("data-priv");
                        this.setPrivacy(d), this.hide()
                    },
                    setPrivacy: function(a) {
                        var b = {};
                        this.privkeys.indexOf(a) >= 0 && (this.privacy = this.privacies[a][0], b.icon = this.privacies[a][1], b.label = this.privacies[a][2].toLowerCase(), this.trigger("select", b))
                    },
                    value: function() {
                        return this.privacy
                    },
                    reset: function() {
                        this.setPrivacy(this.defaultPrivacy)
                    }
                })
            }), define("views/postbox/status", ["sandbox", "app", "views/postbox/default", "views/postbox/fetcher", "views/inputbox/status", "views/dropdown/mood", "views/dropdown/location", "views/dropdown/privacy", "utils/constants", "utils/language"], function(a, b, c, d, e, f, g, h, i, j) {
                return c.extend({
                    subviews: {
                        mood: f,
                        location: g,
                        privacy: h
                    },
                    template: joms.jst["html/postbox/status"],
                    events: a.extend({}, c.prototype.events, {
                        "click li[data-tab=photo]": "onAddPhoto",
                        "click li[data-tab=video]": "onAddVideo"
                    }),
                    initialize: function() {
                        var b = i.get("settings") || {};
                        (this.inheritPrivacy = b.isGroup || b.isEvent || !b.isMyProfile) && (this.subviews = a.omit(this.subviews, "privacy"));
                        var d = i.get("moods");
                        this.enableMood = +i.get("conf.enablemood") && d && d.length, this.enableMood || (this.subviews = a.omit(this.subviews, "mood")), this.enableLocation = +i.get("conf.enablelocation"), this.enableLocation || (this.subviews = a.omit(this.subviews, "location")), c.prototype.initialize.apply(this)
                    },
                    render: function() {
                        c.prototype.render.apply(this), this.$inputbox = this.$(".joms-postbox-inputbox"), this.$fetcher = this.$(".joms-postbox-fetched"), this.$tabmood = this.$tabs.find("[data-tab=mood]"), this.$tablocation = this.$tabs.find("[data-tab=location]"), this.$tabprivacy = this.$tabs.find("[data-tab=privacy]"), this.enableMood || this.$tabmood.remove(), this.enableLocation || this.$tablocation.remove(), this.inheritPrivacy && (this.$tabprivacy.next().length ? this.$tabprivacy.remove() : this.$tabprivacy.css({
                            visibility: "hidden"
                        })), this.inputbox = new e({
                            attachment: !0,
                            charcount: !0
                        }), this.assign(this.$inputbox, this.inputbox), this.listenTo(this.inputbox, "focus", this.onInputFocus), this.listenTo(this.inputbox, "keydown", this.onInputUpdate), this.listenTo(this.inputbox, "paste", this.onInputUpdate);
                        var b, d;
                        return this.inheritPrivacy || (d = i.get("settings") || {}, d.isProfile && d.isMyProfile && (b = i.get("conf.profiledefaultprivacy")), this.initSubview("privacy", {
                            privacylist: window.joms_privacylist,
                            defaultPrivacy: b || "public"
                        })), this.single && this.listenTo(a, "click", this.onDocumentClick), this
                    },
                    reset: function() {
                        c.prototype.reset.apply(this), this.inputbox && this.inputbox.reset(), this.fetcher && this.fetcher.remove()
                    },
                    value: function() {
                        this.data.text = this.inputbox.value() || "", this.data.attachment = {}, this.data.text = this.data.text.replace(/\n/g, "\\n");
                        var a;
                        for (var b in this.subflags)(a = this.subviews[b].value()) && (this.data.attachment[b] = a);
                        return this.fetcher && (this.data.attachment.fetch = this.fetcher.value()), c.prototype.value.apply(this, arguments)
                    },
                    validate: a.noop,
                    onInputFocus: function() {
                        this.showMainState()
                    },
                    onInputUpdate: function(a, b) {
                        a = a || "", this.togglePostButton(a), 32 === b || 13 === b ? this.fetch(a) : this.fetchProxy(a)
                    },
                    fetchProxy: a.debounce(function(a) {
                        this.fetch(a)
                    }, 1e3),
                    fetch: function(b) {
                        var c;
                        this.fetcher && (this.fetcher.fetching || this.fetcher.fetched) || (this.fetcher && this.fetcher.remove(), c = a("<div>").appendTo(this.$fetcher), this.fetcher = new d, this.fetcher.setElement(c), this.listenTo(this.fetcher, "fetch:start", this.onFetchStart), this.listenTo(this.fetcher, "fetch:done", this.onFetchDone), this.listenTo(this.fetcher, "remove", this.onFetchRemove), this.fetcher.fetch(b.replace(/^\s+|\s+$/g, "")))
                    },
                    onFetchStart: function() {
                        this.saving = !0, this.$loading.show()
                    },
                    onFetchDone: function() {
                        this.$loading.hide(), this.saving = !1
                    },
                    onFetchRemove: function() {
                        this.fetcher = !1
                    },
                    onDocumentClick: function(a) {
                        if (!a.closest(".joms-postbox").length) {
                            var b = this.inputbox.value();
                            b = b.replace(/^\s+|\s+$/g, ""), b || this.showInitialState()
                        }
                    },
                    onMoodSelect: function(a) {
                        this.inputbox.updateAttachment(a), this.togglePostButton()
                    },
                    onMoodRemove: function() {
                        this.inputbox.updateAttachment(!1), this.togglePostButton()
                    },
                    onLocationSelect: function(a) {
                        this.inputbox.updateAttachment(null, a), this.togglePostButton()
                    },
                    onLocationRemove: function() {
                        this.inputbox.updateAttachment(null, !1), this.togglePostButton()
                    },
                    onPrivacySelect: function(a) {
                        var b = this.$tabprivacy.find("use"),
                            c = b.attr("xlink:href");
                        c = c.replace(/#.+$/, "#joms-icon-" + a.icon), this.$tabprivacy.find("use").attr("xlink:href", c), this.$tabprivacy.find("span").html(a.label)
                    },
                    onAddPhoto: function() {
                        b.postbox || (b.postbox = {}), b.postbox.value = this.value(!0), b.postbox.value[0] = b.postbox.value[0].replace(/\\n/g, "\n"), a.trigger("postbox:photo")
                    },
                    onAddVideo: function() {
                        b.postbox || (b.postbox = {}), b.postbox.value = this.value(!0), b.postbox.value[0] = b.postbox.value[0].replace(/\\n/g, "\n"), a.trigger("postbox:video")
                    },
                    getTemplate: function() {
                        var b = i.get("settings") || {},
                            c = i.get("conf") || {},
                            d = !0,
                            e = !0;
                        (b.isProfile || b.isGroup || b.isEvent) && (c.enablephotos || (d = !1), c.enablevideos || (e = !1));
                        var f = this.template({
                            juri: i.get("juri"),
                            enablephoto: d,
                            enablevideo: e,
                            language: {
                                postbox: j.get("postbox") || {},
                                status: j.get("status") || {}
                            }
                        });
                        return a(f).hide()
                    },
                    getStaticAttachment: function() {
                        return this.staticAttachment ? this.staticAttachment : (this.staticAttachment = a.extend({}, i.get("postbox.attachment") || {}, {
                            type: "message"
                        }), this.staticAttachment)
                    },
                    togglePostButton: function(a) {
                        var b = !1;
                        a && (b = !0), !b && this.subflags.mood && (b = this.subviews.mood.value()), !b && this.subflags.location && (b = this.subviews.location.value()), this.$save[b ? "show" : "hide"]()
                    }
                })
            }), define("views/widget/select", ["sandbox", "views/base", "utils/language"], function(a, b, c) {
                return b.extend({
                    template: joms.jst["html/widget/select"],
                    events: {
                        "click span": "toggle",
                        "click li": "onSelect"
                    },
                    initialize: function(a) {
                        this.options = a.options || [], +a.width && (this.width = +a.width + "px")
                    },
                    render: function() {
                        var a = {};
                        a.options = this.options, a.width = this.width || !1, a.placeholder = c.get("select_category"), this.$el.html(this.template(a)), this.$span = this.$("span"), this.$ul = this.$("ul"), a.options && a.options.length > 6 && this.$ul.css({
                            height: "175px",
                            overflowY: "auto"
                        })
                    },
                    select: function(a, b) {
                        this.$span.html(b), this.$span.data("value", a), this.trigger("select", a, b)
                    },
                    toggle: function() {
                        this.$ul.toggle()
                    },
                    value: function() {
                        return this.$span.data("value")
                    },
                    reset: function() {
                        this.$ul && this.$ul.hide(), this.options && this.options.length && (this.$span.html(this.options[0][1]), this.$span.data("value", this.options[0][0]))
                    },
                    onSelect: function(b) {
                        var c = a(b.currentTarget),
                            d = c.data("value"),
                            e = c.html();
                        this.select(d, e), this.toggle()
                    }
                })
            }), define("views/widget/select-album", ["sandbox", "views/widget/select", "utils/language"], function(a, b, c) {
                return b.extend({
                    template: joms.jst["html/widget/select-album"],
                    render: function() {
                        var a = {};
                        a.options = this.options, a.width = this.width || !1, a.placeholder = c.get("select_category"), this.$el.html(this.template(a)), this.$span = this.$("span"), this.$ul = this.$("ul"), a.options && (a.options.length > 3 && this.$ul.css({
                            height: "160px",
                            overflowY: "auto"
                        }), a.options[0] && this.select(a.options[0][0], a.options[0][1]))
                    },
                    onSelect: function(b) {
                        var c = a(b.currentTarget),
                            d = c.data("value"),
                            e = c.find("p").html();
                        this.select(d, e), this.toggle()
                    }
                })
            }), define("views/postbox/photo-preview", ["sandbox", "app", "views/base", "views/widget/select-album", "utils/ajax", "utils/constants", "utils/language"], function(a, b, c, d, e, f, g) {
                return c.extend({
                    templates: {
                        div: joms.jst["html/postbox/photo-preview"],
                        img: joms.jst["html/postbox/photo-item"]
                    },
                    events: {
                        "click .joms-postbox-photo-remove": "onRemove"
                    },
                    render: function() {
                        this.$el.html(this.templates.div()), this.$list = this.$("ul"), this.$form = this.$("div.joms-postbox-photo-form")
                    },
                    add: function(c) {
                        this.$list.append(this.templates.img({
                            id: this.getFileId(c),
                            src: b.legacyUrl + "/assets/photo-upload-placeholder.png"
                        }));
                        var e = f.get("settings") || {};
                        if (e.isMyProfile && !this.select) {
                            var h = f.get("album"),
                                i = g.get("privacy"),
                                j = [],
                                k = {
                                    0: "public",
                                    10: "public",
                                    20: "site_members",
                                    30: "friends",
                                    40: "me"
                                },
                                l = {
                                    0: "earth",
                                    10: "public",
                                    20: "users",
                                    30: "user",
                                    40: "lock"
                                };
                            if (h && h.length) {
                                this.albummap = {};
                                for (var m, n, o = 0; o < h.length; o++) m = h[o], n = "" + m.permissions, this.albummap["" + m.id] = n, m = [m.id, m.name, i[k[n] || "0"], l[n || "0"]], j[+m["default"] ? "unshift" : "push"](m);
                                this.select = new d({
                                    options: j
                                });
                                var p = a('<div class="joms-postbox-select-album joms-select" style="padding:3px 0">').insertAfter(this.$form);
                                this.assign(p, this.select)
                            }
                        }
                    },
                    value: function() {
                        var a, b, c = f.get("settings") || {};
                        return b = {
                            id: this.pics || []
                        }, this.select && c.isMyProfile && (b.album_id = "" + this.select.value(), b.privacy = this.albummap[a]), b
                    },
                    updateProgress: function(a) {
                        var b, c = this.getFileId(a),
                            d = this.$list.find("#" + c).find(".joms-postbox-photo-progress");
                        d && d.length && (b = Math.min(100, Math.floor(a.loaded / a.size * 100)), d.stop().animate({
                            width: b + "%"
                        }))
                    },
                    setImage: function(a, b) {
                        b || (b = {});
                        var c = this.$list.find("#" + this.getFileId(a)),
                            d = f.get("juri.base") + b.thumbnail,
                            e = b.id;
                        c.find("img").attr("src", d).data("id", e), c.find("img").attr("style", "visibility:visible"), c.find(".joms-postbox-photo-action").show(), c.addClass("joms-postbox-photo-loaded"), c.find(".joms-postbox-photo-progressbar").remove(), this.pics || (this.pics = []), this.pics.push("" + e), this.trigger("update", this.pics.length)
                    },
                    removeFailed: function() {
                        this.$list.find(".joms-postbox-photo-item").not(".joms-postbox-photo-loaded").remove(), this.trigger("update", this.pics && this.pics.length || 0)
                    },
                    onRemove: function(b) {
                        var c, d = a(b.target).closest("li"),
                            e = d.find("img").data("id");
                        d.remove(), this.pics = a.without(this.pics, "" + e), c = this.pics.length, 0 >= c && this.select && this.select.remove(), this.ajaxRemove([e]), this.trigger("update", c)
                    },
                    remove: function() {
                        return this.pics && this.pics.length && this.ajaxRemove(this.pics), c.prototype.remove.apply(this, arguments)
                    },
                    ajaxRemove: function(b) {
                        var c = {};
                        c.option = "community", c.no_html = 1, c.task = "azrul_ajax", c.func = "system,ajaxDeleteTempImage", c[window.jax_token_var] = 1, b && b.length && (c["arg2[]"] = b), a.ajax({
                            url: window.jax_live_site,
                            type: "post",
                            dataType: "json",
                            data: c
                        })
                    },
                    getFileId: function(a) {
                        return "postbox-preview-" + a.id
                    }
                })
            }), define("views/inputbox/photo", ["sandbox", "views/inputbox/status", "utils/constants", "utils/language"], function(a, b, c, d) {
                return b.extend({
                    template: joms.jst["html/inputbox/photo"],
                    initialize: function() {
                        var a, e, f, g;
                        if (b.prototype.initialize.apply(this, arguments), this.hint = {
                                single: d.get("status.photo_hint") || "",
                                multiple: d.get("status.photos_hint") || ""
                            }, this.moods = c.get("moods"), a = {}, this.moods && this.moods.length)
                            for (g = 0; g < this.moods.length; g++) f = this.moods[g].id, e = [f, this.moods[g].description], this.moods[g].custom && (e[2] = this.moods[g].image), a[f] = e;
                        this.moods = a
                    },
                    reset: function() {
                        b.prototype.reset.apply(this, arguments), this.single()
                    },
                    single: function() {
                        this.hint.current = this.hint.single, this.$textarea.attr("placeholder") && this.$textarea.attr("placeholder", this.hint.current)
                    },
                    multiple: function() {
                        this.hint.current = this.hint.multiple, this.$textarea.attr("placeholder") && this.$textarea.attr("placeholder", this.hint.current)
                    },
                    updateAttachment: function(a) {
                        var b = [];
                        return this.mood = a || a === !1 ? a : this.mood, this.mood && this.moods[this.mood] && ("undefined" != typeof this.moods[this.mood][2] ? b.push('<img class="joms-emoticon" src="' + this.moods[this.mood][2] + '"> <b>' + this.moods[this.mood][1] + "</b>") : b.push('<i class="joms-emoticon joms-emo-' + this.mood + '"></i> <b>' + this.moods[this.mood][1] + "</b>")), b.length ? (this.$attachment.html(" &nbsp;&mdash; " + b.join(" and ") + "."), void this.$textarea.removeAttr("placeholder")) : (this.$attachment.html(""), void this.$textarea.attr("placeholder", this.hint.current))
                    },
                    getTemplate: function() {
                        var b = this.template({
                            placeholder: this.hint.current = this.hint.single
                        });
                        return a(b)
                    }
                })
            }), define("utils/uploader", ["sandbox", "app"], function(a, b) {
                function c(a) {
                    if (this.queue = [], this.ready = !1, window.plupload) return this.ready = !0, void this.create(a);
                    var c = this;
                    joms.$LAB.script(b.legacyUrl + "assets/vendors/plupload.min.js").wait(function() {
                        c.ready = !0, c.create(a), c.execQueue()
                    })
                }
                joms.$LAB.script(b.legacyUrl + "assets/vendors/plupload.min.js");
                var d = {
                    runtimes: "html5,html4",
                    url: "index.php"
                };
                return c.prototype.create = function(b) {
                    var c, e = this.$button = b.browse_button,
                        f = !1;
                    "string" == typeof b.container ? (c = a("#" + b.container), c.length || (c = a('<div id="' + b.container + '" style="width:1px; height:1px; overflow:hidden">').appendTo(document.body))) : (c = a(b.container), (f = c.attr("id")) ? b.container = f : (b.container = f = a.uniqueId("uploader_parent_"), c.attr("id", f))), "string" == typeof e ? (this.$button = a("#" + e), this.$button.length || (this.$button = a('<button id="' + e + '">').appendTo(c))) : (f = e.attr("id")) ? this.$button = a(document.getElementById(f)) : (b.browse_button = f = a.uniqueId("uploader_"), e.attr("id", f)), this.onProgress = b.onProgress || a.noop, this.onAdded = b.onAdded || a.noop, b = a.extend({}, d, b || {}), this.uploader = new plupload.Uploader(b)
                }, c.prototype.init = function() {
                    return this.ready ? (this.uploader.init(), this.uploader.bind("FilesAdded", this.onAdded), this.uploader.bind("Error", this.onError), this.uploader.bind("BeforeUpload", this.onBeforeUpload), this.uploader.bind("UploadProgress", this.onProgress), this.uploader.bind("FileUploaded", this.onUploaded), void this.uploader.bind("UploadComplete", this.onComplete)) : void this.queue.push(["init", this, arguments])
                }, c.prototype.open = function() {
                    return this.ready ? void this.$button.click() : void this.queue.push(["open", this, arguments])
                }, c.prototype.reset = function() {
                    return this.ready ? void 0 : void this.queue.push(["reset", this, arguments])
                }, c.prototype.remove = function() {
                    return this.ready ? void 0 : void this.queue.push(["remove", this, arguments])
                }, c.prototype.params = function(a) {
                    this.uploader.settings.multipart_params = a
                }, c.prototype.upload = function() {
                    return this.ready ? void 0 : void this.queue.push(["upload", this, arguments])
                }, c.prototype.execQueue = function() {
                    for (var a; this.queue.length;) a = this.queue.shift(), this[a[0]].apply(a[1], a[2])
                }, c.prototype.onAdded = a.noop, c.prototype.onError = a.noop, c.prototype.onBeforeUpload = a.noop, c.prototype.onProgress = a.noop, c.prototype.onUploaded = a.noop, c.prototype.onComplete = a.noop, c
            }), define("views/postbox/photo", ["sandbox", "app", "views/postbox/default", "views/postbox/photo-preview", "views/inputbox/photo", "views/dropdown/mood", "views/widget/select", "utils/constants", "utils/language", "utils/uploader"], function(a, b, c, d, e, f, g, h, i, j) {
                return c.extend({
                    subviews: {
                        mood: f
                    },
                    template: joms.jst["html/postbox/photo"],
                    events: a.extend({}, c.prototype.events, {
                        "click .joms-postbox-photo-upload": "onPhotoAdd",
                        "click li[data-tab=upload]": "onPhotoAdd"
                    }),
                    initialize: function() {
                        var b = h.get("moods");
                        this.enableMood = +h.get("conf.enablemood") && b && b.length, this.enableMood || (this.subviews = a.omit(this.subviews, "mood")),
                            c.prototype.initialize.apply(this)
                    },
                    render: function() {
                        c.prototype.render.apply(this), this.$initial = this.$(".joms-postbox-inner-panel"), this.$main = this.$(".joms-postbox-photo"), this.$inputbox = this.$(".joms-postbox-inputbox"), this.$preview = this.$(".joms-postbox-preview"), this.$tabupload = this.$tabs.find("[data-tab=upload]"), this.$tabmood = this.$tabs.find("[data-tab=mood]"), this.enableMood || this.$tabmood.remove(), this.$uploader = this.$("#joms-postbox-photo-upload"), this.$uploaderParent = this.$uploader.parent(), this.inputbox = new e({
                            attachment: !0,
                            charcount: !0
                        }), this.assign(this.$inputbox, this.inputbox), this.listenTo(this.inputbox, "focus", this.onInputFocus);
                        var b = joms.BASE_URL + "index.php?option=com_community&view=photos&task=ajaxPreview",
                            d = h.get("settings") || {};
                        d.isGroup && (b += "&no_html=1&tmpl=component&groupid=" + (h.get("groupid") || "")), d.isEvent && (b += "&no_html=1&tmpl=component&eventid=" + (h.get("eventid") || "")), a.ie && (this.$uploader.appendTo(document.body), this.$uploader.show());
                        var f = +h.get("conf.maxuploadsize") || 0;
                        f && (f += "mb");
                        var g = {
                            container: "joms-postbox-photo-upload",
                            browse_button: "joms-postbox-photo-upload-btn",
                            url: b,
                            filters: [{
                                title: "Image files",
                                extensions: "jpg,jpeg,png,gif"
                            }],
                            max_file_size: f
                        };
                        return a.mobile || (g.resize = {
                            width: 2100,
                            height: 2100,
                            quality: 90
                        }), this.uploader = new j(g), this.uploader.onAdded = a.bind(this.onPhotoAdded, this), this.uploader.onError = a.bind(this.onPhotoError, this), this.uploader.onProgress = a.bind(this.onPhotoProgress, this), this.uploader.onUploaded = a.bind(this.onPhotoUploaded, this), this.uploader.init(), a.ie && (this.$uploader.hide(), this.$uploader.appendTo(this.$uploaderParent)), this
                    },
                    showInitialState: function() {
                        this.$main.hide(), this.$initial.show(), a.ie && a.ieVersion < 10 && this.ieUploadButtonFix(!0), this.inputbox && this.inputbox.single(), this.preview && this.preview.remove(), this.preview = !1, this.showMoreButton(), c.prototype.showInitialState.apply(this)
                    },
                    showMainState: function() {
                        c.prototype.showMainState.apply(this), this.$action.hide(), this.$initial.hide(), this.$main.show(), this.$save.show(), a.ie && a.ieVersion < 10 && this.ieUploadButtonFix(), b.postbox && b.postbox.value && b.postbox.value.length && (this.inputbox.set(b.postbox.value[0]), b.postbox.value = !1)
                    },
                    showMoreButton: function() {
                        this.$tabupload.show(), this.$tabupload.css({
                            visibility: ""
                        })
                    },
                    hideMoreButton: function() {
                        this.subviews.mood ? this.$tabupload.hide() : this.$tabupload.css({
                            visibility: "hidden"
                        })
                    },
                    reset: function() {
                        c.prototype.reset.apply(this), this.inputbox && this.inputbox.reset(), this.preview && this.preview.remove(), this.preview = !1
                    },
                    value: function() {
                        this.data.text = this.inputbox.value() || "", this.data.attachment = {}, this.data.text = this.data.text.replace(/\n/g, "\\n");
                        var b;
                        for (var d in this.subflags)(b = this.subviews[d].value()) && (this.data.attachment[d] = b);
                        return this.preview && a.extend(this.data.attachment, this.preview.value()), c.prototype.value.apply(this, arguments)
                    },
                    validate: function() {
                        var a = this.value(!0),
                            b = a[1] || {};
                        return !b.id && b.id.length ? "No image selected." : void 0
                    },
                    onPhotoAdd: function() {
                        if (!this.uploading) {
                            var b = h.get("conf") || {},
                                c = +b.limitphoto,
                                d = +b.uploadedphoto;
                            return this.preview && this.preview.pics && this.preview.pics.length >= 8 ? void window.alert(i.get("photo.batch_notice")) : (this.preview && this.preview.pics && this.preview.pics.length && (d += this.preview.pics.length), d >= c ? void window.alert(i.get("photo.upload_limit_exceeded") || "You have reached the upload limit.") : void(window.opera || a.ie && 10 === a.ieVersion ? this.$("#joms-postbox-photo-upload").find("input[type=file]").click() : this.uploader.open()))
                        }
                    },
                    onPhotoAdded: function(b, c) {
                        if (!this.uploading && c && c.length) {
                            var e = 0;
                            this.preview && this.preview.pics && this.preview.pics.length && (e = this.preview.pics.length), e + c.length > 8 && (e = e + c.length - 8, c.splice(0 - e, e), b.splice(0 - e, e), window.alert(i.get("photo.batch_notice")));
                            var f = h.get("conf") || {},
                                g = +f.limitphoto,
                                j = +f.uploadedphoto;
                            this.preview && this.preview.pics && this.preview.pics.length && (j += this.preview.pics.length);
                            var k;
                            j + c.length > g && (k = j + c.length - g, c.splice(0 - k, k), b.splice(0 - k, k));
                            var l;
                            this.preview || (l = a("<div>").appendTo(this.$preview), this.preview = new d, this.assign(l, this.preview), this.listenTo(this.preview, "update", function(a) {
                                return !a || 0 >= a ? (this.showInitialState(), this.inputbox.single(), void(this.uploading = 0)) : (a >= 8 ? this.hideMoreButton() : this.showMoreButton(), void this.inputbox[a > 1 ? "multiple" : "single"]())
                            })), this.showMainState();
                            for (var m = 0; m < c.length; m++) this.preview.add(c[m]);
                            this.uploading = c.length, this.$action.hide(), b.start(), b.refresh()
                        }
                    },
                    onPhotoError: function(a, b) {
                        +b.code === +plupload.FILE_EXTENSION_ERROR ? window.alert("Selected file type is not permitted.") : +b.code === +plupload.FILE_SIZE_ERROR ? window.alert(i.get("photo.max_upload_size_error")) : console.log(b.message)
                    },
                    onPhotoProgress: function(a, b) {
                        this.preview.updateProgress(b)
                    },
                    onPhotoUploaded: function(a, b, c) {
                        var d;
                        try {
                            d = JSON.parse(c.response)
                        } catch (e) {}
                        return d || (d = {}), d.thumbnail ? (this.uploading--, this.uploading <= 0 && this.$action.show(), void(this.preview && this.preview.setImage(b, d))) : (a.stop(), a.splice(), window.alert(d && d.msg || "Undefined error."), this.uploading = 0, this.$action.show(), void(this.preview && this.preview.removeFailed()))
                    },
                    onMoodSelect: function(a) {
                        this.inputbox.updateAttachment(a)
                    },
                    onMoodRemove: function() {
                        this.inputbox.updateAttachment(!1)
                    },
                    getTemplate: function() {
                        var b = this.template({
                            juri: h.get("juri"),
                            language: {
                                postbox: i.get("postbox") || {},
                                status: i.get("status") || {},
                                photo: i.get("photo") || {}
                            }
                        });
                        return a(b).hide()
                    },
                    getStaticAttachment: function() {
                        return this.staticAttachment ? this.staticAttachment : (this.staticAttachment = a.extend({}, h.get("postbox.attachment") || {}, {
                            type: "photo"
                        }), this.staticAttachment)
                    },
                    ieUploadButtonFix: function(a) {
                        this.ieUploadButtonFix.init || (this.ieUploadButtonFix.init = !0, this.$uploader.css({
                            display: "block",
                            position: "absolute",
                            opacity: 0,
                            width: "",
                            height: ""
                        }).children("button,form").css({
                            display: "block",
                            position: "absolute",
                            width: "",
                            height: "",
                            top: 0,
                            right: 0,
                            bottom: 0,
                            left: 0
                        }).children("input").css({
                            cursor: "pointer",
                            height: "100%"
                        })), a ? (this.$uploader.appendTo(this.$uploaderParent), this.$uploader.css({
                            top: 12,
                            right: 12,
                            bottom: 12,
                            left: 12
                        }).children("form").css({
                            width: "100%",
                            height: "100%"
                        })) : (this.$uploader.appendTo(this.$tabupload), this.$uploader.css({
                            top: 0,
                            right: 0,
                            bottom: 0,
                            left: 0
                        }))
                    }
                })
            }), define("views/inputbox/videourl", ["sandbox", "views/inputbox/base", "utils/language"], function(a, b, c) {
                return b.extend({
                    template: joms.jst["html/inputbox/videourl"],
                    render: function() {
                        var a = this.getTemplate();
                        this.$el.replaceWith(a), this.setElement(a), b.prototype.render.apply(this, arguments)
                    },
                    onKeydown: function(b) {
                        b && 13 === b.keyCode && b.preventDefault();
                        var c = this;
                        a.defer(function() {
                            c.updateInput(b)
                        })
                    },
                    getTemplate: function() {
                        var b = c.get("video.link_hint") || "",
                            d = this.template({
                                placeholder: b
                            });
                        return a(d)
                    }
                })
            }), define("views/postbox/fetcher-video", ["sandbox", "views/base", "views/widget/select", "utils/ajax", "utils/language"], function(a, b, c, d, e) {
                return b.extend({
                    template: joms.jst["html/postbox/fetcher-video"],
                    events: {
                        "click .joms-fetched-close": "onClose",
                        "click .joms-fetched-field span": "onFocus",
                        "keyup .joms-fetched-field input": "onKeyup",
                        "keyup .joms-fetched-field textarea": "onKeyup",
                        "blur .joms-fetched-field input": "onBlur",
                        "blur .joms-fetched-field textarea": "onBlur"
                    },
                    initialize: function() {
                        var a = e.get("fetch") || {};
                        this.titlePlaceholder = a.title_hint || "", this.descPlaceholder = a.description_hint || "", a = e.get("video"), this.categoryLabel = a.category_label
                    },
                    fetch: function(b) {
                        var c = /^(|.*\s)(https?:\/\/|www\.)([a-z0-9-]+\.)+[a-z]{2,7}(:\d+)?(\/.*)?(\s.*|)$/i,
                            e = b.match(c);
                        if (!this.fetching && e) {
                            this.id = !1, this.url = b, this.fetching = !0, this.fetched = !1, this.trigger("fetch:start");
                            var f = this;
                            d({
                                fn: "videos,ajaxLinkVideoPreview",
                                data: [b],
                                complete: function() {
                                    f.fetching = !1, f.trigger("fetch:done")
                                },
                                success: a.bind(this.render, this)
                            })
                        }
                    },
                    render: function(a) {
                        if (a = this.parseResponse(a), !a) return void this.trigger("fetch:failed");
                        var b = a && a.video,
                            d = this.sortCategories(a && a.category || []);
                        if (!b || !b.id) return void this.trigger("fetch:failed", a);
                        this.video_id = b.id, this.fetched = !0;
                        var f = {
                            title: b.title || "",
                            titlePlaceholder: this.titlePlaceholder,
                            description: b.description || "",
                            descPlaceholder: this.descPlaceholder,
                            image: b.thumb || !1,
                            lang: {
                                cancel: (e.get("cancel") || "").toLowerCase()
                            }
                        };
                        this.select && this.select.remove(), this.$el.html(this.template(f)), this.$image = this.$(".joms-fetched-images").find("img"), this.$title = this.$(".joms-fetched-title").find("input"), this.$description = this.$(".joms-fetched-description").find("textarea"), this.$category = this.$(".joms-fetched-category");
                        for (var g = [], h = 0; h < d.length; h++) g.push([d[h].id, this.categoryLabel + ": " + d[h].name]);
                        return this.select = new c({
                            options: g
                        }), this.assign(this.$category, this.select), this
                    },
                    change: function(b) {
                        var c = a(b),
                            d = c.prev("span"),
                            e = c.val().replace(/^\s+|\s+$/g, "");
                        e || (e = c.parent().hasClass("joms-fetched-title") ? this.titlePlaceholder : this.descPlaceholder), c.hide(), d.text(e).show()
                    },
                    remove: function() {
                        b.prototype.remove.apply(this), this.trigger("remove")
                    },
                    value: function() {
                        return this.fetching ? [] : [this.video_id, this.url, this.$image && this.$image.attr("src"), this.$title && this.escapeValue(this.$title.val()), this.$description && this.escapeValue(this.$description.val()), this.select && this.select.value()]
                    },
                    onClose: function() {
                        this.remove()
                    },
                    onFocus: function(b) {
                        var c = a(b.currentTarget),
                            d = c.next("input,textarea");
                        c.hide(), d.show(), setTimeout(function() {
                            d[0].focus()
                        }, 300)
                    },
                    onKeyup: function(a) {
                        13 === a.keyCode && this.change(a.currentTarget)
                    },
                    onBlur: function(a) {
                        this.change(a.currentTarget)
                    },
                    parseResponse: function(a) {
                        var b;
                        if (a && a.length)
                            for (var c = 0; c < a.length; c++) {
                                if ("__throwError" === a[c][1]) {
                                    b = {
                                        msg: a[c][3]
                                    };
                                    break
                                }
                                if ("__callback" === a[c][1]) {
                                    b = a[c][3][0];
                                    break
                                }
                            }
                        return b
                    },
                    sortCategories: function(a, b, c) {
                        if (!a || !a.length) return [];
                        b || (b = 0), c || (c = "");
                        for (var d, e, f = [], g = 0; g < a.length; g++) + a[g].parent === b && (d = +a[g].id, e = c + a[g].name, f.push({
                            id: d,
                            name: e
                        }), f = f.concat(this.sortCategories(a, d, e + " &rsaquo; ")));
                        return f
                    },
                    escapeValue: function(a) {
                        return "string" != typeof a ? a : a.replace(/\\/g, "&#92;").replace(/\t/g, "\\t").replace(/\n/g, "\\n").replace(/&quot;/g, '"')
                    }
                })
            }), define("views/inputbox/video", ["sandbox", "views/inputbox/status", "utils/language"], function(a, b, c) {
                return b.extend({
                    template: joms.jst["html/inputbox/video"],
                    getTemplate: function() {
                        var b = c.get("status.video_hint") || "",
                            d = this.template({
                                placeholder: b
                            });
                        return a(d)
                    }
                })
            }), define("views/postbox/video", ["sandbox", "app", "views/postbox/default", "views/inputbox/videourl", "views/postbox/fetcher-video", "views/inputbox/video", "views/dropdown/mood", "views/dropdown/location", "views/dropdown/privacy", "views/widget/select", "utils/ajax", "utils/constants", "utils/language", "utils/uploader"], function(a, b, c, d, e, f, g, h, i, j, k, l, m, n) {
                return c.extend({
                    subviews: {
                        mood: g,
                        location: h,
                        privacy: i
                    },
                    template: joms.jst["html/postbox/video"],
                    events: a.extend({}, c.prototype.events, {
                        "click [data-action=share]": "onVideoUrl",
                        "click [data-action=upload]": "onVideoUpload"
                    }),
                    initialize: function() {
                        this.enableUpload = +l.get("conf.enablevideosupload"), this.enableLocation = +l.get("conf.enablevideosmap");
                        var b = l.get("moods");
                        this.enableMood = +l.get("conf.enablemood") && b && b.length, this.enableMood || (this.subviews = a.omit(this.subviews, "mood")), this.enableLocation || (this.subviews = a.omit(this.subviews, "location"));
                        var d = l.get("settings") || {};
                        (this.inheritPrivacy = d.isGroup || d.isEvent || !d.isMyProfile) && (this.subviews = a.omit(this.subviews, "privacy")), this.language = {
                            postbox: m.get("postbox"),
                            status: m.get("status"),
                            video: m.get("video")
                        }, this.onVideoInit(), c.prototype.initialize.apply(this)
                    },
                    render: function() {
                        c.prototype.render.apply(this), this.$initial = this.$(".joms-initial-panel"), this.$main = this.$(".joms-postbox-video"), this.$stateurl = this.$(".joms-postbox-video-state-url"), this.$stateupload = this.$(".joms-postbox-video-state-upload"), this.$url = this.$stateurl.find(".joms-postbox-url"), this.$fetcher = this.$stateurl.find(".joms-postbox-fetched"), this.$file = this.$stateupload.find(".joms-postbox-url"), this.$fileprogress = this.$stateupload.find(".joms-postbox-photo-progress"), this.$inputbox = this.$(".joms-postbox-inputbox"), this.$tabupload = this.$tabs.find("[data-tab=upload]"), this.$tabmood = this.$tabs.find("[data-tab=mood]"), this.$tablocation = this.$tabs.find("[data-tab=location]"), this.$tabprivacy = this.$tabs.find("[data-tab=privacy]"), this.enableMood || this.$tabmood.remove(), this.enableLocation || this.$tablocation.remove(), this.inheritPrivacy && this.$tabprivacy.css({
                            visibility: "hidden"
                        }), this.url = new d, this.assign(this.$url, this.url), this.listenTo(this.url, "focus", this.onUrlFocus), this.listenTo(this.url, "keydown", this.onUrlUpdate), this.inputbox = new f({
                            attachment: !0,
                            charcount: !0
                        }), this.assign(this.$inputbox, this.inputbox), this.listenTo(this.inputbox, "focus", this.onInputFocus);
                        var a, b;
                        return this.inheritPrivacy || (b = l.get("settings") || {}, b.isProfile && b.isMyProfile && (a = l.get("conf.profiledefaultprivacy")), this.initSubview("privacy", {
                            privacylist: window.joms_privacylist,
                            defaultPrivacy: a || "public"
                        })), this
                    },
                    showInitialState: function() {
                        this.reset(), this.$tabs.hide(), this.$action.hide(), this.$save.hide(), this.enableUpload ? (this.$main.hide(), this.$initial.show()) : this.showUrlState(), this.trigger("show:initial")
                    },
                    showMainState: function(a) {
                        a ? this.showUploadState() : this.showUrlState(), this.$tabs.show(), this.$action.show(), this.trigger("show:main")
                    },
                    showUrlState: function() {
                        this.inputbox.$el.find(".joms-postbox-input-placeholder").html(this.language.status.video_hint), this.$save.html(this.language.postbox.post_button), this.$stateupload.hide(), this.$stateurl.show(), this.$initial.hide(), this.$main.show(), this.upload = !1, b.postbox && b.postbox.value && b.postbox.value.length && (this.inputbox.set(b.postbox.value[0]), b.postbox.value = !1)
                    },
                    showUploadState: function() {
                        var a, c, d;
                        if (!this.uploadcat) {
                            for (a = this.sortCategories(l.get("videoCategories") || []), c = [], d = 0; d < a.length; d++) c.push([a[d].id, this.language.video.category_label + ": " + a[d].name]);
                            this.uploadcat = new j({
                                options: c
                            }), this.$uploadcat = this.$stateupload.find(".joms-fetched-category"), this.assign(this.$uploadcat, this.uploadcat)
                        }
                        this.inputbox.$el.find(".joms-postbox-input-placeholder").html(this.language.video.upload_hint), this.$save.html(this.language.postbox.upload_button), this.$stateurl.hide(), this.$stateupload.show(), this.$initial.hide(), this.$main.show(), this.$save.show(), this.upload = !0, b.postbox && b.postbox.value && b.postbox.value.length && (this.inputbox.set(b.postbox.value[0]), b.postbox.value = !1)
                    },
                    reset: function() {
                        c.prototype.reset.apply(this), this.url && this.url.reset(), this.inputbox && this.inputbox.reset(), this.fetcher && this.fetcher.remove()
                    },
                    value: function() {
                        this.data.text = this.inputbox.value() || "", this.data.attachment = {}, this.data.text = this.data.text.replace(/\n/g, "\\n");
                        var a;
                        for (var b in this.subflags)(a = this.subviews[b].value()) && (this.data.attachment[b] = a);
                        return this.upload ? this.status && "success" === this.status.status && (this.data.attachment.fetch = [this.status.videoid]) : this.fetcher && (this.data.attachment.fetch = this.fetcher.value()), c.prototype.value.apply(this, arguments)
                    },
                    validate: function() {
                        var a = this.value(!0),
                            b = a[1] || {},
                            c = b.fetch;
                        if (this.upload) {
                            if (!this.uploadcat || !this.uploadcat.value()) return "Please select video category."
                        } else {
                            if (!c || !c.length) return "Please share a valid video url.";
                            if (!c[5]) return "Please select video category."
                        }
                    },
                    onPost: function() {
                        if (!this.saving) {
                            var b = this.validate();
                            if (b) return void window.alert(b);
                            if (this.saving = !0, this.$loading.show(), this.upload === !0) return void this.uploader.uploader.start();
                            var c = this,
                                d = this.value();
                            window.joms_filter_params && d.push(JSON.stringify(window.joms_filter_params)), k({
                                fn: "system,ajaxStreamAdd",
                                data: d,
                                success: a.bind(this.onPostSuccess, this),
                                complete: function() {
                                    c.$loading.hide(), c.saving = !1, c.showInitialState()
                                }
                            })
                        }
                    },
                    onMoodSelect: function(a) {
                        this.inputbox.updateAttachment(a)
                    },
                    onMoodRemove: function() {
                        this.inputbox.updateAttachment(!1)
                    },
                    onLocationSelect: function(a) {
                        this.inputbox.updateAttachment(null, a)
                    },
                    onLocationRemove: function() {
                        this.inputbox.updateAttachment(null, !1)
                    },
                    onPrivacySelect: function(a) {
                        var b = this.$tabprivacy.find("use"),
                            c = b.attr("xlink:href");
                        c = c.replace(/#.+$/, "#joms-icon-" + a.icon), this.$tabprivacy.find("use").attr("xlink:href", c), this.$tabprivacy.find("span").html(a.label)
                    },
                    onUrlFocus: function() {
                        this.enableUpload || this.showMainState()
                    },
                    onUrlUpdate: function(a, b) {
                        a && (a = a.replace(/^\s+|\s+$/g, "")), 32 === b || 13 === b ? this.fetch(a) : this.fetchProxy(a)
                    },
                    onInputFocus: function() {
                        this.enableUpload || this.showMainState()
                    },
                    fetchProxy: a.debounce(function(a) {
                        this.fetch(a)
                    }, 1e3),
                    fetch: function(b) {
                        var c;
                        this.fetcher && (this.fetcher.fetching || this.fetcher.fetched) || (delete this.data.attachment.fetch, c = a("<div>").appendTo(this.$fetcher), this.fetcher && this.fetcher.remove(), this.fetcher = new e, this.fetcher.setElement(c), this.listenTo(this.fetcher, "fetch:start", this.onFetchStart), this.listenTo(this.fetcher, "fetch:failed", this.onFetchFailed), this.listenTo(this.fetcher, "fetch:done", this.onFetchDone), this.listenTo(this.fetcher, "remove", this.onFetchRemove), this.fetcher.fetch(b))
                    },
                    onFetchStart: function() {
                        this.saving = !0, this.$loading.show(), this.$save.hide()
                    },
                    onFetchFailed: function(a) {
                        this.fetcher && this.fetcher.remove(), this.saving = !1, this.$loading.hide(), this.$save.hide();
                        var b = a && a.msg || "Undefined error.";
                        window.alert(b)
                    },
                    onFetchDone: function() {
                        this.saving = !1, this.$loading.hide(), this.fetcher && this.fetcher.fetched && this.$save.show()
                    },
                    onFetchRemove: function() {
                        this.fetcher = !1, this.$save.hide()
                    },
                    onVideoUrl: function() {
                        this.showMainState()
                    },
                    onVideoInit: function() {
                        if (!this.uploader) {
                            var b = +l.get("conf.maxvideouploadsize") || 0;
                            b && (b += "mb");
                            var c = "index.php?option=com_community&view=videos&task=uploadvideo",
                                d = l.get("videocreatortype"),
                                e = l.get("settings") || {},
                                f = +l.get("groupid"),
                                g = +l.get("eventid");
                            d && (c += "&creatortype=" + d), e.isProfile && !e.isMyProfile ? c += "&target=" + l.get("postbox.attachment.target") : +g > 0 ? c += "&eventid=" + g : +f > 0 && (c += "&groupid=" + f), this.uploader = new n({
                                container: "joms-js--videouploader-upload",
                                browse_button: "joms-js--videouploader-upload-button",
                                url: c,
                                multi_selection: !1,
                                filters: [{
                                    title: "Video files",
                                    extensions: "3g2,3gp,asf,asx,avi,flv,mov,mp4,mpg,rm,swf,vob,wmv,m4v"
                                }],
                                max_file_size: b
                            }), this.uploader.onAdded = a.bind(this.onVideoAdded, this), this.uploader.onError = a.bind(this.onVideoError, this), this.uploader.onBeforeUpload = a.bind(this.onVideoBeforeUpload, this), this.uploader.onProgress = a.bind(this.onVideoProgress, this), this.uploader.onUploaded = a.bind(this.onVideoUploaded, this), this.uploader.init()
                        }
                    },
                    onVideoUpload: function() {
                        var a = l.get("conf") || {},
                            b = +a.limitvideo,
                            c = +a.uploadedvideo;
                        return c >= b ? void window.alert(m.get("video.upload_limit_exceeded") || "You have reached the upload limit.") : (this.uploader.uploader.splice(), void this.uploader.open())
                    },
                    onVideoAdded: function(a, b) {
                        if (b && b.length) {
                            for (var c = b[0], d = "<b>" + c.name + "</b>", e = c.size || 0, f = "Bytes", g = ["KB", "MB", "GB"]; e >= 1e3 && g.length;) f = g.shift(), e = Math.ceil(e / 1e3);
                            e && (d += " (" + e + " " + f + ")"), this.$file.html(d), this.$fileprogress.css({
                                width: 0
                            }), this.showMainState("upload")
                        }
                    },
                    onVideoError: function(a, b) {
                        var c; + b.code === +plupload.FILE_SIZE_ERROR ? (c = +l.get("conf.maxvideouploadsize") || 0, window.alert("Maximum file size for video upload is " + c + " MB.")) : +b.code === +plupload.FILE_EXTENSION_ERROR && window.alert("Selected file type is not permitted.")
                    },
                    onVideoBeforeUpload: function() {
                        var a = {
                            description: this.inputbox.value()
                        };
                        this.subflags.privacy && (a.permissions = this.subviews.privacy.value());
                        var b = this.subflags.location && this.subviews.location.value();
                        b && b.length && (a.location = b), this.uploadcat && (a.category_id = this.uploadcat && this.uploadcat.value()), this.uploader.params(a)
                    },
                    onVideoProgress: function(a, b) {
                        var c = Math.min(100, Math.round(100 * b.loaded / b.size));
                        this.$fileprogress.animate({
                            width: c + "%"
                        })
                    },
                    onVideoUploaded: function(a, b, c) {
                        var d, e;
                        try {
                            d = JSON.parse(c.response)
                        } catch (f) {}
                        this.status = d || {}, e = this, setTimeout(function() {
                            if (e.$loading.hide(), e.saving = !1, e.showInitialState(), "success" !== e.status.status) window.alert(e.status.message || "Undefined error.");
                            else {
                                var a = l.get("conf") || {};
                                ++a.uploadedvideo, window.alert(e.status.processing_str)
                            }
                        }, 1e3)
                    },
                    getTemplate: function() {
                        var b = this.template({
                            juri: l.get("juri"),
                            enable_upload: this.enableUpload,
                            video_maxsize: l.get("conf.maxvideouploadsize"),
                            language: {
                                postbox: m.get("postbox") || {},
                                status: m.get("status") || {},
                                video: m.get("video") || {}
                            }
                        });
                        return a(b).hide()
                    },
                    getStaticAttachment: function() {
                        return this.staticAttachment ? this.staticAttachment : (this.staticAttachment = a.extend({}, l.get("postbox.attachment") || {}, {
                            type: "video"
                        }), this.staticAttachment)
                    },
                    sortCategories: function(a, b, c) {
                        if (!a || !a.length) return [];
                        b || (b = 0), c || (c = "");
                        for (var d, e, f = [], g = 0; g < a.length; g++) + a[g].parent === b && (d = +a[g].id, e = c + a[g].name, f.push({
                            id: d,
                            name: e
                        }), f = f.concat(this.sortCategories(a, d, e + " &rsaquo; ")));
                        return f
                    }
                })
            }), define("views/inputbox/eventtitle", ["sandbox", "views/inputbox/base", "utils/language"], function(a, b, c) {
                return b.extend({
                    template: joms.jst["html/inputbox/eventtitle"],
                    render: function() {
                        var a = this.getTemplate();
                        this.$el.replaceWith(a), this.setElement(a), b.prototype.render.apply(this, arguments)
                    },
                    getTemplate: function() {
                        var b = c.get("event.title_hint") || "",
                            d = this.template({
                                placeholder: b
                            });
                        return a(d)
                    }
                })
            }), define("views/inputbox/eventdesc", ["sandbox", "views/inputbox/base", "utils/language"], function(a, b, c) {
                return b.extend({
                    template: joms.jst["html/inputbox/eventdesc"],
                    render: function() {
                        var a = this.getTemplate();
                        this.$el.replaceWith(a), this.setElement(a), b.prototype.render.apply(this, arguments)
                    },
                    getTemplate: function() {
                        var b = c.get("status.event_hint") || "",
                            d = this.template({
                                placeholder: b
                            });
                        return a(d)
                    }
                })
            }), define("views/dropdown/event", ["sandbox", "views/dropdown/base", "utils/constants", "utils/language"], function(a, b, c, d) {
                return b.extend({
                    template: joms.jst["html/dropdown/event"],
                    events: {
                        "click .joms-postbox-done": "onSave"
                    },
                    render: function() {
                        var b, e, f = this.getTemplate(),
                            g = +c.get("conf.eventshowampm"),
                            h = +c.get("conf.firstday"),
                            i = g ? "h:i A" : "H:i",
                            j = {};
                        for (j.monthsFull = [d.get("datepicker.january"), d.get("datepicker.february"), d.get("datepicker.march"), d.get("datepicker.april"), d.get("datepicker.may"), d.get("datepicker.june"), d.get("datepicker.july"), d.get("datepicker.august"), d.get("datepicker.september"), d.get("datepicker.october"), d.get("datepicker.november"), d.get("datepicker.december")], j.monthsShort = [], e = 0; e < j.monthsFull.length; e++) j.monthsShort[e] = j.monthsFull[e].substr(0, 3);
                        for (j.weekdaysFull = [d.get("datepicker.sunday"), d.get("datepicker.monday"), d.get("datepicker.tuesday"), d.get("datepicker.wednesday"), d.get("datepicker.thursday"), d.get("datepicker.friday"), d.get("datepicker.saturday")], j.weekdaysShort = [], e = 0; e < j.weekdaysFull.length; e++) j.weekdaysShort[e] = j.weekdaysFull[e].substr(0, 3);
                        if (j.today = d.get("datepicker.today"), j.clear = d.get("datepicker.clear"), j.firstDay = h, j.selectYears = 200, j.selectMonths = !0, this.$el.replaceWith(f), this.setElement(f), this.$category = this.$(".joms-event-category").empty(), this.$location = this.$("[name=location]").val(""), this.$startdate = this.$(".joms-pickadate-startdate").pickadate(a.extend({}, j, {
                                min: new Date,
                                format: "d mmmm yyyy",
                                klass: {
                                    frame: "picker__frame startDate"
                                }
                            })), this.$starttime = this.$(".joms-pickadate-starttime").pickatime({
                                interval: 15,
                                format: i,
                                formatLabel: i,
                                klass: {
                                    frame: "picker__frame startTime"
                                }
                            }), this.$enddate = this.$(".joms-pickadate-enddate").pickadate(a.extend({}, j, {
                                format: "d mmmm yyyy",
                                klass: {
                                    frame: "picker__frame endDate"
                                }
                            })), this.$endtime = this.$(".joms-pickadate-endtime").pickatime({
                                interval: 15,
                                format: i,
                                formatLabel: i,
                                klass: {
                                    frame: "picker__frame endTime"
                                }
                            }), this.$done = this.$(".joms-event-done"), b = c.get("eventCategories") || [], b && b.length)
                            for (e = 0; e < b.length; e++) this.$category.append('<option value="' + b[e].id + '">' + b[e].name + "</option>");
                        return this.startdate = this.$startdate.pickadate("picker"), this.starttime = this.$starttime.pickatime("picker"), this.enddate = this.$enddate.pickadate("picker"), this.endtime = this.$endtime.pickatime("picker"), this.startdate.on({
                            set: a.bind(this.onSetStartDate, this)
                        }), this.starttime.on({
                            set: a.bind(this.onSetStartTime, this)
                        }), this.enddate.on({
                            set: a.bind(this.onSetEndDate, this)
                        }), this.endtime.on({
                            set: a.bind(this.onSetEndTime, this)
                        }), this
                    },
                    value: function() {
                        return this.data
                    },
                    reset: function() {
                        this.$category.val(this.$category.find("option").eq(0).attr("value")), this.$location.val(""), this.$startdate.val(""), this.$starttime.val(""), this.$enddate.val(""), this.$endtime.val("")
                    },
                    onSetStartDate: function(a) {
                        var b = a.select;
                        this.enddate.set({
                            min: new Date(b)
                        }, {
                            muted: !0
                        }), this._checkTime()
                    },
                    onSetEndDate: function(a) {
                        var b = a.select;
                        this.startdate.set({
                            max: new Date(b)
                        }, {
                            muted: !0
                        }), this._checkTime()
                    },
                    onSetStartTime: function() {
                        this._checkTime("start")
                    },
                    onSetEndTime: function() {
                        this._checkTime("end")
                    },
                    onSave: function() {
                        var a, b = this.$category.val(),
                            c = this.$location.val(),
                            d = this.startdate.get("select"),
                            e = this.starttime.get("select"),
                            f = this.enddate.get("select"),
                            g = this.endtime.get("select");
                        return b = [b, this.$category.find("[value=" + b + "]").text()], d && (d = [this.startdate.get("select", "yyyy-mm-dd"), this.startdate.get("value")]), e && (e = [this.starttime.get("select", "HH:i"), this.starttime.get("value")]), f && (f = [this.enddate.get("select", "yyyy-mm-dd"), this.enddate.get("value")]), g && (g = [this.endtime.get("select", "HH:i"), this.endtime.get("value")]), this.data = {
                            category: b,
                            location: c,
                            startdate: d,
                            starttime: e,
                            enddate: f,
                            endtime: g,
                            allday: !1
                        }, this.data.category ? this.data.location ? this.data.startdate ? this.data.starttime ? this.data.enddate ? this.data.endtime || (a = "End time is not selected.") : a = "End date is not selected." : a = "Start time is not selected." : a = "Start date is not selected." : a = "Location is not selected." : a = "Category is not selected.", a ? void window.alert(a) : (this.trigger("select", this.data), void this.hide())
                    },
                    getTemplate: function() {
                        var b = this.template({
                            language: {
                                event: d.get("event") || {}
                            }
                        });
                        return a(b).hide()
                    },
                    _checkTime: function() {
                        var a, b, c = this.startdate.get("select"),
                            d = this.enddate.get("select");
                        c && d && (d.year <= c.year && d.month <= c.month && d.date <= c.date ? (a = this.starttime.get("select"), b = this.endtime.get("select"), a ? (this.endtime.set({
                            min: [a.hour, a.mins]
                        }, {
                            muted: !0
                        }), b && b.time < a.time && this.endtime.set({
                            select: [a.hour, a.mins]
                        }, {
                            muted: !0
                        })) : this.endtime.set({
                            min: !1
                        }, {
                            muted: !0
                        }), b ? (this.starttime.set({
                            max: [b.hour, b.mins]
                        }, {
                            muted: !0
                        }), a && a.time > b.time && this.starttime.set({
                            select: [b.hour, b.mins]
                        }, {
                            muted: !0
                        })) : this.starttime.set({
                            max: !1
                        }, {
                            muted: !0
                        })) : (this.starttime.set({
                            max: !1
                        }, {
                            muted: !0
                        }), this.endtime.set({
                            min: !1
                        }, {
                            muted: !0
                        })))
                    }
                })
            }), define("utils/format", ["sandbox"], function(a) {
                function b(b, c, d) {
                    if (!a.isString(b)) return b;
                    if (!a.isNumber(c) || b.length >= c) return b;
                    c -= b.length;
                    for (var e = 0; c > e; e++) b = (d || " ") + b;
                    return b
                }
                return {
                    pad: b
                }
            }), define("views/postbox/event", ["sandbox", "views/postbox/default", "views/inputbox/eventtitle", "views/inputbox/eventdesc", "views/dropdown/event", "utils/constants", "utils/format", "utils/language"], function($, DefaultView, TitleView, InputboxView, EventView, constants, format, language) {
                return DefaultView.extend({
                    subviews: {
                        event: EventView
                    },
                    template: joms.jst["html/postbox/event"],
                    events: $.extend({}, DefaultView.prototype.events, {
                        "click .joms-postbox-event-title": "onFocus"
                    }),
                    render: function() {
                        return DefaultView.prototype.render.apply(this), this.$title = this.$(".joms-postbox-title"), this.$inputbox = this.$(".joms-postbox-inputbox"), this.$category = this.$(".joms-postbox-event-label-category"), this.$location = this.$(".joms-postbox-event-label-location"), this.$date = this.$(".joms-postbox-event-label-date"), this.title = new TitleView, this.assign(this.$title, this.title), this.listenTo(this.title, "focus", this.onInputFocus), this.listenTo(this.title, "keydown", this.onNewInputUpdate), this.inputbox = new InputboxView({
                            charcount: !0
                        }), this.assign(this.$inputbox, this.inputbox), this.listenTo(this.inputbox, "focus", this.onInputFocus), this.listenTo(this.inputbox, "keydown", this.onNewInputUpdate), this
                    },
                    reset: function() {
                        DefaultView.prototype.reset.apply(this), this.title && this.title.reset(), this.inputbox && this.inputbox.reset(), this.$category && this.onEventSelect({})
                    },
                    value: function() {
                        this.data.text = this.inputbox.value() || "", this.data.attachment = {};
                        var a;
                        for (var b in this.subflags)(a = this.subviews[b].value()) && (this.data.attachment[b] = a);
                        var c = (this._data.starttime || "").split(":"),
                            d = (this._data.endtime || "").split(":");
                        return $.extend(this.data.attachment, {
                            title: this.title.value(),
                            catid: this._data.category && this._data.category[0] || null,
                            location: this._data.location,
                            startdate: this._data.startdate,
                            enddate: this._data.enddate,
                            allday: !1,
                            "starttime-hour": c[0] || null,
                            "starttime-min": c[1] || null,
                            "endtime-hour": d[0] || null,
                            "endtime-min": d[1] || null
                        }), DefaultView.prototype.value.apply(this, arguments)
                    },
                    validate: function() {

                        var a = this.value(!0),
                            b = a[0];
                        return b ? void 0 : "Event description cannot be empty."
                    },
                    onInputFocus: function() {
                        this.showMainState()
                    },
                    onInputUpdate: $.debounce(function() {
                        var a = this.value(!0),
                            b = a[0],
                            c = a[1],
                            d = !0;
                        this.trim(c.title) && this.trim(b) && c.catid && c.location && c.startdate && c.enddate && (c["starttime-hour"] || c["starttime-min"]) ? c["endtime-hour"] || c["endtime-min"] || (d = !1) : d = !1, this.$save[d ? "show" : "hide"]()
                    }, 300),
                    onNewInputUpdate: $.debounce(function() {
                        var a = this.value(!0),
                            b = a[0],
                            c = a[1],
                            d = !0;
                        this.trim(c.title) && this.trim(b) && c.catid && c.location && c.startdate && c.enddate && (c["starttime-hour"] || c["starttime-min"]) ? c["endtime-hour"] || c["endtime-min"] || (d = !1) : d = !1, this.$save[d ? "show" : "hide"]()
                    }, 300),
                    onPost: function() {
                        var a, b = constants.get("conf") || {},
                            c = +b.limitevent,
                            d = +b.createdevent;
                        return d >= c ? (a = language.get("event.create_limit_exceeded") || "You have reached the event creation limit.", a = a.replace("%1$s", c), void window.alert(a)) : void DefaultView.prototype.onPost.apply(this, arguments)
                    },
                    onPostSuccess: function() {
                        DefaultView.prototype.onPostSuccess.apply(this, arguments);
                        var a = constants.get("conf") || {};
                        a.createdevent = +a.createdevent + 1
                    },
                    onEventSelect: function(a) {
                        a.category ? (this.$category.find(".joms-input-text").html(a.category && a.category[1]), this.$category.show()) : this.$category.hide(), a.location ? (this.$location.find(".joms-input-text").html(a.location), this.$location.show()) : this.$location.hide();
                        var b = [];
                        a.startdate && a.enddate ? (b.push(a.startdate[1] + " " + a.starttime[1]), b.push(a.enddate[1] + " " + a.endtime[1]), this.$date.find(".joms-input-text").html(b.join(" &mdash; ")), this.$date.show()) : this.$date.hide(), a.startdate && (a.startdate = a.startdate[0]), a.starttime && (a.starttime = a.starttime[0]), a.enddate && (a.enddate = a.enddate[0]), a.endtime && (a.endtime = a.endtime[0]), this._data = a, this.onInputUpdate()
                    },
                    onPrivacySelect: function(a) {
                        var b = this.$tabprivacy.find("use"),
                            c = b.attr("xlink:href");
                        c = c.replace(/#.+$/, "#joms-icon-" + a.icon), this.$tabprivacy.find("use").attr("xlink:href", c), this.$tabprivacy.find("span").html(a.label)
                    },
                    parseResponse: function(response) {
                        var elid = "activity-stream-container",
                            data, temp;
                        if (response && response.length)
                            for (var i = 0; i < response.length; i++)
                                if (response[i][1] === elid && (data = response[i][3]), "al" === response[i][0] && (temp = response[i][3], window.alert($.isArray(temp) ? temp.join(". ") : temp)), "__throwError" === response[i][1] && (temp = response[i][3], window.alert($.isArray(temp) ? temp.join(". ") : temp)), "cs" === response[i][0]) try {
                                    eval(response[i][1])
                                } catch (e) {}
                                return data
                    },
                    getTemplate: function() {
                        var a = language.get("event") || {};
                        a.event_detail && (a.event_detail = a.event_detail.toLowerCase());
                        var b = this.template({
                            juri: constants.get("juri"),
                            language: {
                                postbox: language.get("postbox") || {},
                                event: a
                            }
                        });
                        return $(b).hide()
                    },
                    getStaticAttachment: function() {
                        return this.staticAttachment ? this.staticAttachment : (this.staticAttachment = $.extend({}, constants.get("postbox.attachment") || {}, {
                            type: "event"
                        }), this.staticAttachment)
                    },
                    trim: function(a) {
                        return (a || "").replace(/^\s+|\s+$/g, "")
                    }
                })
            }), define("views/postbox/custom", ["sandbox", "views/postbox/default", "views/dropdown/privacy", "utils/ajax", "utils/constants", "utils/language"], function(a, b, c, d, e, f) {
                return b.extend({
                    subviews: {
                        privacy: c
                    },
                    template: joms.jst["html/postbox/custom"],
                    events: a.extend({}, b.prototype.events, {
                        "click .joms-postbox-predefined-message": "onCustomPredefined",
                        "click .joms-postbox-custom-message": "onCustomCustom",
                        "keyup [name=custom]": "onTextareaUpdate"
                    }),
                    initialize: function() {
                        var c = e.get("settings") || {};
                        (this.inheritPrivacy = c.isGroup || c.isEvent || !c.isMyProfile) && (this.subviews = a.omit(this.subviews, "privacy")),
                        b.prototype.initialize.apply(this), this.attachment = {
                            type: "custom"
                        }, a.extend(this.attachment, e.get("postbox.attachment") || {})
                    },
                    render: function() {
                        return b.prototype.render.apply(this), this.$initial = this.$el.children(".joms-postbox-inner-panel"), this.$main = this.$el.children(".joms-postbox-custom"), this.$statepredefined = this.$(".joms-postbox-custom-state-predefined"), this.$statecustom = this.$(".joms-postbox-custom-state-custom"), this.$predefined = this.$("[name=predefined]"), this.$custom = this.$("[name=custom]"), this.$divs = this.$(".joms-postbox-dropdown").hide(), this.$tabprivacy = this.$tabs.find("[data-tab=privacy]"), this.inheritPrivacy && this.$tabprivacy.css({
                            visibility: "hidden"
                        }), this.inheritPrivacy || (this.initSubview("privacy", {
                            privacylist: ["public", "site_members"]
                        }), this.subviews.privacy.setPrivacy("public")), this
                    },
                    showInitialState: function() {
                        this.$main.hide(), this.$initial.show(), b.prototype.showInitialState.apply(this)
                    },
                    showMainState: function(a) {
                        b.prototype.showMainState.apply(this), a ? this.showPredefinedState() : this.showCustomState()
                    },
                    showPredefinedState: function() {
                        this.$initial.hide(), this.$statepredefined.show(), this.$statecustom.hide(), this.$main.show(), this.$save.show(), this.predefined = !0
                    },
                    showCustomState: function() {
                        this.$initial.hide(), this.$statepredefined.hide(), this.$statecustom.show(), this.$main.show(), this.predefined = !1
                    },
                    reset: function() {
                        b.prototype.reset.apply(this), this.$predefined && this.$predefined.val(this.$predefined.find("option:first").val()), this.$custom && this.$custom.val("")
                    },
                    value: function() {
                        var a = [];
                        return this.predefined ? (a.push(this.$predefined.val()), a.push(this.$predefined.find("option:selected").text())) : (a.push("system.message"), a.push(this.$custom.val().replace(/\n/g, "\\n"))), "privacy" in this.subflags && a.push(this.subviews.privacy.value()), a
                    },
                    validate: function() {
                    	
                        var a, b = this.value();
                        return this.predefined ? b[0] || (a = "Predefined message cannot be empty.") : b[1] || (a = "Custom message cannot be empty."), a
                    },
                    onTextareaUpdate: function() {
                        var a = this.$custom.val();
                        a = a.replace(/^\s+|\s+$/g, ""), this.$save[a ? "show" : "hide"]()
                    },
                    onCustomPredefined: function() {
                        this.showMainState("predefined")
                    },
                    onCustomCustom: function() {
                        this.showMainState()
                    },
                    onPost: function() {
                        if (!this.saving) {
                            var b = this.validate();
                            if (b) return void window.alert(b);
                            this.saving = !0, this.$loading.show();
                            var c = this;
                            d({
                                fn: "activities,ajaxAddPredefined",
                                data: this.value(),
                                success: a.bind(this.onPostSuccess, this),
                                complete: function() {
                                    c.$loading.hide(), c.saving = !1, c.showInitialState()
                                }
                            })
                        }
                    },
                    onPrivacySelect: function(a) {
                        var b = this.$tabprivacy.find("use"),
                            c = b.attr("xlink:href");
                        c = c.replace(/#.+$/, "#joms-icon-" + a.icon), this.$tabprivacy.find("use").attr("xlink:href", c), this.$tabprivacy.find("span").html(a.label)
                    },
                    getTemplate: function() {
                        var b = e.get("customActivities") || {},
                            c = [];
                        for (var d in b) c.push([d, b[d]]);
                        var g = this.template({
                            juri: e.get("juri"),
                            messages: c,
                            language: {
                                postbox: f.get("postbox"),
                                custom: f.get("custom")
                            }
                        });
                        return a(g).hide()
                    }
                })
            }), define("views/postbox/layout", ["sandbox", "views/base", "views/postbox/status", "views/postbox/photo", "views/postbox/video", "views/postbox/event", "views/postbox/custom", "utils/constants"], function(a, b, c, d, e, f, g, h) {
                return b.extend({
                    subflags: {},
                    subviews: {
                        status: c,
                        photo: d,
                        video: e,
                        event: f,
                        custom: g
                    },
                    events: {
                        "click .joms-postbox-tab-root li": "onChangeTab"
                    },
                    initialize: function() {
                        this.listenTo(a, "postbox:status", this.onOpenStatusTab), this.listenTo(a, "postbox:photo", this.onOpenPhotoTab), this.listenTo(a, "postbox:video", this.onOpenVideoTab)
                    },
                    render: function() {
                        var b = h.get("settings") || {},
                            c = h.get("conf") || {};
                        b.isAdmin && c.enablecustoms || (this.subviews = a.omit(this.subviews, "custom")), b.isProfile && !b.isMyProfile && (this.subviews = a.pick(this.subviews, "status", "photo", "video")), b.isEvent && (this.subviews = a.omit(this.subviews, "event")), (b.isProfile || b.isGroup || b.isEvent) && (c.enablephotos || (this.subviews = a.omit(this.subviews, "photo")), c.enablevideos || (this.subviews = a.omit(this.subviews, "video")), c.enableevents || (this.subviews = a.omit(this.subviews, "event"))), this.subkeys = a.keys(this.subviews), this.$subviews = this.$(".joms-postbox-tabs"), this.$tab = this.$(".joms-postbox-tab-root").hide();
                        var d = this;
                        this.$tab.find("li").each(function() {
                            var b = a(this),
                                c = b.data("tab");
                            d.subkeys.indexOf(c) < 0 && b.remove()
                        }), this.subkeys && this.subkeys.length && this.changeTab(this.subkeys[0])
                    },
                    show: function() {
                        this.$el[a.isMobile ? "show" : "fadeIn"]()
                    },
                    changeTab: function(b) {
                        if (this.subviews[b]) {
                            var c = this.$tab.find("li[data-tab=" + b + "]");
                            c && c.length && (c.hasClass("active") || c.addClass("active"), c.siblings(".active").removeClass("active")), this.subflags[b] || this.initSubview(b);
                            for (var d in this.subflags) d !== b && this.subviews[d].hide();
                            this.subviews[b].show(), a.trigger("postbox:tab:change", b)
                        }
                    },
                    onChangeTab: function(b) {
                        this.changeTab(a(b.currentTarget).data("tab"))
                    },
                    onOpenStatusTab: function() {
                        this.changeTab("status")
                    },
                    onOpenPhotoTab: function() {
                        this.changeTab("photo")
                    },
                    onOpenVideoTab: function() {
                        this.changeTab("video")
                    },
                    onShowInitialState: function() {
                        this.subkeys.length > 1 && this.$tab.show()
                    },
                    onShowMainState: function() {
                        this.$tab.hide()
                    },
                    initSubview: function(a) {
                        this.subflags[a] || (this.subviews[a] = new this.subviews[a]({
                            single: this.subkeys.length <= 1
                        }), this.assign(this.getSubviewElement(), this.subviews[a]), this.listenTo(this.subviews[a], "show:initial", this.onShowInitialState), this.listenTo(this.subviews[a], "show:main", this.onShowMainState), this.subflags[a] = !0)
                    },
                    getSubviewElement: function() {
                        var b = a("<div>").hide().appendTo(this.$subviews);
                        return b
                    }
                })
            }), define("views/stream/filterbar", ["sandbox", "views/base", "utils/ajax"], function(a, b, c) {
                return b.extend({
                    render: function() {
                        this.$btn = a(".joms-activity-filter-action"), this.$list = a(".joms-activity-filter-dropdown"), this.$options = a(".joms-activity-filter__options"), this.$btn.on("click", a.bind(this.toggle, this)), this.$list.on("click", "li", a.bind(this.select, this)), this.$list.on("change", "select", a.bind(this.filterChange, this)), this.$list.on("keyup", "input[type=text]", a.bind(this.filterKeyup, this)), this.$list.on("click", "button.joms-button--primary", a.bind(this.filterSearch, this)), this.$options.find("li").on("click", a.bind(this.makeDefault, this)), this.listenTo(a, "click", this.onDocumentClick)
                    },
                    toggle: function() {
                        var a = "none" === this.$list[0].style.display;
                        a ? this.expand() : this.collapse()
                    },
                    expand: function() {
                        this.$list.show()
                    },
                    collapse: function() {
                        this.$list.hide()
                    },
                    select: function(b) {
                        var c = a(b.currentTarget),
                            d = c.data("url") || "/",
                            e = c.data("filter");
                        "__filter__" !== e && (this.toggle(), window.location = d)
                    },
                    filterChange: function(a) {
                        var b = a.target.value,
                            c = this.$list.find("input[type=text]"),
                            d = this.$list.find(".joms-button--primary");
                        ("hashtag" === b || "keyword" === b) && (c.attr("placeholder", c.data("label-" + b)), d.html(d.data("label-" + b)))
                    },
                    filterKeyup: function(b) {
                        var c = a(b.currentTarget),
                            d = c.val(),
                            e = d;
                        e = e.replace(/#/g, ""), e.length !== d.length && c.val(e)
                    },
                    filterSearch: function(b) {
                        var c, d, e, f, g, h;
                        b.preventDefault(), b.stopPropagation(), c = a(b.currentTarget), d = c.closest("li"), e = d.find("select").val(), f = d.find("input"), g = f.val().replace(/^\s+|\s+$/g, ""), g && ("hashtag" === e && (g = g.split(" "), g = g[0]), h = d.data("url"), h = h.replace("__filter__", e), h = h.replace("__value__", g), window.location = h)
                    },
                    makeDefault: function(b) {
                        var d, e, f, g;
                        b.preventDefault(), b.stopPropagation(), d = a(b.currentTarget), e = d.find("a").data("value"), f = this.$options.find("span > img"), "hidden" === f.css("visibility") && (f.css("visibility", "visible"), g = {}, c({
                            fn: "system,ajaxDefaultUserStream",
                            data: [e],
                            success: function(a) {
                                a && (g = a)
                            },
                            complete: a.bind(function() {
                                g.error ? joms.popup.info("Error", g.error) : g.success && (joms.popup.info("", g.message), this.$options.find(".joms-dropdown").hide(), d.addClass("active").siblings("li").removeClass("active"), f.css("visibility", "hidden"))
                            }, this)
                        }))
                    },
                    onDocumentClick: function(a) {
                        a.closest(".joms-activity-filter").length || this.collapse()
                    }
                })
            }), define("views/stream/layout", ["sandbox", "views/base", "views/stream/filterbar"], function(a, b, c) {
                return b.extend({
                    initialize: function() {
                        this.filterbar = new c
                    },
                    render: function() {
                        this.filterbar.render()
                    }
                })
            }), require(["sandbox", "views/postbox/layout", "views/stream/layout", "utils/constants"], function(a, b, c, d) {
                function e() {
                    var c, d = a(".joms-postbox");
                    d.length && (c = new b({
                        el: d
                    }), c.render(), c.show())
                }

                function f() {
                    var a = new c;
                    a.render()
                }

                function g() {
                    d.set("friends", "fetching");
                    var a = window.setInterval(function() {
                        window.joms_friends && (window.clearInterval(a), d.set("friends", window.joms_friends))
                    }, 200)
                }
                a(function() {
                    e(), f(), +window.joms_my_id && g()
                })
            }), define("init", function() {}), require.config({
                deps: ["init"]
            }), define("bundle", function() {})
        }(), joms_init_postbox = void 0
}