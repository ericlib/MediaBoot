
$(document).ready(function(){
    dropdownOpen();//调用
});

//设置鼠标悬停展开下拉菜单
function dropdownOpen(){
    $('.dropdown').mouseover(function(){
        $(this).addClass('show');
        $(this).find(".dropdown-menu").addClass('show');
        $(this).find("dropdown-menu-end").addClass('show');

    }).mouseout(function(){
        $(this).find(".dropdown-menu").removeClass('show');
        $(this).removeClass('show');
    });
}
