jquery.xtarget
==============
Simple ajax calls without javascript using jQuery

# Overview

This enable you to make the simpliest ajax calls ever, directly into your html code.

* Initialize your page with a simple **$('body').xtarget();**

* Your ajax calls will now be as simple as this :

```html
<a href="page.html" target="#where">click here</a>
<div id="where">content of page.html will be loaded here</div>
```

Features :

* works with &lt;a&gt; and &lt;form&gt; elements which target is an element identifier selector, beggining with "#".

* automatically uses [jquery.build](https://github.com/bapplistudio/jquery.build) when plugin is loaded. This enables jquery active content to be set after the ajax call.

* automatically uses [jquery.form](https://github.com/malsup/form) when plugin is loaded. This enables you to send files using ajax and create upload progress events.

* you can activate the history of your ajax calls into your (recent version) browser's history and update of the displayed address.

Other examples and codes :
https://cdn.rawgit.com/bapplistudio/jquery.xtarget/fef643d0/examples/simple.html


# Options

You can initialize some options for your page :

```javascript
$('body').xtarget({
    url_append:      'as_widget=1&some=others',
    keep:            'popup',
    submit:          'submit',
    error:           function(xhr, status, error){ console.log('error'); },
    success:         function(xhr, status, error){ console.log('success'); },
    popup_element:   'div',
    draggable_blank: '.window>h2',
    history: {
        condition: '.window>h2',
        on_post:   false,
        title:     '.window>h2'
    }
});
```

* **url_append** : will append additional arguments to all links

This is useful when you want your link to have some special arguments when they are used as ajax calls, but not when they are called ie with right-click-open-in-new-window.

* **keep** : when target is an element id that does not exist on page, xtarget will create a DOM element with the considered id. **keep** tells xtarget which classes of your &lt;a&gt; element should be transmitted to this new element, as this could be useful for dealing with popups into your css or javascript. Default value for **keep** is "popup".

Example :

```html
<a href="page.html" class="popup what" target="#dest">Click here</a>
```

A first click will result into the following page code, with the transmission of the "popup" class to the newly generated &lt;div&gt;&nbsp;:

```html
<a href="page.html" class="popup what" target="#dest">Click here</a>
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

* **error** : thrown when ajax calls error. Parameters are the same as [jquery $.ajax() error event](http://api.jquery.com/jQuery.ajax)

* **success** : event thrown after target container is loaded with data. Parameters are the sames as [jquery $.ajax() success event](http://api.jquery.com/jQuery.ajax)

* **popup_element** : this contains the tag name of the created target element, used when the target id was not found into current page. Default generated DOM element is &lt;div&gt;, but you can change it with this option.

Example :

```html
<script>
$('body').xtarget({ popup_element: 'section' });
</script>
<a href="page.html" target="#dest">Click here</a>
```

A click will result into the following page code, with &lt;section&gt; instead of the default &lt;div&gt; :

```html
<script>
$('body').xtarget({ popup_element: 'section' });
</script>
<a href="page.html" target="#dest">Click here</a>
<section id="dest">The content of page.html</section>
```

* **draggable_blank** : when target is **_blank** or the id of a new div, the **draggable_blank** option enables you to make this element draggable, ie for popup windows

Default value is **undefined**. If you set any other value, the [jquery-ui draggable component](http://api.jqueryui.com/draggable) must be enabled to use this option.

If the value is **true**, the whole loaded DOM element will be used as handle for dragging.

If the value is a [jQuery selector](http://api.jquery.com/category/selectors) string, the matching elements will be used as an [handle](http://api.jqueryui.com/draggable/#option-handle) for the draggable element.

Example :
If your loaded page contains an &lt;h2&gt; element :

```html
<script>
$('body').xtarget({ draggable_blank: 'div>h2' });
</script>
<a href="page.html" target="#dest">Click here</a>
```

A click will result into the following code, and you will be abble to drag your window using the &gt;h2&lt; as handle&nbsp;:

```html
<script>
$('body').xtarget({ draggable_blank: 'div>h2' });
</script>
<a href="page.html" target="#dest">Click here</a>
<div id="dest"><h2>Drag me</h2><p>The text of your loaded page<p></div>
```

* **history** : This set of options enables more transparent ajax calls. When **history.condition** is set, it defines rules to push your ajax calls into your browser's history.

* **history.condition** : A [jQuery selector](http://api.jquery.com/category/selectors) string : the page will be pushed into the history only if some elements of the loaded content contains elements matching this selector. **false** or **undefined** here will disable the history pushing feature.

* **history.on_post** : boolean, default to **false** and forms sent with **POST** method will not be pushed into history. When **true**, they will.

* **history.title** : A [jQuery selector](http://api.jquery.com/category/selectors) string used to find the text which will be used as title into your browser's history. If false or empty result, the URL will be used as title.

Example :

```javascript
$('body').xtarget({
	history: {
		condition: 'h2',
		on_post: false,
		title: 'h2'
	}
});
```

When xtarget makes ajax calls, they will be pushed into your browser history each time the loaded content contains an &lt;h2&gt; element, and the text of this &lt;h2&gt; element will be stored into the history.

The history pushing feature is not activated by default. If you set it on, notice that a **popstate** event will be thrown each time an historized ajax call is selected into the history. The xtarget event is active once the history element state object contains a true **reload** property, so beware of compatibility issues if the same mechanism is used by others programs.

# MIT License

This program and its documentation are released into MIT License :

« Copyright © Baptiste Pillot - baptiste at pillot dot fr

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

The Software is provided "as is", without warranty of any kind, express or implied, including but not limited to the warranties of merchantability, fitness for a particular purpose and noninfringement. In no event shall the authors or copyright holders be liable for any claim, damages or other liability, whether in an action of contract, tort or otherwise, arising from, out of or in connection with the software or the use or other dealings in the Software. »

