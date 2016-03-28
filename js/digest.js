/**
 * Created by User on 04.03.2015.
 */
$(document).on( "ready", function () {
    $("#right-menu").hide();
    $(".right-optional").css("margin-top", 100);
})

//фильтрация элементов раздела Корпоративный дайджест
function filterDigest(e){
    var rubric = ($(e.target).parents('div.f-dd').data('rubric'));
    var month = $('div[name="'+rubric+'-month"]').attr("data-value");
    var year = $('div[name="'+rubric+'-year"]').attr("data-value");
    if (year != 'archive'){
        location = '/'+rubric+'/?'+rubric+'_month='+month+'&'+rubric+'_year='+year;
    }
    else{
        location = '/'+rubric+'/archive.php';
    }
    return true;
}