/*(function($, window){
    $(function(){
        $('.slider').slick();
    });
})(jQuery,window);*/

(function($, window){
function setSnsShare(shareUrl, description) {
    // 都合に合わせてセレクタは変えてね！
    setTwitterLink(".twitter_back a", shareUrl,description);
    setFacebookLink(".facebook_back a", shareUrl, description);
    setGooglePlusLink(".google_back a", shareUrl, description);
    setHatebuLink(".hatena_back a", shareUrl, description);
    setLineLink(".line_back a", shareUrl, description);
}

function setFacebookLink(shareSelector, shareUrl, description) {
    $(shareSelector).attr("href", "https://www.facebook.com/sharer/sharer.php?u=" + shareUrl + "&t=" + encodeURIComponent(description));    
    setShareEvent(shareSelector, 'Facebook', shareUrl);
}

function setShareEvent(selector, snsName, shareUrl) {
    $(selector).on('click', function(e){
        var current = this;

        // このあたりは適当に書き換えて下さい
        window.open(current.href, '_blank', 'width=600, height=600, menubar=no, toolbar=no, scrollbars=yes');
        e.preventDefault();
    }); 
}

})(jQuery,window);