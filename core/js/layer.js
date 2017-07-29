// 刘叔封装layer常用函数库
var mlayer = {
	/*弹出消息提示*/
	msg : function(msg) {
		layer.msg(msg);
	},
	/*成功消息提示*/
	msgs : function(msg) {
		layer.msg(msg, {icon: 1});
	},
	/*错误消息提示*/
	msge : function(msg) {
		layer.msg(msg, {icon: 2});
	},
	/*页面弹出层*/
	page : function(cont, width, height, title) {
		layer.open({
		  title: title,
		  type: 1,
		  area: [width+'px', height+'px'],
		  shadeClose: true, //点击遮罩关闭
		  content: cont
		});
	},
	/*加载层*/
	loading : function(time) {
		var ii = layer.load();
	    //此处用setTimeout演示ajax的回调
	    setTimeout(function(){
	    	layer.close(ii);
	    }, time);
	},
	/*tips层*/
	tips : function(msg, dom) {
		layer.tips(msg, dom);
	},
	/*弹窗提醒*/
	alert : function(msg, title) {
		layer.alert(msg, {title: title});
	},
	/*警告弹窗提醒*/
	warning : function(msg, title) {
		layer.alert(msg, {icon: 0, title: title});
	},
	/*成功弹窗提醒*/
	success : function(msg, title) {
		layer.alert(msg, {icon: 1, title: title});
	},
	/*错误弹窗提醒*/
	error : function(msg, title) {
		layer.alert(msg, {icon: 2, title: title});
	},
	/*问号弹窗提醒*/
	what : function(msg, title) {
		layer.alert(msg, {icon: 3, title: title});
	},
	/*锁头弹窗提醒*/
	lock : function(msg, title) {
		layer.alert(msg, {icon: 4, title: title});
	},
	/*哭脸弹窗提醒*/
	cry : function(msg, title) {
		layer.alert(msg, {icon: 5, title: title});
	},
	/*笑脸弹窗提醒*/
	laugh : function(msg, title) {
		layer.alert(msg, {icon: 6, title: title});
	},
	
};








