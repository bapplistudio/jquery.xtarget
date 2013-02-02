jquery.xtarget
==============

# Overview

This enable you to make the simpliest ajax calls ever, directly into your html code.

* Initialize your page with a simple **$("body").xtarget();**

* Your ajax calls will now be as simple as this :

```html
<a href="page.html" target="#where">click here</a>
<div id="where">content of page.html will be loaded here</div>
```

Features :

* works with &lt;a&gt; and &lt;form&gt; elements which target is an element identifier selector, beggining with "#"

* automatically use [jquery.build](https://github.com/bapplistudio/jquery.build) when plugin is loaded. This enables jquery active content to be set after the ajax call.

* automatically use [jquery.form](https://github.com/malsup/form) when plugin is loaded. This enables you to send files using ajax and create upload progress events.

Other examples and codes :

http://saf.re/github/jquery.xtarget/examples/simple.html

# Options

You can initialize some options for your page :

```javascript
$("body").xtarget({
	url_append: "as_widget=1&some=others",
	keep:       "popup",
	submit:     "submit",
	error:      function(xhr, status, error){ (...) },
	success:    function(data, status, xhr){ (...) }
});
```

* **url_append** : will append additional arguments to all links

* **keep** : when target is an element id that does not exist on page, xtarget will create a &lt;div&gt; element with the considered id. **keep** tells xtarget which classes of your &lt;a&gt; element should be transmitted to this new &lt;div&gt; element, as this could be usefull for dealing with popups into your css or javascript. Default value for **keep** is "popup".

Example :

```html
<a href="page.html" class="popup" target="#dest">Click here</a>
```

This will result into the following page code :

```html
<a href="page.html" class="popup what">Click here</a>
<div id="dest" class="popup">The content of page.html here</div>
```

* **submit** : all &lt;a&gt; elements that are inside a &lt;form&gt; and that have this class will send the content of the form using ajax with their href as replacement for the form action. Default value for **submit** is "submit".

Example :

```html
<form action="foo.html">
	<input name="name">
	<a href="page.html" class="submit" target="#popup">Click here to submit</a>
</form>
```

* **error** : thrown when ajax call error. Parameters are the same as [jquery $.ajax() error event](http://api.jquery.com/jQuery.ajax)

* **success** : event thrown after target container is loaded with data. Parameters are the sames as [jquery $.ajax() success event](http://api.jquery.com/jQuery.ajax)
