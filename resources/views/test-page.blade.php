<html>
<head>
  <title>A Meaningful Page Title</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type='text/javascript' charset='utf-8'>
window.onload = function() {
MIYNLive.init({
uid: '12022020i0z5krh8e7pg69u',
ui: false,
buttonprefix: true,
paramName: 'action'
});
};
(function(d, s, id){
var js, fjs = d.getElementsByTagName(s)[0],
p = 'https://',
r = Math.floor((20000000 - 10) * Math.random());
if (d.getElementById(id)) {return;}
js = d.createElement(s); js.id = id; js.setAttribute('async','true'); js.setAttribute('crossorigin','anonymous');
js.src = p + "{{config('app.live_url')}}/site/js/bad-request-issue.js?q=" + r;
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'miynsite-jssdk'));
</script>
</head>
<body>

<p>The content of the body element is displayed in the browser window.</p>
<p>The content of the title element is displayed in the browser tab, in favorites and in search-engine results.</p>

</body>
</html>
