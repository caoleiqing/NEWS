var curr = plus.webview.currentWebview();
var title = curr.title;
var url = curr.url;
var head = plus.webview.create("_www/local/list_head.html", "url", {
	height: "40px"
}, {
	title: title,
	url:url
})
var body = plus.webview.create("_www/example/list_body.html", "", {
	top: "44px",bounce:"vertical"
})

head.addEventListener("loaded", function() {
	curr.append(head);
	curr.show("slide-in-right");
})
body.addEventListener("loading", function() {
	plus.nativeUI.showWaiting("正在加载", {
		modal: false
	})
})
body.addEventListener("loaded", function() {
	plus.nativeUI.closeWaiting()
	curr.append(body);
})