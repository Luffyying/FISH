define(['jquery'],function($){

    function Dialog(){
    }
    Dialog.prototype.open = function(options){
            var self = this;
            var settings = {
                width: 450,
                height: 460
            };
            $.extend(settings, options);
            this.$container = $('<div class="dialog-container"></div>');
            this.$mask = $('<div class="dialog-mask"></div>');
            this.$dialogBox = $('<div class="dialog-box"></div>');
            this.$btnClose = $('<span class="dialog-close-btn">[X]</span>');
            this.$content = $('<div class="dialog-content"></div>');
            
            this.$container.append(this.$mask);
            this.$dialogBox.css({
                width: settings.width,
                height: settings.height,
                marginLeft: -settings.width/2,
                marginTop: -settings.height/2
            }).appendTo(this.$container);
            this.$btnClose.on('click', function(){
                self.close();
            }).appendTo(this.$container);
            this.$content.load(settings.url).appendTo(this.$dialogBox);

            this.$mask.on('click', function(){
                self.close();
            });

            $(document.body).append(this.$container);
    };
    Dialog.prototype.close = function(){
        this.$container.remove();
    };
    return Dialog;
});