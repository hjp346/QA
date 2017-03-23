//显示灰色 jQuery 遮罩层
function showBg1() {
var bh = $("body").height();
var bw = $("body").width();
$("#fullbg").css({
height:bh,
width:bw,
display:"block"
});
$("#dialog1").show();
}


function showBg2() {
var bh = $("body").height();
var bw = $("body").width();
$("#fullbg").css({
height:bh,
width:bw,
display:"block"
});
$("#dialog2").show();
}
//关闭灰色 jQuery 遮罩
function closeBg1() {
$("#fullbg,#dialog1").hide();
}


function closeBg2() {
$("#fullbg,#dialog2").hide();
}

