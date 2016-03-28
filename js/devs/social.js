function Share (network, inKeyphrases) {

    var inKey = inKeyphrases || false,
        purl, txt1, txt2, ptext, pimg, phead,
        source;

    purl = window.location.href.replace("#", "%23");

    if (inKey) {

        source = $(".keyphrases .slide-item");

        source.each( function() {
            if ( $(this).css('display') == 'block' ) source = $(this);
        })

        purl = encodeURIComponent(purl);
        txt1 = source.find(".number").text() || "";
        txt2 = source.find(".text").text() || "";
        ptext = txt1 + " " + txt2;
        pimg =  source.find("img").attr("href");
        if ( pimg == undefined ) pimg = (network=="vk" || network=="fb" ) ? $(".imgvk").attr("content") : $(".ogimg").attr("content");
        phead = (network == "fb")? "Ключевые факты" : "MAYKOR: Ключевые факты";

    } else {

        var source = $(".hidden.source:last");
        purl = encodeURIComponent(purl);


        txt1 = source.attr("data-title") ||  "";
        txt2 = source.attr("data-text")  || "";
        pimg = source.attr("data-img") || "";

        if (network != "fb") {
            ptext = txt1;
            phead = $("title").text();
        } else {
            phead = (source.hasClass("photoreport")) ? "Фотоотчет" : txt1;
            ptext = (source.hasClass("photoreport")) ? txt1 : txt2;
        } 


    }

    switch (network) {

        case 'vk':
            url  = 'http://vkontakte.ru/share.php?';
            url += 'url='          + purl;
            url += '&title='       + encodeURIComponent(phead);
            url += '&description=' + encodeURIComponent(ptext);
            url += '&image='       + encodeURIComponent(pimg);
            url += '&noparse=true';
        break;

        case 'fb':
            url  = 'https://www.facebook.com/dialog/feed?app_id=1484890991724023';
            url += '&link='       + purl;
            url += '&caption='     + encodeURIComponent(phead);
            url += '&description='   + encodeURIComponent(ptext);
            url += '&picture=' + encodeURIComponent(pimg);
            url += '&redirect_uri=' + "https://www.facebook.com";

            /* var text;
            text = '<meta class="kill_me" property="og:title" content="'+ encodeURIComponent(phead) + '" />';
            text = '<meta class="kill_me" property="og:image" content="'+ encodeURIComponent(pimg) + '" />';
            text = '<meta class="kill_me" property="og:description" content="'+ encodeURIComponent(ptext) + '" />';
            text = '<meta class="kill_me" property="og:og:url" content="'+ encodeURIComponent(purl) + '" />';
            $("head").append(text);

            alert("sdfsdf");

            url  = "https://www.facebook.com/dialog/share_open_graph?app_id=145634995501895&display=popup&action_type=og.like&action_properties=%7B%22object%22%3A%22https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2F%22%7D&redirect_uri=https://developers.facebook.com/tools/explorer"; */

        break;

        case 'tw':
            url  = 'http://twitter.com/share?';
            url += 'text=MAYKOR: '      + encodeURIComponent(ptext);
            url += '&url='      + purl;
        break;

        case 'pi':
            url  = 'http://pinterest.com/pin/create/button/?';
            url += '&url='          + purl;
            url += '&media='        + pimg;
            url += '&description='  + encodeURIComponent(ptext);
        break;

        case 'in':
            url  = 'http://www.linkedin.com/shareArticle?';
            url += 'mini=true';
            url += '&url='      + purl;
            url += '&title='    + encodeURIComponent(phead);
            url += '&source='   + purl;
            url += '&summary='  + encodeURIComponent(ptext);
        break;
    }

    popup(url);
}

function popup (url) {
    window.open(url,'', 'toolbar=0,status=0,width=630,height=420');
}

function getUrl () {

    var url = window.location.href,
        sUrl = url.split("/"),
        bnd = sUrl.length-1;

    if (url.indexOf("#") != -1) {

        url = "";
        for ( i=0; i<=bnd-3; i++ ) url+=sUrl[i] + "/";

        var qPos = sUrl[bnd].indexOf("?");
        if ( qPos == -1) {

            var hash = sUrl[bnd-1];
            hash = hash.replace("#", "");
            url += hash;

        } else {

            alert(sUrl[bnd].slice(qPos));

        }
    }

    return url;
}